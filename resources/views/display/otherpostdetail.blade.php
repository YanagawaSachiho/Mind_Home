@extends('layouts.layout')
@section('content')

<div>
  <p></p>
  <ul>
    @foreach($name as $name)
    <li>ユーザー名{{$name['name']}}</li> 
    @endforeach

  <li>カテゴリー:@if($post['category_id']==0)
        GOOD
        @elseif($post['category_id']=1)
        Other
        @else
        Bad
      @endif
  <li>投稿日時</li>
  {{$post['created_at']}}
  <li>投稿内容</li>
  {{$post['comment']}}
  </ul>
  <a href="{{route('bookmarkadd.page',['post'=>$post['id']])}}"><button >♡</button></a>

  
</div>
@endsection