<!DOCTYPE html>
<html style="height:100%">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <script src="https://kit.fontawesome.com/d53abecaf1.js"></script>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width">
    <title>ToolMan</title>

    <!-- Scripts -->
<!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js">
    </script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript">
    </script>

    <!-- Styles -->
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css"/>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>
<body style="background-color:#999999;height:100%">
<!-- #F9F9F9 -->
<script src="/script.js"></script>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark "
     style="width:100%;position: fixed; top: 0px;left: 0px;z-index: 1">

    <div class="container pr-0">

        <a class="navbar-brand" href="#">ToolMan</a>


        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>


    </div>
</nav>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container bg-dark">
        <a class="navbar-brand" href="/index.html">ToolMan</a>
    </div>
</nav>


<div class="container  "
     style="background-color:#999999;height:90%;display: flex; flex-direction: column;justify-content: center;text-align: center;">

    <div class="row d-flex align-items-center mx-1">
        <div class="d-none d-md-block col-md-3 p-0"></div>
        <center class="col-12 col-sm-12 col-md-6 pb-3 " style="background-color:white;border-radius:20px;">
            <h1 class="p-3">Admin</h1>


            <form action={{ route('AdminLogin') }} method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0" name="student_id"
                           aria-describedby="emailHelp" placeholder="帳號">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control border-top-0 border-right-0 border-left-0" name="password"
                           placeholder="密碼">
                </div>

                <button type="submit" class="btn btn-secondary btn-lg btn-block ">登入</button>
            </form>

        </center>
       <div class="d-none d-md-block col-md-3 p-0"></div>
    </div>


    ：
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
</html>
