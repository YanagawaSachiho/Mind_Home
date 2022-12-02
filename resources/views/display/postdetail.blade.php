@extends('layouts.layout')
@section('content')

<div class="container border border-primary   rounded-3 p-3 text-center">
    <a href="{{route('other_profile.page',['post'=>$post['id']])}}"><div>ユーザー名{{$name}}</div> </a>
    

    <div>カテゴリー:@if($post['category_id']==0)
        GOOD
        @elseif($post['category_id']=1)
        Other
        @else
        Bad
        @endif
    </div>
    <div>投稿日時</div>
  {{$post['created_at']}}
    <div>投稿内容</div>
  {{$post['comment']}}


  <!-- もしレコードにbookmarkがあったら（trueはないとき）の記述 -->
@if(!$record==true)
  <h5 class="mt-3" >
    <p class="mark-toggle"   data-postid="{{$post->id}}"  class="border danger"  style="font-size:30px;  color:red;">♥</p>
</h5>
@else
<h5 class="mt-3" >
  <a class="mark-toggle"   href="" data-postid="{{$post->id}}"  class="border "  style="font-size:30px;">♥</a>
</h5>

@endif

  
<div class="mt-3 mb-3">
  <a href="{{route('postedit.form',['post'=>$post['id']])}}"><button type="submit" class="btn-success">編集する</button></a>

  <a href="{{route('delet_check',['post'=>$post['id']])}}"><button type="submit" class="btn-danger">削除する</button></a>
</div>


</div>

 <!-- フッター部分 -->
 @section('footter')

    <div class="conteiner  d-flex justify-content-between  bd-highlight mb-3 bg-secondary">
        <div class="p-2 bd-highlight text-white">
        <a href="{{route('profile.page',['user_id'=>$post['user_id']])}}" class="text-white">自分のプロフィールへ</a>
        </div>
        <div class="p-2 bd-highlight">
        <a href="{{route('hiroba.page')}}" class="text-white">広場へ</a>
        <a href="{{route('home')}}" class="text-white">HOME</a>
        </div>
        <div class="p-2 bd-highlight">
        <a href="{{route('search_form')}}" class="text-white">検索</a>
        </div>
        <div class="p-2 bd-highlight">
        <a href="{{route('bookmark.page')}}" class="text-white">ブックマーク一覧へ</a>
        </div>
        <div class="p-2 bd-highlight">
        <a href="{{route('create_post.form')}}" class="text-white">新規投稿</a>
        </div>
    </div>
    @endsection


@endsection
