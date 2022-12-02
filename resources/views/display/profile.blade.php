@extends('layouts.layout')
@section('content')
<image>






<div class="container border border-primary   rounded-3 p-3 text-center">
  <!-- 普通に取り出せない問題 -->
  @foreach($user as $user)
  <div class="m-auto"  >
    <div class="d-flex  w-75 " style="height:100px;">
        <!-- 画像 -->
        <img src="{{ asset($user->image) }}" style="max-width:150px; max-height:200px;" class="w-50  h-100 rounded-circle border border-4">
      <div class="">
        <h2 class="text-center">ユーザー名：{{$user['name']}}</h2>
      </div>
    </div>
  
    <p>自己紹介</p>
    <span class="border">
    {{$user['profile']}}
    </span>
    <a href="{{route('edit_profile',['user'=>$user['id']])}}">
      <button type="submit" class="btn-success ">編集する</button>
    </a>
  </div>
</div>
  @endforeach

@endsection