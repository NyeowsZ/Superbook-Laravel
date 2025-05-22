<?php

namespace App\Http\Controllers\CashierController;

use App\Models\Cashier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // Register
    public function register(Request $request){

        // Input Validation
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|max:255|unique:cashier,username',
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
            
            return redirect('/cashier')->withErrors($validator)->withInput();
        }

        Cashier::create($data);

        return redirect('/cashier')->with(['message' => 'Successfully Created the Account']);

        }
}
