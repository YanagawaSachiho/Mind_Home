@extends('layouts.layout')
@section('content')

<div>本当に削除しますか</div>
<table class="table">
<li>カテゴリー:@if($post['category_id']==0)
        GOOD
        @elseif($post['category_id']=1)
        Other
        @else
        Bad
      @endif
  <li>投稿日時</li>
  {{$post['created_at']}}
  <li>投稿内容</li>
  {{$post['comment']}}
  </ul>
</table>

<a href="{{route('post_detail',['post'=>$post['id']])}}"><button class="btn btn-primary">戻る</button></a>
<a href="{{route('postdelet',['post'=>$post['id']])}}"><button class="btn btn-warning">削除する</button></a>
@endsection