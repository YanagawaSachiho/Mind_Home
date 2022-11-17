<!-- //Badの投稿 -->
<h1>BADs</h1>

@foreach($posts as $post)
    <a href="{{route('post_detail',['id'=>$post['id']])}}">
    <ul>
      <li>ユーザー名:</li>
      <li>カテゴリー:OTHER
      </li>
      <li>投稿日時:{{$post['created_at']}}</li>
      <li>投稿内容:{{$post['comment']}}</li>
    </ul>
</a>
@endforeach