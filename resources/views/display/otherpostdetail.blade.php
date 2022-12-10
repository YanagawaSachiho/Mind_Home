@extends('layouts.layout')
  @section('content')
    <!-- 自分の投稿詳細 -->
    <div class="container border border-primary   rounded-3 p-3 text-center">
        <a href="{{route('other_profile.page',['user'=>$user_id])}}">ユーザー名{{$name}} </a>
        <div>カテゴリー:@if($post['category_id']==0)
              GOOD
            @elseif($post['category_id']=1)
              Other
            @else
              Bad
            @endif
        </div>
        <div>投稿日時</div>
         {{$post['created_at']}}
        <div>投稿内容</div>
        {{$post['comment']}}
        <!-- もしレコードにbookmarkがあったら（trueはないとき）の記述 -->
        @if(!$record==true)
          <h5 class="mt-3" >
            <p class="mark-toggle"   data-postid="{{$post->id}}"  class="border danger"  style="font-size:30px;  color:red;">♥</p>
          </h5>
        @else
          <div class="justify-content-end">
            <h5 class="mt-3" >
              <a class="mark-toggle"   href="" data-postid="{{$post->id}}"  class="border "  style="font-size:30px;">♥</a>
            </h5>
          </div>
        @endif
    </div>
    <!-- フッター部分 -->
    <footter class="p-5">
        <div class="conteiner    bd-highlight mb-3 bg-secondary">
          <div class="p-2 bd-highlight  margin-auto text-center">
            <a href="{{route('/')}}" class="text-white">HOMEへ</a>
          </div>
        </div>  
    </footer>
@endsection