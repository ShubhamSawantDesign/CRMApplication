// Initialize DataTable
var table = $(".data-table").DataTable({
    "responsive": true,
    "autoWidth": false,
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "fixedHeader": {
        header: true,
        headerOffset: 50
    },
});

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

function removeCustomer(id) {
    Swal.fire({
        title: "Are you sure?",
        text: "Are you sure you want to delete the Customer detail?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Confirm",
        cancelButtonText: "Cancel",
    }).then((result) => {
        if (result.isConfirmed) {
            // Data to be sent
            var requestData = {
                id: id,
            };
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
            });
            $.ajax({
                url: "/removeCustomerdata",
                type: "POST",
                data: requestData,
                success: function (response) {
                    if (response === "success") {
                        var rowToRemove = $('.data-table').find('[data-id="' + id + '"]').closest('tr');
                        table.row(rowToRemove).remove().draw(false);
                        Swal.fire(
                            "Done...!",
                            "Record Removed Successfully..!",
                            "success"
                        );
                    } else {
                        Swal.fire(
                            "Something went Wrong",
                            "Oops! Some Issue Happened",
                            "error"
                        );
                    }
                },
                error: function (xhr) { },
            });
        }
    });
}

