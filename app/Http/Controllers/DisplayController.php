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
        $name=Auth::user()->name;
    
    

        return view('home',[
            'posts'=>$all,
            'name'=>$name,

        ]);

        }

        // 投稿詳細
     public function postDetail(Post $post){
    
        return view('display/postdetail',[
            'post'=>$post,
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
    return  view('diplay/hiroba',[]);
}
     

        


    }    