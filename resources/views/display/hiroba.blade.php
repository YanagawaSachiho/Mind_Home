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
      @endforeach
   <div class="conatiner" class="d-flex">
    <div>
     <a href="{{route('profile.page',['user_id'=>$post['user_id']])}}">自分のプロフィールへ</a>
    </div>
    <div>
      <a href="{{route('hiroba.page')}}">広場へ</a>
    </div>
    <div>
      <a href="{{route('allsearch_form')}}">検索</a>
    </div>
    
    <div>
      <a href="{{route('bookmark.page')}}">ブックマーク一覧へ</a>
    </div>
    <div>
      <a href="{{route('create_post.form')}}">新規投稿</a>
  </div>
@endsection