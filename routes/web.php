<?php

use Illuminate\Support\Facades\Route;



Route::get('/login', function () {
    return view('pages.auth.auth-login');
})->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/', function () {
        return view('pages.dashboard',['type_menu' => 'dashboard']);
    })->name('home');

});
