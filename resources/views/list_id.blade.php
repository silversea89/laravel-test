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
                    <button type="submit" class="btn btn-primary my-0 mb-3">確認送出</button>
                </center>
            </form>


        </div>
    </div>
</div>

<div class="container pt-3 pb-0 " style="background-color:white;">

    <div class="" style="position:relative;">
        <h3>委託編號：#5269</h3>
        <h3>工具人：<a href="/profile.html">王小明</a></h3>
        <div class="btn-group" style="position:absolute;top:0px;right:0px">
            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                進度回報
            </button>
            <div class="dropdown-menu dropdown-menu-right">
                <form>
                    <input type="text" name="status" value="go" style="display:none" />
                    <button type="submit" class="dropdown-item">去程</button>
                </form>
                <div class="dropdown-divider"></div>
                <form>
                    <input type="text" name="status" value="back" style="display:none" />
                    <button type="submit" class="dropdown-item">回程</button>
                </form>
                <div class="dropdown-divider"></div>
                <form>
                    <input type="text" name="status" value="wait" style="display:none" />
                    <button type="submit" class="dropdown-item">抵達</button>
                </form>
            </div>
        </div>

        <div class="row  my-3">
            <div class="col-1 col-xs-1 col-sm-2 col-md-3 col-lg-3"></div>
            <center class="col-2 col-sm-1 p-0">
                <h1 class="fas fa-circle m-0"></h1>
                <h6>去程</h6>
            </center>
            <center class="col p-0">
                <h1 class="fas fa-arrow-right m-0"></h1>
            </center>
            <center class="col-2 col-sm-1 p-0">
                <h1 class="fas fa-circle m-0"></h1>
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
    </div>
    <div class="row ">
        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 pr-0 pl-0">
            <img src="{{asset('img/food.jpg')}}" class="img-fluid pr-0" >
        </div>
        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7 pt-1">


            <h3>50嵐8冰綠一杯</h3>
            <span class="badge badge-primary">代購物品</span>
            <h5>委託內容：<p>午餐好油膩，想喝一杯8冰綠，半糖去冰謝謝！</p></h5>
            <h5>購買地點：<p>50嵐</p></h5>
            <h5>面交地點：<p>資訊4樓電梯前</p></h5>
            <h5>面交時間：<p>2020/04/01 12:30</p></h5>
            <h5>酬勞金額：<p>$50</p></h5>
            <p class="m-0">老闆:<a href="#">王小明</a></p>
            <p class="m-0">發佈於2020/04/01 11:00</p>
            <p class="m-0">截止期限：2020/04/01 13:00</p>

            <div class="d-flex justify-content-center justify-content-md-start" style="width:100%">
                <button type="button" class="btn btn-primary mt-2 mb-3"  data-toggle="modal" data-target=".content0">委託完成</button>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark px-0" style="width:100%;position: fixed; bottom: 0px;right: 0px;">
    <div class="container bg-dark">

        <div class="row ml-0" style="width:100%">



            <a class="col-3 col-sm-3" href="/list.html" style="text-decoration:none;color:black">
                <center>
                    <i class="fas fa-clipboard-list" style="color:white"></i>
                    <p class="m-0" style="color:white">所有</p>
                </center>
            </a>

            <a class="col-3 col-sm-3" href="/list_push.html" style="text-decoration:none;color:black">
                <center>
                    <i class="fas fa-arrow-up" style="color:white"></i>
                    <p class="m-0" style="color:white">已提出</p>
                </center>
            </a>

            <a class="col-3 col-sm-3" href="/list_ING.html" style="text-decoration:none;color:black">
                <center>
                    <i class="fas fa-arrow-down" style="color:white"></i>
                    <p class="m-0" style="color:white">已接受</p>
                </center>
            </a>

            <a class="col-3 col-sm-3" href="/profile.html" style="text-decoration:none;color:black">
                <center>
                    <i class="fas fa-user" style="color:white"></i>
                    <p class="m-0" style="color:white">我的</p>
                </center>
            </a>
        </div>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
@endsection
