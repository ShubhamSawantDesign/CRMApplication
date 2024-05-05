function updateCustomerStatus(id, status) {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        dataType: "json",
        url: "/changeCustomerStatus",
        data: { id: id, status: status },
        success: function (response) {
            if (response.success === true) {
                toastr.success(response.message);
                setTimeout(function () {
                    location.reload(true);
                }, 1000);
            } else {
                toastr.error(response.message);
            }
        },
    });
}