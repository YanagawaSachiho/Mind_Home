<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    //
    protected $fillable =['user_id','post_id'];
    public function post(){

        return $this->belongsToMany('App\Post');
    }
    public function user(){
    
        return $this->belongsToMany('App\User');
    }
     //後でViewで使う、いいねされているかを判定するメソッド。
     public function isMarkedBy($user): bool {
        return Mark::where('user_id', $user->id)->where('post_id', $this->id)->first() !==null;
    }
}
