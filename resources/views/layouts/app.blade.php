<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://kit.fontawesome.com/d53abecaf1.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width">
    <title>ToolMan</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript">
	</script>

    <!-- Styles -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

            <div class="container pr-0">

                <a class="navbar-brand" href="/">ToolMan</a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                @if(\Request::is('/')||\Request::is('about')||\Request::is('contact'))
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link" href="/">首頁<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">關於工具人</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">問題Q&A</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">聯絡我們</a>
                            </li>
                        </ul>
                @elseif(\Request::is('login')||\Request::is('register'))
                    <div class="collapse navbar-collapse" id="navbarNavDropdown"></div>
                @else
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('list'))active @endif" href="list">所有委託列表<span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('list_push'))active @endif" href="{{route('list.push')}}">已提出的委託</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if(Request::is('list_ING'))active @endif" href="list_ING">執行中的委託</a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link @if(Request::is('list'))active @endif" href="list_collect">已收藏的委託</a>--}}
{{--                            </li>--}}
                        </ul>
                @endif
                    @guest
                    <div class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-success my-2 my-sm-0 mr-2" href="{{ route('register') }}">{{ __('註冊') }}</a>
                        <a class="btn btn-success my-2 my-sm-0" href="{{ route('login') }}">{{ __('登入') }}</a>
                    </div>
                    @else
                    <ul class="navbar-nav ml-auto nav-flex-icons">

                        <li class="nav-item dropdown pr-3 pb-1 pt-2">
                            <a class="nav-link dropdown-toggle p-0" id="navbarDropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">1
                                <i class="fas fa-envelope"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdownMenuLink-1">
                                <a class="dropdown-item" href="#">通知</a>
                            </div>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle p-0" id="navbarDropdownMenuLink-2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://www.cooperspetkitchen.co.nz/assets/themes/cpk-theme/img/dogs/golden_retriever.jpg" class="rounded-circle p-0" style="height:40px;width:40px">
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg-right" aria-labelledby="navbarDropdownMenuLink-2">
                                <a class="dropdown-item" href="{{ route('profile') }}">個人資料</a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('登出') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                    @endguest
                </div>
            </div>
        </nav>
    </div>
    @yield('content')
</body>

</html>
