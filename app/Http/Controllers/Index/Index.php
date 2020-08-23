<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Index extends Controller
{
    //

    public function index(Request $request)
    {
       return view('index.index');
    }



}
