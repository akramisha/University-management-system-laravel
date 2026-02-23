<?php
namespace App\Http\Controllers;

use App\Models\AcademicClass;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\User;

class AcademicController extends Controller
{
    // ================= CLASS (PROGRAM) =================

    // Show all classes

// 1. Add (Request $request) here
public function classesIndex(Request $request)
{
    $query = AcademicClass::query();

    // Filter: Active / Inactive
    if ($request->filled('status') && $request->status !== 'all') {
        $query->where('status', $request->status === 'active' ? 1 : 0);
    }

    // Sort: Name
    if ($request->filled('sort')) {
        $query->orderBy('name', $request->sort); // asc | desc
    } else {
        $query->orderBy('created_at', 'desc');
    }

    $classes = $query->get();

    $totalClasses = AcademicClass::count();
    $activeClasses = AcademicClass::where('status', 1)->count();

    return view(
        'management.classes.show-classes',
        compact('classes', 'totalClasses', 'activeClasses')
    );
}


public function classesStore(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'class_code' => 'required|string|unique:academic_classes',
        'icon' => 'required',
        'duration' => 'required',
        'status' => 'required|boolean',
        'description' => 'nullable|string',
        'color' => 'required|string',
        'total_semester' => 'required|integer|min:1|max:16',
        'session' => 'required|string|max:255',


    ]);
    $data = $request->all();
    AcademicClass::create($request->all());
    return redirect()->route('management.classes.index')->with('success', 'Class added successfully');
}

    // Show create class form
    public function classesCreate()
    {
        return view('management.classes.create-class');
    }

    public function classesDestroy($id) {
    $class = AcademicClass::findOrFail($id);
    $class->delete();
    return redirect()->back()->with('success', 'Class deleted successfully!');
}

public function classesEdit($id)
{
    $class = AcademicClass::findOrFail($id);
    return view('management.classes.edit-class', compact('class'));
}

public function classesUpdate(Request $request, $id)
{
    $request->validate([
        'name'           => 'required|string|max:255',
        'class_code'     => 'required|string|unique:academic_classes,class_code,' . $id,
        'icon'           => 'required',
        'duration'       => 'required',
        'status'         => 'required', // Remove |boolean if your form sends 'active'/'inactive' strings
        'description'    => 'nullable|string',
        'color'          => 'required|string',
        'total_semester' => 'required|integer|min:1|max:16',
        'session' => 'required|string|max:255',
    ]);
$data = $request->all();
    $class = AcademicClass::findOrFail($id);

    // Use $request->all() or specify all fields to ensure they all save
    $class->update($request->all());

    return redirect()->route('classes.index')->with('success', 'Class updated successfully');
}

// Inside your AcademicController.php
public function managementDashboard() // Change this to your actual function name
{
    // 1. Fetch the count from the database
    $totalClasses = AcademicClass::count();
    // 1. Get Teacher Counts
    $teacherCount = User::where('role', 'teacher')->count();
    
    // 2. Get Student Counts
    $totalStudents = User::where('role', 'student')->count();

    // 3. Get Program/Semester Counts (for your mini stats)
    $totalPrograms = AcademicClass::count();
    $activeSemestersCount = Semester::where('status', 1)->count();

    // 2. Pass it to the view using compact
    return view('management.dashboard', compact('totalClasses', 'teacherCount', 
        'totalStudents', 
        'totalPrograms', 
        'activeSemestersCount'));
}
    //=======================================================
//===================== admin panel ============================
    //=======================================================

// Add these inside the AcademicController class

public function adminDashboard()
{
    // Count total classes for the admin dashboard card
    $totalClasses = AcademicClass::count();
    
    // Make sure this matches your admin dashboard view path
    return view('admin.dashboard', compact('totalClasses'));
}

// public function adminClassesIndex(Request $request)
// {
//     $query = AcademicClass::query();

//     // Re-using your filter logic
//     if ($request->has('status') && $request->status != 'all') {
//         $statusValue = ($request->status == 'active') ? 1 : 0;
//         $query->where('status', $statusValue);
//     }

//     // Re-using your sort logic
//     if ($request->has('sort')) {
//         $query->orderBy('name', $request->sort);
//     } else {
//         $query->orderBy('created_at', 'desc');
//     }

