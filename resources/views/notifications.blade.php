@extends('layouts.app')
@section('content')
    <body class="height100vh antiFlow bg-darker">
    <div class="container">

        <div class="row">
            <div class="col"></div>
            <div class="col-12 col-md-9 col-xl-8">

                <h3 class="mt-3 mb-2 pl-2 font-white">所有通知</h3>

                <div class="bg-dark width100p mb-3">
                    <a class="dropdown-item navbar-dark p-2" href="/list_id_push">
                        <div class="row">
                            <div class="col-auto pr-2">
                                <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                     src="/src/img/profile.jpg">
                            </div>
                            <div class="col pl-0">
                                <h5 class="guestProfileName font-white font-weight-bold m-0">
                                    柯國勛 回程中
                                </h5>
                                <p class="font-grey m-0">
                                    July 15 at 12:18 PM
                                </p>
                                <p class="font-grey m-0">
                                    三商巧福原汁牛肉麵套餐一份
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <nav>
                    <ul class="pagination justify-content-center">
                        <li class="page-item"><a class="page-link" href="#" aria-label="Previous"><span
                                    aria-hidden="true">«</span></a></li>
                        <li class="page-item"><a class="page-link active" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#" aria-label="Next"><span
                                    aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
            <div class="col"></div>
        </div>
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
@endsection
