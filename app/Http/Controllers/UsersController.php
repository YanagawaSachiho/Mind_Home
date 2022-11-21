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
    //ユーザー一覧（管理画面）
    public function allUser(){
        $user= new User;
        $all_user=$user->all();
        // var_dump($all_user);

        // 権限分け
        // ログイン時にroleが0の場合はユーザーホーム画面にリダイレクト
        $role=Auth::user()->role;
        echo$role;
        if($role===0){
            return redirect('/');
        }else{  
            return view('display/users',[
                'all_user'=>$all_user,
            ]);
            }

    }

    // public function
}

