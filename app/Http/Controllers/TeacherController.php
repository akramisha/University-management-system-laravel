<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\TeacherProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
public function index(Request $request)
{
    // 1. Start the Query ONCE
    // We use where('role', 'teacher') to ensure we only get teachers
    $query = User::where('role', 'teacher')->with('teacherProfile');

    // 2. Search Logic (Moved here so it doesn't get overwritten)
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhereHas('teacherProfile', function($profileQuery) use ($search) {
                  $profileQuery->where('cnic', 'LIKE', "%{$search}%")
                               ->orWhere('designation', 'LIKE', "%{$search}%");
              });
        });
    }

    // 3. Filter by Status
    if ($request->filled('status') && $request->status !== 'all') {
        // Ensure this matches your DB (use 1/0 or 'active'/'inactive' consistently)
        $statusValue = ($request->status === 'active') ? 1 : 0;
        
        $query->whereHas('teacherProfile', function($q) use ($statusValue) {
            $q->where('status', $statusValue);
        });
    }

    // 4. Sort Logic
    if ($request->has('sort')) {
        $query->orderBy('name', $request->sort);
    } else {
        $query->latest();
    }

    // 5. Execute with Pagination and keep URL parameters
    $teachers = $query->paginate(10)->withQueryString();

    // 6. Global Stats (independent of current search)
    $totalTeachers = User::where('role', 'teacher')->count();
    $activeTeachersCount = TeacherProfile::where('status', 1)->count();

    return view('management.teacher.show-teacher', compact('teachers', 'activeTeachersCount', 'totalTeachers'));
}
public function dashboard()
{
    $activeTeachersCount = TeacherProfile::where('status', 'active')->count();
    $totalTeachers = User::where('role', 'teacher')->count();
    $newFacultyCount = User::where('role', 'teacher')
                           ->where('created_at', '>=', now()->startOfMonth())
                           ->count();
    
    $stats = [
        'total_teachers' => $totalTeachers,
        
        
        'recent_teachers' => User::where('role', 'like', 'teacher')
                                ->with('teacherProfile')
                                ->latest()
                                ->take(5)
                                ->get(),
                                
        'new_this_month' => TeacherProfile::whereMonth('date_of_joining', date('m'))->count(),
    ];

   return view('management.dashboard', compact('stats', 'activeTeachersCount', 'totalTeachers', 'newFacultyCount'));
}

  public function store(Request $request)
{
    // 1. Validation
    $request->validate([
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|max:20|confirmed', 
        'first_name' => 'required|string|max:50',
        'last_name' => 'required|string|max:50',
        'phone_number' => 'required',
        'dob' => 'required|date',
        'gender' => 'required|in:male,female,other',
        'specialization' => 'required',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        'cnic'              => 'nullable|string|max:20',
        'designation'       => 'nullable|string|max:100',
        'employee_type'     => 'nullable|string|max:50',
        'cgpa'              => 'nullable|string|max:10',
        'bank_name'         => 'nullable|string|max:100',
    
        // Additional Qualifications
        'additional1'       => 'nullable|string|max:100',
        'institute1'        => 'nullable|string|max:100',
        'additional2'       => 'nullable|string|max:100',
        'institute2'        => 'nullable|string|max:100',
    ]);

    // 2. Generate Employee ID
    $lastTeacher = TeacherProfile::latest('id')->first();
    $nextNumber = $lastTeacher ? ($lastTeacher->id + 1) : 1;
    $generatedId = 'TCH-' . date('Y') . '-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    try {
        DB::beginTransaction();

        // 3. Create User Account
        $fullName = trim($request->first_name . ' ' . ($request->middle_name ?? '') . ' ' . $request->last_name);
        $user = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'teacher',
        ]);

        // 4. Handle Files
        $photoPath = $request->hasFile('profile_photo') ? $request->file('profile_photo')->store('teachers/photos', 'public') : null;
        $cvFile = $request->hasFile('file') ? $request->file('file')->store('teachers/docs', 'public') : null;

        // to see which data being save in db and which miss out
        // dd($request->all());
        // 5. Create Teacher Profile with ALL fields
        TeacherProfile::create([
    'user_id'           => $user->id,
    'employee_id'       => $generatedId,
    'status'            => 'active',
    'profile_photo'     => $photoPath,
    'first_name'        => $request->first_name,
    'middle_name'       => $request->middle_name ?? null, // Added ?? null
    'last_name'         => $request->last_name,
    'phone_number'      => $request->phone_number,
    'alternative_phone' => $request->alternative_phone ?? null,
    'dob'               => $request->dob,
    'gender'            => $request->gender,
    'nationality'       => $request->nationality ?? null,
    'address'           => $request->address ?? null,
    'date_of_joining'   => $request->date_of_joining ?? now(),
    'experience'        => $request->experience ?? null, // THIS FIXES THE ERROR
    'specialization'    => $request->specialization,
    'degree'            => $request->degree ?? null,
    'field_of_study'    => $request->field_of_study ?? null,
    'university'        => $request->university ?? null,
    'graduation_year'   => $request->graduation_year ?? null,
    'account_no'        => $request->account_no ?? null,
    'branch_name'       => $request->branch_name ?? null,
    'salary'            => $request->salary ?? 0,
    'emergency_person'   => $request->emergency_person ?? null,
    'emergency_relation' => $request->emergency_relation ?? null,
    'emergency_no'       => $request->emergency_no ?? null,
    'file'              => $cvFile,
    'cnic'              => $request->cnic ?? null,
    'designation'       => $request->designation ?? null,
    'employee_type'     => $request->employee_type ?? null,
    'cgpa'              => $request->cgpa ?? null,
    'bank_name'         => $request->bank_name ?? null,
    
    // Additional Qualifications
    'additional1'       => $request->additional1 ?? null,
    'institute1'        => $request->institute1 ?? null,
    'additional2'       => $request->additional2 ?? null,
    'institute2'        => $request->institute2 ?? null,
]);
        DB::commit();

        return redirect()->route('management.teacher.index')
                         ->with('success', "Teacher registered! ID: $generatedId");

    } catch (\Exception $e) {
        DB::rollBack();
        return back()->with('error', 'Error: ' . $e->getMessage())->withInput();
    }
}


