@extends('layouts.app')

@section('content')

<body style="background-color:#74D2E7;height:100%;">
    <div class="container  " style="background-color:#74D2E7;height:90%;display: flex; flex-direction: column;justify-content: center;text-align: center;">

        <center class="row d-flex align-items-center mx-1">
            <div class="d-none d-md-block col-md-6 col-lg-6 col-xl-7 p-0">
                <img src="img/login.png" class="img-fluid">
            </div>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 pb-3 " style="background-color:white;border-radius:20px;">
                <h1 class="p-3">ToolMan</h1>


                <form method="POST" action="{{ route('login') }}">
                @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror border-top-0 border-right-0 border-left-0" aria-describedby="emailHelp" placeholder="電子郵件(帳號)" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
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
                        <a href="#">忘記密碼</a>
                    </div>

                    
                    <button type="submit" class="btn btn-primary btn-lg btn-block ">
                                    {{ __('登入') }}
                    </button>
                </form>

            </div>
        </center>
    </div>
</body>
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('auth.Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror border-top-0 border-right-0 border-left-0" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection