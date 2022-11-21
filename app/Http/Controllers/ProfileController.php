<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Mark;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ProfileController extends Controller
{
    //

    
    // ユーザープロフィール表示
    public function Profile(int $userId){

        // $instance= new User;
        // $all=$instance->toArray();
        $user=Auth::user()->where('id',$userId)->get();
        // var_dump($user);
        // echo $userId;
        
        return view('display/profile',[
            'user'=>$user,

        ]);
    }
    // ユーザープロフィール編集
    public function editProfileForm(User $user){
        
        // var_dump($user);
        return view('form/edit_profile',[
            'user'=>$user,
            
        ]);
    }
    public function editProfile(User $user,Request $request){

 

  
    $user->name=$request->name;
    $user->profile =$request->profile;

        $user->save();
        return redirect('/');
    }
}
