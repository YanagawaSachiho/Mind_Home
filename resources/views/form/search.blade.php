@extends('layouts.layout')
@section('content')

<!-- 検索フォーム -->
<h1 class="text-center border p-1 w-50 m-auto ">検索結果</h1>
<div class="text-center">

  @foreach($post as $post)
  <div  class="class='container   rounded m-2 p-2' ">
    <a href="{{route('post_detail',['post'=>$post['id']])}}" class="p-1">
      <div class="p-1 m-1 border rounded-top border-info">
          <div class="d-inline">
              <div class="p-1">ユーザー名{{$name}} </div> 
                
              <div class="p-1">カテゴリー:@if($post['category_id']==0)
                    GOOD
                    @elseif($post['category_id']=1)
                    Other
                    @else
                    Bad
                    @endif</div>
              <span>投稿内容</span>
              <div class="p-1 border text-dark">{{$post['comment']}}</div>
                <div class="p-1 d-flex justify-content-end">投稿日時{{$post['created_at']}}</div>
            </div>
          
        </div>
      </a>
  </div>
    @endforeach
    <a href="#" onclick="history.back(-1);return false;" class="btn btn-secondary m-2 ">戻る</a>
  </div>

@endsection