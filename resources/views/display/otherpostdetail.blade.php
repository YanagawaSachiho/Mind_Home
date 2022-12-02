@extends('layouts.layout')
@section('content')

<div>
  <p></p>
  <ul>
    @foreach($name as $name)
    <a href="{{route('other_profile.page',['post'=>$post['id']])}}"><div>ユーザー名:{{$name['name']}}</div></a> 
    
    @endforeach

    <div>カテゴリー:@if($post['category_id']==0)
        GOOD
        @elseif($post['category_id']=1)
        Other
        @else
        Bad
        @endif</div>
        <div>投稿日時</div>
  {{$post['created_at']}}
    <div>投稿内容</div>
  {{$post['comment']}}
  
  <!-- もしレコードにbookmarkがあったらの記述 -->
  <a class="mark-toggle"   href="" data-postid="{{$post->id}}">★</a>

  </div>
@endsection