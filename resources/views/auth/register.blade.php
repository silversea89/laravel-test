@extends('layouts.app')

@section('content')

<body style="background-color:#74D2E7;height:100%;">
    <div class="container " style="background-color:#74D2E7;height:90%;display: flex; flex-direction: column;justify-content: center;text-align: center;">

        <center class="row d-flex align-items-center mx-1">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 pb-3" style="background-color:white;border-radius:20px;">
                <h1 class="p-3">ToolMan</h1>


                <form action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="姓名" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 form-group pl-1">
                            <select class="form-control" name="gender">
                                <option value="1">男</option>
                                <option value="2">女</option>
                                <option value="3">其他</option>
                            </select>
                        </div>


                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group">
                            <input id="name" type="text" class="form-control @error('student_id') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="學號" name="student_id" value="{{ old('student_id') }}" oninput="value=value.replace(/[^\d]/g,'')" required autocomplete="student_id" autofocus>
                            @error('student_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="name" type="text" class="form-control @error('department') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="科系" name="department" value="{{ old('department') }}" required autocomplete="tel" autofocus>
                            @error('department')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group">
                        <input id="name" type="text" class="form-control @error('tel') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="電話號碼" name="tel" value="{{ old('tel') }}" oninput="value=value.replace(/[^\d]/g,'')" autocomplete="tel" autofocus>
                        @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="密碼" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input id="password-confirm" type="password" class="form-control border-top-0 border-right-0 border-left-0" placeholder="密碼確認" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <div class="form-group">
                        <div class="row px-3">
                            <div>
                                <label class="my-1">上傳大頭貼：</label>
                            </div>
                            <div>
                                <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg, image/jpg">
                            </div>
                        </div>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg btn-block ">{{ __('送出') }}</button>
                </form>

            </div>
            <div class="d-none d-md-block col-md-6 col-lg-6 col-xl-7 p-0" style="background-color:#74D2E7;">
                <img src="img/register.png" class="img-fluid pl-2">
            </div>
        </center>


    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>

@endsection
