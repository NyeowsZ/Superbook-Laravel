<?php

namespace App\Http\Controllers\CustomerController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // Logout
    public function logout(){
        Auth::guard('customer')->logout();
        return redirect()->back()->with(['message' => 'Logout Successful']);
    }
}
