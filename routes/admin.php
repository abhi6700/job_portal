<?php

use App\Http\Controllers\admin\auth\AuthController;
use App\Http\Controllers\admin\compnay\CompanyController;
use App\Http\Controllers\admin\dashboard\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('auth.login.index');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::middleware('auth:admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

        ## Company
        Route::resource('/company', CompanyController::class);
    });
});