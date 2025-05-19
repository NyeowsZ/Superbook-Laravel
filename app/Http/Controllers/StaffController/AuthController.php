<?php

namespace App\Http\Controllers\StaffController;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    //Login
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'password' => 'required|string|max:255'
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $data = $validator->validated();

        if(Auth::guard('staff')->attempt($data)){
            $request->session()->regenerate();

            return redirect()->back()->with(['message' => 'Login successful']);
        }
        
    }

    // Logout
    public function logout(){
        Auth::guard('staff')->logout();

        return redirect()->back()->with(['message' => 'Staff Successfully Created']);
    }

    // Register
    public function register(Request $request){

        // Input Validation
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|max:255|unique:staff,username',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|max:255|confirmed'
        ], [
            'username.required' => 'Please enter a username.',
            'firstname.required' => 'Please enter your first name.',
            'lastname.required' => 'Please enter your last name',
            'password.required' => 'Please enter your password.'
        ]);

        $data = $validator->validated();
        $data['password'] = bcrypt($data['password']);

        if($validator->fails()){
            
            return redirect('/staff')->withErrors($validator)->withInput();
        }

        Staff::create($data);

        return redirect('/staff')->with(['message' => 'Successfully Created the Account']);

        }
}
