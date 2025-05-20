<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\AuthController as AdminAuthController;
use App\Http\Controllers\CustomerController\AuthController as CustomerAuthController;
use App\Http\Controllers\CashierController\AuthController as CashierAuthController;

Route::get('/customer', function () {
    return view('debug.customer');
});

Route::get('/admin', function () {
    return view('debug.admin');
});

Route::get('/cashier', function () {
    return view('debug.cashier');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});

// Admin
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');

Route::middleware(['auth:admin'])->group(function (){
    Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');
    Route::post('admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');
});

// Cashier
Route::post('/cashier/login', [CashierAuthController::class, 'login'])->name('cashier.login');
Route::post('cashier/logout', [CashierAuthController::class, 'logout'])->name('cashier.logout')->middleware('auth:cashier');
Route::post('/cashier/register', [CashierAuthController::class, 'register'])->name('cashier.register')->middleware('auth:admin');

// Customer
Route::post('/login', [CustomerAuthController::class, 'login'])->name('customer.login');
Route::post('/register', [CustomerAuthController::class, 'register'])->name('customer.register');
Route::post('/logout', [CustomerAuthController::class, 'logout'])->name('customer.logout');

