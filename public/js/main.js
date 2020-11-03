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

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#profileImg')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}
