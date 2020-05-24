@extends('layouts.app')

@section('content')
<body style="background-color:#FFFFFF;height:100%">
<script src="script.js">
</script>


<div class="modal fade content0" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-md" style="height:100%;display: flex; flex-direction: column;justify-content: center;text-align: center;">
        <div class="modal-content container">
            <form>
                <center>
                    <div class="rate pl-0 mt-1">
                        <input type="radio" id="star5" name="rate" value="5" />
                        <label class="mr-2" for="star5" title="text"><i  class="fas fa-star" ></i></label>
                        <input type="radio" id="star4" name="rate" value="4" />
                        <label class="mr-2" for="star4" title="text"><i  class="fas fa-star" ></i></label>
                        <input type="radio" id="star3" name="rate" value="3" checked="true"/>
                        <label class="mr-2" for="star3" title="text"><i  class="fas fa-star" ></i></label>
                        <input type="radio" id="star2" name="rate" value="2" />
                        <label class="mr-2" for="star2" title="text"><i  class="fas fa-star" ></i></label>
                        <input type="radio" id="star1" name="rate" value="1" />
                        <label class="mr-2" for="star1" title="text"><i  class="fas fa-star" ></i></label>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="" rows="5" placeholder="給個評論吧..."></textarea>
                    </div>
                    <form method="post" action="{{ route('task.complete', $tasks->tasks_id) }}">
                        @csrf
                        <input type="hidden" name="tasks_id" value="{{$tasks->tasks_id}}">
                        <button type="submit" class="btn btn-primary my-0 mb-3">確認送出</button>
                    </form>
                </center>
            </form>


        </div>
    </div>
</div>

