/*! Change Password Validation */
/** Written By Arati Dasa 
 *  Purpose
 * 
*/

$(document).ready(function() {

    // Check if old Password Correct or not 
    $('#oldPassword').on('change', function () {        
        var current_pwd = $("#oldPassword").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: 'post',
            url: '/tp/check-current-password',
            data: { current_pwd: current_pwd },
            success: function (resp) {
                if (resp == "false") {
                    $("#verifyCurrentPwd").css("color", "red");
                    $('#verifyCurrentPwd').html("Current Password is Incorrect!");
                    $('#btn-submit').prop('disabled',true);
                } else if (resp == "true") {
                    $("#verifyCurrentPwd").css("color", "green");
                    $('#verifyCurrentPwd').html("Current Password is Correct!");
                    $('#btn-submit').prop('disabled',false);
                }
            }, error: function () {
                alert("Error");
            }
        })
    }); 
    /** Verify Both Password correct or not  */
    
    $('#confirmPassword, #newPassword').on('change', function () {
        var newpass = $('#newPassword').val();
        var confPass = $('#confirmPassword').val();
        if(newpass == confPass)
        {
            $("#verifyConfirmPassword").css("color", "green");
            $('#verifyConfirmPassword').html("Password Match");
            $('#btn-submit').prop('disabled',false);
        }else{
            $("#verifyConfirmPassword").css("color", "red");
            $('#verifyConfirmPassword').html("New Password and Confirm Password Didn't Match");
            $('#btn-submit').prop('disabled',true);
        }
    });
    

    $(document).on('click', 'a[name="change_password"]', function (event) {
       console.log('Hello...!');

       var tpId = $(this).data('tp-id');
       var authId = $(this).data('auth-id');

       swal({
        title: "Are you sure?",
        text: "Do you want to change password ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
         if (willDelete) 
         {  
            $('#change_password_modal').modal('show');
            $("#password_tp_id").val(tpId);  
            $("#password_auth_id").val(authId); 
         
         }  
      });




    });
    
    
    });