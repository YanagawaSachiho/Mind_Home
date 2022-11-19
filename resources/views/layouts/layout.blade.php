<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>MindHome</title>
</head>
<body>
    <header>
        <div id="app">
                    @if(Auth::check())
                    <span class="my-navbar-item">{{ Auth::user()->name}}</span>
                    <a href="" id="logout" class="my-navbar-item">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    <script>
                        document.getElementById('logout').addEventListener('click',function(event){
                            event.preventDefault();
                            document.getElementById('logout-form').submit();
                        });
                    </script>
                    @else
                    <a class="my-navbar-item" href="{{route('login')}}">ログイン</a>
                    <a class="my-navbar-item" href="{{route('register')}}">会員登録</a>
                   @endif
        </div>
    </header>

    <div><a href="{{route('home')}}">HOME</a></div>
 
    @yield('content')
</body>
</html>