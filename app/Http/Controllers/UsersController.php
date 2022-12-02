<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Mark;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;

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

    //投稿削除
// ・削除確認（後でモーダル）
    public function userDeleteForm(User $user){

        // dd($user);

        
        return view('form/deleteuser',[
            'user'=>$user,
        ]);

    }
    // ・削除実行＆リダイレクト
    public function userDelete(user $user){
        
        $user ->delete();
        // $record ->delete();
        return redirect('/');
        
    }
    public function userRole(user $user,Request  $request){
        // formで送信したユーザー権限をusersテーブルのroleにeditする
        $user->role = $request->role;
        $user->save();
        return redirect('/');
    }




    // ブックマーク一覧

    public function bookmark(){
       $user_id=Auth::user()->id;
        $users = DB::table('marks')
        ->join('users', 'users.id', '=', 'marks.user_id')
        ->join('posts', 'posts.id', '=', 'marks.post_id')
        ->select('users.*', 'marks.*', 'posts.*')
        // 自分がbookmarkしたもの↓
        ->where('marks.user_id','=',$user_id)
        ->get();

        return view('display/bookmark',[
        'users'=>$users,
       
        ]);
    }
    // ブックマーク登録  ajax処理はここに書く
    public function ajaxMark(Request $request){
    $user_id=Auth::user()->id;
    $mark=new Mark;

// viewでpost_idがnameになっているから
$post_id=$request->post_id;
    // 自分がブックマークした物の中から該当を絞り込む
    $marked=$mark
    ->where('user_id',$user_id)
    ->where('post_id',$post_id)
    ->first();
    // もしまだbookmarkされていなかったらレコードを追加
    if(empty($marked)){
        // レコードの有無判断
        $record=true;
        // ボタンを押したらMarkテーブルにユーザーIDとPostIDが登録される
        $mark->user_id = $user_id;
        $mark->post_id = $post_id;
        $mark->save();       
    }else{
        // もしすでにbookmarkがあるなら
     $record=false;
    $marked->delete();
}
$json=[
    'marked'=>$marked,
    'record'=>$record,
];
// return redirect('/');
        //下記の記述でajaxに引数の値を返す
        return response()->json($json);
    }


//ブックマーク一覧からの削除
public function bookmarkDelete(Post $post){
    $user_id=Auth::user()->id;
    $mark=new Mark;

    // 該当のpost_id投稿のあるレコードをmarkから削除
    foreach($post as $id){
        $post_id=$post['id'];
    }

    // 自分がブックマークした物の中から該当を絞り込む
    $marked=$mark
    ->where('user_id',$user_id)
    ->where('post_id',$post_id)
    ->first();
    $marked->delete();
    return redirect('/');

}



    public function Passwordreset(){
        // 自作
   
        return view('auth/password');
   }
}
