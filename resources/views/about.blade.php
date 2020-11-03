@extends('layouts.app')
@section('content')
<div style="width:100%;background-color:#E9ECEF;">
    <div class="container p-5">
        <h3>幫助您解決校園內遇到的瓶頸<br>
            豐富您的校園生活<br><br>
            Toolman會是您的最佳選擇
        </h3>
    </div>
</div>

<div class="container pt-4 ">
    <div class="row ">

        <div class="col-12 col-md-6 order-12 order-md-0 p-0">
            <!-- https://www.enisa.europa.eu/tips-for-cybersecurity-when-working-from-home/@@images/d707ed75-fa16-4add-9b38-054a4ac7dfcf.png -->
            <img src="{{asset('img/about1.png')}}" class="img-fluid pt-4 pb-0">
        </div>
        <div class="col-12 col-md-6 " style="display: flex; flex-direction: column;justify-content: center;text-align: left;">

            <h2 class="mb-1">遇到困難了嗎？</h2>
            <h5 class="pl-1">在這裡你可以提出你的委託，<br>
                不管是想請人跑腿、找人教學，<br>
                或是遇到突發狀況，需要找人求救，<br>
                都沒問題！<br>
                </h5>
        </div>
    </div>

    <div class="row d-flex justify-content-center">

        <div class="col-12 col-md-6 col-xl-6 py-md-4 pt-4 pb-0" style="display: flex; flex-direction: column;justify-content: center;text-align: left;">
            <h2 class="mb-1">想當斜槓青年嗎？</h2>
            <h5 class="pl-1">在這裡你可以依據自己的能力來接受委託，<br>
                幫助他人，<br>
                還能獲得額外的收入！<br></h5>
        </div>

        <div class="col-12 col-md-6 col-xl-6 p-0">
            <img src="{{asset('img/about2.png')}}" class="img-fluid ">
        </div>
    </div>
</div>

<div class="text-center mt-md-5 mt-2">
    <a href="#top">
        <h1 class="fas fa-arrow-up"></h1>
    </a>
</div>

<div class="py-md-5 py-4" style="background-color:#EFF1F1;">
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
            <a href="{{ route('list',"newest") }}"><span class="fa fa-angle-right" aria-hidden="true"></span> 我要當工具人</a>
            @endguest
        </div>
        <div class="col-6 col-md-4 ">
            @guest
            <a href="{{ route('login') }}"><span class="fa fa-angle-right" aria-hidden="true"></span>我要當乾爹</a>
            @else
            <a href="{{ route('list',"newest") }}"><span class="fa fa-angle-right" aria-hidden="true"></span>我要當乾爹</a>
            @endguest
        </div>
    </div>

</div>

</div>
</div>

<div class="bg-derk cpy-right text-center p-0 m-0" style="position: relative;bottom: 0;width:100%;color:white">
    <p class="m-0">© 2020 Toolman. All rights reserved</p>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
@endsection
