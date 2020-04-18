@extends('layouts.app')

@section('content')

<body style="background-color:#74D2E7;height:100%;">
    <div class="container " style="background-color:#74D2E7;height:90%;display: flex; flex-direction: column;justify-content: center;text-align: center;">

        <center class="row d-flex align-items-center mx-1">
            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-5 pb-3" style="background-color:white;border-radius:20px;">
                <h1 class="p-3">ToolMan</h1>


                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group">
                            <input for="LastName" id="name" type="text" class="form-control @error('LastName') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="姓氏" name="LastName" value="{{ old('LastName') }}" required autocomplete="LastName" autofocus>
                            @error('LastName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6 form-group">
                            <input for="FirstName" id="name" type="text" class="form-control @error('LastName') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="名字" name="FirstName" value="{{ old('FirstName') }}" required autocomplete="FirstName" autofocus>
                            @error('FirstName')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                    </div>

                    <div class="form-group">
                        <input for="tel" id="name" type="text" class="form-control @error('tel') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="電話號碼" name="tel" value="{{ old('tel') }}" autocomplete="tel" autofocus>
                        @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input for="email" id="email" type="email" class="form-control @error('email') is-invalid @enderror border-top-0 border-right-0 border-left-0" aria-describedby="emailHelp" placeholder="電子郵件" name="email" value="{{ old('email') }}" required autocomplete="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input for="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror border-top-0 border-right-0 border-left-0" placeholder="密碼" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input for="password-confirm" id="password-confirm" type="password" class="form-control border-top-0 border-right-0 border-left-0" placeholder="密碼確認" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    <br>

                    <button type="submit" class="btn btn-primary btn-lg btn-block ">{{ __('送出') }}</button>
                </form>

            </div>
            <div class="d-none d-md-block col-md-6 col-lg-6 col-xl-7 p-0" style="background-color:74D2E7;">
                <img src="PNG/register.png" class="img-fluid pl-2">
            </div>
        </center>


    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
</body>





<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('註冊帳號') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-group row">
                            <label for="LastName" class="col-md-4 col-form-label text-md-right">{{ __('姓氏') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('LastName') is-invalid @enderror" name="LastName" value="{{ old('LastName') }}" required autocomplete="LastName" autofocus>

                                @error('LastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="FirstName" class="col-md-4 col-form-label text-md-right">{{ __('名子') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('LastName') is-invalid @enderror" name="FirstName" value="{{ old('FirstName') }}" required autocomplete="FirstName" autofocus>

                                @error('FirstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tel" class="col-md-4 col-form-label text-md-right">{{ __('電話號碼') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" autocomplete="tel" autofocus>

                                @error('tel')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('電子信箱') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('密碼') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('確認密碼') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('送出') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> -->
@endsection