// Add this inside TeacherController.php

public function create()
{
    // Make sure this path matches your folder structure: 
    // resources/views/management/teacher/add-teacher.blade.php
    return view('management.teacher.add-teacher');
}

public function teacherEdit($id)
{
    // We call the variable $teacher here
    $teacher = User::with('teacherProfile')->findOrFail($id);
    
    // So we must pass 'teacher' here
    return view('management.teacher.edit-teacher', compact('teacher'));
}


public function teacherUpdate(Request $request, $id)
{
    $teacher = User::findOrFail($id); // Changed variable name to match
    $profile = $teacher->teacherProfile;

    $request->validate([
        // Use $id directly here to ignore the current user's email
        'email' => 'required|email|unique:users,email,' . $id,
        'first_name' => 'required|string|max:50',
        'middle_name' => 'nullable|string|max:50', 
        'last_name' => 'required|string|max:50',
        'password' => 'nullable|min:8|confirmed',
        'phone_number' => 'required',
        'dob' => 'required|date',
        'gender' => 'required|in:male,female,other',
        'specialization' => 'required',
        'profile_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        'cnic'              => 'nullable|string|max:20',
        'designation'       => 'nullable|string|max:100',
        'employee_type'     => 'nullable|string|max:50',
        'cgpa'              => 'nullable|string|max:10',
        // bank details
        'bank_name'         => 'nullable|string|max:100',
        'account_no'        => 'nullable|string|max:30',
        'branch_name'       => 'nullable|string|max:100',
        // salary
        'salary'            => 'nullable|numeric',
        // emergency contact fields
        'emergency_person'   => 'nullable|string|max:100',
        'emergency_relation' => 'nullable|string|max:50',
        'emergency_no'       => 'nullable|string|max:20',
        // Additional Qualifications
        'additional1'       => 'nullable|string|max:100',
        'institute1'        => 'nullable|string|max:100',
        'additional2'       => 'nullable|string|max:100',
        'institute2'        => 'nullable|string|max:100',
    ]);

   $fullName = trim($request->first_name . ' ' . ($request->middle_name ?? '') . ' ' . $request->last_name);
    $teacher->name = $fullName;
    $teacher->email = $request->email;

    // 2. Prepare Profile Data
    $profileData = $request->except(['email', 'password', 'password_confirmation', 'profile_photo', 'file']);
    // Update password if provided
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }

    // 3. Handle Profile Photo Upload
    if ($request->hasFile('profile_photo')) {
        // Delete old photo if exists
        if ($profile->profile_photo) {
            Storage::delete('public/' . $profile->profile_photo);
        }
        $profileData['profile_photo'] = $request->file('profile_photo')->store('teachers/photos', 'public');
    }

    // 4. Handle CV/File Upload
    if ($request->hasFile('file')) {
        if ($profile->file) {
            Storage::delete('public/' . $profile->file);
        }
        $profileData['file'] = $request->file('file')->store('teachers/documents', 'public');
    }

    // 5. Update Profile Table
    $profile->update($profileData);

    return redirect()->route('management.teacher.index')->with('success', 'Teacher updated successfully');
}

