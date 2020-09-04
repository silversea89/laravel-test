@extends('layouts.app')

@section('content')

<body class="height100vh antiFlow bg-darker">

<div class="container antiFlow">
    <div class="row d-flex align-items-center onePageHeight">
        <div class="d-none d-md-block col-md-6 col-xl-7 ">
            <img src="img/temp.png" class="img-fluid" >
        </div>
        <div class="col-12 col-md-6 col-xl-5 font-white onePageHeightAndCenterVertically antiFlow">
            <h1 class="p-3">登入</h1>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @if (session('warning'))
                <div class="alert alert-warning">
                    {{ session('warning') }}
                </div>
            @endif

            @if (session('message'))
                <p class="text-danger">{{ session('message') }}</p>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input id="student_id" type="text" class="form-control @error('student_id') is-invalid @enderror border-top-0 border-right-0 border-left-0 font-white bg-grey"  placeholder="帳號(學號)" name="student_id" value="{{ old('student_id') }}" required autocomplete="student_id" autofocus>
                    @error('student_id')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror border-top-0 border-right-0 border-left-0 font-white bg-grey" placeholder="密碼" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>

                <div class="float-left form-group">
                    <a class="m-0" href="{{ route('register') }}">註冊帳號</a>
                </div>
                <div class="float-right form-group">
                    <a class="m-0" href="{{ route('password.request') }}">忘記密碼</a>
                </div>


                <button type="submit" class="btn btn-orange btn-lg btn-block">
                    {{ __('登入') }}
                </button>
            </form>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>
@endsection
