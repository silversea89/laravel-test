$(() => {
    $("#classification").change(function () {
        let selected = $("#classification").val();
        $("#placeLabel").show();
        $("#place").show();
        $("#picker").show();
        $("#tradePlaceLabel").show();
        $("#tradePlace").show();

        console.log($("#classification").val());

        if (selected === "Buy") {
            $("#productLabel").text("標題");
            $("#placeLabel").text("購買地點");
            $("#rewardLabel").text("酬勞金額");

        } else if (selected === "Book") {
            $("#productLabel").text("書名");
            $("#rewardLabel").text("希望價格");
            $("#placeLabel").hide();
            $("#place").hide();
            $("#picker").hide();
            $("#place").removeClass("required");
        } else if (selected === "Teach") {
            $("#productLabel").text("科目");
            $("#placeLabel").text("教學地點");
            $("#tradePlaceLabel").hide();
            $("#tradePlace").hide();
            $("#tradePlace").removeClass("required");
        } else if (selected === "Service") {
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
})
