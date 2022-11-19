<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Mark;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UsersController extends Controller
{
    //
    public function allUser(){
        $user= new User;
        $all_user=$user->all();
        // var_dump($all_user);
        return view('display/users',[
            'all_user'=>$all_user,
        ]);
    }
}
