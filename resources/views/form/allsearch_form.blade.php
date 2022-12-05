@extends('layouts.layout')
@section('content')

<!-- 検索フォーム -->
<div class="container text-center ">
  <form method="get" action="{{route('allsearch')}} class="text-center ">
    @csrf
      <div class="d-flex flex-column bd-highlight ">
      <label for="search">検索ワード</label><input id="search"type="text"  name="search" class="m-3 p-2" value="">

      <div class="">
      <input type="submit" value="検索する" class="btn btn-info m=3"> 
    </div>

    <div>
      <a href="#" onclick="history.back(-1);return false;" class="btn btn-secondary m-3">戻る</a>     
    </div>
</div>

@endsection