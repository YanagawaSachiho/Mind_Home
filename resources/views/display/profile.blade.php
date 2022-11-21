
<image>

<!-- 普通に取り出せない問題 -->
@foreach($user as $user)

{{$user['name']}}
{{$user['profile']}}
<a href="{{route('edit_profile',['user'=>$user['id']])}}"><button class="btn-edit">編集する</button></a>
@endforeach