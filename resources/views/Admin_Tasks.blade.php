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
                    resizable_addLastColumn: true,
                    resizable_widths: ['5%', '10%', '15%', '30%', '14%','7%', '14%', '5%']
                }
            });

            // $('.full-width-table').tablesorter({
            //   theme : 'default',
            //   // initialize zebra striping and resizable widgets on the table
            //   widgets: [ 'zebra', 'resizable', 'stickyHeaders' ],
            //   widgetOptions: {
            //     resizable: true,
            //     // These are the default column widths which are used when the table is
            //     // initialized or resizing is reset; note that the "Age" column is not
            //     // resizable, but the width can still be set to 40px here
            //     resizable_widths : [ '10%', '10%', '40px', '10%', '100px' ]
            //   }
            // });

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

<nav class="navbar navbar-expand-lg navbar-dark bg-derk ">

    <div class="container pr-0">

        <a class="navbar-brand" href="/">ToolMan</a>

        <div class=" navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('Admin.Dashboard')}}">儀錶板</a>
                </li>
                <li class="nav-item active">
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
                <a class="btn btn-danger my-2 my-sm-0" href="{{ route('Admin.logout') }}">登出</a>
            </div>
        </div>


    </div>
</nav>


<div class="container p-0" style="background-color:#999999;">


    <table class="tablesorter wrapper-table  mt-0" style="width:100%">
        <thead>
        <tr>
            <th>委託人</th>
            <th>學號</th>
            <th>標題</th>
            <th>內容</th>
            <th>交易時間</th>
            <th>狀態</th>
            <th>發布時間</th>
            <th>雇主評價</th>

        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $i)
        <tr>
            <td><a href="{{ route('profile.id', $i->Student_id) }}">{{$i->name}}</a></td>
            <td>{{$i->Student_id}}</td>
            <td><a href="{{ route('task.detail', $i->Tasks_id)}}">{{$i->Title}}</a></td>
            <td>{{$i->Content}}</td>
            <td>{{$i->DateTime}}</td>
            <td>{{$i->Status}}</td>
            <td>{{$i->created_at}}</td>
            <td>@if($i->host_rate_avg == null) 無 @else {{$i->host_rate_avg}}@endif
        </tr>
        @endforeach
        </tbody>
    </table>


    <nav aria-label="Page navigation example" class="d-flex justify-content-center">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>


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
