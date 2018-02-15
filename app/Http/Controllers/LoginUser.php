<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;

class LoginUser extends Controller
{
    public function create()
    {
        return view('Login.create');
    }

    public function store(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->home();
        }else{
            return back();
        }


      }


}
