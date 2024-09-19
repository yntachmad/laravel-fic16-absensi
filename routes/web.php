<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PermissionController;



Route::get('/login', function () {
    return view('pages.auth.auth-login');
})->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('pages.dashboard', ['type_menu' => 'dashboard']);
    })->name('home');

    Route::resource('users', UserController::class);

    Route::resource('company', CompanyController::class);

    Route::resource('attendance', AttendanceController::class);

    Route::resource('permission', PermissionController::class);

});
