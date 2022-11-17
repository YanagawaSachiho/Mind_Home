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

    //
    
    // 【投稿を表示】
    
        //①自分の全投稿を表示
    public function index(){
        
        // 投稿一覧
        // $post=new Post;
        // $all=$post->all()->toArray(); 
        $all=Auth::user()->post->toArray();
        return view('home',[
            'posts'=>$all,

        ]);

        }

        // 投稿詳細
     public function postDetail(Post $post){


        //  $detail=Auth::user()->post->where('id',$post['id'])->get();
        //  echo $post;
        // $post= new Post;
        // $user= new User;

        // $name=$user->select('name')->get()->toArray();
        // $postdetail=$post->where('id',$postId)->get()->toArray();
        // $category_id=$post->where('id',$postId)->select('category_id')->get();

        // var_dump($category_id);
        // .'<br>';
        // var_dump($name);

    
        return view('display/postdetail',[
            'post'=>$post,
            // 'posts'=>$postdetail,
            // 'name'=>$name,
        ]);
     }

    //  GOOD投稿一覧
    public function Good(int $postId){
        $post= new Post;
        $good=$post->where('category',0)->get()->toArray();
        return view('display/good',
        ['good'=>$good
        ]);
    }
    //  OTHER稿一覧
    public function Other(){
        $post= new Post;
        $other=$post->where('category',1)->get()->toArray();
        return view('display/good',
        ['other'=>$other
        ]);
    }
    //  BAD投稿一覧
    public function Bad(){
        $post= new Post;
        $bad=$post->where('category',2)->get()->toArray();
       
        return view('display/bad',
        ['bad'=>$bad]);
    }

// 全ユーザーの投稿
public function Hiroba(){
    return  view('diplay/hiroba',[]);
}
     

        


    }    