<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegister;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RegisterUser extends Controller
{
    public function __construct()
    {
        $this->middleware('email')->only('store');
    }

    public function create(){
        return view('Register.Create');
    }
    public function store(UserRegister $register){
        $photo='';
        $pathToStore = public_path('upload');
        if ($register->hasFile('profile_img')){
          $img=$register->profile_img;
          $extension=$img->getClientOriginalExtension();
          $file_name=rand(1111,9999).'.'.$extension;
           $img->move($pathToStore,$file_name);
          $photo=$file_name;
      }
      $input=$register->all();
      $input['password']=bcrypt($input['password']);
      $input['profile_img']=$photo;
        User::create($input);
        if (Auth::attempt($register->only('email', 'password'))) {
            return redirect()
                ->route('home')
                ->with('Welcome! Your account has been successfully created!');
        }
        return redirect()->back()->withInput();

    }
}
