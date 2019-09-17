<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Auth;
use App\Hotel;
use App\User;

class HotelController extends Controller
{
  public function index()
  {
    $hotels = Hotel::with('user')->orderBy('created_at', 'desc')->get();
    return response()->json($hotels);
  }
  public function store(Request $request)
  {
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'tagline' => ['required', 'string', 'max:255'],
      'picture' => ['required', 'url'],
      'description' => ['required', 'string'],
    ]);
    $hotel = new Hotel;
    $hotel->user_id = Auth::user()->id;
    $hotel->name = $request->name;
    $hotel->tagline = $request->tagline;
    $hotel->picture = $request->picture;
    $hotel->description = $request->description;
    $hotel->save();

    return response()->json($hotel);
  }
  public function show($id)
  {
    $hotel = Hotel::with('user')->find($id);
    if(!$hotel) { return response()->json(['message' => 'Hotel not found.'], 404); }
    $hotel->save();
    return response()->json($hotel);
  }
  public function update(Request $request, $id)
  {
    $hotel = Hotel::find($id);
    if(!$hotel) { return response()->json(['message' => 'Hotel not found.'], 404); }
    $request->validate([
      'name' => ['required', 'string', 'max:255'],
      'tagline' => ['required', 'string', 'max:255'],
      'picture' => ['required', 'url'],
      'description' => ['required', 'string'],
    ]);

    $hotel->name = $request->name;
    $hotel->tagline = $request->tagline;
    $hotel->picture = $request->picture;
    $hotel->description = $request->description;
    $hotel->save();

    return response()->json($hotel);
  }
  public function destroy($id)
  {
    $hotel = Hotel::find($id);
    if(!$hotel) { return response()->json(['message' => 'Hotel not found.'], 404); }
    $hotel->delete();
    return response()->json(['message' => 'Hotel was deleted.'], 200);
  }
}
