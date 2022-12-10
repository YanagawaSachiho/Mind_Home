<!DOCTYPE html>
    <html lang="en">
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
        <header class="p-3 bg-primary d-flex justify-content-end sticky-top">        
            @if(Auth::check())
                <div class="p-2 bd-highlight">
                    <a href="{{route('/')}}" class="text-white">HOMEへ</a>
                </div>
                <div class="x d-flex justify-content-end">
                    <span class="my-navbar-item  text-white rounded bg-white text-info rounded p-1 m-1">{{ Auth::user()->name}}</span>
                    <a href="" id="logout" class="my-navbar-item bg-white text-info rounded p-1 m-1 ">ログアウト</a>
                    <form id="logout-form" action="{{ route('logout')}}" method="POST" style="display: none;">
                      @csrf
                    </form>
                    <script>
                        document.getElementById('logout').addEventListener('click',function(event){
                              event.preventDefault();
                            document.getElementById('logout-form').submit();
                        });
                    </script>          
                </div>
            @else
                <a class="my-navbar-item" href="{{route('login')}}" class="btn">ログイン</a>
                <a class="my-navbar-item" href="{{route('register')}}">会員登録</a>
            @endif  
        </header>

        <main class="p-2 m-auto">
            <div id="app" class="m-auto  p-5">
                @yield('content')
            </div>
        </main>
        
        <!-- jqueryの読み込み -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>            
        <script src="{{ asset('../js/ajax.js') }}"></script>
    </body>
</html>