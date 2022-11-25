@extends('layouts.layout')
@section('content')


<div class='container'>
<a href="{{route('good.page')}}">[GOOD]</a>
    <a href="{{route('other.page')}}">[OTHER]</a>
    <a href="{{route('bad.page')}}">[BAD]</a>
</div>
  <div class='container'>
    <table class='table'>
    @foreach($posts as $post)
    <div  class='border'>
    <a href="{{route('post_detail',['post'=>$post['id']])}}">
      <div>
        <ul>
          <li>ユーザー名:{{$name}}</li>
          <li>カテゴリー:@if($post['category_id']==0)
            GOOD
            @elseif($post['category_id']=1)
            Other
            @else
            Bad
          @endif
          </li>
          <li>投稿日時:{{$post['created_at']}}</li>
          <li>投稿内容:{{$post['comment']}}</li>

        </ul>
      </div>
   
    </a>
    </div>
@endforeach
  </div>
</table>
  <a href="{{route('create_post.form')}}">新規投稿</a>
  
  
  
  <!-- フッター部分 -->
  <div class="conatiner" class="d-flex">
    <div>
     <a href="{{route('profile.page',['user_id'=>$post['user_id']])}}">自分のプロフィールへ</a>
    </div>
    <div>
      <a href="{{route('hiroba.page')}}">広場へ</a>
    </div>
    <div>
      <a href="">検索</a>
    </div>
    <div>
      <a href="{{route('bookmark.page')}}">ブックマーク一覧へ</a>
    </div>
    <div>
      <a href="{{route('create_post.form')}}">新規投稿</a>
  </div>
</div>

  @endsection