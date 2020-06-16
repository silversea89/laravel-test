@extends('layouts.app')

@section('content')

    <body style="background-color:#74D2E7;height:100%">
    <script src="script.js">
    </script>


    <div class="container pt-3 pb-0 pl-0 pr-0" style="background-color:#EFEFEF;height:100%">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="background-color:#EFEFEF;">

            <div class="d-flex justify-content-between">
                <h2 class="m-0">委託列表 (分類:{{$TitleClass}}/
                    排序:@if($orderBy=="created_at")發布時間@elseif($orderBy=="Pay")酬勞金額@elseif($orderBy=="DateTime")面交金額@endif/
                    關鍵字:{{$keyword}})</h2>
                <button class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                    <i class="fas fa-filter"></i>
                </button>
            </div>


            <div class="collapse" id="collapseExample">


                <form class="card p-2" action="{{ route('list.search')}}" method="get">

                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 m-0">
                            <label class="m-0">分類選擇</label>
                            <select class="form-control" name="Classification">
                                @foreach($classifications as $classification)
                                    <option
                                        value="{{$classification->ClassValue}}">{{$classification->ClassName}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 m-0">
                            <div class="float-left">排序</div>
                            <br>
                            <select class="form-control" name="sort_by">
                                <option value="created_at">發布時間</option>
                                <option value="Pay">酬勞金額</option>
                                <option value="DateTime">面交時間</option>
                            </select>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9 form-group pb-2 m-0">
                            <div class="float-left">查詢</div>
                            <br>
                            <input type="text" class="form-control" name="keyword" laceholder="在此輸入關鍵字">
                        </div>
                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3 form-group pb-2 m-0">
                            <div class="float-left"></div>
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">送出查詢</button>
                        </div>
                    </div>


                </form>

            </div>


        </div>

        <!--
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".content0">Extra large modal</button>
          -->
        @foreach($tasks as $i)
            <div class="modal fade content{{$i->Tasks_id}}" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content container">
                        <h3 class="fas fa-times" style="color:#999999;position: absolute; top: 7px;right: 15px;"  data-toggle="modal" data-target=".content{{$i->Tasks_id}}"></h3>
                        <br>
                        <hr class="mb-3" size="8px" align="center" width="100%" style="color:#999999;" >
                        <div class="row p-2 ">
                            <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pr-0 pl-0">
                                @if($i->Classification == 'Food')
                                    <img src="{{asset('img/food.jpg')}}" class="img-fluid pr-0">
                                @elseif($i->Classification == 'Stationery')
                                    <img src="{{asset('img/pen.jpg')}}" class="img-fluid pr-0">
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 pt-1">

                                @if($i->Student_id!=$id)
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target=".contentReport{{$i->Tasks_id}}"
                                            style="position: absolute; top: 5px;right: 5px;">檢舉
                                    </button>
                                    <div class="modal fade contentReport{{$i->Tasks_id}}" tabindex="-1" role="dialog"
                                         aria-hidden="true">
                                        <div class="modal-dialog modal-md px-2"
                                             style="height:100%;display: flex; flex-direction: column;justify-content: center;text-align: center;">
                                            <div class="modal-content container">
                                                <h3 class="fas fa-times"
                                                    style="color:#999999;position: absolute; top: 7px;right: 15px;"
                                                    data-toggle="modal"
                                                    data-target=".contentReport{{$i->Tasks_id}}"></h3>
                                                <br>
                                                <hr class="mb-3" size="8px" align="center" width="100%"
                                                    style="color:#999999;">
                                                <form method="post" action="{{ route('report.add')}}">
                                                    @csrf
                                                    <input type="hidden" name="tasks_id" value={{$i->Tasks_id}}>
                                                    <input type="hidden" name="Title" value={{$i->Title}}>
                                                    <center>
                                                        <div class="form-group">
                                                            <textarea class="form-control" id="" rows="5" name="reason"
                                                                      placeholder="檢舉原因..."></textarea>
                                                        </div>
                                                        <button type="submit" class="btn btn-danger my-0 mb-3">確認檢舉
                                                        </button>
                                                    </center>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
                                <p class="m-0">老闆:<a href="{{ route('profile.id',$i->Student_id) }}">{{$i->name}}</a></p>
                                <p class="m-0">發佈於:{{$i->created_at}}</p>
                                <p class="m-0">接單截止期限：{{$i->DeadDateTime}}</p>
                                @if($i->Student_id!=$id)
                                    <form method="POST" action="{{ route('task.get') }}">
                                        @csrf
                                        <input type="hidden" name="tasks_id" value="{{$i->Tasks_id}}">
                                        <button type="submit" class="btn btn-primary my-3">接受委託</button>
                                    </form>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @endforeach
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="background-color:#EFEFEF;">
            <div class="row mr-0">
                @foreach($tasks as $i)
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-3 pr-0">

                        <div style="background-color:white;border:1px #DFDFDF solid;" data-toggle="modal"
                             data-target=".content{{$i->Tasks_id}}">

                            <div class="row pl-3">

                                <div class="col-5 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                                    @if($i->Classification == 'Food')
                                        <img src="{{asset('img/food.jpg')}}" class="img-fluid">
                                    @elseif($i->Classification == 'Stationery')
                                        <img src="{{asset('img/pen.jpg')}}" class="img-fluid">
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

    </div>

    <p class="fas fa-plus-circle fa-4x m-0 "
       style="background-color:white;position: fixed; bottom: 80px;right: 20px;border-radius:100%;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);"
       data-toggle="modal" data-target=".add"></p>
    <div class="modal fade add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content container">
                <h3 class="fas fa-times" style="color:#999999;position: absolute; top: 7px;right: 15px;"  data-toggle="modal" data-target=".add"></h3>
                <br>
                <hr class="mb-3" size="8px" align="center" width="100%" style="color:#999999;" >
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="background-color:white;">
                    <form action="{{ route('task.add') }}" method="POST">
                        @csrf
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">分類選擇</label>
                                <select class="form-control" name="Classification">
                                    @foreach($classifications as $classification)
                                        <option
                                            value="{{$classification->ClassValue}}">{{$classification->ClassName}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">標題</label>
                                <input type="text" class="form-control" placeholder="請在此輸入委託標題" name="Title" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">購買物品(請詳細說明需求)</label>
                                <textarea rows="4" cols="50" class="form-control"
                                          placeholder="請輸入購買物品、委託細節或注意事項(Ex:是否要袋子、餐具..)" name="Content"></textarea>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">面交日期</label>
                                <input id="datepicker" readonly="true" width="100%" type="text" name="Date" required/>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4',
                                        format: 'yyyy-mm-dd'
                                    });
                                </script>

                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">面交時間</label>
                                <input id="timepicker" readonly="true" width="100%" type="text" name="Time" required/>
                                <script>
                                    $('#timepicker').timepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>

                            </div>

                        </div>
                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">接單截止日期</label>
                                <input id="datepicker2" readonly="true" width="100%" name="DeadDate"/>
                                <script>
                                    $('#datepicker2').datepicker({
                                        uiLibrary: 'bootstrap4',
                                        format: 'yyyy-mm-dd'
                                    });
                                </script>

                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">接單截止時間</label>
                                <input id="timepicker2" readonly="true" width="100%" name="DeadTime" required/>
                                <script>
                                    $('#timepicker2').timepicker({
                                        uiLibrary: 'bootstrap4'
                                    });
                                </script>

                            </div>

                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">購買地點</label>
                                <input type="text" class="form-control" placeholder="請輸入購買地點(店名、地址)" name="BuyAddress"
                                       required></input>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">面交地點</label>
                                <input type="text" class="form-control" placeholder="請輸入面交地點(EX:資訊樓4樓、正門校門口)"
                                       name="MeetAddress" required></input>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">酬勞金額</label>
                                <input type="number" onkeyup="value=value.replace(/[^\d]/g,'') " class="form-control"
                                       placeholder="請輸入酬勞金額(新台幣)" name="Pay" required></input>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="col-8 col-sm-8 col-md-6 col-lg-3 col-xl-3 p-0">
                                <button class="btn btn-primary btn-block form-group" type="submit"
                                        class="btn btn-primary btn-block">提出委託
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    @endsection

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


