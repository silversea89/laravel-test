<!DOCTYPE html>
<html style="height:100%">

<head>
    <!-- Demo styling -->
    <link href="/tablesorter-master/docs/css/jq.css" rel="stylesheet">

    <!-- jQuery: required (tablesorter works with jQuery 1.2.3+) -->
    <script src="/tablesorter-master/docs/js/jquery-1.2.6.min.js"></script>

    <!-- Pick a theme, load the plugin & initialize plugin -->
    <link href="/tablesorter-master/dist/css/theme.default.min.css" rel="stylesheet">
    <script src="/tablesorter-master/dist/js/jquery.tablesorter.js"></script>
    <script src="/tablesorter-master/dist/js/jquery.tablesorter.widgets.js"></script>

    <!-- Demo styling -->
    <link href="/tablesorter-master/docs/css/jq.css" rel="stylesheet">

    <!-- jQuery: required (tablesorter works with jQuery 1.2.3+) -->
    <script src="/tablesorter-master/docs/js/jquery-1.2.6.min.js"></script>

    <!-- Pick a theme, load the plugin & initialize plugin -->
    <link href="/tablesorter-master/dist/css/theme.default.min.css" rel="stylesheet">
    <script src="/tablesorter-master/dist/js/jquery.tablesorter.js"></script>
    <script src="/tablesorter-master/dist/js/jquery.tablesorter.widgets.js"></script>


    <script>
        $(function () {

            $('.wrapper-table').tablesorter({
                theme: 'default',
                widgets: ['zebra', 'resizable'],
                widgetOptions: {
                    resizable_addLastColumn : true,
                    resizable_widths : [ '10%', '20%', '10%', '40%','20%']
                }
            });
        });
    </script>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css"
    />
    <script src="https://kit.fontawesome.com/d53abecaf1.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>ToolMan</title>
    <link href="/css/style.css" rel="stylesheet" type="text/css"/>
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
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.Dashboard')}}">儀錶板</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{route('Admin.Tasks')}}">所有委託</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.Member')}}">會員</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.Report')}}">檢舉名單</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('Admin.Contact')}}">聯絡我們</a>
                </li>
            </ul>
            <div class="form-inline my-2 my-lg-0">
                <a class="btn btn-danger my-2 my-sm-0" href="/admin">登出</a>
            </div>
        </div>


    </div>
</nav>


<div class="container p-0" style="background-color:#999999;">


    <table class="tablesorter wrapper-table  mt-0" style="width:100%">
        <thead>
        <tr>
            <th>使用者名稱</th>
            <th>信箱</th>
            <th>標題</th>
            <th>內容</th>
            <th>發布日期</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contact as $i)
        <tr>
            <td>{{$i->User}}</td>
            <td>{{$i->Email}}</td>
            <td>{{$i->Title}}</td>
            <td>{{$i->Content}}</td>
            <td>{{$i->created_at}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>


<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
        crossorigin="anonymous"></script>
</body>

</html>
