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
    <header class="p-3 bg-primary ">
        
        @if(Auth::check())
      
            <div class="d-flex">
                <a href="{{route('/')}}" class="my-navbar-item bg-primary text-white ">MindHome</a>
                

                <span class="my-navbar-item bg-primary text-white rounded ">{{ Auth::user()->name}}</span>
                
                <a href="" id="logout" class="my-navbar-item bg-primary text-white ">ログアウト</a>
                
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
       <a class="my-navbar-item" href="{{route('login')}}">ログイン</a>
       <a class="my-navbar-item" href="{{route('register')}}">会員登録</a>
       @endif
    </div>
</header>
<main class="p-2 m-auto">
    <div id="app" class="conteiner  p-5">
        
        @yield('content')

    </div>
</main>
                        
<footer class="bg-secondary">
    <div class="container border">               
    @yield('footter')   
    </div>
</footer>

<!-- jqueryの読み込み -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>            
<script src="{{ asset('../js/ajax.js') }}"></script>
</body>

</html>