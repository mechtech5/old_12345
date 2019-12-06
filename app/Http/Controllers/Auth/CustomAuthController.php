<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class CustomAuthController extends Controller 
{
  public $successStatus = 200;

  public function register(Request $request) 
  { 
    // return $request->all();

    $validator = Validator::make($request->all(), [ 
      'username' => 'required|string|min:3|max:16|unique:users|alpha_dash',
      'email' => 'required|email|unique:users',
      'password' => 'required',  
      'c_password' => 'required|same:password', 
    ]);

    if ($validator->fails()) 
    {          
      return response()->json(['error'=>$validator->errors()], 401);                        
    }    
    
    $input = $request->all();  
    $input['password'] = Hash::make($input['password']);
    $user = User::create($input); 
    // $token =  $user->createToken('AppName')->accessToken;
    return response()->json(['status' => true, 'message' => 'Signup Successful'], $this->successStatus); 
  }

  public function login(Request $request)
  { 
    // return $request->all();
    if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){ 
      $user = Auth::user(); 
      $token =  $user->createToken('AppName')-> accessToken; 
      return response()->json(['status' => true, 'message' => 'Login Successful', 'user' => $user, 'token' => $token], $this-> successStatus); 
    } else{ 
      return response()->json(['status' => false, 'message' => 'Unauthorised'], 401); 
    } 
  }

  public function me(Request $request) 
  {
    $user = Auth::user();
    if($user) {
      return response()->json([
        'status' => true, 
        'message' => 'User Authenticated', 
        'user' => auth()->user()
      ], $this->successStatus);
    }
  }
} 