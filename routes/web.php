<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AcademicController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\NotificationController;


Route::get('/', function () {return view('welcome');})->name('home');
Route::get('/about', function () {return view('pages.about');})->name('about');
Route::get('/contact', function () {return view('pages.contact');})->name('contact');
Route::get('/medical-library', function () {return view('pages.medical-library');})->name('medical-library');
Route::get('/fee-structure', function () {return view('pages.fee-structure');})->name('fee-structure');
Route::get('/privacy-policy', function () {return view('pages.privacy-policy');})->name('privacy-policy');


//--------------------------------------------------------------------
//---------------------- Authentication Routes -----------------------
//--------------------------------------------------------------------
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
//--------------------------------------------------------------------
//---------------------- Profile Routes ------------------------------
//--------------------------------------------------------------------
Route::middleware('auth')->group(function () {
  Route::get('/teacher/profile', [TeacherController::class, 'teacherProfile'])->name('teacher.profile');
});

require __DIR__.'/auth.php';




Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/teacher/dashboard', function () {
        return view('teacher.dashboard');
    })->name('teacher.dashboard');
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
Route::get('/student/notifications', [StudentController::class, 'notifications'])->name('student.notifications.view');
Route::post('/notifications/{id}/vote', [StudentController::class, 'vote'])->name('notifications.vote');
Route::post('/notifications/{id}/favorite', [StudentController::class, 'toggleFavorite'])->name('notifications.toggleFavorite');    
Route::post('/notifications/mark-as-read/{id}', [StudentController::class, 'markAsRead']);
});



//--------------------------------------------------------------------
//----------------------admin Dashboard --------------------------------
//--------------------------------------------------------------------
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Dashboard
   Route::get('admin/dashboard', [AcademicController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/classes', [AcademicController::class, 'adminClassesIndex'])->name('classes.index');
    Route::get('/classes/{id}', [AcademicController::class, 'adminClassDetails'])->name('classes.details');
    
    // teacher routes
    Route::get('/teachers', [TeacherController::class, 'adminTeacherIndex'])->name('admin.teachers.index');
    // Route for File 2
    Route::get('/teachers/view/{id}', [TeacherController::class, 'adminTeacherView'])->name('admin.teachers.view');

});
//--------------------------------------------------------------------
//---------------------- Management Routes ------------------------------
//--------------------------------------------------------------------
Route::middleware(['auth', 'role:management'])->group(function () {
Route::get('/management/dashboard', [AcademicController::class, 'managementDashboard'])->name('management.dashboard');

// ===== CLASSES =====
Route::get('/management/classes', [AcademicController::class, 'classesIndex'])->name('classes.index'); // Changed name to classes.index
Route::get('/management/classes/create', [AcademicController::class, 'classesCreate'])->name('classes.create');
Route::post('/management/classes/store', [AcademicController::class, 'classesStore'])->name('classes.store');
Route::get('/management/classes/{id}/edit', [AcademicController::class, 'classesEdit'])->name('classes.edit');
Route::put('/management/classes/{id}', [AcademicController::class, 'classesUpdate'])->name('classes.update');
Route::delete('/management/classes/{id}', [AcademicController::class, 'classesDestroy'])->name('classes.destroy');
// ==================== SEMESTERS ==================
Route::get('/management/semesters', [AcademicController::class,'semestersShow'])->name('semesters.show');
Route::get('/management/semesters/create', [AcademicController::class,'semestersCreate'])->name('semesters.create');
Route::post('/management/semesters', [AcademicController::class,'semestersStore'])->name('semesters.store');
Route::get('/management/semesters/{id}/edit', [AcademicController::class,'semestersEdit'])->name('semesters.edit');
Route::put('/management/semesters/{id}', [AcademicController::class,'semestersUpdate'])->name('semesters.update');
Route::delete('/management/semesters/{id}', [AcademicController::class,'destroySemester'])->name('semesters.destroy');
// ===================== TEACHERS =================
Route::get('/management/teachers', [TeacherController::class, 'index'])->name('management.teacher.index');
Route::get('/management/teachers/create', [TeacherController::class, 'create'])->name('management.teacher.create');
Route::post('/teachers/store', [TeacherController::class, 'store'])->name('management.teacher.store');
Route::get('/management/teachers/{id}', [TeacherController::class, 'show'])->name('management.teacher.show');
Route::get('/management/teachers/{id}/edit', [TeacherController::class, 'teacherEdit'])->name('teacher.edit');
Route::put('/management/teachers/{id}/update', [TeacherController::class, 'teacherUpdate'])->name('teacher.update');
Route::delete('/management/teachers/{id}', [TeacherController::class, 'teacherDestroy'])->name('teacher.destroy');
//====================== Students ==========================
Route::get('/management/students/create', [StudentController::class, 'create'])->name('students.create');
Route::get('/management/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/management/students/class/{class_id}', [StudentController::class, 'viewByClass'])->name('students.class.view');
Route::post('/management/students/store', [StudentController::class, 'store'])->name('students.store');
Route::get('/management/students/details/{id}', [StudentController::class, 'show'])->name('students.show');
//====================== Notifications ==========================
Route::get('/management/notification', [NotificationController::class, 'index'])->name('management.notification.view');
Route::get('/management/notification/create', [NotificationController::class, 'create'])->name('notifications.create');
Route::post('/management/notification/store', [NotificationController::class, 'store'])->name('notifications.store');
Route::post('/management/notification/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::post('/management/notification/{id}/favorite', [NotificationController::class, 'toggleFavorite'])->name('notifications.favorite');
Route::get('/management/notification/{id}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
Route::put('/management/notification/{id}/update', [NotificationController::class, 'update'])->name('notifications.update');
Route::delete('/management/notification/{id}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
Route::post('/notification/{id}/vote', [NotificationController::class, 'vote'])->name('notifications.vote');
Route::post('/notifications/mark-all-read', [NotificationController::class, 'markAllRead'])->name('notifications.markAllRead');
});

Route::middleware(['auth'])->group(function () {

   
    Route::get('/management/add/course', function () {
        return view('management.add-course');
    })->name('management.add-course');

   
});
