<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use App\User;

class UserController extends Controller
{
  public function index()
  {
    $users = User::orderBy('created_at', 'desc')->get();
    return response()->json($users);
  }
  public function store(Request $request)
  {
    $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'document' => ['required', 'integer', 'unique:users'],
      'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'phone' => ['integer']
    ]);
    $user = new User;
    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->document = $request->document;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->api_token = Str::random(60);
    $user->phone = $request->phone;
    $user->save();

    return response()->json($user);
  }
  public function show($id)
  {
    $user = User::find($id);
    if(!$user) { return response()->json(['message' => 'User not found.'], 404); }
    $user->save();
    return response()->json($user);
  }
  public function update(Request $request, $id)
  {
    $user = User::find($id);
    if(!$user) { return response()->json(['message' => 'User not found.'], 404); }
    $request->validate([
      'first_name' => ['required', 'string', 'max:255'],
      'last_name' => ['required', 'string', 'max:255'],
      'password' => ['required', 'string', 'min:8', 'confirmed'],
      'phone' => ['integer']
    ]);

    $user->first_name = $request->first_name;
    $user->last_name = $request->last_name;
    $user->password = Hash::make($request->password);
    $user->phone = $request->phone;
    $user->save();

    return response()->json($user);
  }
  public function destroy($id)
  {
    $user = User::find($id);
    if(!$user) { return response()->json(['message' => 'User not found.'], 404); }
    $user->delete();
    return response()->json(['message' => 'User was deleted.'], 200);
  }
}
