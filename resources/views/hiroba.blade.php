@extends('layouts.layout')
@section('content')
    <div class="container d-flex justify-content-around    mb-5" style = "height: 50px;">
      <h1>みんなの広場</h1>
    </div>

    <!-- 投稿一覧 -->
    <div class = 'container  p-2 '>
      @foreach($post as $post)
      
        <a href = "{{route('otherpost_detail',['post'=>$post['id']])}}" class = "p-1" style = "text-decoration: none">
          <div class = "p-1 border rounded-top border-info" >
            <div class = "d-inline">
              <div class = "p-2">
                カテゴリー:@if($post['category_id'] == 0)
                  GOOD
                @elseif($post['category_id']=1)
                  Other
                @else
                  Bad
                @endif
              </div>
              <span class = "p-2">投稿内容:
                <div class = "p-2 border text-dark">{{$post['comment']}}</div>
              </span>
              <div class = "p-1 d-flex justify-content-end">投稿日時:{{$post['created_at']}}</div> 
            </div>  
          </div>  
        </a>
      @endforeach
    </div>

    <!-- フッター部分 -->
  <footter class = "p-5 fixed-bottom">
      <div class = "conteiner  d-flex justify-content-between  bd-highlight mb-3 bg-secondary">
          <div class = "p-2 bd-highlight text-white">
            <a href = "{{route('profile.page',['user_id'=>$post['user_id']])}}" class = "text-white">自分のプロフィールへ</a>
          </div>
          <div class = "p-2 bd-highlight">
            <a href = "{{route('/')}}" class = "text-white">HOMEへ</a>
          </div>
          <div class = "p-2 bd-highlight">
            <a href = "{{route('allsearch_form')}}" class = "text-white">検索</a>
          </div>
          <div class = "p-2 bd-highlight">
            <a href = "{{route('bookmark.page')}}" class = "text-white">ブックマーク一覧へ</a>
          </div>
          <div class = "p-2 bd-highlight">
            <a href = "{{route('create_post.form')}}" class = "text-white">新規投稿</a>
          </div>
      </div>
    </footer>
@endsection