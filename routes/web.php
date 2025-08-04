<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;//loginController   
use App\Http\Controllers\NoteController; //noteController
use App\Http\Controllers\HomeController;//homeController
use App\Http\Controllers\DashboardController;//dashboard

/* Login System  */
Route::get('/login', [AuthController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest'); //login
Route::get('/register', [AuthController::class, 'showRegisterForm'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest'); //register

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');
// Hanya bisa diakses oleh guest (belum login)
// Harus login
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

/* Home */
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('home'); //home

/* Note */
Route::post('/notes', [NoteController::class, 'store'])->name('notes.store');//add note
Route::delete('/notes/{id}', [NoteController::class, 'destroy'])->name('notes.destroy'); //delete note
Route::put('/notes/{id}', [NoteController::class, 'update'])->name('notes.update'); //edit note
Route::post('/notes/{id}/toggle-pin', [NoteController::class, 'togglePin'])->name('notes.togglePin'); //pin unpin note

/* Dashboard */
Route::get('/dashboardUser', [DashboardController::class, 'index'])->name('dashboardUser'); //get user
Route::post('/user', [DashboardController::class, 'store'])->name('user.store'); //add user
Route::put('/user/{id}', [DashboardController::class, 'update'])->name('user.update'); //edit user
Route::delete('/user/{id}', [DashboardController::class, 'destroy'])->name('user.destroy'); //delete user
Route::get('/dashboard/users/search', [DashboardController::class, 'search'])->name('dashboard.users.search');//search user

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');


/* page */

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


