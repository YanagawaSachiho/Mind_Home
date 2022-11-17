<form>
<label>公開・非公開</label>
<select name="category_id">
  <option value=0>GOOD</option>
  <option value=1>OTHER</option>
  <option value=2>BAD</option>
</select>
<label>カテゴリー</lavel>
<select name="public">
  <option value=1>公開</option>
  <option value=0>非公開</option>
</select>
<div></div>
<label>投稿内容</label>
<textarea>{{$post['comment']}}</textarea>
<a href=""><button type="submit">登録する</button></a>
</form>
<div>戻る</div>