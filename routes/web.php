<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;


/* Home */

Route::get('/home', [HomeController::class, 'showHomeView']);
Route::get('/contact', [HomeController::class, 'showContactView']);
Route::get('/ourteams', [HomeController::class, 'showOurteamsView']);
Route::get('/about', [HomeController::class, 'showAboutView']);
Route::get('/courses', [HomeController::class, 'showCoursesView']);
Route::get('/login', [HomeController::class, 'showLoginView']);
Route::post('/login', [HomeController::class, 'login']);
Route::get('/register', [HomeController::class, 'showRegisterView']);
Route::post('/register', [HomeController::class, 'register']);



/* student */
Route::middleware('auth', 'checkIsStudent')->group(function () {
    Route::get('/postComment', [StudentController::class, 'showPostView']);
    Route::post('/postComment', [StudentController::class, 'createPost']);
    Route::get('/courses/register/{course_id}', [StudentController::class, 'createPost']);
    Route::get('/courses/enrolled', [StudentController::class, 'showEnrolledCourses']);
});

/* course management */
Route::middleware('auth', 'checkIsTeacher')->group(function () {
    Route::get('/teacher/courses', [CourseController::class, 'index']);
    Route::get('/teacher/courses/add', [CourseController::class, 'showAddCourseView']);
    Route::get('/teacher/courses/edit', [CourseController::class, 'showEditCourseView']);
    Route::post('/teacher/courses/add', [CourseController::class, 'addCourse']);
    Route::post('/teacher/courses/update', [CourseController::class, 'updateCourse']);
    Route::delete('/teacher/courses/remove', [CourseController::class, 'removeCourse']);
});

