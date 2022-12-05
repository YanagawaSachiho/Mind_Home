@extends('layouts.layout')
@section('content')

<div class="m-auto p-3 text-center border">
  <form action="{{route('postedit.form',['post'=>$post['id']])}}" method="post" class="m-auto">
    @csrf
    <div class="mb-3 ">
      <label for="category_id" class="form-label mb-3">カテゴリー</label> 
      <select id="category_id" name="category_id">
        <option value=0>GOOD</option>
        <option value=1>OTHER</option>
        <option value=2>BAD</option>
      </select>
    </div>

      <div class="mb-3 ">
        <label for="public" class="form-label mb-3">公開・非公開</lavel>
        <select id="public" name="public">
          <option value=1>公開</option>
          <option value=0>非公開</option>
        </select>
      </div>
      <div class="mb-3 p-1 ">
        <label for="comment">投稿内容</label>
        <textarea id="comment" name="comment" class="form-control mb-3" >{{$post['comment']}}</textarea>
      </div>
      <div>
        <a href="#" onclick="history.back(-1);return false;" class="btn btn-secondary ">戻る</a>
  </form>
  <button type="submit"  class="btn btn-info">登録する</button>
</div>
</form>


@endsection