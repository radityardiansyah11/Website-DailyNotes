<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;//loginController   
use App\Http\Controllers\NoteController; //noteController
use App\Http\Controllers\HomeController;//homeController

/* Login System  */
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
// Hanya bisa diakses oleh tamu (belum login)
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->middleware('guest');
// Harus login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

/* Note */
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');

/* pin */
Route::post('/notes/{id}/toggle-pin', [NoteController::class, 'togglePin']);

/* home */
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home');

/* delete note */
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy');

/* edit note */
Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update');

/* pin unpin note */
Route::post('/notes/{id}/toggle-pin', [NoteController::class, 'togglePin'])->name('notes.togglePin');

/* Search */
Route::get('/notes/search', [NoteController::class, 'search'])->name('notes.search');

/* page */
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