<div class="container pt-3 pb-0 " style="background-color:white;">
    <h1>進度:{{$tasks->Progress}}</h1>
    <div class="" style="position:relative;">
        <h3>委託編號：{{$tasks->tasks_id}}</h3>
        @if($tasks->toolman_id==null)
            <h3>工具人：尚無工具人</h3>
            <div class="row  my-3">
                <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                <center class="col col-sm-1 p-0">
                    <h1 class="far fa-circle m-0 text-secondary" ></h1>
                    <h6>去程</h6>
                </center>
                <center class="col p-0">
                    <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                </center>
                <center class="col col-sm-1 p-0">
                    <h1 class="far fa-circle m-0 text-secondary"></h1>
                    <h6>回程</h6>
                </center>
                <center class="col p-0">
                    <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                </center>
                <center class="col col-sm-1 p-0">
                    <h1 class="far fa-circle m-0 text-secondary"></h1>
                    <h6>抵達</h6>
                </center>
                <center class="col p-0">
                    <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                </center>
                <center class="col col-sm-1 p-0">
                    <h1 class="far fa-circle m-0 text-secondary"></h1>
                    <h6>結案</h6>
                </center>
                <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                <!--
                  background-color:blue
                  background-color:red
                  background-color:green
                -->
            </div>
        @else
        <h3>工具人：<a href="/profile.html">{{$tasks->toolmanname}}</a></h3>
            @if($id==$tasks->toolman_id)
                <div class="btn-group" style="position:absolute;top:0px;right:0px">
                    @if($tasks->Progress==null)
                        <input type="hidden" name="Progress" value="{{$tasks->Progress}}">
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target=".statusReport">
                            開始執行
                        </button>
                    @else
                        <input type="hidden" name="Progress" value="{{$tasks->Progress}}">
                        <button type="button" class="btn btn-primary"  data-toggle="modal" data-target=".statusReport">
                            下一階段
                        </button>
                    @endif

            </div>
                <div class="row  my-3">
                    <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                    <center class="col col-sm-1 p-0">
                        @if($tasks->Progress==null)
                        <h1 class="far fa-circle m-0 text-secondary"></h1>
                        @else
                        <h1 class="fas fa-circle m-0 text-success"></h1>
                        @endif
                        <h6>去程</h6>
                    </center>
                    <center class="col p-0">
                        <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                    </center>
                    <center class="col col-sm-1 p-0">
                        @if($tasks->Progress==null||$tasks->Progress=="go")
                            <h1 class="far fa-circle m-0 text-secondary"></h1>
                        @else
                            <h1 class="fas fa-circle m-0 text-success"></h1>
                        @endif
                        <h6>回程</h6>
                    </center>
                    <center class="col p-0">
                        <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                    </center>
                    <center class="col col-sm-1 p-0">
                        @if($tasks->Progress==null||$tasks->Progress=="go"||$tasks->Progress=="back")
                            <h1 class="far fa-circle m-0 text-secondary"></h1>
                        @else
                            <h1 class="fas fa-circle m-0 text-success"></h1>
                        @endif
                        <h6>抵達</h6>
                    </center>
                    <center class="col p-0">
                        <h1 class="fas fa-arrow-right m-0 text-secondary"></h1>
                    </center>
                    <center class="col col-sm-1 p-0">
                        @if($tasks->Progress!="complete")
                            <h1 class="far fa-circle m-0 text-secondary"></h1>
                        @else
                            <h1 class="fas fa-circle m-0 text-success"></h1>
                        @endif
                        <h6>結案</h6>
                    </center>
                    <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                    <!--
                      background-color:blue
                      background-color:red
                      background-color:green
                    -->
                </div>
            @elseif($id==$tasks->student_id)
                <div class="row  my-3">
                    <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
                    <center class="col-2 col-sm-1 p-0">
                        <h1 class="far fa-circle m-0"></h1>
                        <h6>去程</h6>
                    </center>
                    <center class="col p-0">
                        <h1 class="fas fa-arrow-right m-0"></h1>
                    </center>
                    <center class="col-2 col-sm-1 p-0">
                        <h1 class="far fa-circle m-0"></h1>
                        <h6>回程</h6>
                    </center>
                    <center class="col p-0">
                        <h1 class="fas fa-arrow-right m-0"></h1>
                    </center>
                    <center class="col-2 col-sm-1 p-0">
                        <h1 class="far fa-circle m-0"></h1>
                        <h6>抵達</h6>
                    </center>
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
                <img src="{{asset('img/food.jpg')}}" class="img-fluid pr-0" >
            </div>
            <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 pt-3 pt-md-0 pl-5 pr-3 pl-md-5">
            <h3>{{$tasks->Title}}</h3>
            <span class="badge badge-primary">代購物品</span>
            <h5>委託內容：<p>{{$tasks->content}}</p></h5>
            <h5>購買地點：<p>{{$tasks->BuyAddress}}</p></h5>
            <h5>面交地點：<p>{{$tasks->MeetAddress}}</p></h5>
            <h5>面交時間：<p>{{$tasks->DateTime}}</p></h5>
            <h5>酬勞金額：<p>{{$tasks->Pay}}$</p></h5>
            <p class="m-0">老闆:<a href="#">{{$tasks->hostname}}</a></p>
            <p class="m-0">發佈於:{{$tasks->created_at}}</p>
                @if($tasks->toolman_id==null)
            <p class="m-0">接單截止期限：{{$tasks->DeadDateTime}}</p>
                @endif

            @if($tasks->toolman_id==null||$tasks->Progress!="complete")

            @else
                <div class="d-flex justify-content-center justify-content-md-start" style="width:100%">
                    <button type="button" class="btn btn-primary mt-2 mb-3"  data-toggle="modal" data-target=".content0">委託完成</button>
                </div>
            @endif
        </div>
    </div>
</div>
<div class="modal fade statusReport" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-md" style="height:100%;display: flex; flex-direction: column;justify-content: center;text-align: center;">
        <div class="modal-content container">
            <form>
                <center class="my-3">
                    <h1 class="fas fa-exclamation-triangle" style="color:orange"></h1>
                    @if($tasks->Progress==null)
                        <h3>是否要開始執行委託？</h3>
                    @else
                        <h3>是否進入下一個流程？</h3>
                    @endif
                    <div class="row">
                        <div class="col-6 pl-3 pr-2">
                            <form method="post" action="{{ route('taskprogress', $tasks->tasks_id) }}">
                                @csrf
                                <input type="hidden" name="Progress" value="{{$tasks->Progress}}">
                                <button type="submit" class="btn btn-block btn-success">是</button>
                            </form>
                        </div>
                        <div class="col-6 pl-2 pr-3">
                            <button type="button" class="btn btn-block btn-danger" data-toggle="modal" data-target=".statusReport">否</button>
                        </div>
                    </div>
                </center>
            </form>


        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
@endsection
