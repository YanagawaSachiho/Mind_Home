@extends('layouts.layout')
  @section('content') 
  <div class=" m-auto text-center row">
    <form action="{{route('edit_profile',['user'=>$user['id']])}}" method="post" enctype="multipart/form-data" class="m-auto">
      @csrf 
        <!-- アイコン編集（画像アップロード） -->
        <div class="mb-3 ">
          <label for="image" class="form-label mb-3">プロフィール画像</label>
          <br>
          <img src="{{ asset($user->image) }}" style="width:100px; height:100px;" class="rounded-circle border border-4 mb-3">
          <div>
            <input type="file"  id="image"  name="image" value="{{$user['image']}}">
          </div>
        </div>
        <div class="mb-3">
          <label for="name" class="form-label">ユーザー名</label>
          <input id="name"type="text" name="name" value="{{$user['name']}}" class="form-control mb-3">
        </div>
        <textarea name="profile" class="form-control mb-3" >
          @if(!empty($user['profile'] ))
           {{$user['profile']}}
          @endif
        </textarea>
        <a href="#" onclick="history.back(-1);return false;" class="btn btn-secondary">戻る</a>
        <a href="{{route('edit_profile',['user'=>$user['id']])}}"><button class="btn-edit">登録する</button></a>
    </form>
  </div>
<!-- フッター -->
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