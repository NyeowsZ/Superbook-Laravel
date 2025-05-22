<?php

namespace App\Http\Controllers\CashierController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // Logout
    public function logout(){
        Auth::guard('cashier')->logout();

        return redirect()->back()->with(['message' => 'Cashier Successfully Logged out']);
    }
}
