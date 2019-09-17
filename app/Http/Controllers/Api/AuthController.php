<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\User;
use Auth;

class AuthController extends Controller
{
  public function login(Request $request) {
    $request->validate([
        'email'       => 'required|string|email',
        'password'    => 'required|string',
    ]);
    $credentials = $request->only('email', 'password');
    if (!Auth::attempt($credentials)) {
      return response()->json(['message' => 'Wrong email or password.'], 401);
    }
    $user = $request->user();
    $user->api_token = Str::random(60);
    $user->save();
    return response()->json($user);
  }
  public function register(Request $request) {
    $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'document' => ['required', 'integer', 'unique:users'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
    ]);
    $user = new User;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->document = $request->document;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->api_token = Str::random(60);
    $user->save();
    return response()->json($user);
  }
}
