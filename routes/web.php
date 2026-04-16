<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Kpi\EmployeeRegisterController;
use App\Http\Controllers\Kpi\EmployeeController;
use App\Http\Controllers\Marine\InquiryController;
use App\Http\Controllers\Marine\ReportController;

 Route::get('/', function () {
     return view('auth.login');
 });

 
Route::get('/employee/register', [EmployeeRegisterController::class, 'kpiRegister'])->name('employee/register');
Route::post('/criteria-store', [EmployeeRegisterController::class, 'CriteriaStore'])->name('criteria.store');

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

// kpi
Route::get('/kpi/approved', [EmployeeController::class, 'approvedList'])->name('kpi.approved');
Route::get('/kpi/rejected', [EmployeeController::class, 'rejectedList'])->name('kpi.rejected');

// inquiry
Route::get('/inquiry/list', [InquiryController::class, 'index'])->name('inquiry.list');
Route::get('/inquiry/create', [InquiryController::class, 'createForm'])->name('inquiry.create');
Route::post('/inquiry/save', [InquiryController::class, 'store'])->name('inquiry.save');
Route::get('/inquiry/edit/{id}', [InquiryController::class, 'editForm'])->name('inquiry.edit');
Route::get('/inquiry/view/{id}', [InquiryController::class, 'view'])->name('inquiry.view');
Route::post('/inquiry/update', [InquiryController::class, 'update'])->name('inquiry.update');
Route::get('/inquiry/delete/{id}', [InquiryController::class, 'destroy'])->name('inquiry.destroy');

// visit 
Route::get('/inquiry-hot/list', [InquiryController::class, 'hotList'])->name('inquiry-hot.list');
Route::post('/inquiry-hot/list', [InquiryController::class, 'hotList'])->name('inquiry-hot.list');
Route::get('/inquiry-cold/list', [InquiryController::class, 'coldList'])->name('inquiry-cold.list');
Route::post('/inquiry-cold/list', [InquiryController::class, 'coldList'])->name('inquiry-cold.list');
Route::get('/inquiry-warm/list', [InquiryController::class, 'warmList'])->name('inquiry-warm.list');
Route::post('/inquiry-warm/list', [InquiryController::class, 'warmList'])->name('inquiry-warm.list');
Route::get('/visit/list', [InquiryController::class, 'visitList'])->name('visit.list');
Route::post('/visit/save', [InquiryController::class, 'insertVisitData'])->name('visit.save');

//pdf and excel report
Route::get('/inquiry/download-pdf', [ReportController::class, 'inquiryDownloadPdf'])->name('inquiry.download-pdf');
Route::get('/inquiry/export', [ReportController::class, 'inquiryDownloadExcel'])->name('inquiry.export');

Route::get('/inquiry-hot/download-pdf', [ReportController::class, 'inquiryHotDownloadPdf'])->name('inquiry-hot.download-pdf');
Route::get('/inquiry-hot/export', [ReportController::class, 'inquiryHotDownloadExcel'])->name('inquiry-hot.export');

Route::get('/inquiry-cold/download-pdf', [ReportController::class, 'inquiryColdDownloadPdf'])->name('inquiry-cold.download-pdf');
Route::get('/inquiry-cold/export', [ReportController::class, 'inquiryColdDownloadExcel'])->name('inquiry-cold.export');

Route::get('/inquiry-warm/download-pdf', [ReportController::class, 'inquiryWarmDownloadPdf'])->name('inquiry-warm.download-pdf');
Route::get('/inquiry-warm/export', [ReportController::class, 'inquiryWarmDownloadExcel'])->name('inquiry-warm.export');

Route::get('/visit-checkin/download-pdf', [ReportController::class, 'checkinDownloadPdf'])->name('visit-checkin.download-pdf');
Route::get('/visit-checkin/export', [ReportController::class, 'checkinDownloadExcel'])->name('visit-checkin.export');
