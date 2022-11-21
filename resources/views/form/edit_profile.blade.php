@extends('layouts.layout')
@section('content')
<form action="{{route('edit_profile',['user'=>$user['id']])}}" method="post">
  @csrf
アイコン編集（画像アップロード）
<input type="text" name='name' value="{{$user['name']}}">
<input type="text" name='profile' value="{{$user['profile']}}">
<a href="{{route('edit_profile',['user'=>$user['id']])}}"><button class="btn-edit">登録する</button></a>

</form>
@endsection