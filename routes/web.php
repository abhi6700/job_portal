<?php

use App\Http\Controllers\applicant\auth\AuthController;
use App\Http\Controllers\applicant\auth\RegisterController;
use App\Http\Controllers\applicant\job_application\JobApplicationController;
use App\Http\Controllers\applicant\vacancy\VacancyConroller;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::name('applicant.')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('auth.login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    ## registration routes
    Route::get('/register', [RegisterController::class, 'index'])->name('auth.register.index');
    Route::post('/register', [RegisterController::class, 'register'])->name('auth.register');

    ## vacancy routes
    Route::get('/', [VacancyConroller::class, 'index'])->name('vacancy.index');
    Route::get('/vacancies/details/{id}', [VacancyConroller::class, 'details'])->name('vacancy.details');

    Route::middleware('auth')->group(function () {
        ## job application routes
        Route::post('/job-application/{id}', [JobApplicationController::class, 'apply'])->name('job_application.apply');
        Route::get('/my-applications', [JobApplicationController::class, 'index'])->name('job_application.index');
    });
});


require __DIR__.'/admin.php';
require __DIR__.'/company.php';