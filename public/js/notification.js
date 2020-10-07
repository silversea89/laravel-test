var pusher = new Pusher('fc19df46a56b703d0c4a', {
    encrypted: true,
    cluster: 'ap3'
});

// Subscribe to the channel we specified in our Laravel Event
// var channel = pusher.subscribe('status-liked');
var channel1 = pusher.subscribe("taskhasgot.{{Auth::user()->student_id}}");

// Bind a function to a Event (the full Laravel class)
channel1.bind('App\\Events\\taskhasgot', function (data) {
    $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="/list_id_push">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        //委託標題(如果有)
                                    </p>
                                </div>
                            </div>
                        </a>`);
});

var channel2 = pusher.subscribe("taskstart.{{Auth::user()->student_id}}");

// Bind a function to a Event (the full Laravel class)
channel2.bind('App\\Events\\taskstart', function (data) {
    $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="/list_id_push">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        //委託標題(如果有)
                                    </p>
                                </div>
                            </div>
                        </a>`);
});

var channel3 = pusher.subscribe("back.{{Auth::user()->student_id}}");

// Bind a function to a Event (the full Laravel class)
channel3.bind('App\\Events\\back', function (data) {
    $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="/list_id_push">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        //委託標題(如果有)
                                    </p>
                                </div>
                            </div>
                        </a>`);
});

var channel4 = pusher.subscribe("arrive.{{Auth::user()->student_id}}");

// Bind a function to a Event (the full Laravel class)
channel4.bind('App\\Events\\arrive', function (data) {
    $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="/list_id_push">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        //委託標題(如果有)
                                    </p>
                                </div>
                            </div>
                        </a>`);
});

var channel5 = pusher.subscribe("complete.{{Auth::user()->student_id}}");

// Bind a function to a Event (the full Laravel class)
channel5.bind('App\\Events\\complete', function (data) {
    $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="/list_id_push">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        //委託標題(如果有)
                                    </p>
                                </div>
                            </div>
                        </a>`);
});

var channel6 = pusher.subscribe("givetask.{{Auth::user()->student_id}}");

// Bind a function to a Event (the full Laravel class)
channel6.bind('App\\Events\\givetask', function (data) {
    $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="/list_id_push">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        //委託標題(如果有)
                                    </p>
                                </div>
                            </div>
                        </a>`);
});

var channel7 = pusher.subscribe("applicate.{{Auth::user()->student_id}}");

// Bind a function to a Event (the full Laravel class)
channel7.bind('App\\Events\\applicate', function (data) {
    $("#dp-item").append(`<a class="dropdown-item navbar-dark border-bottom p-2" href="/list_id_push">
                            <div class="row">
                                <div class="col-auto pr-2">
                                    <img class="guestProfileImg rounded-circle border-0 img-fluid hwAuto"
                                         src="/src/img/profile.jpg">
                                </div>
                                <div class="col pl-0">
                                    <h5 class="guestProfileName font-white font-weight-bold m-0">
                                        ${data.message}
                                    </h5>
                                    <p class="font-grey m-0">
                                        ${data.time}
                                    </p>
                                    <p class="font-grey m-0">
                                        //委託標題(如果有)
                                    </p>
                                </div>
                            </div>
                        </a>`);
});
