<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\AcademicClass;
use App\Models\Semester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Show the grouped view (Icons and Semester Boxes)
    public function index()
    {
        $user = auth()->user();
        $unreadCount = $user->notifications()
                        ->wherePivot('is_read', false)
                        ->count();

        $classes = AcademicClass::with('semesters')->get();
        $totalPrograms = $classes->count();
        $activeSemestersCount = \App\Models\Semester::where('status', 1)->count();
        return view('management.students.index', compact('classes', 'totalPrograms','unreadCount', 'activeSemestersCount'));
    }

    // Show the form to add a student
 public function create(Request $request)
{
    $classId = $request->input('class_id');

    // fetch only when class is passed
    $selectedClass = null;
    $activeSemester = null;
    $semesters = collect(); // empty default
    $classes = collect();   // empty default

    if ($classId) {
        $selectedClass = AcademicClass::find($classId);

        if ($selectedClass) {
            // get only semesters of THIS class
            $semesters = Semester::where('academic_class_id', $classId)->get();

            // get active semester of THIS class
            $activeSemester = Semester::where('academic_class_id', $classId)
                                      ->where('status', 1)
                                      ->first();
        }
    }

    return view('management.students.create', compact(
        'classes',           // optional fallback
        'semesters',
        'selectedClass',
        'activeSemester'
    ));
}

    // Handle the complex "Two-Step" storage
   public function store(Request $request)
{
    // Validate fields
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
        'academic_class_id' => 'required|exists:academic_classes,id',
        'semester_id' => 'required|exists:semesters,id',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'documents.*' => 'nullable|mimes:pdf,doc,docx,jpg,png|max:5120',
    ]);

    // upload photo
    $photoPath = null;
    if ($request->hasFile('profile_photo')) {
        $photoPath = $request->file('profile_photo')->store('students/photos', 'public');
    }

    // upload multiple documents
    $documentPaths = [];
    if ($request->hasFile('documents')) {
        foreach ($request->file('documents') as $file) {
            $documentPaths[] = $file->store('students/documents', 'public');
        }
    }

    // generate registration number
    $academicClass = AcademicClass::findOrFail($request->academic_class_id);
    $years = explode('-', $academicClass->session);
    $shortSession = substr($years[0], -2) . substr($years[1], -2);
    $currentCount = Student::where('academic_class_id', $request->academic_class_id)->count();
    $nextNumber = str_pad($currentCount + 1, 3, '0', STR_PAD_LEFT);
    $registrationNumber = strtoupper($academicClass->class_code) . '-' . $shortSession . '-' . $nextNumber;

    // 1. Create the Account (User Table)
    $user = User::create([
        'name'     => trim($request->first_name . ' ' . $request->last_name),
        'email'    => $request->email,
        'password' => Hash::make($request->password),
        'role'     => 'student', // Hardcoded as student as per your requirement
    ]);

    // save student
    Student::create([
    'user_id' => $user->id,
    'academic_class_id' => $request->academic_class_id,
    'semester_id' => $request->semester_id,
    'first_name' => $request->first_name,
    'middle_name' => $request->middle_name,
    'last_name' => $request->last_name,
    'father_name' => $request->father_name,
    'student_reg_number' => $registrationNumber, // Generated in your controller
    'registration_fee' => $request->registration_fee,
    'semester_fee' => $request->semester_fee,
    'discount' => $request->discount,
    'cnic' => $request->cnic,
    'date_of_birth' => $request->date_of_birth,
    'gender' => $request->gender,
    'nationality' => $request->nationality,
    'religion' => $request->religion,
    'material_status' => $request->material_status, // Using your DB spelling
    'phone' => $request->phone,
    'address' => $request->address,
    'guardian_name' => $request->gardian_name, // Match blade: gardian_name
    'guardian_phone' => $request->gardian_phone,
    'admission_date' => $request->admission_date,
    'profile_photo' => $photoPath,
    'documents' => json_encode($documentPaths),
]);

    return redirect()
        ->route('students.class.view', $request->academic_class_id)
        ->with('success', 'Student Registered Successfully!');
}

   public function viewByClass($class_id)
{
    $class = AcademicClass::with(['semesters' => function($query) {
        $query->orderBy('semester_number', 'asc');
    }])->findOrFail($class_id);

    // Find the current active semester for this class
    $activeSemester = $class->semesters->where('status', 1)->first();

    $students = Student::where('academic_class_id', $class_id)
                ->with(['user', 'semester'])
                ->get();

    return view('management.students.view', compact('class', 'students', 'activeSemester'));
}

public function show($id)
{
   $student = Student::with(['user', 'academicClass', 'semester'])->findOrFail($id);
    return view('management.students.show', compact('student'));
}

//============================= notification ===========================
public function notifications(Request $request)
{
    $user = auth()->user();
    
    // 1. Get the notifications
    $query = $user->notifications()->with('sender');

    if ($request->has('priority') && $request->priority != 'all') {
        $query->where('priority', $request->priority);
    }

   $notifications = $user->notifications()
    ->with('sender')
    ->withPivot('is_read', 'is_pinned', 'has_voted')
    // Use the pivot table name for sorting
    ->orderBy('notification_user.is_pinned', 'desc') 
    ->latest()
    ->paginate(15);

    // 2. Define the $stats variable (This fixes your Error)
    $stats = [
        'total'    => $user->notifications()->count(),
        'unread'   => $user->notifications()->wherePivot('is_read', false)->count(),
        'important' => $user->notifications()->where('priority', 'important')->count(),
        'urgent'   => $user->notifications()->where('priority', 'urgent')->count(),
        
    ];

    $unreadCount = $stats['unread'];

    // 3. Pass $stats to the view
    return view('student.notification.view', compact('notifications', 'unreadCount', 'stats'));
}
public function vote(Request $request, $id)
{
    $user = auth()->user();
    
    // Check if user has already voted
    $notification = $user->notifications()->where('notification_id', $id)->first();
    
    // Use the pivot data safely
    if ($notification && $notification->pivot->has_voted) {
        return back()->with('error', 'You have already voted!');
    }

    $notifModel = \App\Models\Notification::findOrFail($id);
    $option = $request->input('option');
    $metadata = $notifModel->metadata ?? [];

    if (isset($metadata['poll_options'][$option])) {
        $metadata['poll_options'][$option]++;
        $notifModel->metadata = $metadata;
        $notifModel->save();

        // FIX: This ensures the record exists AND updates the vote status
        $user->notifications()->syncWithoutDetaching([
            $id => ['has_voted' => true]
        ]);

        return back()->with('success', 'Vote counted!');
    }
    return back()->with('error', 'Invalid option.');
}
public function toggleFavorite($id)
{
    $user = auth()->user();
    $notification = $user->notifications()->where('notification_id', $id)->first();
    
    // Determine new status (if no record exists, default to favoriting it)
    $newStatus = $notification ? !$notification->pivot->is_pinned : true;

    // Use syncWithoutDetaching to force the update into the DB
    $user->notifications()->syncWithoutDetaching([
        $id => ['is_pinned' => $newStatus]
    ]);

    return response()->json([
        'success' => true, 
        'is_favorite' => $newStatus
    ]);
}
}