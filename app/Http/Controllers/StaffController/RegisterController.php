<?php

namespace App\Http\Controllers\StaffController;

use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request){

        // Input Validation
        $validator = Validator::make($request->all(),[
            'username' => 'required|string|max:255|unique:staff,username',
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'middlename' => 'nullable|string|max:255',
            'password' => 'required|string|min:8|max:255|confirmed'
        ], [
            'username.required' => 'Pagtarong kaha sa imong username',
            'firstname.required' => 'Wa ka gibunyagan? Wa kay pangan?',
            'lastname.required' => 'Asa man lang kaha ka gikan, Imong Apilyedo Oy!',
            'password.required' => 'Ayaw lang pagpassword',
            'password.confirmed' => 'Ayaw libatlibat diha brad',


        ]);

        $data = $validator->validated();
        $data['password'] = bcrypt($data['password']);

        if($validator->fails()){
            
            return redirect('/')->withErrors($validator)->withInput();
        }

        Staff::create($data);

        return redirect('/')->with(['message' => 'Successfully Created the Account']);

        }
}
