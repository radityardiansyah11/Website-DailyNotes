<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

//page
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/index', function () {
    return view('index');
})->name('index');

Route::get('/indexArchive', function () {
    return view('indexArchive');
})->name('indexArchive');

Route::get('/indexNotification', function () {
    return view('indexNotification');
})->name('indexNotification');

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/archive', function () {
    return view('archive');
})->name('archive');

Route::get('/notification', function () {
    return view('notification');
})->name('notification');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboardUser', function () {
    return view('dashboardUser');
})->name('dashboardUser');