<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!--animate.css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
    <!--animate.css-->
    <!--aos-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js">
    </script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!--aos-->
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/d53abecaf1.js">

    </script>
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-shims.min.css" media="all"
          rel="stylesheet">
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free-v4-font-face.min.css" media="all"
          rel="stylesheet">
    <link href="https://kit-free.fontawesome.com/releases/latest/css/free.min.css" media="all" rel="stylesheet">
    <!--fontawesome-->
    <!-- CSRF Token -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width">
    <title>ToolMan</title>

    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}" defer></script>--}}
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--jQuery-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
            crossorigin="anonymous">

    </script>
    <!--jQuery-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/js/gijgo.min.js"
            integrity="sha512-T62eI76S3z2X8q+QaoTTn7FdKOVGjzKPjKNHw+vdAGQdcDMbxZUAKwRcGCPt0vtSbRuxNWr/BccUKYJo634ygQ=="
            crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/gijgo/1.9.13/combined/css/gijgo.min.css"
          integrity="sha512-oCuecFHHGu/Y4zKF8IoSoj5hQq1dLNIiUCwN08ChNW1VoMcjIIirAJT2JmKlYde6DeLN6JRSgntz6EDYDdFhCg=="
          crossorigin="anonymous"/>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Styles -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('/css/main.css') }}" rel="stylesheet" type="text/css"/>

    @if(Request::is('/'))
        <script src="{{ asset('js/main2.js')}}"></script>
    @else
        <script src="{{ asset('js/main.js')}}"></script>
@endif
<!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
    <!--Bootstrap-->
</head>

<body>
@guest

@else
    <script type="text/javascript">
        //通知
        var pusher = new Pusher('fc19df46a56b703d0c4a', {
            encrypted: true,
            cluster: 'ap3'
        });

        // Subscribe to the channel we specified in our Laravel Event
        // var channel = pusher.subscribe('status-liked');
        var channel1 = pusher.subscribe("taskhasgot.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel1.bind('App\\Events\\taskhasgot', function (data) {
            console.log(data.message);
            console.log(data.time);
        });

        var channel2 = pusher.subscribe("taskstart.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel2.bind('App\\Events\\taskstart', function (data) {
            console.log(data.message);
            console.log(data.time);
        });

        var channel3 = pusher.subscribe("back.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel3.bind('App\\Events\\back', function (data) {
            console.log(data.message);
            console.log(data.time);
        });

        var channel4 = pusher.subscribe("arrive.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel4.bind('App\\Events\\arrive', function (data) {
            console.log(data.message);
            console.log(data.time);
        });

        var channel5 = pusher.subscribe("complete.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel5.bind('App\\Events\\complete', function (data) {
            console.log(data.message);
            console.log(data.time);
        });
    </script>
@endguest

<nav class="navbar-dark bg-darker" id="realNav">
    <div class="container p-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-darker p-0">
            <button class="navbar-toggler border-0 p-3" type="button" data-toggle="collapse"
                    data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>
            <a class="navbar-brand m-0 mr-md-3 p-0" href="/" id="logo">Toolman</a>
            <div class="dropdown order-md-last">
                @guest
                    <button class="border-0 p-3 fakeBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                        <span class="far fa-user"></span>
                    </button>

                @else
                    <button class="border-0 p-3" type="button" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" id="profile">
                        <span class="far fa-user"></span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" id="profileDropdown">
                        <a class="dropdown-item navbar-dark" href="{{route('profile.id', Auth::user()->student_id)}}">個人資料</a>
                        <a class="dropdown-item navbar-dark" href="#">訊息</a>
                        <a class="dropdown-item navbar-dark" href="{{route('list.push')}}">已提出的委託</a>
                        <a class="dropdown-item navbar-dark" href="{{route('list.ING')}}">已接受的委託</a>
                        <a class="dropdown-item navbar-dark" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                @endguest
            </div>


            <div class="collapse navbar-collapse px-3" id="navbarToggler">
                <ul class="navbar-nav mr-auto ">

                    <li class="nav-item">
                        <a class="nav-link" href="/">首頁</a>
                    </li>
                    @if(\Request::is('register')||\Request::is('login'))

                    @else
                        <li class="nav-item">
                            <a href="{{ route('list')}}" class="nav-link">所有委託</a>
                        </li>
                    @endif

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">關於工具人</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">問題Q&A</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">聯絡我們</a>
                    </li>

                </ul>
                <div class="form-inline my-0">
                    @guest
                        <a class="btn btn-outline-orange my-2 my-sm-0 mr-3 mr-md-2 px-4 rounded-0"
                           href="{{ route('register') }}">註冊</a>
                        <a class="btn btn-orange my-2 my-sm-0 px-4 rounded-0" href="{{ route('login') }}">登入</a>
                    @else
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</nav>
<nav class="navbar-dark bg-darker" id="fakeNav"></nav>

