@extends('layouts.app')
@section('content')

    <body style="background-color:#EFEFEF;">
    <!-- #F9F9F9 -->
    <script src="script.js"></script>


{{--    <div style="width:100%;background-color:#74D2E7;">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-12 col-md-6 col-xl-5 d-flex align-items-start flex-column bd-highlight">--}}

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
{{--                <div class="col-12 col-md-6 col-xl-7 p-0">--}}
{{--                    <!-- https://miro.medium.com/max/800/0*YoS7JWhSyxNlIfX-.png -->--}}
{{--                    <img src="{{asset('img/home.png')}}" class="img-fluid ">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <div style="width:100%;background-color:#74D2E7;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-5 d-flex align-items-start flex-column bd-highlight order-12 order-md-0">

                    <div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100%;">
                        <div class="mb-auto bd-highlight"></div>
                        <div class="pt-2 bd-highlight">
                            <h1>專為學生打造的<br><span style="color:white">校園委託平台</span></h1>
                        </div>
                        <div class=" bd-highlight">
                            @guest
                                <a href="{{ route('login') }}"
                                   class="golden-btn animate__animated animate__heartBeat infinite animate__repeat-2 animate__delay-1s">開始體驗</a>
                            @else
                                <a href="{{ route('list') }}"
                                   class="golden-btn animate__animated animate__heartBeat infinite animate__repeat-2 animate__delay-1s">開始體驗</a>
                            @endguest
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-xl-7 p-0 order-0 order-md-12">
                    <!-- https://miro.medium.com/max/800/0*YoS7JWhSyxNlIfX-.png -->
                    <img src="{{asset('img/home.png')}}" class="img-fluid ">
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-4 ">


        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">

            <h1 class="m-0 ">最新委託</h1>

        </div>
        @foreach($newesttasks as $i)
            <div class="modal fade content{{$i->Tasks_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content container">
                        <h3 class="fas fa-times" style="color:#999999;position: absolute; top: 7px;right: 15px;"  data-toggle="modal" data-target=".content{{$i->Tasks_id}}"></h3>
                        <br>
                        <hr class="mb-3" size="8px" align="center" width="100%" style="color:#999999;" >
                        <div class="row p-2 ">
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pr-0 pl-0">
                                <img src="img/food.jpg" class="img-fluid pr-0">
                            </div>
                            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 pt-1">
                                @guest
                                @else
                                    <button type="button" class="btn btn-danger"
                                            style="position: absolute; top: 5px;right: 5px;">檢舉
                                    </button>
                                @endguest
                                <h3>{{$i->Title}}</h3>
                                <span class="badge badge-primary">代購物品</span>
                                <h5>購買物品和需求：<p>{{$i->Content}}</p>
                                    <h5>購買地點：<p>{{$i->BuyAddress}}</p>
                                    </h5>
                                    <h5>面交地點：<p>{{$i->MeetAddress}}</p>
                                    </h5>
                                    <h5>面交時間：<p>{{$i->DateTime}}</p>
                                    </h5>
                                    <h5>酬勞金額：<p>{{$i->Pay}}$</p>
                                    </h5>

                                </h5>
                                <p class="m-0">老闆:<a href="#">{{$i->name}}</a></p>
                                <p class="m-0">發佈於{{$i->created_at}}</p>
                                <p class="m-0">截止期限：{{$i->DeadDateTime}}</p>
                                @guest
                                    <form method="get" action="{{ route('login') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-primary my-3">接受委託</button>
                                    </form>
                                @else
                                    <form method="POST" action="{{ route('task.get') }}">
                                        @csrf
                                        <input type="hidden" name="tasks_id" value="{{$i->Tasks_id}}">
                                        <button type="submit" class="btn btn-primary my-3">接受委託</button>
                                    </form>
                                @endguest
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        <div class=" d-none d-md-block col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 ">
            <div class="row mr-0">
                @foreach($newesttasks as $i)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-3 pr-0">

                        <div style="border:1px #DFDFDF solid;background-color: #FFF" data-toggle="modal"
                             data-target=".content{{$i->Tasks_id}}">

                            <div class="row pl-3">

                                <div class="col-5 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                                    @if($i->Classification == 'Food')
                                        <img src="img/food.jpg" class="img-fluid">
                                    @elseif($i->Classification == 'Stationery')
                                        <img src="img/pen.jpg" class="img-fluid">
                                    @endif
                                </div>

                                <div class="col-7 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0 ">

                                    <div class="pl-1">

                                        <p class="m-0">{{$i->Title}}</p>
                                        <p class="m-0">
                                            @foreach($host_AVGrate[$i->Student_id] as $k)
                                                @if($k=="0")
                                                    <i class="far fa-star" style="color:#FF9529"></i>
                                                @elseif($k=="0.5")
                                                    <i class="fas fa-star-half-alt" style="color:#FF9529"
                                                       aria-hidden="true"></i>
                                                @elseif($k=="1")
                                                    <i class="fas fa-star" style="color:#FF9529"></i>
                                                @else
                                                    <i class="fas fa-star" style="color:#FF9529"></i>
                                                    {{$k}}
                                                    @break;
                                                @endif
                                            @endforeach
                                        </p>
                                        <p class="m-0">{{$i->Pay}}$</p>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
            <br>
        </div>
        <div class="d-md-none d-block col-12 col-sm-12 px-0" >
            <div class="mr-0 d-flex align-items-center" style="overflow-y:hidden;overflow-x:auto;white-space: nowrap;">

                @foreach($newesttasks as $i)
                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;background-color:#FFF"  data-toggle="modal" data-target=".content{{$i->Tasks_id}}">

                        <div class="row pl-3" >

                            <div class="col-12 col-sm-12 pl-0">
                                @if($i->Classification == 'Food')
                                    <img src="img/food.jpg" class="img-fluid">
                                @elseif($i->Classification == 'Stationery')
                                    <img src="img/pen.jpg" class="img-fluid">
                                @endif
                            </div>

                            <div class="col-12 col-sm-12 pl-0 " >

                                <div class="pl-1">

                                    <p class="m-0">{{$i->Title}}</p>
                                    <p class="m-0">
                                        @foreach($host_AVGrate[$i->Student_id] as $k)
                                            @if($k=="0")
                                                <i class="far fa-star" style="color:#FF9529"></i>
                                            @elseif($k=="0.5")
                                                <i class="fas fa-star-half-alt" style="color:#FF9529"
                                                   aria-hidden="true"></i>
                                            @elseif($k=="1")
                                                <i class="fas fa-star" style="color:#FF9529"></i>
                                            @else
                                                <i class="fas fa-star" style="color:#FF9529"></i>
                                                {{$k}}
                                                @break;
                                            @endif
                                        @endforeach
                                    </p>
                                    <p class="m-0">{{$i->Pay}}$</p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
                @endforeach
                <div class="col-4 col-sm-4 mt-3 pl-0 " style="display: inline-table;vertical-align: top;">
                    @guest
                    <a href="{{ route('login') }}"><h1>more&nbsp;<p class="fas fa-arrow-right"></p></h1></a>
                    @else
                        <a href="{{ route('list') }}"><h1>more&nbsp;<p class="fas fa-arrow-right"></p></h1></a>
                    @endguest
                </div>
            </div>
            <br>

        </div>

        <div class="row ">

            <div class="col-12 col-md-6 order-12 order-md-0 p-0">
                <!-- https://www.enisa.europa.eu/tips-for-cybersecurity-when-working-from-home/@@images/d707ed75-fa16-4add-9b38-054a4ac7dfcf.png -->
                <img src="{{asset('img/home1.png')}}" class="img-fluid py-4">
            </div>
            <div class="col-12 col-md-6 "
                 style="display: flex; flex-direction: column;justify-content: center;text-align: center;">

                <div class="row ">

                    <div class="col-12 col-sm-12 col-md-6 py-4" id="test-r">
                        <h1>工具人</h1>
                        <div class="row d-flex justify-content-center">
                            <h4 class="px-1">選擇你的委託</h4>
                            <h4 class="px-1">達成你的使命</h4>
                        </div>
                        @guest
                            <div><a href="{{ route('login') }}" class="btn btn-primary">尋找您的委託</a></div>
                        @else
                            <div><a href="{{ route('list') }}" class="btn btn-primary">尋找您的委託</a></div>
                        @endguest
                    </div>


                    <div class="col-12 col-sm-12 col-md-6 py-4">
                        <h1>雇主</h1>
                        <div class="row d-flex justify-content-center">
                            <h4 class="px-1">送出你的委託</h4>
                            <h4 class="px-1">享受你的服務</h4>
                        </div>
                        @guest
                            <div><a href="{{ route('login') }}" class="btn btn-primary">提出您的委託</a></div>
                        @else
                            <div><a href="{{ route('list') }}" class="btn btn-primary">提出您的委託</a></div>
                        @endguest
                    </div>

                </div>


            </div>
        </div>

        <div class="row d-flex justify-content-center">

            <div class="col-12 col-md-6 col-xl-6 py-md-4 pt-4 pb-0"
                 style="display: flex; flex-direction: column;justify-content: center;text-align: center;">

                <div class="row ">

                    <div class="col-12 col-sm-12 col-md-6 pb-3 " id="test-lt">
                        <div id="test-bb">
                            <h4>會員人數</h4>
                            <h4>{{$members_amount}}</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 pb-3" id="test-rt">
                        <div id="test-bb">
                            <h4>委託總數量</h4>
                            <h4>{{$task_amount}}</h4>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-12 col-sm-12 col-md-6 pb-3" id="test-lb">
                        <div id="test-bb">
                            <h4>已完成委託</h4>
                            <h4>{{$task_complete_amount}}</h4>
                        </div>
                    </div>


                    <div class="col-12 col-sm-12 col-md-6 pb-3" id="test-rb">
                        <div>
                            <h4>未被接委託</h4>
                            <h4>{{$task_notcomplete_amount}}</h4>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-6 col-xl-6 p-0">
                <img src="{{asset('img/home2.png')}}" class="img-fluid ">
            </div>

        </div>


    </div>

    <div class="text-center mt-md-2 mt-3">
        <a href="#top">
            <h1 class="fas fa-arrow-up"></h1>
        </a>
    </div>

    <div class="py-md-5 py-4 bg-light">


        <div class="container py-md-2">

            <div class="row">

                <div class="col-12 col-md-3">
                    <h2><a href="/">Toolman</a></h2>
                </div>

                <div class="col-12 col-md-9 row">
                    <div class="col-6 col-md-4 ">
                        <a href="/"><span class="fa fa-angle-right" aria-hidden="true"></span> 首頁</a>
                    </div>
                    <div class="col-6 col-md-4 ">
                        <a href="{{ route('about') }}"><span class="fa fa-angle-right" aria-hidden="true"></span> 關於工具人</a>
                    </div>
                    <div class="col-6 col-md-4 ">
                        <a href="{{ route('contact') }}"><span class="fa fa-angle-right" aria-hidden="true"></span> 聯絡我們</a>
                    </div>

                    <div class="col-6 col-md-4 ">
                        @guest
                            <a href="{{ route('login') }}"><span class="fa fa-angle-right" aria-hidden="true"></span>
                                我要當工具人</a>
                        @else
                            <a href="{{ route('list') }}"><span class="fa fa-angle-right" aria-hidden="true"></span>
                                我要當工具人</a>
                        @endguest
                    </div>
                    <div class="col-6 col-md-4 ">
                        @guest
                            <a href="{{ route('login') }}"><span class="fa fa-angle-right" aria-hidden="true"></span>我要當乾爹</a>
                        @else
                            <a href="{{ route('list') }}"><span class="fa fa-angle-right" aria-hidden="true"></span>我要當乾爹</a>
                        @endguest
                    </div>
                </div>

            </div>

        </div>


    </div>


    <div class="bg-dark cpy-right text-center p-0 m-0" style="position: relative;bottom: 0;width:100%;color:white">
        <p class="m-0">© 2020 Toolman. All rights reserved</p>
    </div>


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
