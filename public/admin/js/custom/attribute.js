function addAttr() {
    $(".form-add").on("submit", function (e) {
        e.preventDefault();
        var name = $("input[name=name]").val();
        var action = $(".form-add").attr("action");
        console.log(name, action);

        $.ajax({
            type: "POST",
            url: action,
            data: {
                name: name,
            },
            success: function (data) {
                console.log("ok" + data);
                $("input[name=name]").val("");
                $(".text-danger").remove();
                $(".table").load(location.href + " .table");
            },
            error: function (data) {
                let error = data.responseJSON;
                console.log(error);
                $.each(error.errors, function (key, value) {
                    $(".text-danger").remove();
                    console.log(key, value);
                    $("input[name=" + key + "]").after(
                        '<span class="text-danger">' + value + "</span>"
                    );
                });
            },
            done: function (data) {
                console.log(data);
            },
        });
    });
}

function editAttr() {
    $(document).on("click", ".btn-edit", function () {
        console.log("ok");
        $("#updateModal").modal("show");
        var action = $(this).attr("data-href");
        var name = $(this).closest("tr").find("td:nth-child(1)").text();
        var id = $(this).attr("data-id");
        console.log(action, name.trim(), id);

        $(".form-update").attr("action", action);
        $(".form-update input[name=name]").val(name.trim());
        $(".form-update").attr("data-id", id);
    });
}

function updateAttr() {
    $(document).on("click", ".btn-update", function (e) {
        e.preventDefault();
        var action = $(".form-update").attr("action");
        var name = $(".form-update input[name=name]").val();
        var id = $(".form-update").attr("data-id");

        $.ajax({
            type: "PUT",
            url: action,
            data: {
                name: name,
            },
            success: function (data) {
                console.log("ok" + data);
                $("input[name=name]").val("");
                $(".text-danger").remove();
                $("#updateModal").modal("hide");

                $(".table").load(location.href + " .table");
            },
            error: function (data) {
                let error = data.responseJSON;
                console.log(error);
                $.each(error.errors, function (key, value) {
                    $(".text-danger").remove();
                    console.log(key, value);
                    $("input[name=" + key + "]").after(
                        '<span class="text-danger">' + value + "</span>"
                    );
                });
            },
            done: function (data) {
                console.log(data);
            },
        });
    });
}

function warningAttr() {
    $(document).on("click", ".btn-warning", function () {
        $("#deleteModal").modal("show");
        var action = $(this).attr("data-action");
        var id = $(this).attr("data-id");
        console.log(action, id);

        $(".btn-delete").attr("data-action", action);
        $(".btn-delete").attr("data-id", id);
    });
}

function deleteAttr() {
    $(document).on("click", ".btn-delete", function () {
        var action = $(this).attr("data-action");
        var id = $(this).attr("data-id");
        console.log(action, id);
        $.ajax({
            type: "DELETE",
            url: action,
            success: function (data) {
                console.log("ok" + data);
                $("#deleteModal").modal("hide");
                $(".table").load(location.href + " .table");
            },
            errror: function (data) {
                console.log(data);
            },
            done: function (data) {
                console.log(data);
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
                $(".table").load(location.href + " .table");
                
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

    addAttr();
    editAttr();
    updateAttr();
    warningAttr();
    deleteAttr();
    paginatePage();
});
