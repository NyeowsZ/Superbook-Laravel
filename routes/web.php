<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController\LoginController as AdminLoginController;
use App\Http\Controllers\AdminController\RegisterController as AdminRegisterController;
use App\Http\Controllers\AdminController\LogoutController as AdminLogoutController;

use App\Http\Controllers\CustomerController\LoginController as CustomerLoginController;
use App\Http\Controllers\CustomerController\RegisterController as CustomerRegisterController;
use App\Http\Controllers\CustomerController\LogoutController as CustomerLogoutController;

use App\Http\Controllers\CashierController\LoginController as CashierLoginController;
use App\Http\Controllers\CashierController\RegisterController as CashierRegisterController;
use App\Http\Controllers\CashierController\LogoutController as CashierLogoutController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', function () {
    return view('form');
});


/*
================================================
                    ADMIN
================================================
*/

// Admin Authentication
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login');
Route::middleware(['auth:admin'])->group(function (){
    Route::post('/admin/register', [AdminRegisterController::class, 'register'])->name('admin.register');
    Route::post('/admin/logout', [AdminLogoutController::class, 'logout'])->name('admin.logout');
});

/*
================================================
                    CASHIER
================================================
*/

// Cashier Authentication
Route::post('/cashier/login', [CashierLoginController::class, 'login'])->name('cashier.login');
Route::post('/cashier/logout', [CashierLogoutController::class, 'logout'])->name('cashier.logout')->middleware('auth:cashier');
Route::post('/cashier/register', [CashierRegisterController::class, 'register'])->name('cashier.register')->middleware('auth:admin');

/*
================================================
                    CUSTOMER
================================================
*/

//Customer Authentication
Route::post('/login', [CustomerLoginController::class, 'login'])->name('customer.login');
Route::post('/register', [CustomerRegisterController::class, 'register'])->name('customer.register');
Route::post('/logout', [CustomerLogoutController::class, 'logout'])->name('customer.logout');


/*
============================================================
                         DEBUGGING                          
============================================================
| Access centralized debug tools here via /debug:
- Accounts: Admin, Cashier, Customer
- Books: Dashboard (CRUD operations)
*/

/*
===================[ DEBUG VIEW ROUTES ]====================
| Routes to quickly access debug views for different user roles and features:
- /debug/admin    → Admin account debug
- /debug/cashier  → Cashier account debug
- /debug/customer → Customer account debug
- /debug/books    → Books dashboard debug
*/

/*-------------------[ ACCOUNT DEBUG ]--------------------*/

// Admin
Route::get('/debug/admin', function () {
    return view('debug.accounts.admin');
});

// Cashier
Route::get('/debug/cashier', function () {
    return view('debug.accounts.cashier');
});

// Customer
Route::get('/debug/customer', function () {
    return view('debug.accounts.customer');
});

// Customer
Route::get('/debug/books', function() {
    return view('debug.books.dashboard');
});

/*----------------[ END - ACCOUNT DEBUG ]-----------------*/


