/** Below Function is used to approve Batch document by admin and generate Invoice 1 */
function updateBatchDocApproval(batch_doc_id)
{
    $.ajax({
        type: "POST", 
        dataType: 'json',     
        url: '/admin/batch_approval',
        data:{'batch_doc_id':batch_doc_id},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
        success: function(response){
            if(response.success === true){
                toastr.success(response.message);
                setTimeout(function(){ location.reload(true); },900);
            } 
            else {
                toastr.error(response.message);
            }
        }
    });
}

/** Added Code  */
function updateAdminApproval(batch_id,approval)
{
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    $(".LoadingImage").show();
        //    console.log(batch_id)
        
        //   setTimeout(function() {
        //     $(".LoadingImage").hide();
        //   }, 5000);
      $.ajax({
      type: "POST", 
      dataType: 'json',     
      url: '/admin/batch_admin_approval',
      data:{'batch_id':batch_id,'approval':approval},
      headers: {
          "X-CSRF-TOKEN": csrfToken
      },
      success: function(response){
         if(response.success === true){
           $(".LoadingImage").hide();
            toastr.success(response.message);
            setTimeout(function(){ location.reload(true); },2000);
         } 
         else {
           $(".LoadingImage").hide();
            toastr.error(response.message);
         }
      }
   });
}



function deleteBatchDoc(batch_doc_id)
    {
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
                    type:'POST',
                    data:{ 'batch_doc_id': batch_doc_id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                      },
                    cache: false,
                    success: function(response){
                        if(response.success == true){
                            toastr.success(response.message);
                            setTimeout(function(){ location.reload(true); },900);
                        } else {
                            toastr.error(response.message);
                        }
                    }            
                });
            }  
        });
    }

    function assignAgency(agency_id,batch_id)
    { 
        console.log(agency_id);
        $.ajax({
            type: "POST", 
            dataType: 'json',     
            url: '/admin/assessment/assignAgency',
            data:{'agency_id':agency_id,'batch_id':batch_id},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
            success: function(response){
                if(response.success === true){
                    toastr.success(response.message);	
                    setTimeout(function(){ location.reload(true); },2000);
                } else {
                    toastr.error(response.message);
                }
            }
        });
    } 

    /** Added Code for Update Batch Placement */
    function updateBatchPlacement(batch_id)
    {
        swal({
            title: "Are you sure?",
            text: "This Batch Placement is completed ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) { 

                $.ajax({
                    type: "POST", 
                    dataType: 'json',     
                    url: '/admin/updateBatchPlacementStatus',
                    data:{'batch_id':batch_id},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        if(response.success === true){
                            toastr.success(response.message);
                            setTimeout(function(){ location.reload(true); },2000);
                        } else {
                            toastr.error(response.message);
                            $("#candidate_awaiting_job").prop('checked', false);
                            $("#candidate_working").prop('checked', true);
                        }
                    }
                });


            }
        });
    }

    /** Approve Invoice Document */

    function updateInvoiceStatus(status,invoice_id)
    {
        $.ajax({
            type: "POST", 
            dataType: 'json',     
            url: '/admin/uploadinvoicedocument/invoiceDocumentApproval',
            data:{'invoice_id':invoice_id,'status':status.value},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                if(response.success === true){
                    toastr.success(response.message);
                    setTimeout(function(){ location.reload(true); },2000);
                } else {
                    toastr.error(response.message);
                }
            }
        });
    }

    function updateInvoicePaymentDate(payment_date,invoice_id)
    {
        $.ajax({
            type: "POST", 
            dataType: 'json',     
            url: '/admin/uploadinvoicedocument/updatePaymentDate',
            data:{'invoice_id':invoice_id,'payment_date':payment_date.value},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                if(response.success === true){
                    toastr.success(response.message);
                    setTimeout(function(){ location.reload(true); },2000);
                } else {
                    toastr.error(response.message);
                }
            }
        }); 
    }

    /** Assessment Invoice Functionality */

    function updateAssessmentInvoiceStatus(status,invoice_id)
    {
        $.ajax({
            type: "POST", 
            dataType: 'json',     
            url: '/admin/uploadAssessmentinvoicedocument/invoiceAssessmentDocumentApproval',
            data:{'invoice_id':invoice_id,'status':status.value},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                if(response.success === true){
                    toastr.success(response.message);
                    setTimeout(function(){ location.reload(true); },2000);
                } else {
                    toastr.error(response.message);
                }
            }
        });
    }

    function updateAssessmentInvoicePaymentDate(payment_date,invoice_id)
    {
        $.ajax({
            type: "POST", 
            dataType: 'json',     
            url: '/admin/uploadAssessmentinvoicedocument/updateAssessmentPaymentDate',
            data:{'invoice_id':invoice_id,'payment_date':payment_date.value},
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                if(response.success === true){
                    toastr.success(response.message);
                    setTimeout(function(){ location.reload(true); },2000);
                } else {
                    toastr.error(response.message);
                }
            }
        }); 
    }

    function updateClosureReportStatus(status,closure_report_id)
    {
       
            $.ajax({
                type: "POST", 
                dataType: 'json',     
                url: '/admin/closureReport/closureReportStatus',
                data:{'closure_report_id':closure_report_id,'status':status.value},
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    if(response.success === true){
                        toastr.success(response.message);
                        setTimeout(function(){ location.reload(true); },2000);
                    } else {
                        toastr.error(response.message);
                    }
                }
            });
    }

    function updateStatus(id,status){ 
        $.ajax({
           type: "POST", 
           dataType: 'json',     
           url: '/admin/trainingcenter/changeTrainingCenterStatus',
           data:{'id':id,'status':status},
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success: function(response){
              if(response.success === true){
                 toastr.success(response.message);
                 setTimeout(function(){ location.reload(true); },2000);
              } 
              else {
                 toastr.error(response.message);
              }
           }
        });
     }

     function updateApproval(id,approval){ 
        $.ajax({
           type: "POST", 
           dataType: 'json',     
           url: '/admin/trainingcenter/changeApproval',
           data:{'id':id,'approval':approval},
           headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           },
           success: function(response){
              if(response.success === true){
                 toastr.success(response.message);
                 setTimeout(function(){ location.reload(true); },2000);
              } 
              else {
                 toastr.error(response.message);
              }
           }
        });
     }     

     function deleteInfo(id,auth_id){ 
        swal({
          title: "Are you sure?",
          text: "Do you want to delete this information ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        }).then((willDelete) => {
          if (willDelete) {         
            $.ajax({
              url: '/admin/trainingcenter/deletetrainingCenter',
              dataType: 'json',
              type:'POST',
              data:{ 'id': id,'auth_id':auth_id},
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               },
              cache: false,
              success: function(response){
                if(response.success == true){
                   toastr.success(response.message);
                   setTimeout(function(){ location.reload(true); },2000);
                 }
                 else {
                    toastr.error(response.message);
                 }
              }            
            });
          }  
        });
  }