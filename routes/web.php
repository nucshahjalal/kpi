<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Marine\InquiryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// custom auth login route
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

require __DIR__.'/auth.php';

// inquiry
Route::get('/inquiry/list', [InquiryController::class, 'index'])->name('inquiry.list');
Route::get('/inquiry/create', [InquiryController::class, 'createForm'])->name('inquiry.create');
Route::post('/inquiry/save', [InquiryController::class, 'store'])->name('inquiry.save');
Route::get('/inquiry/edit/{id}', [InquiryController::class, 'editForm'])->name('inquiry.edit');
Route::get('/inquiry/view/{id}', [InquiryController::class, 'view'])->name('inquiry.view');
Route::post('/inquiry/update', [InquiryController::class, 'update'])->name('inquiry.update');
Route::get('/inquiry/delete/{id}', [InquiryController::class, 'destroy'])->name('inquiry.destroy');


