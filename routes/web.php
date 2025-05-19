<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StaffController\AuthController as StaffAuthController;
use App\Http\Controllers\AdminController\AuthController as AdminAuthController;
use App\Http\Controllers\CustomerController\AuthController as CustomerAuthController;

Route::get('/customer', function () {
    return view('customer');
});

Route::get('/staff', function () {
    return view('staff');
});

Route::get('/admin', function () {
    return view('admin');
});

// Staff

Route::post('/staff/login', [StaffAuthController::class, 'login'])->name('staff.login');
Route::post('/staff/register', [StaffAuthController::class, 'register'])->name('staff.register');
Route::post('staff/logout', [StaffAuthController::class, 'logout'])->name('staff.logout');

// Admin
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');
Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Customer
Route::post('/login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/register', [CustomerAuthController::class, 'register'])->name('customer.register');
Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');