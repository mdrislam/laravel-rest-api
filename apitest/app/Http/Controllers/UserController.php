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

    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return response([
                "status"=>false,
                "message"=>"Could not find any account from this email",
            ],401);

        }else if(!Hash::check($request->password,$user->password)){
            return response([
                "status"=>false,
                "message"=>"Password does not match",
            ],401);

        }else{
            $token =$user->createToken('myToken')->plainTextToken;
            return response([
                'status'=>true,
                'message'=>'Login Successfully done',
                'user'=>$user,
                'token'=>$token,
            ],200);

        }
    }
}
