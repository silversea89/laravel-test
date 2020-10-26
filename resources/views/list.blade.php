@extends('layouts.app')

@section('content')

    <body class="height100vh antiFlow bg-darker">
    <div class="container" style="height: 100%">
        <div class="row">
            <div class="col-12 mt-3">
                <div class="row">
                    <form class="width100p" action="{{ route('list')}}" method="get">
                        <div class="input-group width100p px-sm-2">
                            <input type="text" class="form-control font-white bg-grey " name="keyword"
                                   placeholder="在此輸入關鍵字" value={{$keyword}}>
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
                        @include('flash-message')
                        <h3 class="mb-0 mt-2 pl-2 pl-md-0 font-white">所有委託</h3>
                            <ul class="nav mb-2 mt-1" id="evaluate">
                                <li class="nav-item col-3 p-0 m-0">
                                    <form action="{{ route('list')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="order" value="newest">
                                        <input type="hidden" name="keyword" value={{$keyword}}>
                                        @if($order=="newest" or $order==null)
                                            <button class="nav-link btn-block tab active px-0 m-0" type="submit">最新</button>
                                        @else
                                            <button class="nav-link btn-block tab px-0 m-0" type="submit">最新</button>
                                        @endif
                                    </form>
                                </li>
                                <li class="nav-item col-3 p-0 m-0">
                                    <form action="{{ route('list')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="order" value="exp">
                                        <input type="hidden" name="keyword" value={{$keyword}}>
                                        @if($order=="exp")
                                            <button class="nav-link btn-block tab active px-0 m-0" type="submit">最有經驗</button>
                                        @else
                                            <button class="nav-link btn-block tab px-0 m-0" type="submit">最有經驗</button>
                                        @endif
                                    </form>
                                </li>
                                <li class="nav-item col-3 p-0 m-0">
                                    <form action="{{ route('list')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="order" value="eva">
                                        <input type="hidden" name="keyword" value={{$keyword}}>
                                        @if($order=="eva")
                                            <button class="nav-link btn-block tab active px-0 m-0" type="submit">最有信譽</button>
                                        @else
                                            <button class="nav-link btn-block tab px-0 m-0" type="submit">最有信譽</button>
                                        @endif
                                    </form>
                                </li>
                                <li class="nav-item col-3 p-0 m-0">
                                    <form action="{{ route('list')}}" method="get">
                                        @csrf
                                        <input type="hidden" name="order" value="price">
                                        <input type="hidden" name="keyword" value={{$keyword}}>
                                        @if($order=="price")
                                            <button class="nav-link btn-block tab px-0 m-0 active" type="submit">價格<i
                                                    class="fas fa-sort-amount-up"></i></button>
                                        @else
                                            <button class="nav-link btn-block tab px-0 m-0" type="submit">價格<i
                                                    class="fas fa-sort-amount-up"></i></button>
                                        @endif
                                    </form>
                                </li>
                            </ul>
                    </div>

                    <div class="col-12">
                        <div class="row">
                            <!-- 這個才是完整版~ -->
                            @foreach($tasks as $i)
                                <div class="col-6 col-lg-4 col-xl-3 p-1">
                                    <div class="height100p p-0 bg-dark">
                                        <div data-toggle="modal" data-target="#missionCard{{$i->Tasks_id}}">
                                            <div class="div-square">
                                                @if($i->Classification == 'Food')
                                                    <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                                         src="{{asset('img/food.jpg')}}">
                                                @elseif($i->Classification == 'Stationery')
                                                    <img class="div-square-content img-fluid hwAuto pt-1 px-1"
                                                         src="{{asset('img/pen.jpg')}}">
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
                            <center class="width100p mt-3">
{{--                                <nav>--}}
{{--                                    <ul class="pagination justify-content-center">--}}
{{--                                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span--}}
{{--                                                    aria-hidden="true">&laquo;</span></a></li>--}}
{{--                                        <li class="page-item"><a class="page-link active" href="#">1</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span--}}
{{--                                                    aria-hidden="true">&raquo;</span></a></li>--}}
{{--                                    </ul>--}}
{{--                                </nav>--}}

                            </center>
                        </div>
                    </div>
                </div>
                {{ $tasks->links()}}
            </div>
        </div>
    </div>
    @foreach($tasks as $i)
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
                                        <button class="close pb-3 px-3 pt-2 font-white" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <!-- ~phone -->
                            <div class="div-square">
                                @if($i->Classification == 'Food')
                                    <img class="div-square-content img-fluid hwAuto"
                                         src="{{asset('img/food.jpg')}}">
                                @elseif($i->Classification == 'Stationery')
                                    <img class="div-square-content img-fluid hwAuto"
                                         src="{{asset('img/pen.jpg')}}">
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
                                        <button class="close pb-3 px-3 pt-2 font-white" data-dismiss="modal"
                                                aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                </div>

                            </div>
                            <!-- ~computer -->
                            <div class="row pr-3">
                                <div class="col d-flex align-items-center">
                                    <h5 class="px-3 pl-lg-0 mb-3 mt-3 mt-lg-2 font-white">
                                        $30 NTD<br>
                                    </h5>
                                </div>
                                <div class="col-auto d-flex align-items-center">
                                    @if($i->Student_id!=$id)
                                    <button class="btn btn-outline-orange">
                                        檢舉委託
                                    </button>
                                        @endif
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
                                @if($i->Student_id!=$id)
                                    <form method="POST" action="{{ route('task.volunteer') }}">
                                        @csrf
                                        <input type="hidden" name="tasks_id" value="{{$i->Tasks_id}}">
                                        <button type="submit" class="btn btn-orange">
                                            提出接受委託許可
                                        </button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


    <button class="btn btn-orange px-3 py-2" data-toggle="modal" data-target="#newMission" id="newMissionBtn">
        新增委託
    </button>

    <div class="modal fade" id="newMission" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered" role="document">

            <div class="modal-content border-0 bg-dark">

                <div class="modal-header border-0">
                    <h5 class="modal-title font-white">&nbsp;</h5>
                    <button type="button" class="close font-white" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="col-12 pt-0 pt-lg-2 pb-3 ">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 px-0">
                        <form class=" p-2" action="{{ route('task.add') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                    <label class="m-0 font-white">分類選擇</label>
                                    <select class="form-control font-white bg-grey" name="Classification">
                                        @foreach($classifications as $classification)
                                            @if($classification->ClassValue!="All")
                                                <option
                                                    value="{{$classification->ClassValue}}">{{$classification->ClassName}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                    <label class="m-0 font-white">委託標題</label>
                                    <input type="text" class="form-control font-white bg-grey" name="Title"
                                           placeholder="請在此輸入需要購買的物品" required>
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                    <label class="font-white m-0">預計日期</label>
                                    <input class="bg-grey font-white" id="datepicker" readonly="true" width="100%"
                                           name="Date" type="text" required/>
                                    <script>
                                        var today= new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
                                        $('#datepicker').datepicker({
                                            uiLibrary: 'bootstrap4',
                                            format: 'yyyy-mm-dd',
                                            minDate: today,
                                            change: function (e){
                                                var datepicker=e.target.value;
                                                var datepicker2=$('#datepicker2').val();
                                                if(datepicker !=="" && datepicker2 !==""){
                                                    if(datepicker2>datepicker){
                                                        $("#error").modal({show:true});
                                                        $('#datepicker').val("");
                                                        $('#datepicker2').val("");
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>

                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">
                                    <label class="font-white m-0">預計時間</label>
                                    <input class="bg-grey font-white" id="timepicker" readonly="true" width="100%"
                                           name="Time" type="text" required/>
                                    <script>
                                        $('#timepicker').timepicker({
                                            uiLibrary: 'bootstrap4', change: function (e) {
                                                var timepicker = e.target.value;
                                                var timepicker2 = $('#timepicker2').val();
                                                var datepicker = $('#datepicker').val();
                                                var datepicker2 = $('#datepicker2').val();
                                                if (datepicker == datepicker2) {
                                                    if (timepicker2 > timepicker) {
                                                        $("#error").modal({show: true});
                                                        $('#timepicker').val("");
                                                        $('#timepicker2').val("");
                                                    }
                                                }
                                            }
                                        });
                                    </script>

                                </div>

                            </div>

{{--                            <div class="row">--}}

{{--                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                    <label class="font-white m-0">截止日期(請選預計日期之前)</label>--}}
{{--                                    <input class="bg-grey font-white" id="datepicker2" readonly="true" width="100%"--}}
{{--                                           name="DeadDate" required/>--}}
{{--                                    <script>--}}
{{--                                        var today= new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());--}}
{{--                                        $('#datepicker2').datepicker({--}}
{{--                                            uiLibrary: 'bootstrap4',--}}
{{--                                            format: 'yyyy-mm-dd',--}}
{{--                                            minDate: today,--}}
{{--                                            change: function (e){--}}
{{--                                                var datepicker=$('#datepicker').val();--}}
{{--                                                var datepicker2=e.target.value;--}}
{{--                                                if(datepicker !=="" && datepicker2 !==""){--}}
{{--                                                    if(datepicker2>datepicker){--}}
{{--                                                        $("#error").modal({show:true});--}}
{{--                                                        $('#datepicker').val("");--}}
{{--                                                        $('#datepicker2').val("");--}}
{{--                                                    }--}}
{{--                                                }--}}
{{--                                            }--}}
{{--                                        });--}}
{{--                                    </script>--}}
{{--                                </div>--}}
{{--                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group pb-2 pl-1 pr-1 m-0">--}}
{{--                                    <label class="font-white m-0">截止時間</label>--}}
{{--                                    <input class="bg-grey font-white" id="timepicker2" readonly="true" width="100%"--}}
{{--                                           name="DeadTime" required/>--}}
{{--                                    <script>--}}
{{--                                        $('#timepicker2').timepicker({--}}
{{--                                            uiLibrary: 'bootstrap4', change: function (e) {--}}
{{--                                                var timepicker = $('#timepicker').val();--}}
{{--                                                var timepicker2 = e.target.value;--}}
{{--                                                var datepicker = $('#datepicker').val();--}}
{{--                                                var datepicker2 = $('#datepicker2').val();--}}
{{--                                                if (datepicker == datepicker2) {--}}
{{--                                                    if (timepicker2 > timepicker) {--}}
{{--                                                        $("#error").modal({show: true});--}}
{{--                                                        $('#timepicker').val("");--}}
{{--                                                        $('#timepicker2').val("");--}}
{{--                                                    }--}}
{{--                                                }--}}
{{--                                            }--}}
{{--                                        });--}}
{{--                                    </script>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <div class="row">
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">
                                    <label class="m-0 font-white">購買地點</label>
                                    <input type="text" class="form-control font-white bg-grey"
                                           placeholder="請輸入購買地點(店名、地址)" name="BuyAddress" required>
                                </div>
                            </div>
                            <div class="row">
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">
                                    <label class="m-0 font-white">面交地點</label>
                                    <input type="text" class="form-control font-white bg-grey"
                                           placeholder="請輸入面交地點(EX:資訊樓4樓、正門校門口)" name="MeetAddress" required>
                                </div>
                            </div>

                            <div class="row">
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">
                                    <label class="m-0 font-white">酬勞金額</label>
                                    <input type="number" onkeyup="value=value.replace(/[^\d]/g,'') "
                                           class="form-control font-white bg-grey"
                                           placeholder="請輸入酬勞金額(新台幣)" name="Pay" required>
                                </div>
                            </div>

                            <div class="row">
                                <div
                                    class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 form-group pb-2 pl-1 pr-1 m-0">
                                    <label class="m-0 font-white">委託內容細節與補充</label>
                                    <textarea rows="4" cols="50" class="form-control font-white bg-grey"
                                              placeholder="請輸入委託細節或注意事項(Ex:是否要袋子、餐具..)" name="Content" required></textarea>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center">
                                <div class="col-8 col-sm-8 col-md-6 col-lg-3 col-xl-3 p-0">
                                    <button class="btn btn-orange btn-block form-group mb-0 mt-3" type="submit">提出委託
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
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

