<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class usermiddleware extends Controller
{
    public function __construct()
    {
        $this->middleware('check');
    }
}
