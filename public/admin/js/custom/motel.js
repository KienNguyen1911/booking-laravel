function getData() {
    $.ajax({
        type: "GET",
        url: "/admin/motels",
        success: function (data) {
            console.log(data);
            $(".row-motel .card-body").html(data);
        },
        error: function (data) {
            console.log(data);
        },
        done: function (data) {
            console.log(data);
        },
    });
}

function createMotel() {
    // $(document).on("submit", "#create", function (e) {
    $(".btn-create")
        .closest("form")
        .on("submit", function (e) {
            e.preventDefault();
            var url = $(this).attr("action");
            var data = new FormData(this);
            console.log(data);
            $.ajax({
                type: "POST",
                url: url,
                data: data,
                contentType: false,
                processData: false,
                success: function (result) {
                    $(".motelModal .modal-footer .btn").click();
                    getData();
                    Swal.fire({
                        position: "center-center",
                        icon: "success",
                        title: "Your work has been saved",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                },
                error: function (result) {
                    console.log(result.responseJSON);
                    console.log(result.responseJSON.message);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: result.responseJSON.message,
                        footer: '<a href="">Why do I have this issue?</a>',
                    });
                },
            });
        });
}

function updateMotel() {
    $(document).on("submit", "#update", function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        var data = new FormData(this);
        console.log(data);
        $.ajax({
            type: "POST",
            url: url,
            data: data,
            contentType: false,
            processData: false,
            success: function (result) {
                $(".motelModal .modal-footer .btn").click();
                getData();
                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "Your work has been saved",
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            error: function (result) {
                console.log(result.responseJSON);
                console.log(result.responseJSON.message);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: result.responseJSON.message,
                    footer: '<a href="">Why do I have this issue?</a>',
                });
            },
        });
    });
}

function paginatePage() {
    $(document).on("click", ".pagination li a", function (e) {
        e.preventDefault();
        var url = $(this).attr("href");
        console.log(url);
        window.history.pushState("", "", url);
        fetch_data(url);
    });

    function fetch_data(url) {
        $.ajax({
            type: "GET",
            url: url,
            success: function (data) {
                console.log(data);
                $(".row-motel .card-body").html(data);
            },
            error: function (data) {
                console.log(data);
            },
            done: function (data) {
                console.log(data);
            },
        });
    }
}

$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    createMotel();
    paginatePage();
});
