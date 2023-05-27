<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    
    public function store(Request $request)
    {
        $inputs = $request->all();

        User::create([
            'name' => $inputs['name'],
            'email' => $inputs['email'],
            'password' => Hash::make($inputs['password'])

        ]);

        return response()->json([
            'status'=>true,
            'message' => "Registartion Success"
        ]);

    }

}
