@extends('layouts.layout')
@section('content')

<table class="table">
  <ul>
  @foreach($all_user as $all_user)
  <a href="">
 <li>ユーザー名 {{$all_user['name']}}</li>
 <li>メールアドレス{{$all_user['email']}}</li>
 <li>プロフィール{{$all_user['plofile']}}</li>
</a>
<a href="route('delete.user',['user'=>$all_user['id']]"> 
  <buttum class="btn-warning">削除</buttum>
</a>
  @endforeach
</ul>
</table>
@endsection