@extends('layouts.app')
@section('content')

<body style="background-color:FFFFFF;">
    <!-- #F9F9F9 -->
    <script src="script.js"></script>


    <div style="width:100%;background-color:#74D2E7;">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-xl-5 d-flex align-items-start flex-column bd-highlight">

                    <div class="d-flex align-items-start flex-column bd-highlight mb-3" style="height: 100%;">
                        <div class="mb-auto bd-highlight"></div>
                        <div class="pt-2 bd-highlight">
                            <h1>專為學生打造的<br><span style="color:white">校園委託平台</span></h1>
                        </div>
                        <div class=" bd-highlight">
                            <a href="{{ route('login') }}" class="btn btn-danger">開始體驗</a>
                        </div>
                    </div>

                </div>
                <div class="col-12 col-md-6 col-xl-7 p-0">
                    <!-- https://miro.medium.com/max/800/0*YoS7JWhSyxNlIfX-.png -->
                    <img src="https://www.peoplemanagement.co.uk/Images/remote-working-graphic_tcm27-73183_w1228_n.jpg" class="img-fluid ">
                </div>
            </div>
        </div>
    </div>


    <div class="container pt-4 ">


        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 " style="background-color:white;">

            <h1 class="m-0 ">最新委託</h1>

        </div>



        <div class="modal fade content0" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content container">
                    <div class="row p-2 ">
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pr-0 pl-0">
                            <h3 class="far fa-times-circle" style="color:white;position: absolute; top: 5px;left: 5px;border-radius:100%;box-shadow:0 0rem 0.5rem rgba(0, 0, 0, 1);" data-toggle="modal" data-target=".content0"></h3>
                            <img src="img/food.jpg" class="img-fluid pr-0">
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 pt-1">

                            <a href="/login.html" class="btn btn-danger" style="position: absolute; top: 5px;right: 5px;">檢舉</a>

                            <h3>50嵐8冰綠一杯</h3>
                            <span class="badge badge-primary">代購物品</span>
                            <h5>委託內容：<p>午餐好油膩，想喝一杯8冰綠，半糖去冰謝謝！</p>
                            </h5>
                            <h5>購買地點：<p>50嵐</p>
                            </h5>
                            <h5>面交地點：<p>資訊4樓電梯前</p>
                            </h5>
                            <h5>面交時間：<p>2020/04/01 12:30</p>
                            </h5>
                            <h5>酬勞金額：<p>$50</p>
                            </h5>
                            <p class="m-0">老闆:<a href="#">王小明</a></p>
                            <p class="m-0">發佈於2020/04/01 11:00</p>
                            <p class="m-0">截止期限：2020/04/01 13:00</p>
                            <a href="/login.html" class="btn btn-primary my-3">接受委託</a>

                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="d-md-none d-block col-12 col-sm-12 px-0" style="background-color:white;">
            <div class="mr-0 d-flex align-items-center" style="overflow-y:hidden;overflow-x:auto;white-space: nowrap;">


                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;" data-toggle="modal" data-target=".content0">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">50嵐8冰綠一杯</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵二碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵三碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵四碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵五碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵一碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵一碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-8 col-sm-8 mt-3 pl-0" style="display: inline-table;vertical-align: top;">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵一碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-4 col-sm-4 mt-3 pl-0 " style="display: inline-table;vertical-align: top;">

                    <a href="/login.html">
                        <h1>more&nbsp;<p class="fas fa-arrow-right"></p>
                        </h1>
                    </a>

                </div>
            </div>
            <br>
        </div>



        <div class="d-none d-md-block col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style="background-color:white;">
            <div class="row mr-0">


                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 pr-0" style="">

                    <div style="border:1px #DFDFDF solid;" data-toggle="modal" data-target=".content0">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">50嵐8冰綠一杯</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 pr-0" style="">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵二碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 pr-0" style="">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵三碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 pr-0" style="">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵四碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 pr-0" style="">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵五碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 pr-0" style="">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵一碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 pr-0" style="">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵一碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-3 col-lg-3 col-xl-3 mt-3 pr-0" style="">

                    <div style="border:1px #DFDFDF solid;">

                        <div class="row pl-3">

                            <div class="col-12 col-sm-12 pl-0">
                                <img src="img/food.jpg" class="img-fluid">
                            </div>

                            <div class="col-12 col-sm-12 pl-0 ">

                                <div class="pl-1">

                                    <p class="m-0">鍋燒牛肉意麵一碗</p>
                                    <p class="m-0">
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star" style="color:#FF9529"></i>
                                        <i class="fas fa-star-half-alt" style="color:#FF9529"></i>
                                        <i class="far fa-star" style="color:#FF9529"></i>
                                        3.5/5.0
                                    </p>
                                    <p class="m-0">30$</p>

                                </div>

                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <br>

        </div>


        <div class="row ">

            <div class="col-12 col-md-6 order-12 order-md-0 p-0">
                <!-- https://www.enisa.europa.eu/tips-for-cybersecurity-when-working-from-home/@@images/d707ed75-fa16-4add-9b38-054a4ac7dfcf.png -->
                <img src="https://www.jobberman.com.gh/blog/wp-content/uploads/sites/9/2019/10/Project-Management-Tips-on-How-to-Motivate-Your-Remote-Team-1-1.png" class="img-fluid py-4">
            </div>
            <div class="col-12 col-md-6 " style="display: flex; flex-direction: column;justify-content: center;text-align: center;">

                <div class="row ">

                    <div class="col-12 col-sm-12 col-md-6 py-4" id="test-r">
                        <h1>工具人</h1>
                        <div class="row d-flex justify-content-center">
                            <h4 class="px-1">選擇你的委託</h4>
                            <h4 class="px-1">達成你的使命</h4>
                        </div>


                        <div><a href="/login.html" class="btn btn-primary">尋找您的委託</a></div>
                    </div>


                    <div class="col-12 col-sm-12 col-md-6 py-4">
                        <h1>乾爹</h1>
                        <div class="row d-flex justify-content-center">
                            <h4 class="px-1">送出你的委託</h4>
                            <h4 class="px-1">享受你的服務</h4>
                        </div>
                        <div><a href="/login.html" class="btn btn-primary">建立您的委託</a></div>
                    </div>

                </div>


            </div>
        </div>

        <div class="row d-flex justify-content-center">

            <div class="col-12 col-md-6 col-xl-6 py-md-4 pt-4 pb-0" style="display: flex; flex-direction: column;justify-content: center;text-align: center;">

                <div class="row ">

                    <div class="col-12 col-sm-12 col-md-6 pb-3 " id="test-lt">
                        <div id="test-bb">
                            <h4>會員人數</h4>
                            <h4>1097</h4>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 pb-3" id="test-rt">
                        <div id="test-bb">
                            <h4>委託總數量</h4>
                            <h4>2076</h4>
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <div class="col-12 col-sm-12 col-md-6 pb-3" id="test-lb">
                        <div id="test-bb">
                            <h4>已完成委託</h4>
                            <h4>1245</h4>
                        </div>
                    </div>


                    <div class="col-12 col-sm-12 col-md-6 pb-3" id="test-rb">
                        <div>
                            <h4>未完成委託</h4>
                            <h4>831</h4>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-12 col-md-6 col-xl-6 p-0">
                <img src="https://www.enisa.europa.eu/tips-for-cybersecurity-when-working-from-home/@@@images/d707ed75-fa16-4add-9b38-054a4ac7dfcf.png" class="img-fluid ">
            </div>

        </div>





    </div>

    <div class="text-center mt-md-2 mt-3">
        <a href="#top">
            <h1 class="fas fa-arrow-up"></h1>
        </a>
    </div>

    <div class="py-md-5 py-4" style="background-color:#EFF1F1;">



        <div class="container py-md-2">

            <div class="row">

                <div class="col-12 col-md-3">
                    <h2><a href="/index.html">Toolman</a></h2>
                </div>

                <div class="col-12 col-md-9 row">
                    <div class="col-6 col-md-4 ">
                        <a href="/#"><span class="fa fa-angle-right" aria-hidden="true"></span> 首頁</a>
                    </div>
                    <div class="col-6 col-md-4 ">
                        <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> 關於工具人</a>
                    </div>
                    <div class="col-6 col-md-4 ">
                        <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> 常見問題</a>
                    </div>
                    <div class="col-6 col-md-4 ">
                        <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> 聯絡我們</a>
                    </div>

                    <div class="col-6 col-md-4 ">
                        <a href="/login.html"><span class="fa fa-angle-right" aria-hidden="true"></span> 我要當工具人</a>
                    </div>
                    <div class="col-6 col-md-4 ">
                        <a href="/login.html"><span class="fa fa-angle-right" aria-hidden="true"></span> 我要當乾爹</a>
                    </div>
                </div>

            </div>

        </div>



    </div>


    <div class="bg-dark cpy-right text-center p-0 m-0" style="position: relative;bottom: 0;width:100%;color:white">
        <p class="m-0">© 2020 Toolman. All rights reserved</p>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
@endsection
</html>