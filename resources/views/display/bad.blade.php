@extends('layouts.layout')
@section('content')

<h1  class="text-center border  w-50 m-auto ">BADs</h1>
<div class='container border  rounded m-1 p-2'>
    @foreach($posts as $post)
    <a href="{{route('post_detail',['post'=>$post['id']])}}" class="p-1">
      <div class="p-1 border rounded-top border-info">
        <div class="d-inline">
          <div class="p-2"><section>ユーザー名:{{$name}}</section></div>
          <div class="p-2">カテゴリー:
            BAD
          </div>
          <div class="p-2 border text-dark">投稿内容:{{$post['comment']}}</div>
          <div class="p-1 d-flex justify-content-end">投稿日時:{{$post['created_at']}}</div>
          </div>
      </div>
    </a>
@endforeach
  </div>
  <a href="{{route('create_post.form')}}">新規投稿</a>
@endsection
