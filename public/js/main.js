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
    $('[data-toggle="tooltip"]').tooltip();

    let uploadImgForm = $("#upload_img_form")
    $("#upload_img").on("change", (e)=>{
        console.log(uploadImgForm);
        uploadImgForm.submit()
    })
})

