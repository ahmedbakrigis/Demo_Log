<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImgRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class Updateimg extends Controller
{
    public function update_img(ImgRequest $request){
        $photo="";
        $path_store=public_path('upload');
        if ($request->hasFile('profile_img')) {
            $img=$request->profile_img;
            $extension=$img->getClientOriginalExtension();
            $file_name=rand(1111,9999).'.'.$extension;
            $img->move($path_store,$file_name);
            $photo=$file_name;
        }
        $input=$request->all();
        $input['profile_img']=$photo;
        Auth::user()->update($input);
        $email=Auth::user()->email;
        return redirect()->route('profile.show',$email);
    }
}