//     $classes = $query->get();
    
//     // Return the specific admin view
//     return view('admin.classes.show-classes', compact('classes'));
// }

// public function adminCreateClass()
// {
//     // Return the specific admin view
//     return view('admin.classes.create-class');
// }


// 1. To show the list
public function adminclassesIndex(Request $request)
{
    $query = AcademicClass::query();

    // 1. Handle Status Filter
    if ($request->has('status') && $request->status != 'all') {
        // If your DB uses 1/0:
        $statusValue = ($request->status == 'active') ? 1 : 0;
        $query->where('status', $statusValue);
    }

    // 2. Handle Sorting
    if ($request->has('sort')) {
        $query->orderBy('name', $request->sort);
    } else {
        $query->orderBy('created_at', 'desc');
    }

    // 3. Get the filtered classes
    $classes = $query->get();

    // 4. Calculate stats for the top cards
    $totalClasses = AcademicClass::count();
    $activeClasses = AcademicClass::where('status', 1)->count();

    return view('admin.classes.show-classes', compact('classes', 'totalClasses', 'activeClasses'));
}

// 2. To show the specific details
public function adminClassDetails($id) {
    // Eager load semesters so we can see them on the details page
    $class = AcademicClass::with('semesters')->findOrFail($id);
    return view('admin.classes.details', compact('class'));
}

    //=======================================================
    // ================= SEMESTER (SESSION) =================
    // =======================================================

    // Show all semesters
   public function semestersShow(Request $request)
{
    $semesters = Semester::with('academicClass')->get();
    $classes = AcademicClass::all(); // Fetch all programs for the filter buttons

    // Stats calculations (from previous steps)
    $totalSemesters = $semesters->count();
    $activeSemesters = $semesters->where('status', 1)->count();
    $completedSemesters = $semesters->where('status', 0)->count();
    
    $data['status'] = ($request->status == 'active') ? 1 : 0;

    return view('management.semester.show-semester', compact(
        'semesters', 
        'classes', 
        'totalSemesters', 
        'activeSemesters', 
        'completedSemesters'
    ));
}
    // Show create semester form
    public function semestersCreate()
    {
        $classes = AcademicClass::all(); // dropdown
        return view('management.semester.create-semester', compact('classes'));
    }

    // Store new semester
public function semestersStore(Request $request)
{
    $request->validate([
        'academic_class_id' => 'required',
        'semester_number' => 'required|integer',
        'type' => 'required|in:semester,session',
        'status' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after:start_date',
    ]);

    $data = $request->all();

    // Mapping "active" string to 1, and everything else (inactive) to 0
    // This solves your issue where Active was showing as Completed
    if ($request->status === 'active' || $request->status == '1') {
        $data['status'] = 1; 
    } else {
        $data['status'] = 0; 
    }

    Semester::create($data);

    return redirect()->route('semesters.show')->with('success', 'Semester created successfully!');
}
    public function semesters() {
    return $this->hasMany(Semester::class);
}


// 1. This function opens the edit page (The Path)
public function semestersEdit($id)
{
    $semester = Semester::findOrFail($id);
    $classes = AcademicClass::all(); // To populate the Program dropdown
    
    return view('management.semester.edit-semester', compact('semester', 'classes'));
}

// 2. This function saves the changes (The Action)
public function semestersUpdate(Request $request, $id)
{

    
    $semester = Semester::findOrFail($id);
    
    // 1. Validate the incoming data
    $request->validate([
        'academic_class_id' => 'required',
        'semester_number' => 'required',
        'start_date' => 'required|date',
        'end_date' => 'required|date',
        'status' => 'required'
    ]);

    // 2. Update the record
    $semester->update([
        'academic_class_id' => $request->academic_class_id,
        'semester_number' => $request->semester_number,
        'type' => $request->type,
        'start_date' => $request->start_date,
        'end_date' => $request->end_date,
        'status' => $request->status, // This will be 0, 1, or 2 from your radio buttons
    ]);

    // 3. Redirect back to the list page with success message
    return redirect()->route('semesters.show')->with('success', 'Semester updated successfully!');
}
}
