@extends('layouts.layout')
@section('content')

<!-- 検索フォーム -->
<form method="get" action="{{route('search')}}">
  @csrf
  <input type="text"  name="search" >
  <input type="submit" value="検索する">
aaa
@endsection