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
        
        $name=$user->get('name');
        $profile=$user->get('profile');
        $id=$user->get('id');
        var_dump($name);
        // echo$name;
        return view('display/profile',[
            'user'=>$user,
            'name'=>$name,
            'profile'=>$profile,
            'id'=>$id,

        ]);
    }
    // ユーザープロフィール(他）]
public function otherProfile(User $user){
// ・管理画面からを視点に編集

// ユーザー一覧以外からの遷移のためのパラメーター
// $user_id=$user->id;
// $post=new Post;
// $post_id=$post
// ->where('id',$user_id)
// ->get();

// 書き換えめんどいからそのまま変数に格納
$other_user=$user;

return view('display/otherusers',[
    'other_user'=>$other_user,
    // 'post_id'=>$post_id,
]);
}
    // ユーザープロフィール(自分)
    public function editProfileForm(User $user){
        
        return view('form/edit_profile',[
            'user'=>$user,
        ]);
    }


    public function editProfile(User $user,Request $request){

// 画像アップロード部分
if(!empty($request->file('image'))){

    // ディレクトリ名
    $dir = 'sample';
    // ファイル名をそのまま取得（getClientOriginalName）
    $file_name = $request->file('image')->getClientOriginalName();

    // sampleディレクトリに画像を保存(storeで指定するとディレクトリもnewされる)
    $request->file('image')->storeAs('public/' . $dir,$file_name);
    // ↓'store～$file_nameに既にrequestメソッド含まれているはずだからそのまま保存可能
    $user->image = 'storage/' . $dir . '/' . $file_name;
// 画像ここまで
}

    $user->name=$request->name;
    $user->profile =$request->profile;

        $user->save();
        return redirect('/');
    }
}
