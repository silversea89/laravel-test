@extends('layouts.app')

@section('content')
    <body class="height100vh antiFlow bg-darker">
    <script src="script.js">
    </script>

    <div class="modal fade content0" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md"
             style="height:100%;display: flex; flex-direction: column;justify-content: center;text-align: center;">
            <div class="modal-content container">
                <form method="post" action="{{ route('task.complete')}}">
                    @csrf
                    <input type="hidden" name="tasks_id" value={{$tasks->Tasks_id}}>
                    <center>
                        <div class="rate pl-0 mt-1">
                            <input type="radio" id="star5" @if($id==$tasks->Student_id) name="toolman_rate"
                                   @elseif($id==$tasks->Toolman_id) @endif name="host_rate" value="5"/>
                            <label class="mr-2" for="star5" title="text"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star4" @if($id==$tasks->Student_id) name="toolman_rate"
                                   @elseif($id==$tasks->Toolman_id) @endif name="host_rate" value="4"/>
                            <label class="mr-2" for="star4" title="text"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star3" @if($id==$tasks->Student_id) name="toolman_rate"
                                   @elseif($id==$tasks->Toolman_id) @endif name="host_rate" value="3"/>
                            <label class="mr-2" for="star3" title="text"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star2" @if($id==$tasks->Student_id) name="toolman_rate"
                                   @elseif($id==$tasks->Toolman_id) @endif name="host_rate" value="2"/>
                            <label class="mr-2" for="star2" title="text"><i class="fas fa-star"></i></label>
                            <input type="radio" id="star1" @if($id==$tasks->Student_id) name="toolman_rate"
                                   @elseif($id==$tasks->Toolman_id) @endif name="host_rate" value="1"/>
                            <label class="mr-2" for="star1" title="text"><i class="fas fa-star"></i></label>
                        </div>
                        <div class="form-group">
                            <textarea @if($id==$tasks->Student_id) name="toolman_comment"
                                      @elseif($id==$tasks->Toolman_id) name="host_comment" @endif class="form-control"
                                      id="" rows="5" placeholder="請留下評語，最多40字" maxlength="40"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary my-0 mb-3">確認送出</button>
                    </center>
                </form>
            </div>
        </div>
    </div>

    <div class="container pt-3 pb-0 ">

        <div class="" style="position:relative;">
            <h3 class="font-white">委託編號：{{$tasks->Tasks_id}}</h3>
            @if($tasks->Toolman_id==null)
                <h3 class="font-white">工具人：尚無工具人</h3>
                @if($id!=$tasks->Toolman_id)
                    <div class="btn-group" style="position:absolute;top:0px;right:0px">
                        <button type="button" class="btn btn-orange" data-toggle="modal" data-target=".volunteer">
                        <span class="badge badge-pill badge-danger"
                              style="position:absolute;top:-10px;left:-10px">{{$vol_count}}</span>
                            接單請求
                        </button>
                    </div>
                @endif
                <div class="row  my-3">
                    <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                    <center class="col col-sm-1 p-0">
                        <h1 class="far fa-circle m-0 text-secondary"></h1>
                        <h6 class="font-white">去程</h6>
                    </center>
                    <center class="col p-0">
                        <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                    </center>
                    <center class="col col-sm-1 p-0">
                        <h1 class="far fa-circle m-0 text-secondary"></h1>
                        <h6 class="font-white">回程</h6>
                    </center>
                    <center class="col p-0">
                        <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                    </center>
                    <center class="col col-sm-1 p-0">
                        <h1 class="far fa-circle m-0 text-secondary"></h1>
                        <h6 class="font-white">抵達</h6>
                    </center>
                    <center class="col p-0">
                        <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                    </center>
                    <center class="col col-sm-1 p-0">
                        <h1 class="far fa-circle m-0 text-secondary"></h1>
                        <h6 class="font-white">結案</h6>
                    </center>
                    <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                </div>
            @else
                <h3 class="font-white">工具人：<a
                        href="{{ route('profile.id', $tasks->Toolman_id   ) }}">{{$tasks->toolmanname}}</a></h3>
                @if($id==$tasks->Toolman_id)
                    <div class="btn-group" style="position:absolute;top:0px;right:0px">
                        @if($tasks->Progress==null)
                            <input type="hidden" name="Progress" value="{{$tasks->Progress}}">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".statusReport">
                                開始執行
                            </button>
                        @elseif($tasks->Progress=="complete")

                        @else
                            <input type="hidden" name="Progress" value="{{$tasks->Progress}}">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target=".statusReport">
                                下一階段
                            </button>
                        @endif

                    </div>
                    @if($id!=$tasks->Toolman_id)
                        <div class="btn-group" style="position:absolute;top:0px;right:0px">
                            <button type="button" class="btn btn-orange" data-toggle="modal"
                                    data-target=".volunteer">
                            <span class="badge badge-pill badge-danger"
                                  style="position:absolute;top:-10px;left:-10px">{{$vol_count}}</span>
                                接單請求
                            </button>
                        </div>
                    @endif
                    <div class="row  my-3">
                        <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                        @if($tasks->Progress==null)
                            <center class="col col-sm-1 p-0">
                                <h1 class="far fa-circle m-0 text-secondary"></h1>
                                <h6 class="font-white">去程</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                            </center>
                        @else
                            <center class="col col-sm-1 p-0">
                                <h1 class="fas fa-circle m-0 text-success"></h1>
                                <h6 class="font-white">去程</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-success"></h1>
                            </center>
                        @endif


                        @if($tasks->Progress==null||$tasks->Progress=="go")
                            <center class="col col-sm-1 p-0">
                                <h1 class="far fa-circle m-0 text-secondary"></h1>
                                <h6 class="font-white">回程</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                            </center>
                        @else
                            <center class="col col-sm-1 p-0">
                                <h1 class="fas fa-circle m-0 text-success"></h1>
                                <h6 class="font-white">回程</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-success"></h1>
                            </center>
                        @endif



                        @if($tasks->Progress==null||$tasks->Progress=="go"||$tasks->Progress=="back")
                            <center class="col col-sm-1 p-0">
                                <h1 class="far fa-circle m-0 text-secondary"></h1>
                                <h6 class="font-white">抵達</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                            </center>
                        @else
                            <center class="col col-sm-1 p-0">
                                <h1 class="fas fa-circle m-0 text-success"></h1>
                                <h6 class="font-white">抵達</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-success"></h1>
                            </center>
                        @endif


                        @if($tasks->Progress!="complete")
                            <center class="col col-sm-1 p-0">
                                <h1 class="far fa-circle m-0 text-secondary"></h1>
                                <h6 class="font-white">結案</h6>
                            </center>
                        @else
                            <center class="col col-sm-1 p-0">
                                <h1 class="fas fa-circle m-0 text-success"></h1>
                                <h6 class="font-white">結案</h6>
                            </center>
                        @endif

                        <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                        <!--
                          background-color:blue
                          background-color:red
                          background-color:green
                        -->
                    </div>
                @elseif($id==$tasks->Student_id)
                    <div class="row  my-3">
                        <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                        @if($tasks->Progress==null)
                            <center class="col col-sm-1 p-0">
                                <h1 class="far fa-circle m-0 text-secondary"></h1>
                                <h6 class="font-white">去程</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                            </center>
                        @else
                            <center class="col col-sm-1 p-0">
                                <h1 class="fas fa-circle m-0 text-success"></h1>
                                <h6 class="font-white">去程</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-success"></h1>
                            </center>
                        @endif


                        @if($tasks->Progress==null||$tasks->Progress=="go")
                            <center class="col col-sm-1 p-0">
                                <h1 class="far fa-circle m-0 text-secondary"></h1>
                                <h6 class="font-white">回程</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                            </center>
                        @else
                            <center class="col col-sm-1 p-0">
                                <h1 class="fas fa-circle m-0 text-success"></h1>
                                <h6 class="font-white">回程</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-success"></h1>
                            </center>
                        @endif

                        @if($tasks->Progress==null||$tasks->Progress=="go"||$tasks->Progress=="back")
                            <center class="col col-sm-1 p-0">
                                <h1 class="far fa-circle m-0 text-secondary"></h1>
                                <h6 class="font-white">抵達</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                            </center>
                        @else
                            <center class="col col-sm-1 p-0">
                                <h1 class="fas fa-circle m-0 text-success"></h1>
                                <h6 class="font-white">抵達</h6>
                            </center>
                            <center class="col p-0">
                                <h1 class="fas fa-arrow-right m-0 text-success"></h1>

                            </center>
                        @endif


                        @if($tasks->Progress!="complete")
                            <center class="col col-sm-1 p-0">
                                <h1 class="far fa-circle m-0 text-secondary"></h1>
                                <h6 class="font-white">結案</h6>
                            </center>
                        @else
                            <center class="col col-sm-1 p-0">
                                <h1 class="fas fa-circle m-0 text-success"></h1>
                                <h6 class="font-white">結案</h6>
                            </center>
                        @endif

                        <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                        <!--
                          background-color:blue
                          background-color:red
                          background-color:green
                        -->
                    </div>
                @endif
            @endif

        </div>
        <div class="row ">
            <div class="row ">
                <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pr-0 pl-0">
                    @if($tasks->Classification == 'Food')
                        <img src="{{asset('img/food.jpg')}}" class="img-fluid pr-0">
                    @elseif($tasks->Classification == 'Stationery')
                        <img src="{{asset('img/pen.jpg')}}" class="img-fluid pr-0">
                    @endif
                </div>
                <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 pt-3 pt-md-0 pl-5 pr-3 pl-md-5">
                    <h3 class="font-white">{{$tasks->Title}}</h3>
                    <span class="badge badge-primary">代購物品</span>
                    <h5 class="font-white">委託內容：<p class="font-white">{{$tasks->Content}}</p></h5>
                    <h5 class="font-white">購買地點：<p class="font-white">{{$tasks->BuyAddress}}</p></h5>
                    <h5 class="font-white">面交地點：<p class="font-white">{{$tasks->MeetAddress}}</p></h5>
                    <h5 class="font-white">面交時間：<p class="font-white">{{$tasks->DateTime}}</p></h5>
                    <h5 class="font-white">酬勞金額：<p class="font-white">{{$tasks->Pay}}$</p></h5>
                    <p class="m-0 font-white">雇主:
                        <a href="{{ route('profile.id', $tasks->Student_id) }}">{{$tasks->hostname}}</a>
                    </p>
                    <p class="m-0 font-white">發佈於:{{$tasks->created_at}}</p>
                    @if($tasks->Toolman_id==null)
                        <p class="font-white" class="m-0">接單截止期限：{{$tasks->DeadDateTime}}</p>
                    @endif
                    @if($tasks->Toolman_id==null||$tasks->Progress!="complete")

                    @else
                        @if( ($tasks->Student_id==$id && $evaluation->Toolman_Rate==null) || ($tasks->Toolman_id==$id && $evaluation->Host_Rate==null))
                            <div class="d-flex justify-content-center justify-content-md-start" style="width:100%">
                                <button type="button" class="btn btn-primary mt-2 mb-3" data-toggle="modal"
                                        data-target=".content0">委託完成
                                </button>
                            </div>
                        @else

                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade " tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md"
             style="height:100%;display: flex; flex-direction: column;justify-content: center;text-align: center;">
            <div class="modal-content container bg-dark">
                <h3 class="fas fa-times" style="color:#999999;position: absolute; top: 7px;right: 15px;"
                    data-toggle="modal" data-target=".statusReport"></h3>
                <br>
                <hr class="mb-1" size="8px" align="center" width="100%" style="color:#999999;">
                @if($volunteer!=null)
                    @foreach($volunteer as $i)
                        <form method="post" action="{{ route('task.get')}}">
                            @csrf
                            <div class="d-flex justify-content-between">
                                <a href="{{ route('profile.id', $i->Student_id)}}"><h4 class="m-0 p-2">{{$i->Name}}</h4>
                                </a>
                                <input type="hidden" name="Toolman_id" value="{{$i->Student_id}}">
                                <input type="hidden" name="tasks_id" value="{{$i->Tasks_id}}">
                                <button type="submit" class="btn btn-orange">選擇</button>
                            </div>
                        </form>
                        <hr class="my-1" size="8px" align="center" width="100%" style="color:#999999;">
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade statusReport" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md"
             style="height:100%;display: flex; flex-direction: column;justify-content: center;text-align: center;">
            <div class="modal-content container">
                <form method="post" action="{{ route('taskprogress', $tasks->Tasks_id) }}">
                    @csrf
                    <center class="my-3">
                        <h1 class="fas fa-exclamation-triangle" style="color:orange"></h1>
                        @if($tasks->Progress==null)
                            <h3>是否要開始執行委託？</h3>
                        @elseif($tasks->Progress=="arrive")
                            <h3>是否已與雇主交易完成？</h3>
                        @else
                            <h3>是否進入下一階段？</h3>
                        @endif
                        <div class="row">
                            <div class="col-6 pl-3 pr-2">
                                <input type="hidden" name="Progress" value="{{$tasks->Progress}}">
                                <button type="submit" class="btn btn-block btn-success">是</button>
                            </div>
                            <div class="col-6 pl-2 pr-3">
                                <button type="button" class="btn btn-block btn-danger" data-toggle="modal"
                                        data-target=".statusReport">否
                                </button>
                            </div>
                        </div>
                    </center>
                </form>


            </div>
        </div>
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
