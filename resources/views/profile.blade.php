@extends('layouts.app')
@section('content')
<div class="container pt-2" style="background-color:white;">
    <h2 class="font-weight-bold mb-0">
        個人資料
    </h2>

    <div class="row">
        @foreach($profile as $i)
        <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4 ">
            <div class="row">

                <div class="col-6 col-sm-6 col-md-6 col-lg-12 col-xl-12 p-2">
                    <img src="https://www.cooperspetkitchen.co.nz/assets/themes/cpk-theme/img/dogs/golden_retriever.jpg" class="img-fluid" style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);">
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-2">

                    <div style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%">
                        <h5 class="font-weight-bold mb-0 pl-2 pt-3">姓名</h5>
                        <p class="font-weight-normal mb-2 pl-2">{{$i->name}}</p>

                        <h5 class="font-weight-bold mb-0 pl-2">學號</h5>
                        <p class="font-weight-normal mb-2 pl-2">{{$i->student_id}}</p>

                        <h5 class="font-weight-bold mb-0 pl-2">科系</h5>
                        <p class="font-weight-normal mb-3 pl-2 ">{{$i->department}}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 p-2">
                    <div style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);">
                        <div class="row pt-3">
                            <div class="col-4 col-sm-4 col-md-4 col-lg-12 col-xl-12 pr-0 ">
                                <h5 class="font-weight-bold mb-0 pl-2 ">提出委託數</h5>
                                <p class="font-weight-normal mb-2 pl-2">{{$addrecord}}</p>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-12 col-xl-12 pr-0 ">
                                <h5 class="font-weight-bold mb-0 pl-2">完成委託數</h5>
                                <p class="font-weight-normal mb-2 pl-2">{{$completerecord}}</p>
                            </div>
                            <div class="col-4 col-sm-4 col-md-4 col-lg-12 col-xl-12 pr-0 ">
                                <h5 class="font-weight-bold mb-0 pl-2">違規次數</h5>
                                <p class="font-weight-normal mb-3 pl-2">0</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        @endforeach
        <br>

        <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 p-2">

            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%">

                <h3 class="font-weight-bold pt-3 pb-0 mb-0">
                    信用評價與評論
                </h3>
                <h5 class="font-weight-bold pt-0 pb-2">
                    總平均:
                    <i class="fas fa-star" style="color:#FF9529"></i>
                    <i class="fas fa-star" style="color:#FF9529"></i>
                    <i class="fas fa-star" style="color:#FF9529"></i>
                    <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                    <i class="far fa-star" style="color:#FF9529"></i>
                </h5>


                <nav>
                    <div class="nav nav-tabs" id="nav-tab">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-tabHostRating" aria-controls="nav-tabHostRating" aria-selected="true">雇主評價</a>
                        <a class="nav-item nav-link" data-toggle="tab" href="#nav-tabToolManRating" aria-controls="nav-tabToolManRating">工具人評價</a>
                    </div>
                </nav>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="nav-tabHostRating">
                        <h5 class="font-weight-bold pt-2 pb-2">
                            雇主評價:
                            <i class="fas fa-star" style="color:#FF9529"></i>
                            <i class="fas fa-star" style="color:#FF9529"></i>
                            <i class="fas fa-star" style="color:#FF9529"></i>
                            <i class="far fa-star" style="color:#FF9529"></i>
                            <i class="far fa-star" style="color:#FF9529"></i>
                        </h5>

                        <div class="row pl-1 pb-3">


                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">多多茶坊胚芽奶茶一杯</p>
                                    <p class="mb-1">
                                        酬勞偏高又準時交易<br>
                                        酬勞偏高又準時交易<br>
                                        酬勞偏高又準時交易
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">三商巧福原汁牛肉麵套餐一份</p>
                                    <p class="mb-1">
                                        酬勞偏高真的多
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">五十嵐布丁奶茶一杯</p>
                                    <p class="mb-1">
                                        酬勞偏高，想賺的接他的就對了
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">豪大雞排 雞排一份</p>
                                    <p class="mb-1">
                                        準時交易
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">多多茶坊胚芽奶茶一杯</p>
                                    <p class="mb-1">
                                        酬勞偏高又準時交易<br>
                                        酬勞偏高又準時交易<br>
                                        酬勞偏高又準時交易
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">三商巧福原汁牛肉麵套餐一份</p>
                                    <p class="mb-1">
                                        酬勞偏高真的多
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">五十嵐布丁奶茶一杯</p>
                                    <p class="mb-1">
                                        酬勞偏高，想賺的接他的就對了
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">豪大雞排 雞排一份</p>
                                    <p class="mb-1">
                                        準時交易
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">多多茶坊胚芽奶茶一杯</p>
                                    <p class="mb-1">
                                        酬勞偏高又準時交易<br>
                                        酬勞偏高又準時交易<br>
                                        酬勞偏高又準時交易
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">三商巧福原汁牛肉麵套餐一份</p>
                                    <p class="mb-1">
                                        酬勞偏高真的多
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">五十嵐布丁奶茶一杯</p>
                                    <p class="mb-1">
                                        酬勞偏高，想賺的接他的就對了
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">豪大雞排 雞排一份</p>
                                    <p class="mb-1">
                                        準時交易
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>




                        </div>
                    </div>


                    <div class="tab-pane fade" id="nav-tabToolManRating">
                        <h5 class="font-weight-bold pt-2 pb-2">
                            工具人評價:
                            <i class="fas fa-star" style="color:#FF9529"></i>
                            <i class="fas fa-star" style="color:#FF9529"></i>
                            <i class="fas fa-star" style="color:#FF9529"></i>
                            <i class="fas fa-star" style="color:#FF9529"></i>
                            <i class="fas fa-star" style="color:#FF9529"></i>
                        </h5>

                        <div class="row pl-1 pb-3">


                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">豪大雞排 雞排一份</p>
                                    <p class="mb-1">
                                        準時交易
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">五十嵐布丁奶茶一杯</p>
                                    <p class="mb-1">
                                        酬勞偏高，想賺的接他的就對了
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">三商巧福原汁牛肉麵套餐一份</p>
                                    <p class="mb-1">
                                        酬勞偏高真的多
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 pr-1 pb-1 pl-0">
                                <div class="p-2" style="border-style: outset;border-width:3px;height:100%">
                                    <p class="font-weight-bold mb-1">多多茶坊胚芽奶茶一杯</p>
                                    <p class="mb-1">
                                        酬勞偏高又準時交易<br>
                                        酬勞偏高又準時交易<br>
                                        酬勞偏高又準時交易
                                    </p>
                                    <p class="mb-1">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
@endsection
