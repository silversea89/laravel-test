@extends('layouts.app')

@section('content')
    <body style="background-color:#FFFFFF;">
    <script src="script.js">
    </script>

    <div class="container pt-3 pb-0 pl-0 pr-0" style="background-color:white;">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color:white;">
            <div class="d-flex justify-content-between">
                <h1 class="m-0">接受的委託-全部</h1>
                <button class="btn btn-primary"  data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
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

        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 tab-content" style="background-color:white;">

            <ul class="nav nav-tabs mt-3" id="pills-tab" role="tablist">
                <li class="nav-item col-3 pr-2 pr-md-3 pl-0" style="text-align:center;">
                    <a class="nav-link active px-0" data-toggle="pill" href="#pills-all" role="tab" aria-selected="true">全部</a>
                </li>
                <li class="nav-item col-3 pr-2 pr-md-2 pl-1" style="text-align:center;">
                    <a class="nav-link px-0" data-toggle="pill" href="#pills-ing" role="tab" aria-selected="false">執行中</a>
                </li>
                <li class="nav-item col-3 pr-0 pl-2" style="text-align:center;">
                    <a class="nav-link px-0" data-toggle="pill" href="#pills-fin" role="tab" aria-selected="false">已完成</a>
                </li>
            </ul>
            <div class="tab-pane fade show active" id="pills-all"  >
                <div class="row mr-0">
                    @foreach($tasksall as $i)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-3 pr-0" >
                            <a href="{{ route('task.detail', $i->tasks_id)}}" style="text-decoration:none;color:black">
                                <div style="border:1px #DFDFDF solid;"  data-toggle="modal" > <!--data-target=".content0"-->
                                    <div class="row pl-3" >
                                        <div class="col-5 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                                            <div class="" style="background-color:gray;position:absolute;top:0px;left:0px">
                                                <p class="m-0 p-1" style="color:white;">{{$i->StatusName}}</p>
                                            </div>
                                            <img src="{{asset('img/food.jpg')}}" class="img-fluid" >
                                        </div>
                                        <div class="col-7 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0 " >
                                            <div class="pl-1" >
                                                <p class="m-0">{{$i->Title}}</p>
                                                <p class="m-0">
                                                    工具人：{{$i->toolmanname}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>

            <div class="tab-pane tab-pane fade" id="pills-ing"  >
                <div class="row mr-0" id="pills-ing">
                    @foreach($tasksING as $i)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-3 pr-0" >
                            <a href="{{ route('task.detail', $i->tasks_id)}}" style="text-decoration:none;color:black">
                            <div style="border:1px #DFDFDF solid;"  data-toggle="modal" data-target=".content0">
                                <div class="row pl-3" >
                                    <div class="col-5 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                                        <div class="" style="background-color:gray;position:absolute;top:0px;left:0px">
                                            <p class="m-0 p-1" style="color:white;">{{$i->StatusName}}</p>
                                        </div>
                                        <img src="{{asset('img/food.jpg')}}" class="img-fluid" >
                                    </div>
                                    <div class="col-7 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0 " >
                                        <div class="pl-1" >
                                            <p class="m-0">{{$i->Title}}</p>
                                            <p class="m-0">
                                                工具人：{{$i->toolmanname}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="tab-pane tab-pane fade" id="pills-fin"  >
                <div class="row mr-0" id="pills-fin">
                    @foreach($tasksComplete as $i)
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 mt-3 pr-0" >

                            <div style="border:1px #DFDFDF solid;">

                                <div class="row pl-3" >

                                    <div class="col-5 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0">
                                        <div class="" style="background-color:gray;position:absolute;top:0px;left:0px">
                                            <p class="m-0 p-1" style="color:white;">{{$i->StatusName}}</p>
                                        </div>
                                        <img src="{{asset('img/food.jpg')}}" class="img-fluid" >
                                    </div>

                                    <div class="col-7 col-sm-12 col-md-12 col-lg-12 col-xl-12 pl-0 " >

                                        <div class="pl-1" >

                                            <p class="m-0">{{$i->Title}}</p>
                                            <p class="m-0">
                                                工具人：{{$i->toolmanname}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>

    </div>

    <p class="fas fa-plus-circle fa-4x m-0 "
       style="background-color:white;position: fixed; bottom: 20px;right: 20px;border-radius:100%;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);"
       type="button" data-toggle="modal" data-target=".add"></p>
    <div class="modal fade add" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content container">

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
                                <label class="m-0">日期</label>
                                <input id="datepicker" readonly="true" width="100%" type="text" name="Date" required/>
                                <script>
                                    $('#datepicker').datepicker({
                                        uiLibrary: 'bootstrap4',
                                        format: 'yyyy-mm-dd'
                                    });
                                </script>

                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                <label class="m-0">時間</label>
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
                                <input id="timepicker2" readonly="true" width="100%" name="DeadTime"/>
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

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    </body>
@endsection
