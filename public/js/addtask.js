$(document).ready(function () {
    $("#product").attr("required", true);
    $("#datepicker").attr('required', true);
    $("#timepicker").attr('required', true);
    $("#datepicker2").attr('required', true);
    $("#timepicker2").attr('required', true);
    $("#place").attr('required', true);
    $("#tradePlace").attr('required', true);
    $("#reward").attr('required', true);
    $("#detail").attr('required', true);


    $("#classification").change(function () {
        var selected = $("#classification").val();
        $("#placeLabel").show();
        $("#place").show();
        $("#picker").show();
        $("#tradePlaceLabel").show();
        $("#tradePlace").show();
        $("#product").attr("required", true);
        $("#datepicker").attr('required', true);
        $("#timepicker").attr('required', true);
        $("#datepicker2").attr('required', true);
        $("#timepicker2").attr('required', true);
        $("#place").attr('required', true);
        $("#tradePlace").attr('required', true);
        $("#reward").attr('required', true);
        $("#detail").attr('required', true);

        if (selected == "Buy") {
            $("#productLabel").text("購買物品");
            $("#placeLabel").text("購買地點");
        } else if (selected == "Book") {
            $("#productLabel").text("書名");
            $("#rewardLabel").text("希望價錢");
            $("#placeLabel").hide();
            $("#place").hide();
            $("#picker").hide();
            $("#place").attr('required', false);
            $("#datepicker").attr('required', false);
            $("#timepicker").attr('required', false);
        } else if (selected == "Teach") {
            $("#productLabel").text("科目");
            $("#placeLabel").text("教學地點");
            $("#tradePlaceLabel").hide();
            $("#tradePlace").hide();
            $("#tradePlace").attr('required', false);
        } else if (selected == "Service") {
            $("#productLabel").text("名稱");
            $("#placeLabel").text("工作地點");
        } else {
            $("#productLabel").text("標題");
            $("#placeLabel").text("地點");
        }
    });

    $("#reward").keyup(function () {
        this.value = this.value.replace(/^(0+)|[^\d]/g, "");
    });

    $('#error').on('hidden.bs.modal', function () {
        $(document.body).addClass("modal-open");
    })
});
