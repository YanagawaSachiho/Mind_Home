@extends('layouts.layout')
@section('content')

@foreach($post as $post)

<div class="border">
  <a href="{{route('allpost_detail',['post'=>$post['id']])}}">
    
    <li>カテゴリー:@if($post['category_id']==0)
      GOOD
      @elseif($post['category_id']=1)
      Other
      @else
      Bad
      @endif
      <li>投稿日時:{{$post['created_at']}}</li>
      
      <li class="col-">投稿内容: {{$post['comment']}}
</li>
   </a>
  <div>
@endforeach
@endsection