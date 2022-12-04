@extends('layouts.layout')
@section('content')

<div class="container border border-primary   rounded-3 p-3 m-auto text-center ">
  <div class="m-auto">
    <!-- 普通に取り出せない問題 -->
    @foreach($user as $user)
    <div>
      <!-- 画像 -->
      <div>
          <img src="{{ asset($user->image) }}" style="width:100px; height:100px;" class="rounded-circle border border-4 mb-3">
          <div class="">
            <h2 class="text-center">ユーザー名：{{$user['name']}}</h2>
          </div>
      </div>
      
    
      <div class="m-3">
        <p class="font-weight-bold">自己紹介</p>
        <div class="border mb=3 p-3">
        {{$user['profile']}}
        </div>
      </div>
  
      <a href="{{route('edit_profile',['user'=>$user['id']])}}">
        <button type="submit" class="btn-success ">編集する</button>
      </a>
    </div>
  </div>
    @endforeach
  </div>

  <footter class="p-5">
    <div class="conteiner  d-flex justify-content-between  bd-highlight mb-3 bg-secondary">

    <div class="p-2 bd-highlight">
        <a href="{{route('hiroba.page')}}" class="text-white">広場へ</a>
    </div>
    <div class="p-2 bd-highlight">
      <a href="{{route('/')}}" class="text-white">HOMEへ</a>
     </div>
    </div>  
  </footer>
@endsection