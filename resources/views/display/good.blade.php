@extends('layouts.layout')
@section('content')
<h1>GOODs</h1>
<div>
    <table class='table'>
    @foreach($posts as $post)
    <ul>
    <a href="{{route('post_detail',['post'=>$post['id']])}}">
      <li>ユーザー名:{{$name}}</li>
      <li>カテゴリー:
        GOOD
        
        
      </li>
      <li>投稿日時:{{$post['created_at']}}</li>
      <li>投稿内容:{{$post['comment']}}</li>
    </a>
    </ul>
@endforeach
  </div>
</table>
  <a href="{{route('create_post.form')}}">新規投稿</a>
  @endsection