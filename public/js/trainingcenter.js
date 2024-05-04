$(document).ready(function () {

    var today = new Date().toISOString().split('T')[0];
    $('#start_batch_date').attr('min', today);
    $(document).on('blur', '.batch_time', function () {
        let start_time = $('#start_batch_time').val()
        let end_time = $('#end_batch_time').val()
        if (end_time < start_time && end_time != '' && start_time != '') {
            Swal.fire({
                title: 'End Time Should be greater than Start time ',
                text: 'Change Time',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonText: 'Ok',
            })
            $('#end_batch_time').val('')
        }
    })
    $('#selector').on('change', function () {
        let selector = $(this).val();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var selectElement = $('#job_role');

        $.ajax({
            type: 'POST',
            url: '/tc/add_batch',
            data: { selector: selector },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (html) {
                var data = JSON.parse(html);
                selectElement.empty(); // Clear existing options
                selectElement.append($('<option>', {
                    value: null,
                    text: 'Select Job Role'
                }));
                $.each(data, function (index, option) {
                    selectElement.append($('<option>', {
                        value: option.value,
                        text: option.text
                    }));
                });
                selectElement.selectpicker('refresh');
            }
        });
    });

    // This code is for get the job_role details.
    // Code added by Akash
    $('.job-role-data').on('change', function () {
        var sector = $('#selector').val()
        var hours = $('#batch_hours').val()
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var job_role = $('#job_role').val();
        var start_batch_time = $('#start_batch_time').val();
        if (sector != '' && hours != '' && job_role != '') {
            $.ajax({
                url: '/tc/getJobRole',
                type: 'POST',
                data: { sector: sector, hours: hours, job_role: job_role },
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (html) {
                    if (html != '') {
                        data = JSON.parse(html)
                        $('#education').val(data.education)
                        $('#course_duration').val(data.course_duration)
                        total_days = data.course_duration / hours;
                        parseFloat(total_days);
                        total_days = Math.round(total_days)
                        $('#total_days').val(total_days)
                        $('#rate_per_hour').val(data.rate_per_hour)
                        $('#nsqf').val(data.nsqf_level_fk)
                        var batch_date = new Date($('#start_batch_date').val());
                        var daysToAdd = parseInt($('#total_days').val());
                        if (!isNaN(daysToAdd)) {
                            var totalMilliseconds = addDaysWithoutSundays(batch_date ,daysToAdd + 2 );
                            
                            var endDate = new Date(totalMilliseconds);
                            var assesment_date = endDate.getTime() + (7 * 24 * 60 * 60 * 1000);
                            var assesment_date = new Date(assesment_date)
                            // var formattedEndDate = formatDate(endDate);
                            var formattedEndDate = formatDate(addDaysWithoutSundays(batch_date ,daysToAdd +2 ))
                            var assesment_date = formatDate(assesment_date)
                            $('#batch_end_date').val(formattedEndDate);
                            $('#assesment_date').val(assesment_date)
                        } else {
                            $('#batch_end_date').val('');
                        }
                    } else {
                        $('#education').val('')
                        $('#course_duration').val('')
                        $('#total_days').val('')
                        $('#rate_per_hour').val('')
                        $('#nsqf').val('')
                    }

                }
            })
        } else {
            $('#education').val('')
            $('#course_duration').val('')
            $('#total_days').val('')
            $('#rate_per_hour').val('')
            $('#nsqf').val('')
        }
    })
    function formatDate(date) {
        var day = date.getDate();
        var month = date.getMonth() + 1; // Months are zero-indexed
        var year = date.getFullYear();
        return `${day < 10 ? '0' : ''}${day}-${month < 10 ? '0' : ''}${month}-${year}`;
    }


    // Here submitting batch form
    $('#form_batch').submit(function (event) {
        event.preventDefault(); // Prevent the form from submitting normally
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var form = event.target;
        var formData = new FormData(form);

        $.ajax({
            type: "POST", // Use "GET" or "POST" as needed
            url: "/tc/add_new_batch",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            processData: false,
            contentType: false,
            success: function (response) {
                data = JSON.parse(response);
                if (data.flag == 'success') {
                    swal({
                        title: "Success",
                        text: data.text,
                        icon: "success",
                        buttons: {
                            ok: "Ok"
                        },
                    }).then((value) => {
                        if (value) {
                            location.reload();
                        }
                    });
                } else {
                    swal({
                        title: "error",
                        text: data.text,
                        icon: "error",
                        buttons: {
                            ok: "Ok"
                        },
                    })
                }
                $(".selectpicker").selectpicker('val', '');
                $("#form_batch :input").val('');

                // Close the dropdown in SelectPicker
                $(".selectpicker").selectpicker('toggle');
                $('#modalBatch').modal('hide');
                $('#example1_wrapper').load(' #example1')

            },
            error: function (error) {
                // Handle errors, if any
                swal({
                    title: "Error",
                    text: error.text,
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
            }
        });
    })

    $(document).on('click', '.edit-batch', function () {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var batch_id = $(this).attr('data-hidden');
        $('#batch_id').val(batch_id)
        $('#myModalLabel').html('Update Batch')
        $('#batch_id').val(batch_id)
        var selectElement = $('#job_role')
        var capacity_select = $('#capacity')
        $.ajax({
            type: "POST",
            url: "/tc/getbatchdetails",
            data: { batch_id: batch_id },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (html) {
                data = JSON.parse(html)
                batch_details = data.batch_detail
                job_role = data.job_role
                var optionElement = batch_details.job_role_id_fk
                var capacity_fk = batch_details.capacity_fk
                $.each(job_role, function (index, option) {
                    selectElement.append($('<option>', {
                        value: option.value,
                        text: option.text,
                    }));

                });

                capacity_select.val(capacity_fk).selectpicker('refresh')
                selectElement.val(optionElement).selectpicker('refresh')
                $('#selector').val(batch_details.sector_id_fk).selectpicker('refresh')
                $('#batch_hours').val(batch_details.batch_hours)
                selectElement.trigger('change');
                $('#start_batch_date').val(batch_details.batch_start_date)
                $('#trainer').val(batch_details.trainer_id_fk).selectpicker('refresh')
                $('#start_batch_time').val(batch_details.batch_start_time)
                $('#end_batch_time').val(batch_details.batch_end_time)
            }
        })
    })
    $('#modalBatch').on('hidden.bs.modal', function () {
        $("#form_batch :input").val('');
        $("#job_role").empty().append('<option value = "" selected>Select the Job Role</option>').selectpicker('refresh');
        $(".selectpicker").val('').selectpicker('refresh');
        $('#myModalLabel').html('New Batch')
    });

    $(document).on('click', '.del_batch', function (event) {
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var batch_id = $(this).attr('data-batch-id')
        swal({
            title: "Warning",
            text: "Are you sure you want to delete the batch?",
            icon: "warning",
            buttons: {
                cancel: "Cancel",
                confirm: "Delete"
            },
        })
            .then((confirmed) => {
                if (confirmed) {
                    $.ajax({
                        type: "POST",
                        url: '/tc/delete_batch',
                        data: { batch_id: batch_id },
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success: function (html) {
                            res = JSON.parse(html)
                            swal({
                                title: res.msg,
                                text: res.text,
                                icon: "success",
                                buttons: {
                                    cancel: "Ok",
                                },
                            }).then((value) => {
                                // Check if the "Ok" button was clicked
                                if (value === null || value === "cancel") {
                                    // Refresh the page
                                    location.reload();
                                }
                            });

                            $('#example1_wrapper').load(' #example1')
                        }
                    })
                } else {
                    swal({
                        title: "Cancelled",
                        text: "You Have cancelled !",
                        icon: "info",
                        buttons: {
                            cancel: "Cancel",
                        },
                    })
                }
            });
    })

    // Candidate Management form submit code here 

    $('#candidate_management').on('submit', function (e) {
        e.preventDefault();
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        var form = e.target;
        var formData = new FormData(form);
        $.ajax({
            url: "/tp/addCandidate",
            type: "POST",
            data: formData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            processData: false,
            contentType: false,
            success: function (response) {
                data = JSON.parse(response);
                swal({
                    title: data.msg,
                    text: data.text,
                    icon: data.msg,
                    buttons: {
                        cancel: "Cancel",
                    },
                })
                $('#candidate_modal').modal('hide')
                $('#example1_wrapper').load(' #example1')
            }



        })

    })



    // Edit candidate management using 

    $(document).on('click', '.edit_candidate', function () {
        var id = $(this).attr('data-hidden')
        $('#candidate_id').val(id)
        $('.modal-title').html('Update Candidate')
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            url: '/tc/getCandidate',
            type: 'POST',
            data: { candidate_id: id },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                details = response.details
                job_role = details.job_role
                ext = response.ext
                $('#first_name').val(details.first_name)
                $('#middle_name').val(details.middle_name)
                $('#last_name').val(details.last_name)
                $('#mother_name').val(details.mother_name)
                $("input[name='gender']").each(function () {
                    if ($(this).val() == details.gender) {
                        $(this).prop("checked", true);
                    }
                });
                $("input[name='maritalStatus']").each(function () {
                    if ($(this).val() == details.maritalStatus) {
                        $(this).prop("checked", true);
                    }
                });
                $('#exampleInputEmail1').val(details.email_id)
                $('input[name = "mobile_number"]').val(details.mobile_no)
                $('input[name = "guardian_number"]').val(details.parent_mobile_no)
                $('input[name = "datofbirth"]').val(details.date_of_birth)
                $('#caste').val(details.caste).selectpicker('refresh')
                $('input[name = "addhar_number"]').val(details.aadhar_no)
                $('input[name = "caste_certificate_no"]').val(details.caste_certificate_no)
                $('#education').val(details.education).selectpicker('refresh')
                $('input[name = "domecile_certificate_no"]').val(details.domicile_certificate_no)
                $('textarea[name = "address1"]').val(details.correspondence_add_line_1)
                $('textarea[name = "address2"]').val(details.correspondence_add_line_2)
                $('#district').val(details.permanent_district).selectpicker('refresh')
                $('#district').trigger('change');
                $('#taluka').val(details.permanent_taluka).selectpicker('refresh').trigger('change')
                $('input[name = "pincode"]').val(details.permanent_pincode)
                $("input[name='course_type']").each(function () {
                    if ($(this).val() == details.course_type) {
                        $(this).prop("checked", true);
                    }
                });
                $('#selector').val(details.sector).selectpicker('refresh').trigger('change')
                $('#job_role').val(details.job_role)
                $('input[name = "holder_name"]').val(details.account_holder_name)
                $('input[name = "account_number"]').val(details.bank_account_no)
                $('input[name = "bank_name"]').val(details.bank_name)
                $('input[name = "ifsc_code"]').val(details.bank_ifsc_code)
                $('candidate_photo').val(details.bank_ifsc_code)

            }
        })

    })
    $('#candidate_modal').on('hidden.bs.modal', function () {
        $("#candidate_modal :input").val('');
        $('.modal-title').html('New Candidate')
        $("#job_role").empty().append('<option value = "" selected>Select the Job Role</option>').selectpicker('refresh');
        $(".selectpicker").val('').selectpicker('refresh');
    });
    $('#select_all_box').on('click', function () {
        var total_count = $(this).attr('data-hidden')
        if ($(this).is(':checked')) {
            // Perform your action here when the checkbox is checked
            var $checkboxes = $('.candidate_batch'); // Select all checkboxes with class 'candidate_batch'

            // Loop through the first 25 checkboxes and set their 'checked' property to true
            $checkboxes.slice(0, total_count).prop('checked', true);

        } else {
            var $checkboxes = $('.candidate_batch'); // Select all checkboxes with class 'candidate_batch'

            // Loop through the first 'n' number checkboxes and set their 'checked' property to true
            $checkboxes.slice(0, total_count).prop('checked', false);
        }
    })
    $('.candidate_batch').on('click', function () {
        var checked_list = $('.candidate_batch:checked').length
        var total = $('#select_all_box').attr('data-hidden')
        if (checked_list == 0) {
            $('#select_all_box').prop('checked', false)
        }
        if (checked_list > total) {
            swal({
                title: "Batch list full create new batch",
                text: "Can't select More than " + total + ' candidates',
                icon: 'warning',
                buttons: {
                    cancel: "Ok",
                },
            })
            $(this).prop('checked', false)
        }
    })
    $('#assign_form').submit(function (e) {
        e.preventDefault();
        var formData = $(this).serializeArray();
        var selectedCandidateIds = [];
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        tp_id = ''
        tc_id = ''
        added_date = ''
        batch_id = ''
        candidate_status = ''
        for (var i = 0; i < formData.length; i++) {
            if (formData[i].name === 'tc_id') {
                tc_id = formData[i].value;
            }
            else if (formData[i].name === 'tp_id') {
                tp_id = formData[i].value;
            }
            else if (formData[i].name === 'batch_id') {
                batch_id = formData[i].value;
            }
            else if (formData[i].name === 'added_date') {
                added_date = formData[i].value;
            }
            else if (formData[i].name === 'candidate_status') {
                candidate_status = formData[i].value;
            }

        }
        // console.log('tc_id = '+ tc_id)
        $("input[name='candidate_id[]']:checked").each(function () {
            selectedCandidateIds.push({ 'candidate_id': $(this).val(), 'tc_id': tc_id, 'tp_id': tp_id, 'batch_id': batch_id, 'added_date': added_date, 'created_by': tc_id });
        });

        $.ajax({
            url: '/tc/assign_to_batch',
            type: 'POST',
            data: { selectedCandidateIds },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (html) {
                if (html == 'Success') {
                    swal({
                        title: "Candidate Assigned",
                        text: "Candidates Assigned Succefully",
                        icon: "success",
                        buttons: true,
                    })
                    $('#candidate_wrapper').load(' #candidate_list')
                    $('#candidate_wrapper_1').load(' #candidate_list_1')
                }

            }

        })

    })

})


