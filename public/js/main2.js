$( document ).ready(function() {
    var w=$(window).width();
    if(w<=750){
        $("#newest").addClass("flex flex-nowrap overflow-auto");
    }else{
        $("#newest").removeClass("flex flex-nowrap overflow-auto");
    }
});

$("#arrow").click(function(){
    $("html,body").animate({scrollTop:$("body").offset().top},800);
});

$(window).resize(function() {
    var w=$(window).width();
    if(w<=750){
        $("#newest").addClass("flex flex-nowrap overflow-auto");
    }else{
        $("#newest").removeClass("flex flex-nowrap overflow-auto");
    }
});
