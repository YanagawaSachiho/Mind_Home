@extends('layouts.layout')
@section('content')
<image>






<div class="container">
  <!-- 普通に取り出せない問題 -->
  @foreach($user as $user)
  <!-- 画像 -->
<img src="{{ asset($user->image) }}" style="width:500px; height:500pix;">


  <p>ユーザー名：{{$user['name']}}</p>
  <p>自己紹介：{{$user['profile']}}</p>
  <a href="{{route('edit_profile',['user'=>$user['id']])}}">
    <button type="submit">編集する</button>
  </a>
</div>
  @endforeach

@endsection