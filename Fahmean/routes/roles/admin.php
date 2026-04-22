<?php

use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\EducationLevelController;
use App\Http\Controllers\Admin\GradeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\SubjectController;
use App\Http\Controllers\Admin\TeacherSubjectController;
use App\Http\Controllers\Admin\EnrollmentRequestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\QuizController;

Route::get('/quizzes/{id}/students', [QuizController::class, 'manageStudents'])->name('quizzes.students');
Route::post('/quizzes/{id}/students', [QuizController::class, 'addStudent'])->name('quizzes.students.add');
Route::post('/quizzes/{id}/students/bulk-add-grade', [QuizController::class, 'addStudentsByGrade'])->name('quizzes.students.bulk-add-grade');
Route::delete('/quizzes/{id}/students/{studentId}', [QuizController::class, 'removeStudent'])->name('quizzes.students.remove');

use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\AssignmentController;

Route::prefix('dashboard')->middleware(['auth', 'role:admin|teacher|assistant_teacher'])->name('admin.')->group(function () {

    // 2️⃣ Dashboard
    // Route::get('/', [DashboardController::class, 'adminDashboard'])->name('dashboard'); // Semantic collision with main dashboard

    Route::get('/get-grades-by-levels', [UserController::class, 'getGradesByLevels'])->name('get-grades-by-levels');
    Route::get('/get-subjects-by-grades', [UserController::class, 'getSubjectsByGrades'])->name('get-subjects-by-grades');
    Route::get('/search-students', [UserController::class, 'searchStudents'])->name('search-students');


    // AJAX Uploads
    Route::post('/lessons/ajax-store', [LessonController::class, 'ajaxStore'])->name('lessons.ajax.store');
    Route::post('/lessons/{lesson}/upload', [LessonController::class, 'uploadMedia'])->name('lessons.upload.media');

    // 3️⃣ Users Management
    Route::resource('users', UserController::class);

    // 4️⃣ Education Levels & Grades
    Route::resource('education-levels', EducationLevelController::class);
    Route::resource('grades', GradeController::class);

    // 5️⃣ Subjects
    Route::resource('subjects', SubjectController::class);

    // 6️⃣ Courses Content
    // Route::resource('courses', CourseController::class); // Handled by Unified Controller
    // Route::post('/courses/{course}/enroll-student', [CourseController::class, 'enrollMultipleStudents'])->name('courses.enroll-student');
    // Route::post('/courses/{course}/update-status', [CourseController::class, 'updateStatus'])->name('courses.update-status');
    Route::post('/courses/{course}/sections', [SectionController::class, 'store'])->name('sections.store');

    // 7️⃣ Lessons & Quizzes
    // Route::resource('lessons', LessonController::class); // Handled by Unified Routes

    




    // 📝 Assignments
    Route::resource('assignments', AssignmentController::class);
    Route::get('/assignments/{assignment}/submissions', [AssignmentController::class, 'submissions'])->name('assignments.submissions');
    Route::post('/assignment-submissions/{submission}/grade', [AssignmentController::class, 'grade'])->name('assignment-submissions.grade');

    // 📋 Enrollment Requests
    Route::get('/enrollment-requests', [EnrollmentRequestController::class, 'index'])->name('enrollment-requests.index');
    Route::post('/enrollment-requests/{enrollmentRequest}/enroll', [EnrollmentRequestController::class, 'enroll'])->name('enrollment-requests.enroll');
    Route::post('/enrollment-requests/{enrollmentRequest}/reject', [EnrollmentRequestController::class, 'reject'])->name('enrollment-requests.reject');
    Route::delete('/courses/{course}/students/{user}/unenroll', [EnrollmentRequestController::class, 'unenroll'])->name('enrollment-requests.unenroll');

    // 8️⃣ Roles & Permissions
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
});
