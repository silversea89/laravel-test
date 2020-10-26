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
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <!--jQuery-->

    <!--axios-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!--axios-->


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
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css"/>

    <link href="{{ asset('css/main.css') }}" rel="stylesheet" type="text/css"/>

    @if(Request::is('/'))
        <script src="{{ asset('js/main2.js')}}"></script>
    @else
        <script src="{{ asset('js/main.js')}}"></script>
    @endif
    <script src="{{ asset('js/chatroomjs.js')}}"></script>
    <link href="{{ asset('css/chatcss.css') }}" rel="stylesheet" type="text/css"/>

<!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS"
          crossorigin="anonymous">
    <!--Bootstrap-->
</head>

<body>


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
                <div class="row">
                    @guest
                        <button class="border-0 p-3 fakeBtn" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                            <span class="far fa-user"></span>
                        </button>
                    @else

                        <button class="border-0 p-3" type="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" id="profile">
                            <span class="badge badge-pill badge-danger" id="noti-count"
                                  style="position:absolute;top:10px;left:3px">{{$count}}</span>
                            <span class="far fa-bell"></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right bg-dark border py-0" id="profileDropdown">
                            <div id="dp-item">
                                @isset($notification)
                                    @foreach($notification as $i)
                                        <a class="dropdown-item navbar-dark border-bottom p-2"
                                           href="{{ route('task.detail', $i->href)}}">
                                            <div class="row">
                                                <div class="col-auto pr-2">
                                                    <img
                                                        class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                                        src="/src/img/profile.jpg">
                                                </div>
                                                <div class="col pl-0">
                                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                                        {{$i->message}}
                                                    </h5>
                                                    <p class="font-grey m-0">
                                                        {{$i->created_at}}
                                                    </p>
                                                    <p class="font-grey m-0">
                                                        //委託標題(如果有)
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @endisset

                            </div>
                            <a class="dropdown-item navbar-dark font-orange border-bottom px-3 py-2"
                               href="/nofitications">查看所有通知 </a>
                        </div>
                        <div class="dropdown">
                            <button class="border-0 p-3" type="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" id="profile">
                                <span class="far fa-user"></span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right bg-dark border py-0" id="profileDropdown">
                                <a class="dropdown-item navbar-light font-white border-bottom btn-orange"
                                   href="{{route('profile.id', Auth::user()->student_id)}}">個人資料</a>
                                <a class="dropdown-item navbar-light font-white border-bottom"
                                   href="{{route('list.push')}}">已提出的委託</a>
                                <a class="dropdown-item navbar-light font-white border-bottom"
                                   href="{{route('list.ING')}}">已接受的委託</a>
                                <a class="dropdown-item navbar-light font-white" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">登出</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">--}}
                                    @csrf
                                </form>
                            </div>
                            <!-- ~未登入這塊消失 -->

                        </div>
                    @endguest
                </div>
            </div>

            {{--                <div class="dropdown order-md-last">--}}
            {{--                    @guest--}}
            {{--                        <button class="border-0 p-3 fakeBtn" type="button" data-toggle="dropdown" aria-haspopup="true"--}}
            {{--                                aria-expanded="false">--}}
            {{--                            <span class="far fa-user"></span>--}}
            {{--                        </button>--}}
            {{--                    @else--}}
            {{--                        <button class="border-0 p-3" type="button" data-toggle="dropdown" aria-haspopup="true"--}}
            {{--                                aria-expanded="false" id="profile">--}}
            {{--                            <span class="badge badge-pill badge-danger"--}}
            {{--                                  style="position:absolute;top:10px;left:3px">6</span>--}}
            {{--                            <span class="far fa-bell"></span>--}}
            {{--                        </button>--}}
            {{--                        <div class="dropdown-menu dropdown-menu-right bg-dark border py-0" id="profileDropdown">--}}
            {{--                            <a class="dropdown-item navbar-dark border-bottom p-2" href="/list_id_push">--}}
            {{--                                <div class="row">--}}
            {{--                                    <div class="col-auto pr-2">--}}
            {{--                                        <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"--}}
            {{--                                             src="/src/img/profile.jpg">--}}
            {{--                                    </div>--}}
            {{--                                    <div class="col pl-0">--}}
            {{--                                        <h5 class="guestProfileName font-white font-weight-bold m-0">--}}
            {{--                                            //通知內容--}}
            {{--                                        </h5>--}}
            {{--                                        <p class="font-grey m-0">--}}
            {{--                                            //通知時間--}}
            {{--                                        </p>--}}
            {{--                                        <p class="font-grey m-0">--}}
            {{--                                            //委託標題(如果有)--}}
            {{--                                        </p>--}}
            {{--                                    </div>--}}
            {{--                                </div>--}}
            {{--                            </a>--}}
            {{--                            <a class="dropdown-item navbar-dark font-orange border-bottom px-3 py-2"--}}
            {{--                               href="/nofitications">查看所有通知</a>--}}
            {{--                        </div>--}}
            {{--                        <!-- ~未登入這塊消失 -->--}}
            {{--                    @endguest--}}
            {{--                </div>--}}


            <div class="collapse navbar-collapse px-3" id="navbarToggler">
                @guest
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item">
                            <a class="nav-link" href="/">首頁</a>
                        </li>
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
                @else
                    <ul class="navbar-nav mr-auto ">
                        <li class="nav-item">
                            <a class="nav-link" href="/">首頁</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('list')}}" class="nav-link">所有委託</a>
                        </li>
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
                @endguest
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

<button class="border-0 p-3 fakeBtn" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <span class="far fa-user" aria-hidden="true"></span>
</button>

@yield('content')

</body>
@guest

@else
    <script type="text/javascript">
        var pusher = new Pusher('fc19df46a56b703d0c4a', {
            encrypted: true,
            cluster: 'ap3'
        });

        var channel2 = pusher.subscribe("taskstart.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel2.bind('App\\Events\\taskstart', function (data) {
            $("#noti-count").text(parseInt($("#noti-count").text()) + 1);
            let task_href = `{{route('task.detail', '')}}/${data.href}`;
            $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="${task_href}">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        ${data.title}
                                    </p>
                                </div>
                            </div>
                        </a>`);
        });

        var channel3 = pusher.subscribe("back.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel3.bind('App\\Events\\back', function (data) {
            $("#noti-count").text(parseInt($("#noti-count").text()) + 1);
            let task_href = `{{route('task.detail', '')}}/${data.href}`;
            $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="${task_href}">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        ${data.title}
                                    </p>
                                </div>
                            </div>
                        </a>`);
        });

        var channel4 = pusher.subscribe("arrive.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel4.bind('App\\Events\\arrive', function (data) {
            $("#noti-count").text(parseInt($("#noti-count").text()) + 1);
            let task_href = `{{route('task.detail', '')}}/${data.href}`;
            $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="${task_href}">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        ${data.title}
                                    </p>
                                </div>
                            </div>
                        </a>`);
        });

        var channel5 = pusher.subscribe("complete.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel5.bind('App\\Events\\complete', function (data) {
            $("#noti-count").text(parseInt($("#noti-count").text()) + 1);
            let task_href = `{{route('task.detail', '')}}/${data.href}`;
            $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="${task_href}">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        ${data.title}
                                    </p>
                                </div>
                            </div>
                        </a>`);
        });

        var channel6 = pusher.subscribe("givetask.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel6.bind('App\\Events\\givetask', function (data) {
            $("#noti-count").text(parseInt($("#noti-count").text()) + 1);
            let task_href = `{{route('task.detail', '')}}/${data.href}`;
            $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="${task_href}">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        ${data.title}
                                    </p>
                                </div>
                            </div>
                        </a>`);
        });

        var channel7 = pusher.subscribe("applicate.{{Auth::user()->student_id}}");

        // Bind a function to a Event (the full Laravel class)
        channel7.bind('App\\Events\\applicate', function (data) {
            $("#noti-count").text(parseInt($("#noti-count").text()) + 1);
            let task_href = `{{route('task.detail', '')}}/${data.href}`;
            $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="${task_href}">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        ${data.title}
                                    </p>
                                </div>
                            </div>
                        </a>`);
        });

        $("#profile").on('click', () => {
            axios.post(`{{route("read")}}`, {}, {
                headers: {'X-XSRF-TOKEN': "{{csrf_token()}}"}
            }).then((res) => {
                console.log(res);
                $("#noti-count").text(0);
            })
        })
    </script>
@endguest

</html>
