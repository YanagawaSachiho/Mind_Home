@extends('layouts.layout')
@section('content')
<form action="{{route('create_post.form')}}" method="post">
@csrf
<label>カテゴリー</label>
<select name="category_id">
  <option value=0>GOOD</option>
  <option value=1>OTHER</option>
  <option value=2>BAD</option>
</select>

<label >公開or非公開</label>
<select name="public">
  <option value=1>公開</option>
  <option value=0>非公開</option>
</select>

<p>投稿内容</p>
<textarea name="comment">
</textarea>
<button class="btn-primary">投稿する</button>

</form>
@endsection