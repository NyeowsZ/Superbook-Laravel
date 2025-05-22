<?php

namespace App\Http\Controllers\CustomerController;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Register
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:customers,username',
            'firstname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'lastname' => 'required|string|max:255',
            'password' => 'required|string|max:255|confirmed|min:8',
        ], [
            'username.required' => 'Please enter a username.',
            'firstname.required' => 'Please enter your first name.',
            'lastname.required' => 'Please enter your last name',
            'password.required' => 'Please enter your password.'
        ]);
    
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data = $validator->validated();
        $data['password'] = bcrypt($data['password']);

        $customer = Customer::create($data);

        //Auto Login After Registering
        Auth::guard('customer')->login($customer);
        return redirect('/')->with(['message' => 'Account Created Successfully']);
    
    }
}
