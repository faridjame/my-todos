$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("input[type=radio][name=complete]").change(function () {
        $.ajax({
            type: "POST",
            url: "/ajaxRequest",
            data: {
                id: this.value,
            },
            dataType: "JSON",
            success: function (response) {
                alert("Task marked as complete!");
                location.reload();
            },
            error: function (error) {
                console.log(error);
            },
        });
    });

    $(".delete-task").on("click", function () {
        if (!confirm("Are you sure?")) {
            return false;
        }
    });
});
