<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    function practice(){
      return view('practice.index');
    }
}
