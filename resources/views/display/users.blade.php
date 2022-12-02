@extends('layouts.layout')
@section('content')

<table class="table">
  <ul>
  @foreach($all_user as $all_user)

 <a href="{{route('other_profile.page',['post'=>$all_user['id']])}}"><li>ユーザー名 {{$all_user['name']}}</li></a>
 <li>メールアドレス{{$all_user['email']}}</li>
 <li>プロフィール{{$all_user['plofile']}}</li>
</a>
<form action="{{route('role',['user'=>$all_user['id']])}}" method="post">
@csrf
  <label>権限付与</label>
<select name="role">
  <option value=0>ユーザー</option>
  <option value=1>管理者</option>
</select>
<button type="submit">変更する</button>
</form>

<a href="{{route('deleteuser.form',['user'=>$all_user['id']])}}"> 
  <button type="submit" class="btn-warning">削除</button>
</a>
  @endforeach
</ul>
</table>
@endsection