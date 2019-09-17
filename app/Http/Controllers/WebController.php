<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class WebController extends Controller
{
  public function index() {
    return view('web.index');
  }
}
