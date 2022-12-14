<!--
    デビューまでにやりたいこと 
・レイアウトの進化
・画像を各刀工に表示させるとか
・検索機能の進化
・無限数クロールの挑戦 -->


@extends('layouts.layout')
@section('content')

    <!-- カテゴリー -->
    <div class="container d-flex justify-content-around    mb-5" style="height: 50px;">
        <a href="{{route('good.page')}}" class="text-white" >
            <div class='container  bg-secondary rounded-pill p-3'>[GOOD]</div>
        </a>
        <a href="{{route('other.page')}}" class="text-white" >
            <div class='container bg-secondary rounded-pill p-3'>[OTHER]</div>
        </a>
        <a href="{{route('bad.page')}}" class="text-white" >
            <div class='container bg-secondary rounded-pill p-3'>[BAD]</div>
        </a>
    </div>

<!-- 自分の投稿一覧 -->
  <div class='container  p-2 '>
    @foreach($posts as $post)
        <a href="{{route('post_detail',['post'=>$post['id']])}}" class="p-1" style="text-decoration: none">
            <div class="p-1 border rounded-top border-info">
                <div class="d-inline">
                    <div class="p-2"><section>ユーザー名:{{$name}}</section>
                    </div>
                    <div class="p-2">カテゴリー:@if($post['category_id']==0)
                        GOOD
                        @elseif($post['category_id']==1)
                        Other
                        @elseif($post['category_id']==2)
                        Bad
                    @endif
                    </div>
                    <span class="p2">投稿内容:
                        <div class="p-2 border text-dark">{{$post['comment']}}</div>
                    </span>
                    <div class="p-1 d-flex justify-content-end">投稿日時:{{$post['created_at']}}</div>
                </div>
            </div>
        </a>
    @endforeach
  </div>

  <!-- フッター部分 -->
    <footter class="p-5 fixed-bottom">
        <div class="conteiner  d-flex justify-content-between  bd-highlight mb-3 bg-secondary">
            <div class="p-2 bd-highlight text-white">
                <a href="{{route('profile.page',['user_id'=>$post['user_id']])}}" class="text-white">自分のプロフィールへ</a>
            </div>
            <div class="p-2 bd-highlight">
                <a href="{{route('hiroba.page')}}" class="text-white">広場へ</a>
            </div>
            <div class="p-2 bd-highlight">
                <a href="{{route('search_form')}}" class="text-white">検索</a>
            </div>
            <div class="p-2 bd-highlight">
                <a href="{{route('bookmark.page')}}" class="text-white">ブックマーク一覧へ</a>
            </div>
            <div class="p-2 bd-highlight">
                <a href="{{route('create_post.form')}}" class="text-white">新規投稿</a>
            </div>
        </div>
    </footer>
@endsection