<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->back()->with(['message' => 'Admin Successfully Created']);

    }
}
