@extends('layouts.app')

@section('content')

<body class="height100vh antiFlow bg-darker">

<div class="container antiFlow">
    <div class="row d-flex align-items-center onePageHeight">
        <div class="d-none d-md-block col-md-6 col-lg-6 col-xl-7 ">
            <img src="img/temp.png" class="img-fluid" >
        </div>
        <div class="col-12 col-md-6 col-lg-6 col-xl-5 font-white onePageHeightAndCenterVertically antiFlow">
            <h1 class="p-3">註冊</h1>
            <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-6 form-group pr-1">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-top-0 border-right-0 border-left-0 font-white bg-grey" placeholder="姓名" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 form-group pl-1">
                        <select class="form-control bg-grey" name="gender">
                            <option value="1">男</option>
                            <option value="2">女</option>
                            <option value="3">其他</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 form-group pr-1">
                        <input id="name" type="text" class="form-control @error('student_id') is-invalid @enderror border-top-0 border-right-0 border-left-0 font-white bg-grey" placeholder="學號" name="student_id" value="{{ old('student_id') }}" oninput="value=value.replace(/[^\d]/g,'')" required autocomplete="student_id" autofocus>
                        @error('student_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col-6 form-group pl-1">
                        <select class="form-control bg-grey " name="department">
                            @foreach($department as $department)
                                <option
                                    value="{{$department->De_Value}}">{{$department->De_Name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <input id="name" type="text" class="form-control @error('tel') is-invalid @enderror border-top-0 border-right-0 border-left-0 font-white bg-grey" placeholder="電話號碼" name="tel" value="{{ old('tel') }}" oninput="value=value.replace(/[^\d]/g,'')" autocomplete="tel" autofocus>
                    @error('tel')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group" style="position:relative">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-top-0 border-right-0 border-left-0 font-white bg-grey" placeholder="密碼" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                    <i class="fas fa-question-circle" style="color:#666;position:absolute;top:11px;right:0px" data-toggle="tooltip" data-placement="left" title="密碼至少8字以上。"></i>
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group ">
                    <input id="password-confirm" type="password" class="form-control border-top-0 border-right-0 border-left-0 font-white bg-grey" placeholder="密碼確認" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="form-group textLeft" style="position:relative">
                    <label class="btn btn-outline-orange m-0">
                        <input name="image" id="upload_img" style="display:none;" type="file" accept="image/png, image/jpeg, image/jpg" onchange="readURL(this);">
                        <i class="fa fa-photo"></i>&nbsp;上傳大頭貼
                    </label>
                    @error('image')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <i class="fas fa-question-circle" style="color:#666;position:absolute;top:11px;right:0px" data-toggle="tooltip" data-placement="left" title="照片大小2MB以下，若無上傳照片即使用預設圖片"></i>
                </div>

                <center>
                    <div id="profileImgDiv">
                        <div class="height100p rounded-circle">
                            <div class="div-square ">
                                <img class="rounded-circle border div-square-content img-fluid hwAuto" src="profileimages/Man.png" id="profileImg">
                            </div>
                        </div>
                    </div>
                </center>

                <div class="float-left form-group">
                    <a class="m-0" href="/login">已有帳號？點擊登入</a>
                </div>
                <button type="submit" class="btn btn-orange btn-lg btn-block ">確認</button>

            </form>
        </div>
    </div>
</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

@endsection
