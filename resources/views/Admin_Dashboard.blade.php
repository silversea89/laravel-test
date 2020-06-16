<!DOCTYPE html>
<html style="height:100%">

<head>
    <meta charset="utf-8">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"/>
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
<script src="/script.js">

</script>


<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

    <div class="container pr-0">

        <a class="navbar-brand" href="/">ToolMan</a>

        <div class=" navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('Admin.Dashboard')}}">儀錶板</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.Tasks')}}">所有委託</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.Member')}}">會員</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.Report')}}">檢舉名單</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.Contact')}}">聯絡我們</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a class="btn btn-danger my-2 my-sm-0" href="{{route('Admin.logout')}}">登出</a>
            </div>
        </div>


    </div>
</nav>


<div class="container " style="background-color:#999999;">


    <div class="row px-3 px-sm-0">

        <div class="col-12 col-md-6 mt-3 px-0 pr-md-2">
            <div class="col-12 m-0 p-2"
                 style="background-color:white;border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%;">
                <h3>今日瀏覽次數：{{$today_count->Count}}</h3>
                <h3>網站瀏覽次數：{{$all_count}}</h3>
                <h3>總會員數量：{{$members_amount}}</h3>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-3 px-0 pl-md-2">
            <div class="col-12 m-0 p-2"
                 style="background-color:white;border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%;">
                <h3>每個月新增的委託數:{{$month_tasks_amount}}</h3>
                <h3>每個月新增的會員數:{{$month_members_amount}}</h3>
                <h3>遭檢舉的委託數:{{$reported_tasks_amount}}</h3>
                <h3>總委託數量:{{$all_tasks_amount}}</h3>
            </div>
        </div>

        <div class="col-12 col-md-6 mt-3 px-0 pr-md-2">
            <div class="col-12 m-0 p-2"
                 style="background-color:white;border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%;">


                <canvas id="canvasPieSex"></canvas>
                <script>
                    var borderWidth = 100;
                    //資料標題
                    var labels = ['男', '女', '其他'];

                    var ctx = document.getElementById('canvasPieSex').getContext('2d');
                    var pieChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                //預設資料
                                data: [{{$man_amount}}, {{$woman_amount}}, {{$else_amount}}],
                                backgroundColor: [
                                    //資料顏色
                                    "#36A2EB",
                                    "#FF6384",
                                    "#FFCD56"
                                ],
                            }],
                        }
                    });
                </script>


            </div>
        </div>

        <div class="col-12 col-md-6 mt-3 px-0 px-md-2">
            <div class="col-12 m-0 p-2"
                 style="background-color:white;border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%;">

                <canvas id="canvasPieAppointment"></canvas>
                <script>
                    var borderWidth = 100;
                    //資料標題
                    var labels = ['已完成', '未完成', '執行中','違規'];

                    var ctx = document.getElementById('canvasPieAppointment').getContext('2d');
                    var pieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                //預設資料
                                data: [{{$complete_amount}},{{$selectable_amount}}, {{$processing_amount}},{{$blocked_amount}}],
                                backgroundColor: [
                                    //資料顏色
                                    "#4BC0C0",
                                    "#FF6384",
                                    "#FFCD56",
                                    "#"
                                ],
                            }],
                        }
                    });
                </script>

            </div>
        </div>


        <div class="col-12 col-md-12 my-3 px-0 pl-md-2">
            <div class="col-12 m-0 p-2"
                 style="background-color:white;border-radius:20px;box-shadow:0 0.1rem 0.5rem rgba(0, 0, 0, 0.6);height:100%;">


                <canvas id="canvasMixMajor"></canvas>
                <script>
                    var ctx = document.getElementById('canvasMixMajor');

                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: [@foreach($department_list as $i)
                            "{{$i->department}}",
                                @endforeach],
                            datasets: [{
                                label: '男',
                                data: [@foreach($department_man_amount as $i)
                                    "{{$i}}",
                                    @endforeach],
                                // this dataset is drawn below
                                order: 1,
                                backgroundColor: "#36A2EB"
                            }, {
                                label: '女',
                                data: [@foreach($department_woman_amount as $i)
                                    "{{$i}}",
                                    @endforeach],
                                // this dataset is drawn below
                                order: 2,
                                backgroundColor: "#FF6384"
                            }, {
                                label: '其他',
                                data: [@foreach($department_else_amount as $i)
                                    "{{$i}}",
                                    @endforeach],
                                // this dataset is drawn on top
                                order: 3,
                                backgroundColor: "#FFCD56"
                            }]
                        },
                        options: {
                            scales: {
                                xAxes: [{stacked: true}],
                                yAxes: [{stacked: true}]
                            }
                        }
                    });
                </script>

            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous">

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous">

</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous">

</script>
</body>

</html>
