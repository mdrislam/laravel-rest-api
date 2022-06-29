<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'password'=>'required|confirmed',
        ]);
        $user= User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        $token =$user->createToken('myToken')->plainTextToken;
    return response([
        'status'=>true,
        'message'=>'Registration Successfully done',
        'user'=>$user,
        'token'=>$token,
    ],201);
    }
    public function logout(){
        auth()->user()->tokens()->delete();
        return response([
            "status"=>true,
            "message"=>"Successfully Logged Out",
        ],202);
    }
}
