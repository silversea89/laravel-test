@extends('layouts.app')
@section('content')
    <body class="height100vh antiFlow bg-darker">
    <div class="col-12">
        <div class="card m-0">
            <div class="row no-gutters">
                <div id="users-list" class="col-xl-4 col-lg-4 col-md-4 col-12">
                    <div class="users-container">
                        <div class="chat-search-box">
                            <div class="input-group">
                                <input class="form-control font-white bg-light-grey" placeholder="Search">
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-grey">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <ul class="users">
                            <li class="person  active-user" >
                                <div class="user">
                                    <img src="/src/img/profile.jpg">
                                </div>
                                <p class="name-time">
                                    <span class="name">王小明</span>
                                    <span class="time ">01/01/2020</span>
                                </p>
                            </li>
                            <li class="person" >
                                <div class="user">
                                    <img src="/src/img/profile.jpg">
                                </div>
                                <p class="name-time">
                                    <span class="name">何小鋒</span>
                                    <span class="time">01/01/2019</span>
                                </p>
                            </li>
                            <li class="person" >
                                <div class="user">
                                    <img src="/src/img/profile.jpg">
                                </div>
                                <p class="name-time">
                                    <span class="name">柯小勛</span>
                                    <span class="time">01/01/2018</span>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="chat-content" class="col-xl-8 col-lg-8 col-md-8  col-12">
                    <div class="selected-user font-white">
                        <strong>何小鋒</strong>
                        <span id="back">
              <button type="button" class="btn btn-grey fa fa-level-up"  aria-hidden="true"></button>
            </span>

                    </div>
                    <div class="chat-container">
                        <ul class="chat-box chatContainerScroll">
                            <li class="chat-left">
                                <div class="chat-avatar">
                                    <img src="/src/img/profile.jpg">
                                    <div class="chat-name font-white">王小明</div>
                                </div>
                                <div class="chat-text">Hello</div>
                                <div class="chat-hour font-white">18:55 <span class="fa fa-check-circle"></span></div>
                            </li>
                            <li class="chat-right">
                                <div class="chat-hour font-white">18:56 <span class="fa fa-check-circle"></span></div>
                                <div class="chat-text bg-orange   font-white">Hi</div>
                                <div class="chat-avatar">
                                    <img src="/src/img/profile.jpg">
                                    <div class="chat-name font-white">何小鋒</div>
                                </div>
                            </li>
                            <li class="chat-left">
                                <div class="chat-avatar">
                                    <img src="/src/img/profile.jpg">
                                    <div class="chat-name font-white">王小明</div>
                                </div>
                                <div class="chat-text">今天要吃啥?</div>
                                <div class="chat-hour font-white">18:57 <span class="fa fa-check-circle"></span></div>
                            </li>
                            <li class="chat-right">
                                <div class="chat-hour font-white">18:58 <span class="fa fa-check-circle"></span></div>
                                <div class="chat-text bg-orange font-white  ">今晚我想來點<br/>星巴克的特選馥郁那堤配起司牛肉可頌</div>
                                <div class="chat-avatar">
                                    <img src="/src/img/profile.jpg">
                                    <div class="chat-name font-white">何小鋒</div>
                                </div>
                            </li>
                            <li class="chat-left">
                                <div class="chat-avatar">
                                    <img src="/src/img/profile.jpg">
                                    <div class="chat-name font-white">王小明</div>
                                </div>
                                <div class="chat-text">沒問題!</div>
                                <div class="chat-hour font-white">18:59 <span class="fa fa-check-circle"></span></div>
                            </li>
                        </ul>

                        <div class="form-group mt-3 mb-0 row px-md-3">
                            <input type="text" class="form-control col-md-11 col-9 font-white bg-grey" placeholder="Enter...">

                            <button type="button" class="btn btn-grey col-md-1 col-3">
                                <i class="fa fa-send"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
            crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
            crossorigin="anonymous">
    </script>
    <!--Bootstrap-->
    </body>
@endsection
