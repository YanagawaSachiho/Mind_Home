@extends('layouts.layout')
@section('content')

<h1 class="text-white bg-info text-center p-3 fst-italic">User 一覧</h1>
<div class='container border  rounded p-2 '>
  @foreach($all_user as $all_user)
  
  <div class="p-1 m-2 text-center border rounded-top border-info">
    <div class="d-inline">
      <a href="{{route('other_profile.page',['user'=>$all_user['id']])}}" class="p-1">
        <div class="p-2">
          <section>ユーザー名 {{$all_user['name']}}</section>
        </div>
      </a>
      <div class="p-2">メールアドレス{{$all_user['email']}}</div>
      <div class="p-2">
          <p>ユーザータイプ：
            @if($all_user['role']==0)
            ユーザー
            @else
            管理者
            @endif
          </p>
      </div>
      <form action="{{route('role',['user'=>$all_user['id']])}}" method="post">
      @csrf
      <label for="role">権限付与</label>
      <select id="role" name="role">
        <option value=0>ユーザー</option>
        <option value=1>管理者</option>
      </select>
      <button type="submit">変更する</button>
      </form>
      <a href="{{route('deleteuser.form',['user'=>$all_user['id']])}}"> 
        <button type="submit" class="p-2 btn-warning">削除</button>
      </a>

    </div>
  </div>
 @endforeach
</div>

@endsection