{{--    <nav class="navbar navbar-expand-lg navbar-dark bg-dark "--}}
{{--         style="width: 100%;position: fixed;top:0px;left: 0px;z-index: 999;">--}}

{{--        <div class="container pr-0">--}}

{{--            <a class="navbar-brand" href="/">ToolMan</a>--}}


{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"--}}
{{--                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="navbar-toggler-icon"></span>--}}
{{--            </button>--}}

{{--            <div class="collapse navbar-collapse" id="navbarNavDropdown">--}}
{{--                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="/">首頁<span class="sr-only">(current)</span></a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('about') }}">關於工具人</a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item">--}}
{{--                        <a class="nav-link" href="{{ route('contact') }}">聯絡我們</a>--}}
{{--                    </li>--}}
{{--                </ul>--}}

{{--                @guest--}}
{{--                    <div class="form-inline my-2 my-lg-0">--}}
{{--                        <a class="btn btn-outline-success my-2 my-sm-0 mr-2"--}}
{{--                           href="{{ route('register') }}">{{ __('註冊') }}</a>--}}
{{--                        <a class="btn btn-success my-2 my-sm-0" href="{{ route('login') }}">{{ __('登入') }}</a>--}}
{{--                    </div>--}}
{{--                @else--}}
{{--                    <ul class="navbar-nav ml-auto nav-flex-icons">--}}

{{--                        <a class="btn btn-danger my-2 my-sm-0" href="{{ route('logout') }}"--}}
{{--                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">--}}
{{--                            {{ __('登出') }}--}}
{{--                        </a>--}}

{{--                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--                            @csrf--}}
{{--                        </form>--}}
{{--                    </ul>--}}
{{--                @endguest--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}






@yield('content')

</body>
{{--@if(\Request::is('/')||\Request::is('about')||\Request::is('contact')||\Request::is('login')||\Request::is('register'))--}}

{{--@else--}}
{{--    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0"--}}
{{--         style="width:100%;position: fixed; bottom: 0px;right: 0px;z-index: 999;">--}}
{{--        <div class="container bg-dark">--}}

{{--            <div class="row ml-0" style="width:100%">--}}

{{--                <a class="col-3 col-sm-3" href="{{route('list')}}" style="text-decoration:none;color:black">--}}
{{--                    <center>--}}
{{--                        <i class="fas fa-clipboard-list" @if(\Request::is('list','list/*'))style="color:#00FFFB"--}}
{{--                           @else style="color:white"@endif></i>--}}
{{--                        <p class="m-0" @if(\Request::is('list','list/*'))style="color:#00FFFB"--}}
{{--                           @else style="color:white"@endif>--}}
{{--                            所有</p>--}}
{{--                    </center>--}}
{{--                </a>--}}

{{--                <a class="col-3 col-sm-3" href="{{route('list.push')}}" style="text-decoration:none;color:black">--}}
{{--                    <center>--}}
{{--                        <i class="fas fa-arrow-up" @if(\Request::is('list_push*'))style="color:#00FFFB"--}}
{{--                           @else style="color:white"@endif></i>--}}
{{--                        <p class="m-0" @if(\Request::is('list_push*'))style="color:#00FFFB"--}}
{{--                           @else style="color:white"@endif>已提出</p>--}}
{{--                    </center>--}}
{{--                </a>--}}

{{--                <a class="col-3 col-sm-3" href="{{route('list.ING')}}" style="text-decoration:none;color:black">--}}
{{--                    <center>--}}
{{--                        <i class="fas fa-arrow-down" @if(\Request::is('list_ING*'))style="color:#00FFFB"--}}
{{--                           @else style="color:white"@endif></i>--}}
{{--                        <p class="m-0" @if(\Request::is('list_ING*'))style="color:#00FFFB"--}}
{{--                           @else style="color:white"@endif>已接受</p>--}}
{{--                    </center>--}}
{{--                </a>--}}

{{--                @if(Auth::check())--}}
{{--                    <a class="col-3 col-sm-3" href="{{route('profile.id', Auth::user()->student_id)}}"--}}
{{--                       style="text-decoration:none;color:black">--}}
{{--                        <center>--}}
{{--                            <i class="fas fa-user" @if(\Request::is('profile*'))style="color:#00FFFB"--}}
{{--                               @else style="color:white"@endif></i>--}}
{{--                            <p class="m-0" @if(\Request::is('profile*'))style="color:#00FFFB"--}}
{{--                               @else style="color:white"@endif>我的</p>--}}
{{--                        </center>--}}
{{--                    </a>--}}
{{--                @endif--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--@endif--}}
</html>