public function teacherDestroy($id)
{
    // 1. Find the User
    $user = User::with('teacherProfile')->findOrFail($id);

    // 2. Delete Files from Storage (Clean up)
    if ($user->teacherProfile) {
        if ($user->teacherProfile->profile_photo) {
            Storage::delete('public/' . $user->teacherProfile->profile_photo);
        }
        if ($user->teacherProfile->file) {
            Storage::delete('public/' . $user->teacherProfile->file);
        }
        
        // 3. Delete the Profile Record
        $user->teacherProfile->delete();
    }

    // 4. Delete the User Account
    $user->delete();

    return redirect()->route('management.teacher.index')->with('success', 'Teacher and all associated files deleted successfully.');
}

// 1. For Admin (Management Dashboard)
public function show($id) {
    $teacher = User::with('teacherProfile')->findOrFail($id);
    return view('management.teacher.view-teacher', compact('teacher'));
}

// 2. For Teacher (Teacher Dashboard)
public function selfProfile() {
    $teacher = Auth::user()->load('teacherProfile');
    return view('management.teacher.view-teacher', compact('teacher'));
}

public function teacherProfile()
{
    // Get the logged-in teacher
    $teacher = Auth::user()->load('teacherProfile');

    // Return the view from the path: views/teacher/profile.blade.php
    return view('teacher.profile', compact('teacher'));
}

// admin dashboard to control teacher
// 1. Method for the "List" page (Limited Data)
// 1. Add (Request $request) here
public function adminTeacherIndex(Request $request) 
{

    $query = User::has('teacherProfile')->with('teacherProfile');

    // --- SEARCH LOGIC ---
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhereHas('teacherProfile', function($profileQuery) use ($search) {
                  $profileQuery->where('cnic', 'LIKE', "%{$search}%")
                               ->orWhere('designation', 'LIKE', "%{$search}%")
                               ->orWhere('specialization', 'LIKE', "%{$search}%");
              });
        });
    }

    // 3. Status Filter Logic
    if ($request->filled('status') && $request->status !== 'all') {
        $statusValue = ($request->status === 'active') ? 1 : 0;
        
        $query->whereHas('teacherProfile', function($q) use ($statusValue) {
            $q->where('status', $statusValue);
        });
    }

    // 4. Sort Logic
    if ($request->has('sort')) {
        $query->orderBy('name', $request->sort);
    } else {
        $query->latest();
    }

    // 5. Execute the query with pagination
    $teachers = $query->paginate(10);

    // 6. Calculate the counts for your dashboard cards
    // Use total count of all teachers regardless of current filter
    $totalTeachers = User::has('teacherProfile')->count();
    
    $activeTeachersCount = User::whereHas('teacherProfile', function($q) {
        $q->where('status', 1); 
    })->count();

    // 7. Pass everything to the view
    return view('admin.teachers.index', compact('teachers', 'totalTeachers', 'activeTeachersCount'));
}
// 2. Method for the "Full View" page (All Data)
public function adminTeacherView($id)
{
    $teacher = User::with('teacherProfile')->findOrFail($id);
    return view('admin.teachers.view', compact('teacher'));
}
}
