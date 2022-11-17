
<div>
  <p></p>
  <ul>
  <li>ユーザー名</li> 
  

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

  <a href="{{route('postedit.form',['post'=>$post['id']])}}"><button type="submit">編集する</button></a>

  <a href="{{}}"><button type="submit">削除する</button></a>
  
</div>
