@extends('layouts.layout')
  @section('content')
    <div class="container d-flex justify-content-around    mb-5" style="height: 50px;">
        <a href="{{route('good.page')}}" class="text-white" >
            <div class='container  bg-secondary rounded-pill p-3'>[GOOD]</div>
        </a>
        <h1  class="text-white"><div class='container bg-secondary rounded-pill p-3'>OTHER</div></h1>
        <a href="{{route('bad.page')}}" class="text-white" >
            <div class='container bg-secondary rounded-pill p-3'>[BAD]</div>
        </a>
    </div>
    <div class='container border  rounded  p-2'>
        @foreach($posts as $post)
          <a href="{{route('post_detail',['post'=>$post['id']])}}" class="p-1">
            <div class="p-1 border rounded-top border-info">
              <div class="d-inline">
                <div class="p-2"><section>ユーザー名:{{$name}}</section></div>
                <div class="p-2">カテゴリー:
                  BAD
                </div>
                <span class="p-2 ">投稿内容:<div class="border m-1 p-3 text-dark">{{$post['comment']}}</div></span>
                <div class="p-1 d-flex justify-content-end">投稿日時:{{$post['created_at']}}</div>
              </div>
            </div>
          </a>
        @endforeach
      </div>
    <!-- フッター部分 -->
    <footter class="p-5">
        <div class="conteiner  d-flex justify-content-between  bd-highlight mb-3 bg-secondary">
            <div class="p-2 bd-highlight">
              <a href="{{route('/')}}" class="text-white">Homeへ</a>
            </div>
            <div class="p-2 bd-highlight">
              <a href="{{route('create_post.form')}}" class="text-white">新規投稿</a>
            </div>
        </div>
    </footer>
@endsection
