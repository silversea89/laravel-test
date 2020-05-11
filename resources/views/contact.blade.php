@extends('layouts.app')
@section('content')
<div class="container pt-3 px-1">

    <h2 style="text-align:center;">
        聯絡我們
    </h2>

    <div class="row col-12 m-0 p-0">
        <div class="col-12 col-md-6 px-3 pr-md-2">

            <form>
                <input type="text" class="form-control mb-3" placeholder="使用者名稱">
                <input type="email" class="form-control mb-3" aria-describedby="emailHelp" placeholder="信箱">
                <input type="text" class="form-control mb-3" placeholder="標題">
                <textarea class="form-control mb-3" placeholder="內容" rows="5"></textarea>
                <button type="button" class="btn btn-primary btn-block">送出</button>
            </form>
        </div>
        <div class="col-12 col-md-6 px-3 pl-md-1 mt-3 mt-md-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4360.835803455425!2d120.68111770318352!3d24.14963870410199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34693d68cf62e061%3A0x7091dd73273f6236!2z5ZyL56uL6Ie65Lit56eR5oqA5aSn5a24!5e0!3m2!1szh-TW!2stw!4v1585940620874!5m2!1szh-TW!2stw" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        
        <div class="col-12" style="background-color:#74D2E7;">
        </div>

    </div>



</div>

<div class="py-md-5 py-4 mt-3" style="background-color:#74D2E7;">



    <div class="container py-md-2">

        <h2 class="text-center">
            訂閱以收到最新消息
        </h2>

        <form>
            <div class="row">
                <div class="col-12 col-md-10 px-3 pr-md-1">
                    <input type="email" class="form-control col-12" aria-describedby="emailHelp" placeholder="輸入您的信箱..">
                </div>
                <div class="col-12 col-md-2 px-3 pl-md-2 mt-3 mt-md-0">
                    <button type="button" class="btn btn-danger btn-block ">送出</button>
                </div>
            </div>
        </form>

    </div>



</div>

<div class="py-md-5 py-4 mt-0" style="background-color:#EFF1F1;">

    <div class="container py-md-2">

        <div class="row">

            <div class="col-12 col-md-3">
                <h2><a href="/">Toolman</a></h2>
            </div>

            <div class="col-12 col-md-9 row">
                <div class="col-6 col-md-4 ">
                    <a href="/"><span class="fa fa-angle-right" aria-hidden="true"></span> 首頁</a>
                </div>
                <div class="col-6 col-md-4 ">
                    <a href="{{ route('about') }}"><span class="fa fa-angle-right" aria-hidden="true"></span> 關於工具人</a>
                </div>
                <div class="col-6 col-md-4 ">
                    <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> 常見問題</a>
                </div>
                <div class="col-6 col-md-4 ">
                    <a href="#"><span class="fa fa-angle-right" aria-hidden="true"></span> 聯絡我們</a>
                </div>

                <div class="col-6 col-md-4 ">
                    @guest
                    <a href="{{ route('login') }}"><span class="fa fa-angle-right" aria-hidden="true"></span> 我要當工具人</a>
                    @else
                    <a href="{{ route('list') }}"><span class="fa fa-angle-right" aria-hidden="true"></span> 我要當工具人</a>
                    @endguest
                </div>
                <div class="col-6 col-md-4 ">
                    @guest
                    <a href="{{ route('login') }}"><span class="fa fa-angle-right" aria-hidden="true"></span>我要當乾爹</a>
                    @else
                    <a href="{{ route('list') }}"><span class="fa fa-angle-right" aria-hidden="true"></span>我要當乾爹</a>
                    @endguest
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