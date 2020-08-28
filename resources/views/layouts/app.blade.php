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
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript">
    </script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Styles -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
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

<div id="app">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark "
         style="width: 100%;position: fixed;top:0px;left: 0px;z-index: 999;">

        <div class="container pr-0">

            <a class="navbar-brand" href="/">ToolMan</a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">首頁<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">關於工具人</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">聯絡我們</a>
                    </li>
                </ul>

                @guest
                    <div class="form-inline my-2 my-lg-0">
                        <a class="btn btn-outline-success my-2 my-sm-0 mr-2"
                           href="{{ route('register') }}">{{ __('註冊') }}</a>
                        <a class="btn btn-success my-2 my-sm-0" href="{{ route('login') }}">{{ __('登入') }}</a>
                    </div>
                @else
                    <ul class="navbar-nav ml-auto nav-flex-icons">

                        <a class="btn btn-danger my-2 my-sm-0" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('登出') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                @endguest
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

        <div class="container pr-0">
            <a class="navbar-brand" href="/">ToolMan</a>
        </div>
    </nav>
</div>
@yield('content')

</body>
@if(\Request::is('/')||\Request::is('about')||\Request::is('contact')||\Request::is('login')||\Request::is('register'))

@else
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0"
         style="width:100%;position: fixed; bottom: 0px;right: 0px;z-index: 999;">
        <div class="container bg-dark">

            <div class="row ml-0" style="width:100%">

                <a class="col-3 col-sm-3" href="{{route('list')}}" style="text-decoration:none;color:black">
                    <center>
                        <i class="fas fa-clipboard-list" @if(\Request::is('list','list/*'))style="color:#00FFFB"
                           @else style="color:white"@endif></i>
                        <p class="m-0" @if(\Request::is('list','list/*'))style="color:#00FFFB"
                           @else style="color:white"@endif>
                            所有</p>
                    </center>
                </a>

                <a class="col-3 col-sm-3" href="{{route('list.push')}}" style="text-decoration:none;color:black">
                    <center>
                        <i class="fas fa-arrow-up" @if(\Request::is('list_push*'))style="color:#00FFFB"
                           @else style="color:white"@endif></i>
                        <p class="m-0" @if(\Request::is('list_push*'))style="color:#00FFFB"
                           @else style="color:white"@endif>已提出</p>
                    </center>
                </a>

                <a class="col-3 col-sm-3" href="{{route('list.ING')}}" style="text-decoration:none;color:black">
                    <center>
                        <i class="fas fa-arrow-down" @if(\Request::is('list_ING*'))style="color:#00FFFB"
                           @else style="color:white"@endif></i>
                        <p class="m-0" @if(\Request::is('list_ING*'))style="color:#00FFFB"
                           @else style="color:white"@endif>已接受</p>
                    </center>
                </a>

                @if(Auth::check())
                    <a class="col-3 col-sm-3" href="{{route('profile.id', Auth::user()->student_id)}}"
                       style="text-decoration:none;color:black">
                        <center>
                            <i class="fas fa-user" @if(\Request::is('profile*'))style="color:#00FFFB"
                               @else style="color:white"@endif></i>
                            <p class="m-0" @if(\Request::is('profile*'))style="color:#00FFFB"
                               @else style="color:white"@endif>我的</p>
                        </center>
                    </a>
                @endif
            </div>
        </div>
    </nav>
@endif
</html>
