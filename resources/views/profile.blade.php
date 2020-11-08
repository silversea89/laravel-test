@extends('layouts.app')
@section('content')

    <body class="minHeight100vh bg-darker">

    <center class="width100p bg-derk pt-4 pb-2 mb-3">
        @foreach($profile as $i)
            <div id="profileImgDiv">
                <image class="rounded-circle border-0 img-fluid hwAuto" src="{{asset('profileimages/'.$i->photo)}}"
                       id="profileImg"></image>
                <label id="changePhoto">
                    <form action="{{ route('Photo.Reset') }}" method="POST" enctype="multipart/form-data" id="upload_img_form">
                        @csrf
                        <input type="hidden" name="student_id" value={{$i->student_id}}>
                        <input name="image" id="upload_img" style="display:none;" type="file" accept="image/png, image/jpeg, image/jpg">
                    </form>
                    <h5 class="fas fa-camera font-white p-2 rounded-circle bg-grey"></h5>
                </label>
            </div>



            <h2 class="font-white font-weight-bold mt-2 mb-1">{{$i->name}}</h2>
            @if($profile[0]->student_id==$id)
                <a class="font-orange" href="{{ route('Password.ShowReset') }}">修改密碼</a>
            @endif
        @endforeach
    </center>


    <div class="container">

        <div class="row">

            <div class="col-12 col-md-6 col-lg-5 col-xl-4 px-3 px-md-0">

                <div class="bg-derk width100p p-3">

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

                <div class="bg-derk width100p p-3 mt-3">

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
                                    <a class="font-grey">尚無資料</a>
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
                                    <a class="font-grey">尚無資料</a>
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
                            <div class="bg-derk width100p p-3 mb-3">
                                <div class="row">
                                    <div class="col-auto pr-2">
                                    </div>
                                    <div class="col pl-0">
                                        <h5 class="guestProfileName font-white font-weight-bold m-0">
                                            {{substr_replace($i->ToolmanName,"*",3,3)}}
                                        </h5>
                                        <p class="font-grey m-0">
                                            {{$i->H_Time}}
                                        </p>
                                        <div class="row pl-3">
                                            @for ($k = 0; $k < $i->Host_Rate; $k++)
                                                <i class="fas fa-star" style="color:#FF9529"></i>
                                            @endfor
                                            @for ($k = 0; $k < 5-$i->Host_Rate; $k++)
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
                            {{ $host_evaluation->links()}}
                        </nav>
                    </div>
                    <div class="tab-pane fade" id="toolman" role="tabpanel" >
                        @foreach($toolman_evaluation as $i)
                            <div class="bg-derk width100p p-3 mb-3">
                                <div class="row">
                                    <div class="col-auto pr-2">
                                    </div>
                                    <div class="col pl-0">
                                        <h5 class="guestProfileName font-white font-weight-bold m-0">
                                            {{substr_replace($i->HostName,"*",3,3)}}
                                        </h5>
                                        <p class="font-grey m-0">
                                            {{$i->T_Time}}
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
                                            {{$i->Toolman_Comment}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <nav>
                            {{ $toolman_evaluation->links()}}
                        </nav>
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
