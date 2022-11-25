@extends('layouts.layout')
@section('content')

<div>本当に削除しますか</div>
<table class="table">
<li>ユーザー名 {{$user['name']}}</li>
 <li>メールアドレス{{$user['email']}}</li>
 <li>プロフィール{{$user['plofile']}}</li>
</table>

<a href="{{route('delet.user',['user'=>$user['id']])}}"><button class="btn btn-warning">削除する</button></a>
@endsection