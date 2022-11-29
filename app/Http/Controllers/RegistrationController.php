<?php

namespace App\Http\Controllers;
use App\User;
use App\Mark;
use App\Post;
use DB;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
 //新規投稿
 public function CreatepostForm(Request $request){
    $post= new Post;
    $all=Auth::user()->post()->get();
    // echo$all;
  
    $open='公開';
    $close='非公開';
    return view('form/create_post',
    ['post'=>$post['id'],
]);

 }
// 新規投稿（SAVE）
public function Createpost(Request $request){
    
    $post= new Post;
    // $colums=['category','public','comment'];

    $post->category_id = $request->category_id;
    $post->public = $request->public;
    $post->comment = $request->comment;
    
    // foreach($colums as $culm){

    //     $post->colum=$request->colum;
    // }
    Auth::user()->post()->save($post);
    return redirect('/');

    
}

//投稿編集
// ・既値の抽出
// public function postEditForm(int $postId){
public function postEditForm(Post $post){
    
    //    var_dump($post);
//    $postedit=Post::where('id',$post)->get();
//    var_dump($postedit);

    return view('form/edit_post_form',[
        'post'=>$post,
    ]);
}
// ・編集内容SAVE
public function postEdit(Post $post,Request $request){

   

    $post->category_id = $request->category_id;
    $post->public = $request->public;
    $post->comment = $request->comment;
    $post->save();
    return redirect('/');
    
}
//投稿削除
// ・削除確認（後でモーダル）
public function postDeleteForm(Post $post){

    
    return view('form/delet',[
        'post'=>$post
    ]);

}
// ・削除実行＆リダイレクト
public function postDelete(Post $post,Request $request){

    $post ->delete();
    // $record ->delete();
    return redirect('/');

}

// 検索フォーム
 //・HOME検索フォーム
    public function MySearchForm(){
        $user=Auth::user()->get();
        return view('form/search_form',[
            'user'=>$user,
        ]);
    }
 //・Hiroba検索フォーム
    public function AllSearchForm(){
        $user=Auth::user()->get();
        return view('form/allsearch_form',[
            'user'=>$user,
        ]);
    }
// 検索結果表示（Home）
public function Search(Request $request){
  
    $user=Auth::user()->id;
    $name=Auth::user()->name;
    $search=$request->search;
    $post_inst=new Post;

    // post全体からキーワードを含む投稿を表示

    if(!empty($search)){
        $post=$post_inst
        ->where('comment','LIKE',"%{$search}%")
        //自分の投稿に限定する
        ->where('user_id',$user)
        ->get();
    }

//  if(!empty($search)){
//     $post=DB::table('users')
//     ->join('users','users.id','=','posts','posts.user_id')
//     ->where('comment','LIKE',"%{$search}%")
//         //自分の投稿に限定する
//         ->where('user_id',$user)
//         ->get();
//  }
 echo$post;
return view('form/search',[
    'post'=>$post,  
    'name'=>$name,
]);

}
// 検索結果表示（Hiroba）
public function AllSearch(Request $request){
  
    $users=new User;
    // $user=$users->get();
    $search=$request->search;
    $post_inst=new Post;
// 渡すところまではOK
    // post全体からキーワードを含む投稿を表示

    if(!empty($search)){
        $post=$post_inst
        ->where('comment','LIKE',"%{$search}%")
        ->get();
       };

return view('form/allsearch',[
    'post'=>$post,  
    // 'users'=>$user,
]);

}
//
}
