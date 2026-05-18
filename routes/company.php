<?php

use App\Http\Controllers\company\auth\AuthController;
use App\Http\Controllers\company\dashboard\DashboardController;
use App\Http\Controllers\company\job_application\jobApplicationController;
use App\Http\Controllers\company\vacancies\VacancyController;
use Illuminate\Support\Facades\Route;

Route::prefix('company')->name('company.')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth.login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware('auth:company')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        ## vacancy
        Route::resource('vacancy', VacancyController::class);

        ##job applications
        Route::get('/job-application', [jobApplicationController::class, 'index'])->name('job-application.index');
        Route::get('/job-application/details/{id}', [jobApplicationController::class, 'details'])->name('job-application.details');
        Route::put('/job-application/update/{id}', [jobApplicationController::class, 'update'])->name('job-application.update');
    });
});