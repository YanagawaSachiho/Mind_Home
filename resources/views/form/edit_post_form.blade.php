
<form action="{{route('postedit.form',['post'=>$post['id']])}}" method="post">
@csrf
<label>カテゴリー</label> 
<select name="category_id">
  <option value=0>GOOD</option>
  <option value=1>OTHER</option>
  <option value=2>BAD</option>
</select>
<label>公開・非公開</lavel>
<select name="public">
  <option value=1>公開</option>
  <option value=0>非公開</option>
</select>
<div></div>
<label>投稿内容</label>
<textarea name="comment">{{$post['comment']}}</textarea>
<button type="submit">登録する</button>
</form>
<div>戻る</div>