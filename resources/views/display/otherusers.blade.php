@extends('layouts.layout')
@section('content')

  @foreach($other_user as $other_user)
   <!-- 画像 -->
<img src="{{ asset($other_user ->image) }}" style="width:500px; height:500pix;" class="rounded-circle">

<p>ユーザー名：{{$other_user['name']}}</p>
<p>自己紹介：{{$other_user['profile']}}</p>

<a href="">
    <ul>
      <li>ユーザー名:</li>
      <li>カテゴリー:@if($other_user['category_id']==0)
        GOOD
        @elseif($other_user['category_id']=1)
        Other
        @else
        Bad
      @endif
      </li>
      <li>投稿日時:{{$other_user['created_at']}}</li>
      <li>投稿内容:{{$other_user['comment']}}</li>
    </ul>
    
</a>
@endforeach
@endsection