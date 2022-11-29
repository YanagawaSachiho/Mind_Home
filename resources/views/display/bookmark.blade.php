@extends('layouts.layout')
@section('content')




@foreach($users as $user)
<a href="{{route('post_detail',['post'=>$user->post_id])}}">
<ul class="group-form">
    
    <li>カテゴリー:@if($user->category_id==0)
          GOOD
          @elseif($user->category_id=1)
          Other
          @else
          Bad
        @endif
    <li>投稿日時</li>
    {{$user->created_at}}
    <li>投稿内容</li>
    {{$user->comment}}
  </ul>]
  </a>
  @endforeach
  



@endsection