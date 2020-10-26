$( document ).ready(function() {
    var w=$(window).width();
    if(w<=767){
        $("#back").show();
    }else{
        $("#back").hide();
    }
    $(".person").click(function(){
        if(w<=767){
            $("#users-list").hide();
            $("#chat-content").show();
        }else{
            $("#users-list").show();
            $("#chat-content").show();
        }
    });
    $("#back").click(function(){
        $("#users-list").show();
        $("#chat-content").hide();
    });

});

$(window).resize(function() {
    var w=$(window).width();
    if(w<=767){
        $("#back").show();
    }else{
        $("#users-list").show();
        $("#chat-content").show();
        $("#back").hide();
    }
    $(".person").click(function(){
        if(w<=767){
            $("#users-list").hide();
            $("#chat-content").show();
        }else{
            $("#users-list").show();
            $("#chat-content").show();
        }
    });

});

