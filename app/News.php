<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable=['title','body','user_id',];

    // To Get Data From Model User
    public function user_id(){
        return $this->hasOne(User::class,'id','user_id');
    }
}
