
<image>
<p>ユーザー名：{{}}</p>
<p>自己紹介：{{}}</p>

@foreach
<a href="">
    <ul>
      <li>ユーザー名:</li>
      <li>カテゴリー:@if($post['category_id']==0)
        GOOD
        @elseif($post['category_id']=1)
        Other
        @else
        Bad
      @endif
      </li>
      <li>投稿日時:{{$post['created_at']}}</li>
      <li>投稿内容:{{$post['comment']}}</li>
    </ul>
</a>
@endforeach