@extends('layouts.layout')
    @section('content')
        <h3 class=" text-center  bg-warning">本当に削除しますか？</h3>
        <div class="container border border-primary   rounded p-3 text-center">
            <div class="p-2 ">カテゴリー:@if($post['category_id'] == 0)
                GOOD
                @elseif($post['category_id']=1)
                    Other
                @else
                    Bad
                @endif
            </div>
            <div class="p-2 ">投稿内容:{{$post['comment']}}</div>
            <div class="p-2">投稿日時：{{$post['created_at']}}</div>
            <div class="mt-3 mb-3">
                <a href="#" onclick="history.back(-1);return false;" class="btn btn-secondary ">戻る</a>
                <a href="{{route('postdelet',['post' => $post['id']])}}"><button class="btn btn-warning">削除する</button></a>
            </div>
        </div>
@endsection