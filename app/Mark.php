<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //
    public function post(){
    
        return $this->belongsToMany('App\Post');
    }
    public function user(){
    
        return $this->belongsToMany('App\User');
    }
}
