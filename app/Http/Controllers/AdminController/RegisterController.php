<?php

namespace App\Http\Controllers\AdminController;

use App\Models\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
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
