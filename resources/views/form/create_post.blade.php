@extends('layouts.layout')
  @section('content')
    <h1 class=" m-2 text-center">新規投稿</h2>
    <div class=" border text-center " >
      @if($errors->any())
        <span class="invalid-feedback" role="alert">
      @foreach($error as $error)
        <strong>{{ $message }}</strong>
      @endforeach
        </span>
      @endif
      <form action="{{route('create_post.form')}}" method="post"  class="m-5">
        @csrf
          <div class="mb-3 ">
            <label for="category" class="form-label">カテゴリー</label>
            <select id="category" name="category_id">
              <option value=0>GOOD</option>
              <option value=1>OTHER</option>
              <option value=2>BAD</option>
            </select>  
          </div>
          <div class="mb-3 ">
            <label for="public" class="form-label" >公開or非公開</label>
            <select id="public"  name="public">
              <option value=1>公開</option>
              <option value=0>非公開</option>
            </select>
          </div>
          <div class="mb-3 ">
            <label for="comment" class="form-label border p-1 border-round border-info">投稿内容</label>
            <textarea id="comment" name="comment" class="form-control mb-3"></textarea>
            <button class="btn-primary">投稿する</button>
          </div>
      </form>
    </div>
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