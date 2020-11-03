@extends('layouts.app')
@section('content')
    <body class="height100vh antiFlow bg-darker">
    <div class="container">

        <div class="row">
            <div class="col"></div>
            <div class="col-12 col-md-9 col-xl-8">

                <h3 class="mt-3 mb-2 pl-2 font-white">所有通知</h3>

                <div class="bg-derk width100p mb-3">
                    @isset($notification_all)
                        @foreach($notification_all as $i)
                            <a class="dropdown-item navbar-dark border-bottom p-2"
                               href="{{ route('task.detail', $i->href)}}">
                                <div class="row">
                                    <div class="col-auto pr-2">
                                        <img
                                            class="rounded-circle border-0 img-fluid hwAuto" id="NotiImgDiv"
                                            src="{{asset('profileimages/'.$i->photo)}}">
                                    </div>
                                    <div class="col pl-0">
                                        <h5 class="guestProfileName font-white font-weight-bold m-0">
                                            {{$i->message}}
                                        </h5>
                                        <p class="font-grey m-0">
                                            {{$i->created_at}}
                                        </p>
                                        <p class="font-grey m-0">
                                            {{$i->title}}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    @endisset
                </div>


                <nav>
                    {{ $notification_all->links()}}
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
