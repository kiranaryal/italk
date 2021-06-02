<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>iTalk</title>
   


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/validate.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
    <div id="app">

        <nav class="navbar navbar-expand-md navbar-primary bg-error shadow-sm">
            <div class="container  ">
              @guest   
            <a class="navbar-brand d-flex align-items-center" href="/">
                   <div class="pr-5 " style=" border-right:1px solid #333"> 
                   <img src="/img/3.jpg" style="height:50px ;"></div>
                   <div class="pl-5">iTalk</div>
                   </a>
                   @endguest
                   @auth 
                <a class="navbar-brand d-flex align-items-center" href="/{{Auth::user()->id}}">
                   <div class="pr-5 " style=" border-right:1px solid #333"> 
                   <img src="/img/3.jpg" style="height:50px ;"></div>
                   <div class="pl-5" >iTalk</div>
                   </a>
                  
                   <a href="/profile/{{Auth::user()->id}}"><div class="pl-5 navbar-brand navbar-primary">Profile</div></a>
               
                <div  >
                                    <a  href="/chat/{{auth()->user()->id}}" class="pl-5 navbar-brand navbar-primary">Chat</a>
                                </div>
                 @endauth
                   <form action="/search" method="POST" role="search">
                   @method('PATCH')
                        {{ csrf_field() }}
                       
                        <div class="input-group pl-5">
                            <input type="text" class="form-control" name="q"
                                placeholder="Search users"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-default">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>
                            </span>
                        </div>
                    </form>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                            <button type="button" class="btn btn-success">
                                <a class="nav-link login-btn text-white" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </button>
                            </li>

                            @if (Route::has('register'))
                                <li class="nav-item">
                                <button type="button" class="btn btn-primary">
                                    <a class="nav-link register-btn text-white pl-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </button>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>
                                
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>


                     <a href="/profile/{{auth()->user()->id}}/settings" class="dropdown-item">Settings</a> 
                                </div>

                
                             
                            </li>

                        @endguest
                    </ul>
                </div>
             
            </div>
        </nav>
        <div class="py-4 text-white ">
        
        
            @yield('content')
        </div>

        
    
</body>
</html>
