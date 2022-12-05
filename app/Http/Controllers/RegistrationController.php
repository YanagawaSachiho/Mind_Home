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
    
        $open='公開';
        $close='非公開';
        return view('form/create_post',
        ['post'=>$post['id'],
    ]);

    }
    // 新規投稿（SAVE）
    public function Createpost(Request $request){
        
        $post= new Post;
        $comment=$request->comment;
        $post->category_id = $request->category_id;
        $post->public = $request->public;
        $post->comment = $request->comment;
        
        if(empty($comment)){
            return redirect('/create_post');
            
        }
        
        Auth::user()->post()->save($post);
        return redirect('/');

        
    }

    //投稿編集
    public function postEditForm(Post $post){

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
    // ・削除確認
    public function postDeleteForm(Post $post){
        
        return view('form/delet',[
            'post'=>$post
        ]);

    }
    // ・削除実行＆リダイレクト
    public function postDelete(Post $post,Request $request){

        $post ->delete();
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

            return view('form/search',[
                'post'=>$post,  
                'name'=>$name,
            ]);
        }else{
            return redirect('search_form');
        }
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

            return view('form/allsearch',[
                'post'=>$post,  
            ]);
        }else{
            return redirect('allsearch_form');

        }
    }

}
