$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(document).on("change", ".motelModal .province", function () {
        var province_id = this.value;
        console.log(province_id);
        var url = $(this).attr("data-url");
        console.log(url);
        $(".form-group").siblings(".district").html("");
        $.ajax({
            type: "POST",
            url: url,
            data: {
                province_id: province_id,
            },
            success: function (result) {
                console.log(result);
                $(".district").html(
                    '<option value="">Select District</option>'
                );
                $.each(result, function (key, value) {
                    $("#district").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.name +
                            "</option>"
                    );
                });
                $(".ward").html(
                    '<option value="">Select District First</option>'
                );
            },
        });
    });
    $(document).on("change", ".motelModal .district", function () {
        var district_id = this.value;
        var url = $(this).attr("data-url");
        console.log(url);
        $(".ward").html("");
        $.ajax({
            type: "POST",
            url: url,
            data: {
                district_id: district_id,
            },
            success: function (result) {
                $(".ward").html('<option value="">Select Ward</option>');
                $.each(result, function (key, value) {
                    $(".ward").append(
                        '<option value="' +
                            value.id +
                            '">' +
                            value.name +
                            "</option>"
                    );
                });
            },
        });
    });
});