// Photo 
function capture_snapshot() {


    Webcam.snap(function (data_uri) {
        $(".image-tag").val(data_uri);
        document.getElementById('results').innerHTML = '<img src="' + data_uri + '"/>';
    });
}
// to access camera

function show1() {
    document.getElementById('candidate_photo').style.display = 'block';
    document.getElementById('take_photo').style.display = 'none';

    Webcam.reset();
}
function show2() {
    document.getElementById('candidate_photo').style.display = 'none';
    document.getElementById('take_photo').style.display = 'block';
    Webcam.set({
        width: 490,
        height: 350,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
    Webcam.attach('#my_camera');
}

function get_all_district_by_state(state_id, dest_id){
    var dist_arr = "<option value=''>Select District</option>";

    if (state_id != '') {
        var myurl = '/getDistrictFromState/' + state_id;
        $.getJSON(myurl, function (cdata) {
            if (cdata != 0) {
                for (i = 0; i < cdata.length; i++) {
                        dist_arr = dist_arr + "<option value='" + cdata[i].district_id + "'>" + cdata[i].district_name + "</option>";
                   
                }
            }
            $('#' + dest_id).html(dist_arr).selectpicker('refresh');

        });
    } else {
        $('#' + dest_id).html(dist_arr).selectpicker('refresh');
    }

}


function get_all_taluka_by_city_name(district_id, dest_id, taluka_id) {
    var city_arr = "<option value=''>Select Taluka</option>";
    if (district_id != '') {
        var myurl = '/getTalukaFromDistrict/' + district_id;
        $.getJSON(myurl, function (cdata) {
            if (cdata != 0) {
                for (i = 0; i < cdata.length; i++) {
                    if (taluka_id != cdata[i].taluka_id) {
                        city_arr = city_arr + "<option value='" + cdata[i].taluka_id + "'>" + cdata[i].taluka_name + "</option>";
                    }
                    else {
                        city_arr = city_arr + "<option value='" + cdata[i].taluka_id + "' selected >" + cdata[i].taluka_name + "</option>";
                    }
                }
            }
            $('#' + dest_id).html(city_arr).selectpicker('refresh');

        });
    } else {
        $('#' + dest_id).html(city_arr).selectpicker('refresh');
    }
}

function get_all_villages_by_taluka_name(taluka_id, dest_id, village_id) {
    var village_arr = "<option value=''>Select Village</option>";
    if (taluka_id != '') {
        var myurl = '/getVillageFromTaluka/' + taluka_id;
        $.getJSON(myurl, function (cdata) {
            if (cdata != 0) {
                for (i = 0; i < cdata.length; i++) {
                    if (village_id != cdata[i].village_id) {
                        village_arr = village_arr + "<option value='" + cdata[i].village_id + "'>" + cdata[i].village_name + "</option>";
                    }
                    else {
                        village_arr = village_arr + "<option value='" + cdata[i].village_id + "' selected >" + cdata[i].village_name + "</option>";
                    }
                }
            }
            $('#' + dest_id).html(village_arr).selectpicker('refresh');
        });
    } else {
        $('#' + dest_id).html(village_arr).selectpicker('refresh');
    }


}
function deleteBatchDoc(batch_doc_id) {
    swal({
        title: "Are you sure?",
        text: "Do you want to delete this information ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            console.log('delete');
            $.ajax({
                url: '/tc/batchdocumentdelete',
                dataType: 'json',
                type: 'POST',
                data: { 'batch_doc_id': batch_doc_id },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                cache: false,
                success: function (response) {
                    if (response.success == true) {
                        toastr.success(response.message);
                        setTimeout(function () { location.reload(true); }, 900);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
        }
    });
}


function addDaysWithoutSundays(startDate, daysToAdd) {
    var currentDate = new Date(startDate.getTime());
    var remainingDays = daysToAdd;
  
    while (remainingDays > 0) {
      currentDate.setDate(currentDate.getDate() + 1);
  
      // Skip Sundays
      if (currentDate.getDay() !== 0) {
        remainingDays--;
      }
    }
  
    return currentDate;
  }