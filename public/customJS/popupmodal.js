/**
 * Author Shubham Sawant
 * Purpose of this JS file is to handle all java script and ajax calles to invoke the Pop Up
 */

$(document).ready(function () {


    $('a[name="edit-details"]').click(function (event) {
        event.preventDefault();
        var dataid = $(this).data('attr');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        /**Create Data set to send the data */
        // Construct the data object
        var requestData = {
            id: dataid,
            token: csrfToken,
            // Add any other data attributes here
        };
        //   AJAX Code to get the pop up
        $.ajax({
            url: "/api/getLeadersDetails",
            type: "POST",
            data: requestData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                $('#modal-list-leaders').html(response);
                $('#modal-lg').modal('show');
            },
            error: function (xhr) {

            }
        });
    });


    $('#add-banner').click(function (event) {
        $('#modal-lg').modal('show');
    });


    $(document).on('click', 'a[name="editBanners"]', function (event) {
        event.preventDefault();
        var dataid = $(this).data('attr');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');
        //Sending Request Data
        var requestData = {
            id: dataid,
            token: csrfToken,
            // Add any other data attributes here
        };
        //Create AJAX Request
        $.ajax({
            url: "/api/getbannerEditList",
            type: "POST",
            data: requestData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                $('#modal-xl').modal('show');
                $('#modal-list-editBanner').html(response);
                console.log(response);

            },
            error: function (xhr) {

            }
        });
    });



    $(document).on('click', 'a[name="deleteImage"]', function (event) {
        event.preventDefault();
        var confirmed = confirm('Are you sure you want to delete the banner?');
        var dataid = $(this).data('attr');
        var filename = $(this).data('file');
        if (confirmed) {
            var requestData = {
                id: dataid,
                filename: filename,
                // Add any other data attributes here
            };
            $.ajax({
                url: "/api/deleteBanner",
                type: "POST",
                data: requestData,
                success: function (response) {
                    location.reload();
                },
                error: function (xhr) {

                }
            });
        }
    });
    $(document).on('click', 'a[name="remove_leader"]', function (event) {
        event.preventDefault();
        var leader_id = $(this).data('attr');
        var image = $(this).data('img');

        // Show the SweetAlert modal
        Swal.fire({
            title: 'Are you sure?',
            text: 'Are you sure you want to delete the Leader Details?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            cancelButtonText: 'Cancel',
        }).then((result) => {
            if (result.isConfirmed) {
                // Data to be sent
                var requestData = {
                    id: leader_id,
                    image: image,
                };
                $.ajax({
                    url: '/api/deleteLeader',
                    type: 'POST',
                    data: requestData,
                    success: function (response) {
                        if (response === 'Success') {
                            Swal.fire(
                                'Done...!',
                                'Record Removed Successfully..!',
                                'success'
                            )
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                        } else {
                            Swal.fire(
                                'Something went Wrong',
                                'Oops! Some Issue Happened',
                                'error'
                            )
                            setTimeout(function () {
                                location.reload();
                            }, 500);
                        }
                    },
                    error: function (xhr) {

                    }
                });
            }
        });
    });

    /** JQuery Code to View Candidate Moodal */
    // viewCandidate
    $(document).on('click', 'a[name="viewCandidate"]', function (event) {
        event.preventDefault();
        var dataid = $(this).data('attr');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        //Sending Request Data
        var requestData = {
            id: dataid,
            token: csrfToken,
            // Add any other data attributes here
        };
        //Create AJAX Request
        $.ajax({
            url: "/admin/getGuestCandidateInfo",
            type: "POST",
            data: requestData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                $('#modal-xl').modal('show');
                $('#modal-viewGuestCandidateDetails').html(response);
            },
            error: function (xhr) {

            }
        });
    });

    /**
     * View Candidate Details
     */

    $(document).on('click', 'a[name="viewallCandidate"]', function (event) {
        event.preventDefault();
        var dataid = $(this).data('attr');
        var csrfToken = $('meta[name="csrf-token"]').attr('content');

        //Sending Request Data
        var requestData = {
            id: dataid,
            token: csrfToken,
            // Add any other data attributes here
        };
        //Create AJAX Request
        $.ajax({
            url: "/admin/getCandidateInfo",
            type: "POST",
            data: requestData,
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },
            success: function (response) {
                $('#modal-xl').modal('show');
                $('#modal-viewGuestCandidateDetails').html(response);
            },
            error: function (xhr) {

            }
        });
    });




});

