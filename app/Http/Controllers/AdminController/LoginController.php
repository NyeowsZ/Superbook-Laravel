<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $data = $validator->validated();
        
        if(Auth::guard('admin')->attempt($data)){
            $request->session()->regenerate();
            return redirect()->back()->with(['message' => 'Admin Login Successful']);
        } else {
            return redirect()->back()->withErrors(['login' => 'Invalid Credentials']);
        }
    }
}
