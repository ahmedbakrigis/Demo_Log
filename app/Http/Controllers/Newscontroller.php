<?php

namespace App\Http\Controllers;

use App\Http\Requests\Newsrerister;
use App\News;
use Illuminate\Http\Request;
class Newscontroller extends Controller
{
    public function create(){
        $allnews=News::all();
      $arr=['news'=>$allnews];
        return view('News.create',$arr);
    }

   public function newspost(Newsrerister $request){
        if ($request->ajax()) {
            $name = $request->all();
            $news=News::create($name);
            $html=view('News.show',['news'=>$news])->render(); //render mend read code html Not Text & load code in variable html
            return response(['status'=>true,'result'=>$html]);
            /*
             * Whats Means of response used in ajax becausee data in ajax come json keep at statues
             * and come at html
             */
        }
       session()->flash('news', 'Your Post Added SuccessFull');
       return back();
    }
}