/* User management functionality option multi-selet dropdown
    Author: Arati Dasa
    Date: 08-08-2023
*/
$(function () {
   //Initialize Select2 Elements
      $('.select2').select2({
         placeholder: ""
      });     
      
 });



 /*  Code for Admin Adding Sector
         Date: 01 Aug 2023
         Author: Arati Dasa
*/
$('#sector_form').submit(function (event) {
    event.preventDefault(); // Prevent the form from submitting normally
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var form = event.target;
    var formData = new FormData(form);
    console.log(formData)
    $.ajax({
        url: '/admin/addSector',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.message == 'success') {
                swal({
                    title: "Success",
                    text: response.text,
                    icon: "success",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#sectorModal').modal('hide');
                $('#sector_wrapper').load(' #sector_table')
                location.reload();
            } else {
                swal({
                    title: "Error",
                    text: "Please Try Again Later",
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#sectorModal').modal('hide');
            }
        },
        error: function (error) {
            // Handle any errors that occurred during the request
            console.error('Error:', error);
        }
    });
})

// For Edit Sector
$(document).on('click', '.edit_sector', function () {
    var id = $(this).attr('data-title')
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();

    $.ajax({
        url: '/admin/getSector',
        type: 'POST',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            console.log(response[0].sector_id)
            $('#sector_name').val(response[0].sector_name)
            $('#sector_status').val(response[0].sector_status)
            $('#sector_id').val(response[0].sector_id)

        }
    });
})

function deletepopup(url, id) {
    swal({
        title: "Are You Sure to Delete ?",
        icon: "warning",
        buttons: {
            confirmButtonText: 'Confirm',
            cancel: 'Cancel',
        },
    })
    .then((value) => {
        if (value) {
            window.location = url
        } else {
            return false;
        }
    });
}

$(document).on('hidden.bs.modal', '#sectorModal', function () {
    $('#sector_name').val('')
    $('#sector_status').val('')
    $('#sector_id').val('')
});

$(document).find('#sector_table').DataTable();

/*  Code for Admin Master Job Role
    Date: 02 Aug 2023
    Author: Arati Dasa
*/
$('#jobrole_form').submit(function (event) {
    event.preventDefault(); // Prevent the form from submitting normally
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var form = event.target;
    var formData = new FormData(form);
    console.log(formData)
    $.ajax({
        url: '/admin/addJobrole',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.message == 'success') {
                swal({
                    title: "Success",
                    text: response.text,
                    icon: "success",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#jobroleModal').modal('hide');
                $('#jobrole').load(' #jobrole_wrapper')
                location.reload();
            } else {
                swal({
                    title: "Error",
                    text: "Please Try Again Later",
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#jobroleModal').modal('hide');
            }
        },
        error: function (error) {
            // Handle any errors that occurred during the request
            console.error('Error:', error);
        }
    });
})

// For Edit Sector
$(document).on('click', '.edit_jobrole', function () {
    var id = $(this).attr('data-title')
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();

    $.ajax({
        url: '/admin/getJobrole',
        type: 'POST',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            console.log(response[0].job_role_id)
            $('#job_role').val(response[0].job_role)
            $('#jobrole_code').val(response[0].job_role_code)
            $('#sector').val(response[0].sector_id)
            $('#education').val(response[0].education_fk)
            $('#course_duration').val(response[0].course_duration)
            $('#cost_category').val(response[0].cost_category_fk)
            $('#rate').val(response[0].rate_per_hour)
            $('#nsqf').val(response[0].nsqf_level_fk)
            $('#status').val(response[0].job_role_status)
            $('#jobrole_id').val(response[0].job_role_id)

        }
    });
})


$(document).on('hidden.bs.modal', '#jobroleModal', function () {
    $('#job_role').val('')
    $('#jobrole_code').val('')
    $('#sector').val('')
    $('#education').val('')
    $('#course_duration').val('')
    $('#cost_category').val('')
    $('#rate').val('')
    $('#nsqf').val('')

});
$(document).find('#jobrole_table').DataTable();

/*  Code for Admin Education Qualification
    Date: 03 Aug 2023
    Author: Arati Dasa
*/
$('#education_form').submit(function (event) {
    event.preventDefault(); // Prevent the form from submitting normally
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var form = event.target;
    var formData = new FormData(form);
    console.log(formData)
    $.ajax({
        url: '/admin/addEducation',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.message == 'success') {
                swal({
                    title: "Success",
                    text: response.text,
                    icon: "success",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#educationModal').modal('hide');
                $('#education_wrapper').load(' #education_table')
                location.reload();
            } else {
                swal({
                    title: "Error",
                    text: "Please Try Again Later",
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#educationModal').modal('hide');
            }
        },
        error: function (error) {
            // Handle any errors that occurred during the request
            console.error('Error:', error);
        }
    });
})

// For Edit Education
$(document).on('click', '.edit_education', function () {
    var id = $(this).attr('data-title')
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();

    $.ajax({
        url: '/admin/getEducation',
        type: 'POST',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            console.log(response[0].job_role_id)
            $('#education').val(response[0].education)
            $('#status').val(response[0].status)
            $('#education_id').val(response[0].education_id)

        }
    });
})


$(document).on('hidden.bs.modal', '#educationModal', function () {
    $('#education').val('')
    $('#status').val('')

});

$(document).find('#education_table').DataTable();


/*  Code for Admin Location Category Management master
    Date: 04 Aug 2023
    Author: Arati Dasa
*/
$('#locationcategory_form').submit(function (event) {
    event.preventDefault(); // Prevent the form from submitting normally
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var form = event.target;
    var formData = new FormData(form);
    console.log(formData)
    $.ajax({
        url: '/admin/addLocationcategory',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.message == 'success') {
                swal({
                    title: "Success",
                    text: response.text,
                    icon: "success",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#locationcategoryModal').modal('hide');
                $('#locationcategory_wrapper').load('#locationcategory_table')
                location.reload();
            } else {
                swal({
                    title: "Error",
                    text: "Please Try Again Later",
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#locationcategoryModal').modal('hide');
            }
        },
        error: function (error) {
            // Handle any errors that occurred during the request
            console.error('Error:', error);
        }
    });
})

// For Edit Education
$(document).on('click' , '.edit_locationcategory', function(){   
    var id = $(this).attr('data-title')
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();

    $.ajax({
        url: '/admin/getLocationcategory',
        type: 'POST',
        data: { id: id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function (response) {
            $('#location_category').val(response[0].location_category_name)
            $('#rate').val(response[0].rate)
            $('#status').val(response[0].location_status)
            $('#location_id').val(response[0].location_id)

        }
    });
})


$(document).on('hidden.bs.modal', '#locationcategoryModal', function () {
    $('#location_category').val('')
    $('#rate').val('')
    $('#status').val('')

});

$(document).find('#locationcategory_table').DataTable();  

/*  Code for Admin User Management master
    Date: 07 Aug 2023
    Author: Arati Dasa
*/
$('#usermgmt_form').submit(function(event){ 
    event.preventDefault(); // Prevent the form from submitting normally
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var form = event.target;
    var formData = new FormData(form);
    $.ajax({
        url: '/admin/addUser',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response)
            if(response.message == 'success'){           
                swal({
                    title: "Success",
                    text: response.text ,
                    icon: "success",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#userManagementModal').modal('hide');
                $('#usermgmt_wrapper').load('#usermgmt_table')
                location.reload();                 
            }else{
                swal({
                    title: "Error",
                    text: "Please Try Again Later",
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#usermanagemnetModal').modal('hide');
            }
        },
        error: function(error) {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        }
    });
})

// For Edit User
$(document).on('click' , '.edit_user', function(){   
    var id = $(this).attr('data-title')
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();
  
    $.ajax({
        url: '/admin/getUser',
        type: 'POST',
        data: { id:id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {    
            var users = response.users;
            var functions = response.functions;
            console.log(functions);             
            $('#full_name').val(users.fullname)           
            $('#email').val(users.email_id) 
            $('#mobile').val(users.mobile)        
            $('#username').val(users.username)
            $('#functionality_id').val(users.functionality_id_fk)
            $('#auth_id').val(users.auth_id)
            $('#role_id').val(users.role_id_fk)  
            $('#user_mgmt_id').val(users.user_mgmt_id)
            console.log(functions.functionality_id);     
            console.log(functions.functionality);     
            var select = $('#functionality_id');           
            $.each(functions, function (key, value) {             
                select.append('<option value="' + value.functionality_id + '" selected >' + value.functionality + '</option>');
            });
        }
    });
})

$(document).on('hidden.bs.modal', '#userManagementModal', function() {  
    $('#full_name').val('')   
    $('#email').val('')
    $('#mobile').val('')
    $('#username').vl('')
    // $('#functionality_id').val([]);
    $('#functionality_id').select2("val","");   
    // select.append('<option value=""></option>');
    $('#role_id').val('')        
    $('#status').val('')  

});

$(document).find('#usermgmt_table').DataTable();  

// Company Management DataTable
$(document).find('#company_table').DataTable();  


$(document).on('change','#role_id',function(){    
    var auth_id = '';   
    var role_id = $('#role_id').val();
    $.ajax({
      type: "POST", 
      dataType: 'json',     
      url: 'get_auth_id',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      data:{'role':role_id},
      success: function(auth_data){         
         if(auth_data != 0) {
           var auth = auth_data[0].user_id;         
           $('#auth_id').val(auth);
         }
        else {
          swal("Sorry No Data Found");
        }
      }
   }); 
 })


 /*  Code for Admin Company Management master
    Date: 10 Aug 2023
    Author: Arati Dasa
*/
$('#company_form').submit(function(event){
    event.preventDefault(); // Prevent the form from submitting normally
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var form = event.target;
    var formData = new FormData(form);
    console.log(formData)
    $.ajax({
        url: '/admin/addCompany',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function(response) {
            if(response.message == 'success'){           
                swal({
                    title: "Success",
                    text: response.text ,
                    icon: "success",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#companyModal').modal('hide');
                $('#company_wrapper').load('#company_table')
                location.reload();                 
            }else{
                swal({
                    title: "Error",
                    text: "Please Try Again Later",
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#companyModal').modal('hide');
            }
        },
        error: function(error) {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        }
    });
})

// For Edit Company
$(document).on('click' , '.edit_company', function(){       
    var id = $(this).attr('data-title')
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();
  
    $.ajax({
        url: '/admin/getCompany',
        type: 'POST',
        data: { id:id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {                 
            $('#company_name').val(response[0].company_name)     
            $('#branch').val(response[0].branch)       
            $('#address').val(response[0].address) 
            $('#email_id').val(response[0].email_id)    
            $('#mobile').val(response[0].mobile_no)    
            $('#designation').val(response[0].designation) 
            $('#contact_person_name').val(response[0].contact_person_name)          
            $('#company_id').val(response[0].company_id)           
        }
    });
})

$(document).on('hidden.bs.modal', '#companyModal', function() {         
    $('#company_name').val('')     
    $('#branch').val('')       
    $('#address').val('') 
    $('#email_id').val('')    
    $('#mobile').val('')    
    $('#designation').val('') 
    $('#contact_person_name').val('')  
});

// Training Management master
$('#trainer_form').submit(function(event){
    event.preventDefault(); // Prevent the form from submitting normally
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var form = event.target;
    var formData = new FormData(form);
    console.log(formData)
    $.ajax({
        url: '/tp/addTrainer',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function(response) {
            if(response.message == 'success'){           
                swal({
                    title: "Success",
                    text: response.text ,
                    icon: "success",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#trainerModal').modal('hide');
                $('#trainer_wrapper').load('#trainer_table')
                location.reload();                 
            }else{
                swal({
                    title: "Error",
                    text: "Please Try Again Later",
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#trainerModal').modal('hide');
            }
            $('#highest_qualification_doc').prop('required',true)
            $('#tot_certificate').prop('required',true);
            $('#experience_certificate').prop('required',true);
            $('#aadhaar_card_doc').prop('required',true);
        },
        error: function(error) {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        }
    });
})

// For Edit Trainer
$(document).on('click' , '.edit_trainer', function(){       
   
    $('#highest_qualification_doc').removeAttr('required');
    $('#tot_certificate').removeAttr('required');
    $('#experience_certificate').removeAttr('required');
    $('#aadhaar_card_doc').removeAttr('required');
    $('#doc').show();
    $('#tot').show();
    $('#aadhar').show();
    $('#exp').show();        
    var id = $(this).attr('data-title')
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();
 
    $.ajax({
        url: '/tp/getTrainer',
        type: 'POST',
        data: { id:id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {  
                     
            $('#first_name').val(response[0].first_name)     
            $('#middle_name').val(response[0].middle_name)       
            $('#last_name').val(response[0].last_name) 
            $('#email').val(response[0].email_id)    
            $('#mobile_no').val(response[0].mobile_number)    
            $('#aadhaar_number').val(response[0].aadhaar_number)     
       
            $('#highestQualificationDoc').attr('href','/' + response[0].highest_qualification_doc);       
            $('#highest_qualification_doc_file').val(response[0].highest_qualification_doc);

            $('#totCertificate').attr('href','/' + response[0].tot_certificate);
            $('#tot_certificate_file').val(response[0].tot_certificate);

            $('#ExpCertificate').attr('href','/' + response[0].experience_certificate);  
            $('#experience_certificate_file').val(response[0].experience_certificate);

            $('#AadharCertificate').attr('href','/' + response[0].aadhaar_card_doc);   
            $('#aadhaar_card_doc_file').val(response[0].aadhaar_card_doc);

          
            $('#trainer_id').val(response[0].trainer_id)
           
                
        }
    });
})
// This code for PDF file Upload Only
$('.pdfonly').on('change', function () {   
    var file =$(this).val();   
    var extension = file.split('.').pop().toLowerCase();
    if(extension !== 'pdf') {
       swal({
           title: "Invalid File Extension!!!",
           text: "Invalid file extension! Only PDF files are allowed.",
           icon: "error",
           buttons: {
               ok: "Ok"
           },
         })
         $(this).val(''); 
        }
});


$(document).on('hidden.bs.modal', '#trainerModal', function() {     
    $("#trainer_form :input").val('');       
});

$(document).find('#trainer_table').DataTable();


// On Field Candidate Module added on 21-August-2023

$('#onFieldCandidate_form').submit(function(event){
    event.preventDefault(); // Prevent the form from submitting normally
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var form = event.target;
    var formData = new FormData(form);
    console.log(formData)
    $.ajax({
        url: '/tp/onfieldAddCandidate',
        type: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        processData: false,
        contentType: false,
        success: function(response) {
            if(response.message == 'success'){           
                swal({
                    title: "Success",
                    text: response.text ,
                    icon: "success",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#onFieldCandidateModal').modal('hide');
                $('#onFieldCandidateModal_wrapper').load('#onFieldCandidate_table')
                location.reload();                 
            }else{
                swal({
                    title: "Error",
                    text: "Please Try Again Later",
                    icon: "error",
                    buttons: {
                        ok: "Ok"
                    },
                })
                $('#onFieldCandidateModal').modal('hide');
            }
            // $('#highest_qualification_doc').prop('required',true)
            // $('#tot_certificate').prop('required',true);
            // $('#experience_certificate').prop('required',true);
            // $('#aadhaar_card_doc').prop('required',true);
        },
        error: function(error) {
          // Handle any errors that occurred during the request
          console.error('Error:', error);
        }
    });
})

// For Edit On Field Candidate
$(document).on('click' , '.edit_onFieldCandidate', function(){    
    var id = $(this).attr('data-title');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();
 
    $.ajax({
        url: '/tp/getOnFieldCandidate',
        type: 'POST',
        data: { id:id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {                       
            $('#first_name').val(response[0].first_name)     
            $('#middle_name').val(response[0].middle_name)       
            $('#last_name').val(response[0].last_name)             
            $('#mobile_no').val(response[0].mobile_no)    
            $('#aadhar_no').val(response[0].aadhar_no)     
            $('#date_of_birth').val(response[0].date_of_birth)
            $('#education').val(response[0].education)  
            $('#sector_id').val(response[0].sector)
            $('#job_role').val(response[0].job_role)  
            $('#training_center').val(response[0].tc_id)          
            $('#candidate_id').val(response[0].candidate_id)         
                
        }
    });
})

$(document).on('click','.viewCandidateModal', function(){ 
    var id = $(this).attr('data-title');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var base_url = $('#base_url').val();
    //alert(id);
    $.ajax({
        url: '/tp/getOnFieldCandidate',
        type: 'POST',
        data: { id:id },
        headers: {
            'X-CSRF-TOKEN': csrfToken
        },
        success: function(response) {     
            console.log('Success:', response); // This line for debugging
            // Check if 'response' contains the expected data
            if (response && response.length > 0) {
                $('#first_name1').val(response[0].first_name);
                $('#middle_name1').val(response[0].middle_name);
                $('#last_name1').val(response[0].last_name);
                $('#mobile_no1').val(response[0].mobile_no);
                $('#aadhar_no1').val(response[0].aadhar_no);
                $('#date_of_birth1').val(response[0].date_of_birth);
                $('#education1').val(response[0].education).prop("disabled", true);;
                $('#sector1').val(response[0].sector).prop("disabled",true);
                $('#job_role1').val(response[0].job_role).prop("disabled", true);;
                $('#training_center1').val(response[0].tc_id).prop("disabled", true);;              
            } else {
                console.log('Empty or unexpected response data');
            }  
        },
        error: function (xhr, status, error) {
            console.log('Error:', error);
        }
    });

});

$(document).on('hidden.bs.modal', '#onFieldCandidateModal', function() {     
    $("#onFieldCandidate_form :input").val('');       
});

$(document).find('#onFieldCandidate_table').DataTable();



