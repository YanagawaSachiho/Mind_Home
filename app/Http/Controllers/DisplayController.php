<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mark;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use Carbon\CarbonPeriod;


class DisplayController extends Controller
{
   
    // 【投稿を表示】
    
        //①自分の全投稿を表示
    public function index(){

        
        // 投稿一覧
        // $post=new Post;
        // $all=$post->all()->toArray(); 
        $all=Auth::user()->post->toArray();
        
        $id=Auth::user()->id;
        $name=Auth::user()->name;
        $role=Auth::user()->role;
        var_dump($role);
        if($role===0){
            return view('home',[
                'posts'=>$all,
                'id'=>$id,
                'name'=>$name,
    
            ]);
        }else{  
      
            return redirect('/all_user');
            }

        }

        // 投稿詳細
     public function postDetail(Post $post){
    
        $name=Auth::user()->name;
        echo$name;
        return view('display/postdetail',[
            'post'=>$post,
            'name'=>$name,
        ]);
     }
     
     //  GOOD投稿一覧
    public function Good(){
        $all=Auth::user()->post->where('category_id',0)->toArray();
        $name=Auth::user()->name;

        return view('display/good',
        ['posts'=>$all,
        'name'=>$name,
        ]);
    }
    //  OTHER稿一覧
    public function Other(){
        $all=Auth::user()->post->where('category_id',1)->toArray();
        $name=Auth::user()->name;

        return view('display/good',
        ['posts'=>$all,
        'name'=>$name,
        ]);
    }
    //  BAD投稿一覧
    public function Bad(){
        $all=Auth::user()->post->where('category_id',2)->toArray();
        $name=Auth::user()->name;

        return view('display/good',
        ['posts'=>$all,
        'name'=>$name,
    ]);
    }

// 全ユーザーの投稿
public function Hiroba(){
    // インスタンス
    $post=new Post;
    $user=new User;
    // publicが1（公開）のみを取得
    $allpost=$post->where('public',1)->get();
    // ログインユーザーかその他か判断のためのid取得
    $user_id=$post->user_id;
    $id=$user->get();

    // foreach($user_id as $id) {
    //     $alluser=$user->where('id',$user_id)->get();
    // }

    // var_dump($alluser);


    // Quser_idと一致する名前を表示したい
    
    return view('display/hiroba',[
        'post'=>$allpost,
        // 'user'=>$alluser,
        // 'name'=>$name,
    ]);

    }
    
    // 全ユーザーの投稿詳細
    public function AllpostDetail(Post $post){
    
        
    $myid=Auth::user()->id;
    $user=new User;
    $user_id=$post->user_id;

    $name=$user->where('id',$user_id)->get();
    // $name=mb_convert_kana($name,"UTF-8");
    var_dump($name);
    

    // ログインユーザーとuser_idが一致したら編集可能画面へ
        if($user_id===$myid){
            return view('display/postdetail',[
                'post'=>$post,
                'name'=>$name,
            ]);
        }else{
            return view('display/otherpostdetail',[
                'post'=>$post,
                'name'=>$name,
            ]);
            
        }

    }

     

public function Profile(int $userId){
    $users=new User;
    $user= $users->where('id',$userId)->get();
    
    
    return view('display/profile',[
        'user'=>$user,
    ]);

    }
}    