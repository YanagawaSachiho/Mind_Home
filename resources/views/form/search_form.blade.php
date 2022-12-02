@extends('layouts.layout')
@section('content')

<!-- 検索フォーム -->
<div class="container text-center ">
  <form method="get" action="{{route('search')}}">
    @csrf

    <div class="d-flex flex-column bd-highlight mb-">
      <input type="text"  name="search" class="m-1">
   
    
      <input type="submit" value="検索する" class="w-5 m=1"> 
  
      <a href="{{route('/')}}" class="d-block m-1">戻る</a>     
</div>
</div>
@endsection