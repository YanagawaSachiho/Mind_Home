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
// Qbookmarkしたpostの投稿者名を取得したい・・・・

     
        return view('display/bookmark',[
        'users'=>$users,
       
        ]);
    }
    // ブックマーク登録
    public function bookmarkAdd(Post $post){
        
    $mark=new Mark;
    $user_id=Auth::user()->id;
    
    foreach($post as $id){
        $post_id=$post['id'];
    }

    $marked=$mark
    ->where('user_id',$user_id)
    ->where('post_id',$post_id)
    ->first();

    if(empty($marked)){
        echo'markで決ます';
      // ボタンを押したらMarkテーブルにユーザーIDとPostIDが登録される
    $mark->user_id = $user_id;
    $mark->post_id = $post_id;
    $mark->save();

    }else{
        
    $marked->delete();

        echo'もうできません';
        var_dump($marked);
        // dd($marked);
        
        

}

return redirect('/');

    }
}
