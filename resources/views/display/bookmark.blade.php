@extends('layouts.layout')
@section('content')

<h1  class="text-center border  w-50 m-auto ">bookmark一覧</h1>

<div class='container   rounded  p-1'>
@foreach($users as $user)
<a href="{{route('post_detail',['post'=>$user->post_id])}}" class="p-1">
  <div class="p-1 border rounded-top border-info">
    <div class="p-2">カテゴリー:@if($user->category_id==0)
            GOOD
            @elseif($user->category_id=1)
            Other
            @else
            Bad
          @endif</div>
          <div>投稿内容:
            <div class="p-2 border text-dark">{{$user->comment}}</div>
          </div>
          <div class="p-1 d-flex justify-content-end" >投稿日時{{$user->created_at}}</div>
          <a href="{{route('bookmarkdelete.page',['post'=>$user->post_id])}}">削除</a>
    </div>
</a>
  @endforeach
  



@endsection