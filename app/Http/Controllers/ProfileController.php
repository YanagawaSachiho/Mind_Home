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
    // ユーザープロフィール表示
    public function Profile(int $userId){

        $user=Auth::user()->where('id',$userId)->get();
        
        $name=$user->get('name');
        $profile=$user->get('profile');
        $id=$user->get('id');
        
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


// そのまま変数に格納
$other_user=$user;

return view('display/otherusers',[
    'other_user'=>$other_user,
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
