/**
 * Validate Jquery
 * This Validation will check the mobile number and email are unique
 * Author:- Shubham Avinash Sawant
 */
$(document).ready(function(){
    $("#email_address").on("change", function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/trainingagency/validateTPEmail',
            type: 'POST',
            dataType: 'json',
            data:{'email_id':$(this).val()},
            success: function(response) {
                // Handle the fetched data and print it in HTMLs verifyOrgEmail
                if (response == true) {
                    console.log('TRUE');
                    $("#verifyOrgEmail").css("color", "red");
                    $("#verifyOrgEmail").html("Email ID Already Registered, Please use different Email ID!");
                    $("#btn-submit").prop('disabled',true);
                }
                else if(response == false)
                {
                    $("#verifyOrgEmail").css("color", "green");
                    $("#verifyOrgEmail").html("Email id is Valid..!");
                    $("#btn-submit").prop('disabled',false);
                }
            }
        });
    });

    $('#mob_number').on("change", function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/admin/trainingagency/validateTPMobile',
            type: 'POST',
            dataType: 'json',
            data:{'mobileNo':$(this).val()},
            success: function(response) {
                // Handle the fetched data and print it in HTMLs verifyOrgEmail
                if (response == true) {
                    console.log('TRUE');
                    $("#verifyOrgMobile").css("color", "red");
                    $("#verifyOrgMobile").html("Mobile Number Already Exist.....!");
                    $("#btn-submit").prop('disabled',true);
                }
                else if(response == false)
                {
                    $("#verifyOrgMobile").css("color", "green");
                    $("#verifyOrgMobile").html("Mobile Number is Valid");
                    $("#btn-submit").prop('disabled',false);
                }

            }
        });
    });
});