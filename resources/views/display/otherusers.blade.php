
@extends('layouts.layout')
@section('content')
<h1 class="text-center text-secondary">USer Profile</h1>

<div class="container border border-primary   rounded-3 p-3 text-center">
    <!-- プロフィール内容 -->
    <div class="m-auto"  >

        <div >
         
            <img src="{{ asset($other_user ->image) }}" style="width:100px; height:100px;" class="rounded-circle border border-4 mb-3">
      
        <div class="">
            <h2 class="text-center">
                ユーザー名：{{$other_user['name']}}   
            </h2>
        </div>
        </div>
        <div>
            <p>自己紹介</p>
            <span class="border">
                {{$other_user['profile']}}
            </span>
        </div>
    </div>
</div>
<!-- プロフィールここまで -->

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