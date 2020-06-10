@extends('layouts.app')

@section('content')

<body style="background-color:#74D2E7;height:100%;">
    <div class="container" style="background-color:#74D2E7;height:90%;display: flex; flex-direction: column;justify-content: center;text-align: center;">

        <center class="row d-flex align-items-center mx-1">
            <div class="d-none d-md-block col-md-6 col-lg-6 col-xl-7 p-0">
                <img src="img/login.png" class="img-fluid">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 pb-3 " style="background-color:white;border-radius:20px;">
                <h1 class="p-3">ToolMan</h1>
                @if (session('message'))
                    <p class="text-danger">{{ session('message') }}</p>
                @endif

                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="form-group">
                        <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror border-top-0 border-right-0 border-left-0"  placeholder="帳號(學號)" name="student_id" value="{{ old('student_id') }}" required autocomplete="student_id" autofocus>
                        @error('student_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="密碼" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="float-left form-group">
                        <a href="{{ route('register') }}">註冊帳號</a>
                    </div>
                    <div class="float-right form-group">
                        <a href="{{ route('password.request') }}">忘記密碼</a>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block ">
                                    {{ __('登入') }}
                    </button>
                </form>
            </div>
        </center>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
@endsection
