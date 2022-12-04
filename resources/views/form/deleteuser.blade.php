@extends('layouts.layout')
@section('content')

<h3 class=" text-center  bg-warning">本当に削除しますか？</h3>
<div class="container border border-primary   rounded p-3 text-center">

    <div class="p-2 ">ユーザー名 :{{$user['name']}}</div>
    <div class="p-2 ">メールアドレス:{{$user['email']}}</div>
    <div class="p-2">
          <p>ユーザータイプ：
            @if($user['role']==0)
            <span class="">ユーザー</span>
            @else
            <span class="text-danger">管理者</span>
            @endif
          </p>
      </div>
    <div class="mt-3 mb-3">
        <a href="#" onclick="history.back(-1);return false;" class="btn btn-secondary ">戻る</a>
        <a href="{{route('deleteuser',['user'=>$user['id']])}}"><button class="btn btn-warning">削除する</button></a>
    </div>

</div>
@endsection