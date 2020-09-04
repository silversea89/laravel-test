$(window).resize(function(){
    if(window.screen.width>=768){
        $(function () { $('#collapseFilter').collapse('show')});
    }else{
        $(function () { $('#collapseFilter').collapse('hide')});
    }
});
$(document).ready(function () {
    if(window.screen.width>=768){
        $(function () { $('#collapseFilter').collapse('show')});
    }else{
        $(function () { $('#collapseFilter').collapse('hide')});
    }
});

$(function () {
    $('[data-toggle="tooltip"]').tooltip()
})

