<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Login
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
        }
    }

    // Logout
    public function logout(){
        Auth::guard('admin')->logout();

        return redirect()->back()->with(['message' => 'Admin Successfully Created']);

    }

    // Register
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'string|required|max:255|unique:admin,username',
            'firstname' => 'string|required|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'string|required|max:255',
            'password' => 'string|required|max:255'
    ]);

    if($validator->fails()){
        return redirect()->back()->withErrors($validator);
    }

    $data = $validator->validated();

    $data['password'] = bcrypt($data['password']);

    Admin::create($data);

    return redirect()->back()->with(['message' => 'Admin Created Successfully']);
    }

}
