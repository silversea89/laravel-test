@extends('layouts.app')
@section('content')

    <body class="minHeight100vh bg-darker">

    <center class="width100p bg-dark pt-4 pb-2 mb-3">
        @foreach($profile as $i)
            <div id="profileImgDiv">
                <image class="rounded-circle border-0 img-fluid hwAuto" src="{{asset('profileimages/'.$i->photo)}}"
                       id="profileImg"></image>
                <label id="changePhoto">
                    <input id="upload_img" style="display:none;" type="file" accept="image/png, image/jpeg, image/jpg">
                    <h5 class="fas fa-camera font-white p-2 rounded-circle bg-grey"></h5>
                </label>
            </div>



            <h2 class="font-white font-weight-bold mt-2 mb-1">{{$i->name}}</h2>
            @if($profile[0]->student_id==$id)
                <a href="/changePassword">修改密碼</a>
            @endif
        @endforeach
    </center>


    <div class="container">

        <div class="row">

            <div class="col-12 col-md-6 col-lg-5 col-xl-4 px-3 px-md-0">

                <div class="bg-dark width100p p-3">

                    <h5 class="font-white font-weight-bold">介紹</h5>
                    <div class="d-flex align-items-center mb-1">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-id-badge font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">學號</p>
                        <p class="font-white p-0 m-0">{{$i->student_id}}</p>
                    </div>

                    <div class="d-flex align-items-center mb-1">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-graduation-cap font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">科系</p>
                        <p class="font-white p-0 m-0">{{$department->De_Name}}</p>
                    </div>

                    <div class="d-flex align-items-center mb-1">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-envelope font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">郵件</p>
                        <a class="font-white p-0 m-0"
                           href="mailto: leonardo890229@gmail.com">{{$i->email}}</a>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-phone-alt font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">電話</p>
                        <p class="font-white p-0 m-0"><a class="font-white p-0 m-0" href="tel:+886-906889129">{{$i->tel}}</a>
                        </p>
                    </div>

                </div>

                <div class="bg-dark width100p p-3 mt-3">

                    <h5 class="font-white font-weight-bold">表現</h5>
                    <div class="d-flex align-items-center mb-1">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-file-upload font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">提出委託</p>
                        <p class="font-white p-0 m-0">{{$addrecord}}</p>
                    </div>

                    <div class="d-flex align-items-center mb-1">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-check font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">完成委託</p>
                        <p class="font-white p-0 m-0">{{$completerecord}}</p>
                    </div>

                    <div class="d-flex align-items-center mb-1">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-ban font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">違規次數</p>
                        <p class="font-white p-0 m-0">{{$i->violation}}</p>
                    </div>

                    <div class="d-flex align-items-center mb-1">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-coins font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">雇 主 評 價</p>

                        <div class="row pl-3 text-star-flow">
                            @foreach($host_AVGrate as $i)
                                @if($i=="0")
                                    <i class="far fa-star" style="color:#FF9529"></i>
                                @elseif($i=="0.5")
                                    <i class="fas fa-star-half-alt" style="color:#FF9529" aria-hidden="true"></i>
                                @elseif($i=="1")
                                    <i class="fas fa-star" style="color:#FF9529"></i>
                                @else
                                    {{$host_AVGrate[0]}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-1">
                        <div class="text-center" style="width:20px">
                            <p class="fas fa-tools font-white font-weight-bold p-0 m-0"></p>
                        </div>
                        <p class="font-white font-weight-bold p-0 m-0 px-2">工具人評價</p>

                        <div class="row pl-3 text-star-flow" id="toolman-star">
                            @foreach($toolman_AVGrate as $i)
                                @if($i=="0")
                                    <i class="fas fa-star" style="color:#FF9529"></i>
                                @elseif($i=="0.5")
                                    <i class="fas fa-star-half-alt" style="color:#FF9529" aria-hidden="true"></i>
                                @elseif($i=="1")
                                    <i class="fas fa-star" style="color:#FF9529"></i>
                                @else
                                    {{$toolman_AVGrate[0]}}
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-12 col-md-6 col-lg-7 col-xl-8 px-3 pr-md-0 mt-3 mt-md-0">

                <ul class="nav nav-tabs mb-3" id="evaluate">
                    <li class="nav-item">
                        <a class="nav-link tab active" data-toggle="tab" href="#employer" aria-controls="employer"
                           aria-selected="true">雇主評價</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab" data-toggle="tab" href="#toolman" aria-controls="toolman"
                           aria-selected="false">工具人評價</a>
                    </li>

                </ul>
                <div class="tab-content" id="evaluateContent">
                    <div class="tab-pane fade show active" id="employer" role="tabpanel">
                        @foreach($host_evaluation as $i)
                        <div class="bg-dark width100p p-3 mb-3">
                            <div class="row">

                                <div class="col-auto pr-2">
                                    <image class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                           src="/src/img/profile.jpg"></image>
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        柯*勛
                                    </h5>
                                    <p class="font-grey m-0">
                                        July 15 at 12:18 PM
                                    </p>
                                    <div class="row pl-3">
                                        <i class="fas fa-star font-orange"></i>
                                        <i class="fas fa-star font-orange"></i>
                                        <i class="fas fa-star font-orange"></i>
                                        <i class="fas fa-star font-orange"></i>
                                        <i class="fas fa-star font-orange"></i>
                                    </div>

                                    <p class="font-grey m-0">
                                        {{$i->Title}}
                                    </p>

                                    <p class="font-white m-0 mt-3">
                                        {{$i->Host_Comment}}
                                    </p>

                                    <div class="row pl-3 mt-1">
                                        <p class="badge-grey m-0 mt-2 mr-2 px-2 py-0">
                                            超讚的出貨速度
                                        </p>
                                        <p class="badge-grey m-0 mt-2 mr-2 px-2 py-0">
                                            超讚的CP值
                                        </p>
                                        <p class="badge-grey m-0 mt-2 mr-2 px-2 py-0">
                                            超讚的商品品質
                                        </p>
                                        <p class="badge-grey m-0 mt-2 mr-2 px-2 py-0">
                                            超讚的服務
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
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

                    </div>
                    <div class="tab-pane fade" id="toolman" role="tabpanel" >
                        @foreach($toolman_evaluation as $i)
                    <div class="bg-dark width100p p-3 mb-3">
                        <div class="row">

                            <div class="col-auto pr-2">
                                <image class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                       src="/src/img/profile.jpg"></image>
                            </div>
                            <div class="col pl-0">
                                <h5 class="guestProfileName font-white font-weight-bold m-0">
                                    柯*勛
                                </h5>
                                <p class="font-grey m-0">
                                    July 15 at 12:18 PM
                                </p>
                                <div class="row pl-3">
                                    @for ($k = 0; $k < $i->Toolman_Rate; $k++)
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                    @endfor
                                    @for ($k = 0; $k < 5-$i->Toolman_Rate; $k++)
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    @endfor
                                </div>

                                <p class="font-grey m-0">
                                    {{$i->Title}}
                                </p>

                                <p class="font-white m-0 mt-3">
                                    {{$i->Host_Comment}}
                                </p>
                            </div>
                        </div>
                    </div>
                        @endforeach
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
                </div>
            </div>
        </div>
    </div>


{{--    <div class="container pt-2" style="background-color:#EFEFEF;">--}}
{{--        <div class="row pl-2">--}}
{{--            <h2 class="font-weight-bold mb-0">--}}
{{--                個人資料--}}
{{--            </h2>--}}
{{--            @if($profile[0]->student_id==$id)--}}
{{--                <div class="d-flex justify-content-end col">--}}
{{--                    <button class="btn btn-primary mr-1" data-toggle="modal"--}}
{{--                            data-target=".changePhoto">更改照片--}}
{{--                    </button>--}}
{{--                    <div class="modal fade changePhoto" tabindex="-1" role="dialog" aria-hidden="true">--}}
{{--                        <div class="modal-dialog modal-md px-2"--}}
{{--                             style="height:100%;display: flex; flex-direction: column;justify-content: center;text-align: center;">--}}
{{--                            <div class="modal-content container">--}}
{{--                                <h3 class="fas fa-times" style="color:#999999;position: absolute; top: 7px;right: 15px;"--}}
{{--                                    data-toggle="modal" data-target=".changePhoto"></h3>--}}
{{--                                <br>--}}
{{--                                <hr class="mb-3" size="8px" align="center" width="100%" style="color:#999999;">--}}
{{--                                <form action="{{ route('Photo.Reset') }}" method="POST" enctype="multipart/form-data">--}}
{{--                                    @csrf--}}
{{--                                    <center>--}}
{{--                                        @foreach($profile as $i)--}}
{{--                                            <input type="hidden" name="student_id" value={{$i->student_id}}>--}}
{{--                                        @endforeach--}}
{{--                                        <div class="form-group" style="position:relative">--}}
{{--                                            <div class="row px-3">--}}
{{--                                                <div>--}}
{{--                                                    <label class="my-1">上傳大頭貼：</label>--}}
{{--                                                </div>--}}
{{--                                                <div>--}}
{{--                                                    <input type="file" class="form-control-file" name="image"--}}
{{--                                                           accept="image/png, image/jpeg, image/jpg">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <i class="fas fa-question-circle"--}}
{{--                                               style="color:#666;position:absolute;top:8px;right:0px"--}}
{{--                                               data-toggle="tooltip"--}}
{{--                                               data-placement="left" title="照片大小2MB以下。"></i>--}}
{{--                                        </div>--}}
{{--                                        <button type="submit" class="btn btn-primary my-0 mb-3">確認更改</button>--}}
{{--                                    </center>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <form action="{{ route('Password.ShowReset') }}" method="get">--}}
{{--                        <button type="submit" class="btn btn-primary">更改密碼</button>--}}
{{--                    </form>--}}
{{--                </div>--}}
{{--            @endif--}}
{{--        </div>--}}

{{--        <div class="row">--}}
{{--            @foreach($profile as $i)--}}
{{--                <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 ">--}}
{{--                    <div class="row">--}}

{{--                        <div class="col-6 col-sm-6 col-md-6 col-lg-12 col-xl-12 p-2">--}}
{{--                            <div style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);--}}
{{--                            height:300px;max-height:100%;background-color:#FFFFFF;display: flex; flex-direction: column;--}}
{{--                            justify-content: center;text-align: center;position: relative;">--}}
{{--                                <img--}}
{{--                                    src="{{asset('profileimages/'.$i->photo)}}"--}}
{{--                                    style="border-radius:20px;max-height: 100%;max-width: 100%;width: auto;--}}
{{--                                height: auto;position: absolute;top:0;bottom:0;left:0;right:0;margin: auto;">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">--}}

{{--                            <div--}}
{{--                                style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%;background-color: white">--}}
{{--                                <h5 class="font-weight-bold mb-0 pl-2 pt-3">姓名</h5>--}}
{{--                                <p class="font-weight-normal mb-2 pl-2">{{$i->name}}</p>--}}

{{--                                <h5 class="font-weight-bold mb-0 pl-2">學號</h5>--}}
{{--                                <p class="font-weight-normal mb-2 pl-2">{{$i->student_id}}</p>--}}

{{--                                <h5 class="font-weight-bold mb-0 pl-2">科系</h5>--}}
{{--                                <p class="font-weight-normal mb-3 pl-2 ">{{$department->De_Name}}</p>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 p-2">--}}
{{--                            <div--}}
{{--                                style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);background-color: white">--}}
{{--                                <div class="row pt-3">--}}
{{--                                    <div class="col-4 col-sm-4 col-md-4 col-lg-12 col-xl-12 pr-0 ">--}}
{{--                                        <h5 class="font-weight-bold mb-0 pl-2 ">提出委託數</h5>--}}
{{--                                        <p class="font-weight-normal mb-2 pl-2">{{$addrecord}}</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-4 col-sm-4 col-md-4 col-lg-12 col-xl-12 pr-0 ">--}}
{{--                                        <h5 class="font-weight-bold mb-0 pl-2">完成委託數</h5>--}}
{{--                                        <p class="font-weight-normal mb-2 pl-2">{{$completerecord}}</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-4 col-sm-4 col-md-4 col-lg-12 col-xl-12 pr-0 ">--}}
{{--                                        <h5 class="font-weight-bold mb-0 pl-2">違規次數</h5>--}}
{{--                                        <p class="font-weight-normal mb-3 pl-2">{{$i->violation}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 p-2">--}}
{{--                            <div style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);background-color:#FFFFFF">--}}
{{--                                <div class="row pt-3">--}}

{{--                                    <div class="col-6 col-md-12 pr-0 ">--}}
{{--                                        <h5 class="font-weight-bold mb-0 pl-2 ">電子郵件</h5>--}}
{{--                                        <p class="font-weight-normal mb-2 pl-2">{{$i->email}}</p>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-6 col-md-12 pr-0 ">--}}
{{--                                        <h5 class="font-weight-bold mb-0 pl-2">電話號碼</h5>--}}
{{--                                        <p class="font-weight-normal mb-2 pl-2">{{$i->tel}}</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--            <br>--}}

{{--            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 p-2">--}}

{{--                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 "--}}
{{--                     style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%;background-color: white">--}}

{{--                    <h3 class="font-weight-bold pt-3 pb-0 mb-0">--}}
{{--                        信用評價與評論--}}
{{--                    </h3>--}}

{{--                    <nav>--}}
{{--                        <div class="nav nav-tabs" id="nav-tab">--}}
{{--                            <a class="nav-item nav-link active" data-toggle="tab" href="#nav-tabHostRating"--}}
{{--                               aria-controls="nav-tabHostRating" aria-selected="true">雇主評價</a>--}}
{{--                            <a class="nav-item nav-link" data-toggle="tab" href="#nav-tabToolManRating"--}}
{{--                               aria-controls="nav-tabToolManRating">工具人評價</a>--}}
{{--                        </div>--}}
{{--                    </nav>--}}
{{--                    <div class="tab-content">--}}
{{--                        --}}{{--                        host tab--}}
{{--                        <div class="tab-pane fade show active" id="nav-tabHostRating">--}}
{{--                            <h5 class="font-weight-bold pt-2 pb-2">--}}
{{--                                雇主評價:--}}
{{--                                @foreach($host_AVGrate as $i)--}}
{{--                                    @if($i=="0")--}}
{{--                                        <i class="far fa-star" style="color:#FF9529"></i>--}}
{{--                                    @elseif($i=="0.5")--}}
{{--                                        <i class="fas fa-star-half-alt" style="color:#FF9529" aria-hidden="true"></i>--}}
{{--                                    @elseif($i=="1")--}}
{{--                                        <i class="fas fa-star" style="color:#FF9529"></i>--}}
{{--                                    @else--}}
{{--                                        {{$host_AVGrate[0]}}--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </h5>--}}
{{--                            <div class="row pl-1 pb-3">--}}
{{--                                @foreach($host_evaluation as $i)--}}
{{--                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">--}}
{{--                                        <div class="p-2 m-0" style="border-style: outset;border-width:3px;height:100%">--}}
{{--                                            <p class="font-weight-bold mb-1">{{$i->Title}}</p>--}}
{{--                                            <p class="mb-1">--}}
{{--                                                {{$i->Host_Comment}}--}}
{{--                                            </p>--}}
{{--                                            <p class="mb-1">--}}
{{--                                                @for ($k = 0; $k < $i->Host_Rate; $k++)--}}
{{--                                                    <i class="fas fa-star" style="color:#FF9529"></i>--}}
{{--                                                @endfor--}}
{{--                                                @for ($k = 0; $k < 5-$i->Host_Rate; $k++)--}}
{{--                                                    <i class="far fa-star" style="color:#FF9529"></i>--}}
{{--                                                @endfor--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}

{{--                        </div>--}}

{{--                        --}}{{--                        //toolman tab--}}
{{--                        <div class="tab-pane fade" id="nav-tabToolManRating">--}}
{{--                            <h5 class="font-weight-bold pt-2 pb-2">--}}
{{--                                工具人評價:--}}
{{--                                @foreach($toolman_AVGrate as $i)--}}
{{--                                    @if($i=="0")--}}
{{--                                        <i class="fas fa-star" style="color:#FF9529"></i>--}}
{{--                                    @elseif($i=="0.5")--}}
{{--                                        <i class="fas fa-star-half-alt" style="color:#FF9529" aria-hidden="true"></i>--}}
{{--                                    @elseif($i=="1")--}}
{{--                                        <i class="fas fa-star" style="color:#FF9529"></i>--}}
{{--                                    @else--}}
{{--                                        {{$toolman_AVGrate[0]}}--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </h5>--}}
{{--                            <div class="row pl-1 pb-3">--}}
{{--                                @foreach($toolman_evaluation as $i)--}}

{{--                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">--}}
{{--                                        <div class="p-2 m-0" style="border-style: outset;border-width:3px;height:100%">--}}
{{--                                            <p class="font-weight-bold mb-1">{{$i->Title}}</p>--}}
{{--                                            <p class="mb-1">--}}
{{--                                                {{$i->Host_Comment}}--}}
{{--                                            </p>--}}
{{--                                            <p class="mb-1">--}}
{{--                                                @for ($k = 0; $k < $i->Toolman_Rate; $k++)--}}
{{--                                                    <i class="fas fa-star" style="color:#FF9529"></i>--}}
{{--                                                @endfor--}}
{{--                                                @for ($k = 0; $k < 5-$i->Toolman_Rate; $k++)--}}
{{--                                                    <i class="far fa-star" style="color:#FF9529"></i>--}}
{{--                                                @endfor--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    {{ $host_evaluation->links() }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <br><br><br>--}}
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
