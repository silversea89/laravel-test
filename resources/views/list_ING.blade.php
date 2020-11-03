@extends('layouts.app')

@section('content')

    <body class="height100vh antiFlow bg-darker">
    <div class="container" style="height: 100%">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="row">
                    <form class="width100p" action="{{ route('list.ING')}}" method="get">
                        <div class="input-group width100p px-sm-2">
                            <input type="text" class="form-control font-white bg-grey " name="keyword"
                                   laceholder="在此輸入關鍵字" value={{$keyword}}>
                            <button type="submit" class="btn btn-orange fas fa-search"></button>
                            <button type="submit" class="btn btn-orange d-block d-md-none fas fa-filter ml-1"
                                    data-toggle="collapse" data-target="#collapseFilter" aria-expanded="false"
                                    aria-controls="collapseFilter"></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="collapse col-12 col-md-3 col-xl-2 p-0 pl-2 pl-md-3  my-1 mt-md-3 " id="collapseFilter">
                <form class="col pl-2 pl-md-0 pt-2 pt-md-0" action="#">
                    <h5 class="font-white mt-2 mt-md-0">分類</h5>
                    <div class="row">
                        <div class="col-auto col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterFood">
                                <label class="form-check-label" for="filterFood">
                                    食物
                                </label>
                            </div>
                        </div>
                        <div class="col-auto col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterDrink">
                                <label class="form-check-label" for="filterDrink">
                                    飲料
                                </label>
                            </div>
                        </div>
                        <div class="col-auto col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="filterStationary">
                                <label class="form-check-label" for="filterStationary">
                                    文具用品
                                </label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-12 col-md-9 col-xl-10">
                <div class="row">
                    <div class="col-12 px-sm-2 px-0 px-md-2">
                        <h3 class="mb-0 mt-2 pl-2 pl-md-0 font-white">已接受的委託</h3>
                        <form action="#">
                            <ul class="nav mb-2 mt-1" id="evaluate">
                                <li class="nav-item col-4 p-0 m-0">
                                    <form action="{{ route('list.ING')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="order" value="ING">
                                        <input type="hidden" name="keyword" value={{$keyword}}>
                                        @if($order=="ING" or $order==null)
                                            <button class="nav-link btn-block tab active px-0 m-0" type="submit">執行中</button>
                                        @else
                                            <button class="nav-link btn-block tab px-0 m-0" type="submit">執行中</button>
                                        @endif
                                    </form>
                                </li>
                                <li class="nav-item col-4 p-0 m-0">
                                    <form action="{{ route('list.ING')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="order" value="Complete">
                                        <input type="hidden" name="keyword" value={{$keyword}}>
                                        @if($order=="Complete")
                                            <button class="nav-link btn-block tab active px-0 m-0" type="submit">已完成</button>
                                        @else
                                            <button class="nav-link btn-block tab px-0 m-0" type="submit">已完成</button>
                                        @endif
                                    </form>
                                </li>
                                <li class="nav-item col-4 p-0 m-0">
                                    <form action="{{ route('list.ING')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="order" value="Expired">
                                        <input type="hidden" name="keyword" value={{$keyword}}>
                                        @if($order=="Expired")
                                            <button class="nav-link btn-block tab active px-0 m-0" type="submit">已過期</button>
                                        @else
                                            <button class="nav-link btn-block tab px-0 m-0" type="submit">已過期</button>
                                        @endif
                                    </form>
                                </li>
                                <!-- <li class="nav-item col-3">
                                  <button class="nav-link btn-block tab px-0 m-0"  type="submit">價格<i class="fas fa-sort-amount-down"></i></button>
                                </li> -->
                            </ul>
                        </form>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <!-- 這個才是完整版~ -->
                            @foreach($tasks as $i)
                                <div class="col-6 col-lg-4 col-xl-3 p-1">

                                    <div class="height100p p-0 bg-derk">
                                        <div data-toggle="modal" data-target="#missionCard{{$i->Tasks_id}}">
                                            <a href="{{ route('task.detail', $i->Tasks_id)}}">
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
                                            </a>
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
                                                   href="{{ route('profile.id',$i->Student_id) }}">{{$i->hostname}}</a>
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
                            <center class="width100p mt-3">
                                <nav>
                                    <ul class="pagination justify-content-center">
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span
                                                    aria-hidden="true">&laquo;</span></a></li>
                                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                                    aria-hidden="true">&raquo;</span></a></li>
                                    </ul>
                                </nav>
                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <body style="background-color:#74D2E7;height: 100%">--}}
{{--    <script src="script.js">--}}
{{--    </script>--}}

