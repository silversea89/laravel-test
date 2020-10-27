@extends('layouts.app')
@section('content')

    <body style="background-color:#EFEFEF;">
    <!-- #F9F9F9 -->
    <script src="script.js"></script>
    <link href="{{ asset('css/main2.css') }}" rel="stylesheet">
{{--    <div style="width:100%;background-color:#74D2E7;">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 col-md-6 col-xl-5 d-flex align-items-start flex-column bd-highlight order-12 order-md-0">--}}

{{--                    <div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100%;">--}}
{{--                        <div class="mb-auto bd-highlight"></div>--}}
{{--                        <div class="pt-2 bd-highlight">--}}
{{--                            <h1>專為學生打造的<br><span style="color:white">校園委託平台</span></h1>--}}
{{--                        </div>--}}
{{--                        <div class=" bd-highlight">--}}
{{--                            @guest--}}
{{--                                <a href="{{ route('login') }}"--}}
{{--                                   class="golden-btn animate__animated animate__heartBeat infinite animate__repeat-2 animate__delay-1s">開始體驗</a>--}}
{{--                            @else--}}
{{--                                <a href="{{ route('list') }}"--}}
{{--                                   class="golden-btn animate__animated animate__heartBeat infinite animate__repeat-2 animate__delay-1s">開始體驗</a>--}}
{{--                            @endguest--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--                <div class="col-12 col-md-6 col-xl-7 p-0 order-0 order-md-12">--}}
{{--                    <!-- https://miro.medium.com/max/800/0*YoS7JWhSyxNlIfX-.png -->--}}
{{--                    <img src="{{asset('img/home.png')}}" class="img-fluid ">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

    <div class="bg-orange">
        <div class="container py-4">
            <div class="row">
                <div class="pt-4 px-4 col-md-6 col-sm-12 order-md-first order-last align-self-end">
                    <h2>專為學生打造的</h2>
                    <h2 class="font-white">校園委託平台</h2>
                    @guest
                        <input type="button" class="my-2 golden-btn animate__animated animate__heartBeat animate__repeat-2 animate__delay-1s" value="開始體驗" onclick="javascript:location.href='{{ route('list') }}'">
                    @else
                        <input type="button" class="my-2 golden-btn animate__animated animate__heartBeat animate__repeat-2 animate__delay-1s" value="開始體驗" onclick="javascript:location.href='{{ route('list') }}'">
                    @endguest
                </div>

                <div class="col-md-6 col-sm-12  order-md-last order-first">
                    <img src="{{asset('img/home.png')}}" class="img-fluid ">
                </div>
            </div>
        </div>
    </div>

    <div class="bg-dark">
        <div class="container pb-4">
            <h2 class="pt-3 font-white">最新委託</h2>

            <div class="col-12">
                <div id="newest" class="row pb-4">
                    <!-- 這個才是完整版~ -->
                    @foreach($newesttasks as $i)
                    <div class="col-md-3 col-sm-5 col-6 p-1" >
                        <div class="height100p p-0 bg-light-grey">
                            <div data-toggle="modal" data-target="#missionCard{{$i->Tasks_id}}">
                                <div class="div-square">
                                    @if($i->Classification == 'Buy')
                                        <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                             src="{{asset('img/food.jpg')}}">
                                    @elseif($i->Classification == 'Service')
                                        <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                             src="{{asset('img/Service.jpg')}}">
                                    @elseif($i->Classification == 'Book')
                                        <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                             src="{{asset('img/Book.jpg')}}">
                                    @elseif($i->Classification == 'Teach')
                                        <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                             src="{{asset('img/tutor.jpg')}}">
                                    @endif
                                </div>
                                <div class="px-2 pt-2">
                                    <p class="font-white ellipsis mission-title m-0">{{$i->Title}}</p>

                                    <div class="d-flex justify-content-between">
                                        <p class="font-orange-bright font-weight-bold m-0">${{$i->Pay}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="px-2 pb-2">
                                <div class="d-flex justify-content-between">
                                    <div class="row pl-3 pt-1 text-star-flow">
                                        @foreach($host_AVGrate[$i->Student_id] as $k)
                                            @if($k=="0")
                                                <i class="far fa-star font-orange"></i>
                                            @elseif($k=="0.5")
                                                {{--<i class="fas fa-star-half-alt" style="color:#FF9529"--}}
                                                {{--aria-hidden="true"></i>--}}
                                                <i class="fas fa-star-half-alt font-orange"></i>
                                            @elseif($k=="1")
                                                <i class="fas fa-star font-orange"></i>
                                            @else
                                                <i class="fas fa-star font-orange"></i>
                                                <a class="font-grey">尚無資料</a>
                                                @break;
                                            @endif
                                        @endforeach
                                    </div>
                                    <a class="font-grey"
                                       href="{{ route('profile.id',$i->Student_id)}}">{{$i->name}}</a>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <i class="fas fa-heart font-red m-0 pt-1"></i>
                                    <p class="m-0 font-grey">已發過 {{$i->task_count}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- ~這個才是完整版 -->
                </div>
            </div>
        </div>
    </div>

    <!-- missionCard1~ -->
    @foreach($newesttasks as $i)
    <div class="modal fade" id="missionCard{{$i->Tasks_id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content border-0 bg-dark">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <!-- phone~ -->
                        <div class="d-block d-lg-none  pl-3 pt-1 pt-lg-2 pb-1 ">
                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <h5 class="font-white mb-0  pl-l pl-lg-0 ">
                                        {{$i->Title}}
                                    </h5>
                                </div>
                                <div class="col-auto">
                                    <button class="close pb-3 px-3 pt-2 font-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- ~phone -->
                        <div class="div-square">
                            @if($i->Classification == 'Buy')
                                <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                     src="{{asset('img/food.jpg')}}">
                            @elseif($i->Classification == 'Service')
                                <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                     src="{{asset('img/Service.jpg')}}">
                            @elseif($i->Classification == 'Book')
                                <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                     src="{{asset('img/Book.jpg')}}">
                            @elseif($i->Classification == 'Teach')
                                <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                     src="{{asset('img/tutor.jpg')}}">
                            @endif
                        </div>
                    </div>

                    <div class="col-12 col-lg-6 pt-0 pt-lg-2 pb-3 ">
                        <!-- computer~ -->
                        <div class="d-none d-lg-block pl-0 ">

                            <div class="row">
                                <div class="col d-flex align-items-center">
                                    <h4 class="font-white mb-0  pl-l pl-lg-0 ">
                                        {{$i->Title}}
                                    </h4>
                                </div>
                                <div class="col-auto">
                                    <button class="close pb-3 px-3 pt-2 font-white" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- ~computer -->
                        <div class="row pr-3">
                            <div class="col d-flex align-items-center">
                                <h5 class="px-3 pl-lg-0 mb-3 mt-3 mt-lg-2 font-white">
                                    ${{$i->Pay}}<br>
                                </h5>
                            </div>
                            <div class="col-auto d-flex align-items-center">
                                <button class="btn btn-outline-orange">
                                    檢舉委託
                                </button>
                            </div>
                        </div>
                        <h6 class=" px-3 pl-lg-0 font-white fas fa-file-alt">
                            委託內容
                        </h6>
                        <h6 class="px-3 pl-lg-0 mb-3 font-grey">
                            {{$i->Content}}
                        </h6>

                        <h6 class=" px-3 pl-lg-0 font-white fas fa-map-marker-alt">
                            購買地點
                        </h6>
                        <h6 class="px-3 pl-lg-0 mb-3 font-grey">
                            {{$i->BuyAddress}}
                        </h6>

                        <h6 class=" px-3 pl-lg-0 font-white fas fa-handshake">
                            面交地點
                        </h6>
                        <h6 class="px-3 pl-lg-0 mb-3 font-grey">
                            {{$i->MeetAddress}}
                        </h6>

                        <h6 class=" px-3 pl-lg-0 font-white fas fa-clock">
                            面交時間
                        </h6>
                        <h6 class="px-3 pl-lg-0 mb-3 font-grey">
                            {{$i->DateTime}}
                        </h6>

                        <h6 class=" px-3 pl-lg-0 font-white fas fa-coins">
                            酬勞金額
                        </h6>
                        <h6 class="px-3 pl-lg-0 mb-3 font-grey">
                            ${{$i->Pay}}
                        </h6>

                        <h6 class="px-3 pl-lg-0 mb-3 font-grey">
                            老闆:<a class="font-grey"
                                  href="{{ route('profile.id',$i->Student_id) }}">{{$i->name}}</a>
                        </h6>
                        <h6 class="px-3 pl-lg-0 mb-3 font-grey">
                            發佈於 {{$i->created_at}}
                        </h6>

                        <div class="px-3 px-lg-0">

                                @guest
                                    <form method="get" action="{{ route('login') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary my-3">接受委託</button>
                                    </form>
                                @else
                                @if($i->Student_id!=$id)
                                    <form method="POST" action="{{ route('task.get') }}">
                                        @csrf
                                        <input type="hidden" name="tasks_id" value="{{$i->Tasks_id}}">
                                        <button type="submit" class="btn btn-primary my-3">接受委託</button>
                                    </form>
                                @endif
                                @endguest

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- ~missionCard1 -->

    <div class="bg-light-grey font-white">
        <div class="container">
            <div class="py-4">
                <div class="row">
                    <div class="col-md-6 col-sm-12 order-md-first order-last ">
                        <img src="{{asset('img/home1.png')}}" class="img-fluid">
                    </div>
                    <div id="find-left" class="py-4 textCenter col-md-3 col-sm-12">
                        <h1>工具人</h1>
                        <h4>選擇你的委託<br/>達成你的使命</h4>
                        @guest
                            <button class="btn btn-dark py-2 my-2" onclick="javascript:location.href='{{ route('login') }}'">
                                尋找您的委託
                            </button>
                        @else
                            <button class="btn btn-dark py-2 my-2" onclick="javascript:location.href='{{ route('list') }}'">
                                尋找您的委託
                            </button>
                        @endguest
                    </div>
                    <div id="create-right" class="py-4 textCenter col-md-3 col-sm-12">
                        <h1>乾爹/媽</h1>
                        <h4>送出你的委託<br/>享受你的服務</h4>
                        @guest
                            <button class="btn btn-dark py-2 my-2" onclick="javascript:location.href='{{ route('login') }}'">
                                建立您的委託
                            </button>
                        @else
                            <button class="btn btn-dark py-2 my-2" onclick="javascript:location.href='{{ route('list') }}'">
                                建立您的委託
                            </button>
                        @endguest
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row textCenter">
                <div class="col-md-6 col-sm-12 col-12 align-self-center">
                    <div class="row order-first">
                        <div id="left-top-member" class="col-md-6 col-sm-12 col-12 p-2">
                            <h4>會員人數</h4>
                            <h4>{{$members_amount}}</h4>
                        </div>
                        <div id="left-bottom-total" class="col-md-6 col-sm-12 col-12 p-2">
                            <h4>委託總數量</h4>
                            <h4>{{$task_amount}}</h4>
                        </div>
                        <div class="w-100"></div>
                        <div id="right-top-finish" class="col-md-6 col-sm-12 col-12 p-2">
                            <h4>已完成委託</h4>
                            <h4>{{$task_complete_amount}}</h4>
                        </div>
                        <div id="right-bottom-waiting" class="col-md-6 col-sm-12 col-12 p-2">
                            <h4>未被接委託</h4>
                            <h4>{{$task_notcomplete_amount}}</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12 order-last">
                    <img src="{{asset('img/home2.png')}}" class="img-fluid ">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="py-3 d-flex justify-content-center">
                <h1 id="arrow" class="fa fa-chevron-circle-up" aria-hidden="true"></h1>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark font-white">
        <div class="container py-4">
            <div class="row py-4">
                <div class="col-12 col-md-4">
                    <a class="footer-link font-white" href="/">
                        <h1>Toolman</h1>
                    </a>
                </div>
                <div class="col-12 col-md-8 pl-4 pt-2">
                    <div class="row">
                        <div class="col-md-4 col-6">
                            <a class="footer-link" href="/">
                                <h6>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    首頁
                                </h6>
                            </a>
                        </div>
                        <div class="col-md-4 col-6">
                            <a class="footer-link" href="{{ route('about') }}">
                                <h6>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    關於工具人
                                </h6>
                            </a>
                        </div>
                        <div class="col-md-4 col-6">
                            <a class="footer-link" href="/faq">
                                <h6>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    常見問題
                                </h6>
                            </a>
                        </div>
                        <div class="col-md-4 col-6">
                            <a class="footer-link" href="{{ route('contact') }}">
                                <h6>
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    聯絡我們
                                </h6>
                            </a>

                        </div>
                        <div class="col-md-4 col-6">
                            @guest
                                <a class="footer-link" href="{{ route('login') }}">
                                    <h6>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        我要當工具人
                                    </h6>
                                </a>
                            @else
                                <a class="footer-link" href="{{ route('list') }}">
                                    <h6>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        我要當工具人
                                    </h6>
                                </a>
                            @endguest
                        </div>
                        <div class="col-md-4 col-6">
                            @guest
                                <a class="footer-link" href="{{ route('login') }}">
                                    <h6>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        我要當乾爹/媽
                                    </h6>
                                </a>
                            @else
                                <a class="footer-link" href="{{ route('list') }}">
                                    <h6>
                                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                        我要當乾爹/媽
                                    </h6>
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-darker text-center py-3">© 2020 Toolman. All rights reserved
        </div>
    </footer>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
            integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
            integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous"></script>
    </body>
    @endsection
    </html>
