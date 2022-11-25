
  <!-- フッター部分 -->
  <div class="conatiner">
    <div>
     <a href="{{route('profile.page',['user_id'=>$post['user_id']])}}">自分のプロフィールへ</a>
    </div>
    <div>
      <a href="{{route('hiroba.page')}}">広場へ</a>
    </div>
    <div>
      <a href="">検索</a>
    </div>
    <div>
      <a href="">ブックマーク一覧へ</a>
    </div>
    <div>
      <a href="{{route('create_post.form')}}">新規投稿</a>
  </div>
</div>