{{--    <div class="container pt-3 pb-0 pl-0 pr-0" style="background-color:#EFEFEF;height: 100%">--}}
{{--        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color:#EFEFEF;">--}}
{{--            <div class="d-flex justify-content-between">--}}
{{--                <h1 class="m-0">接受的委託</h1>--}}
{{--                <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"--}}
{{--                        aria-expanded="false" aria-controls="collapseExample">--}}
{{--                    <i class="fas fa-filter"></i>--}}
{{--                </button>--}}
{{--            </div>--}}

{{--            <div class="collapse" id="collapseExample">--}}


{{--                <form class="card p-2" action="{{ route('list_ING.search')}}" method="get">--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 m-0">--}}
{{--                            <label class="m-0">分類選擇</label>--}}
{{--                            <select class="form-control" name="Classification">--}}
{{--                                @foreach($classifications as $classification)--}}
{{--                                    <option--}}
{{--                                        value="{{$classification->ClassValue}}">{{$classification->ClassName}}</option>--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 m-0">--}}
{{--                            <div class="float-left">排序</div>--}}
{{--                            <br>--}}
{{--                            <select class="form-control" name="sort_by">--}}
{{--                                <option value="created_at">發布時間</option>--}}
{{--                                <option value="Pay">酬勞金額</option>--}}
{{--                                <option value="DateTime">面交時間</option>--}}
{{--                            </select>--}}

{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 form-group pb-2 m-0">--}}
{{--                            <div class="float-left">查詢</div>--}}
{{--                            <br>--}}
{{--                            <input type="text" class="form-control" name="keyword" laceholder="在此輸入關鍵字">--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 form-group pb-2 m-0">--}}
{{--                            <div class="float-left"></div>--}}
{{--                            <br>--}}
{{--                            <button type="submit" class="btn btn-primary btn-block">送出查詢</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}


{{--                </form>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tab-content" style="background-color:#EFEFEF;">--}}

{{--            <ul class="nav nav-tabs mt-3" id="pills-tab" role="tablist">--}}
{{--                <li class="nav-item col-6 pr-2 pr-md-2 pl-1" style="text-align:center;">--}}
{{--                    <a class="nav-link px-0 " data-toggle="pill" href="#pills-ing" role="tab"--}}
{{--                       aria-selected="true">執行中</a>--}}
{{--                </li>--}}
{{--                <li class="nav-item col-6 pr-0 pl-2" style="text-align:center;">--}}
{{--                    <a class="nav-link px-0" data-toggle="pill" href="#pills-fin" role="tab"--}}
{{--                       aria-selected="false">已完成</a>--}}
{{--                </li>--}}
{{--            </ul>--}}


{{--            <div class="tab-pane tab-pane fade" id="pills-ing">--}}
{{--                <div class="row mr-0" id="pills-ing">--}}
{{--                    @foreach($tasksING as $i)--}}
{{--                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-3 pr-0">--}}
{{--                            <a href="{{ route('task.detail', $i->Tasks_id)}}"--}}
{{--                               style="text-decoration:none;color:black">--}}
{{--                                <div style="border:1px #DFDFDF solid;background-color: #FFFFFF" data-toggle="modal" data-target=".content0">--}}
{{--                                    <div class="row pl-3">--}}
{{--                                        <div class="col-5 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">--}}
{{--                                            <div class=""--}}
{{--                                                 style="background-color:gray;position:absolute;top:0px;left:0px">--}}
{{--                                                <p class="m-0 p-1" style="color:white;">{{$i->StatusName}}</p>--}}
{{--                                            </div>--}}
{{--                                            @if($i->Classification == 'Food')--}}
{{--                                                <img src="{{asset('img/food.jpg')}}" class="img-fluid">--}}
{{--                                            @elseif($i->Classification == 'Stationery')--}}
{{--                                                <img src="{{asset('img/pen.jpg')}}" class="img-fluid">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}
{{--                                        <div class="col-7 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0 ">--}}
{{--                                            <div class="pl-1">--}}
{{--                                                <p class="m-0">{{$i->Title}}</p>--}}
{{--                                                <p class="m-0">--}}
{{--                                                    工具人：{{$i->toolmanname}}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="tab-pane tab-pane fade" id="pills-fin">--}}
{{--                <div class="row mr-0" id="pills-fin">--}}
{{--                    @foreach($tasksComplete as $i)--}}
{{--                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-3 pr-0">--}}
{{--                            <a href="{{ route('task.detail', $i->Tasks_id)}}" style="text-decoration:none;color:black">--}}
{{--                                <div style="border:1px #DFDFDF solid;background-color: #FFFFFF">--}}
{{--                                    <div class="row pl-3">--}}
{{--                                        <div class="col-5 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">--}}
{{--                                            <div class=""--}}
{{--                                                 style="background-color:gray;position:absolute;top:0px;left:0px">--}}
{{--                                                <p class="m-0 p-1" style="color:white;">{{$i->StatusName}}</p>--}}
{{--                                            </div>--}}
{{--                                            @if($i->Classification == 'Food')--}}
{{--                                                <img src="{{asset('img/food.jpg')}}" class="img-fluid">--}}
{{--                                            @elseif($i->Classification == 'Stationery')--}}
{{--                                                <img src="{{asset('img/pen.jpg')}}" class="img-fluid">--}}
{{--                                            @endif--}}
{{--                                        </div>--}}

{{--                                        <div class="col-7 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0 ">--}}

{{--                                            <div class="pl-1">--}}

{{--                                                <p class="m-0">{{$i->Title}}</p>--}}
{{--                                                <p class="m-0">--}}
{{--                                                    工具人：{{$i->toolmanname}}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}

{{--    <p class="fas fa-plus-circle fa-4x m-0 "--}}
{{--       style="background-color:white;position: fixed; bottom: 80px;right: 20px;border-radius:100%;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);"--}}
{{--       data-toggle="modal" data-target=".add"></p>--}}
{{--    <div class="modal fade add" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg">--}}
{{--            <div class="modal-content container">--}}
{{--                <h3 class="fas fa-times" style="color:#999999;position: absolute; top: 7px;right: 15px;"  data-toggle="modal" data-target=".add"></h3>--}}
{{--                <br>--}}
{{--                <hr class="mb-3" size="8px" align="center" width="100%" style="color:#999999;" >--}}
{{--                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="background-color:white;">--}}
{{--                    <form action="{{ route('task.add') }}" method="POST">--}}
{{--                        @csrf--}}
{{--                        <div class="row">--}}

{{--                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">分類選擇</label>--}}
{{--                                <select class="form-control" name="Classification">--}}
{{--                                    @foreach($classifications as $classification)--}}
{{--                                        @if($classification->ClassValue!="All")--}}
{{--                                            <option--}}
{{--                                                value="{{$classification->ClassValue}}">{{$classification->ClassName}}</option>--}}
{{--                                        @endif--}}
{{--                                    @endforeach--}}
{{--                                </select>--}}
{{--                            </div>--}}

{{--                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">標題</label>--}}
{{--                                <input type="text" class="form-control" placeholder="請在此輸入委託標題" name="Title" required>--}}
{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">購買物品(請詳細說明需求)</label>--}}
{{--                                <textarea rows="4" cols="50" class="form-control"--}}
{{--                                          placeholder="請輸入購買物品、委託細節或注意事項(Ex:是否要袋子、餐具..)" name="Content"></textarea>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="row">--}}

{{--                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">面交日期</label>--}}
{{--                                <input id="datepicker" readonly="true" width="100%" type="text" name="Date" required/>--}}
{{--                                <script>--}}
{{--                                    $('#datepicker').datepicker({--}}
{{--                                        uiLibrary: 'bootstrap4',--}}
{{--                                        format: 'yyyy-mm-dd'--}}
{{--                                    });--}}
{{--                                </script>--}}

{{--                            </div>--}}

{{--                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">面交時間</label>--}}
{{--                                <input id="timepicker" readonly="true" width="100%" type="text" name="Time" required/>--}}
{{--                                <script>--}}
{{--                                    $('#timepicker').timepicker({--}}
{{--                                        uiLibrary: 'bootstrap4'--}}
{{--                                    });--}}
{{--                                </script>--}}

{{--                            </div>--}}

{{--                        </div>--}}
{{--                        <div class="row">--}}

{{--                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">接單截止日期</label>--}}
{{--                                <input id="datepicker2" readonly="true" width="100%" name="DeadDate"/>--}}
{{--                                <script>--}}
{{--                                    $('#datepicker2').datepicker({--}}
{{--                                        uiLibrary: 'bootstrap4',--}}
{{--                                        format: 'yyyy-mm-dd'--}}
{{--                                    });--}}
{{--                                </script>--}}

{{--                            </div>--}}

{{--                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">接單截止時間</label>--}}
{{--                                <input id="timepicker2" readonly="true" width="100%" name="DeadTime"/>--}}
{{--                                <script>--}}
{{--                                    $('#timepicker2').timepicker({--}}
{{--                                        uiLibrary: 'bootstrap4'--}}
{{--                                    });--}}
{{--                                </script>--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">購買地點</label>--}}
{{--                                <input type="text" class="form-control" placeholder="請輸入購買地點(店名、地址)" name="BuyAddress"--}}
{{--                                       required></input>--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">面交地點</label>--}}
{{--                                <input type="text" class="form-control" placeholder="請輸入面交地點(EX:資訊樓4樓、正門校門口)"--}}
{{--                                       name="MeetAddress" required></input>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                <label class="m-0">酬勞金額</label>--}}
{{--                                <input type="number" onkeyup="value=value.replace(/[^\d]/g,'') " class="form-control"--}}
{{--                                       placeholder="請輸入酬勞金額(新台幣)" name="Pay" required></input>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="d-flex justify-content-center">--}}
{{--                            <div class="col-8 col-sm-8 col-md-6 col-lg-3 col-xl-3 p-0">--}}
{{--                                <button class="btn btn-primary btn-block form-group" type="submit"--}}
{{--                                        class="btn btn-primary btn-block">提出委託--}}
{{--                                </button>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </form>--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

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
