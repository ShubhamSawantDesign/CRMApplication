$(function() {
  $('#forget_loader').hide();
  $('#submitDiv').click(function() {  
    var data_email = $('#user_email').val();  
    var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    $('.EmailError').addClass('d-none');  
    if(data_email.match(validRegex)) {
      $('.EmailError').addClass('d-none');          
        var csrfToken = $('meta[name="csrf-token"]').attr('content');   
        $('#forget_loader').show();
        $('#forgot_password').modal('hide');
      $.ajax({
            url: 'forgot_password',
            type: 'POST',
            data: { email: data_email },
            headers: {
                'X-CSRF-TOKEN': csrfToken
            },        
            success: function (response) {     
            console.log(response); 
            $('#forget_loader').hide();          
              if(response.flag == 'sent'){  
              swal({
                title:"Password Reset Link",
                text: "Forgot Password Link has been sent to your Email...!! ",
                icon: "success",
                buttons: {
                    ok: "Ok"
                },
              })  
              $('#forgot_password').modal('hide');
              document.getElementById('resetPassword').reset();
              }else{
                swal({
                  title:"Error",
                  text: "Email Not found Please try again ! ",
                  icon: "error",
                  buttons: {
                      ok: "Ok"
                  },
                })                
                document.getElementById('resetPassword').reset();
              }       
            }, 
            error: function (xhr, status, error) {           
                console.error(error);
            }
    }); 
    } else {
      swal({
        title:"Email Error",
        text: "Please Enter Valid Email Address",
        icon: "error",
        buttons: {
            ok: "Ok"
        },
       }) 
      return false;
    } 
});

})

$(document).on('hidden.bs.modal', '#forgot_password', function() {
    $('#user_email').val('');
});

