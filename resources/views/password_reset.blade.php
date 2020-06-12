@extends('layouts.app')
@section('content')
    <body style="background-color:#74D2E7;height:100%;">
<div class="container" style="background-color:#74D2E7;height:90%;display: flex; flex-direction: column;justify-content: center;text-align: center;">

    <center class="row d-flex align-items-center mx-1">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 pb-3"
             style="background-color:white;border-radius:20px;">
            <h1 class="p-3">更改密碼</h1>
            <form action="{{route("Password.Reset")}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="password" class="form-control border-top-0 border-right-0 border-left-0" name="old_password"
                           placeholder="舊密碼">
                </div>
                <div class="form-group" style="position:relative">
                    <input type="password" class="form-control border-top-0 border-right-0 border-left-0" name="new_password"
                           placeholder="新密碼">
                    <i class="fas fa-question-circle" style="color:#666;position:absolute;top:11px;right:0px" data-toggle="tooltip" data-placement="left" title="密碼至少8字以上。"></i>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control border-top-0 border-right-0 border-left-0" name="confirm_password"
                           placeholder="確認密碼">
                </div>
                @if (session('message'))
                    <p class="text-danger">{{ session('message') }}</p>
                @endif
                <button type="submit" class="btn btn-primary btn-lg btn-block ">確認</button>
            </form>
        </div>
        <div class="d-none d-md-block col-md-6 col-lg-6 col-xl-7 p-0" style="background-color:#74D2E7;">
            <img src="/img/repass.gif" class="img-fluid pl-2">
        </div>
    </center>
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
