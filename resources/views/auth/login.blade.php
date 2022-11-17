


@extends('layouts.layout')
@section('content')
          <div class="card-header">ログイン</div>
          
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="{{ route('login') }}" method="POST">
              @csrf
   
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}" />

                <label for="password">パスワード</label>
                <input type="password" class="form-control" id="password" name="password" />

                <button type="submit" class="btn btn-primary">送信</button>

        <div class="text-center">
          <a href="{{ route('password.request') }}">パスワードの変更はこちらから</a>


@endsection
