/** JQuery Code */

/**
 * Author:- Shubham Sawant 
 * Requires jQuery v3.2.1 or greater andjquery.dataTables.min.js or any equivalent
 * Purpose:- This JS file will deal with all the sorts of call regarding AJAX data table here it will create and call to fetch banner details and return it back
 */

$(document).ready(function(){

    // DataTable
    $('#bannerTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/api/getBanners",
          type: "POST",
        },
        columns: [
          { data: 'index',"render": function(data, type, row, meta) {
            if (type === 'display') {
              return meta.row + 1;
            }
            return data;
          }
         },
          { data: 'banner_img'},
          { data: 'status',
          render: function(data , type, row){
            if(data == 'active'){
              return '<span class = "badge badge-success">Active</span>';
            }else if(data == 'inactive'){
              return '<span class = "badge badge-warning">In Active</span>';
            }else{
              return '<span class = "badge badge-danger">Deleted</span>';
            }
          }
        },
          {
            data: 'action',
            render: function(data, type, row) {
              if (data) {
                return '<a class="btn btn-sm btn-success mx-2" href="#" name="editBanners" data-attr="' + data + '">' +
                  '<i class="fa fa-edit"></i>' +
                  '</a>' +
                  '<a class="btn btn-sm btn-danger" name="deleteImage" data-attr="' + data + '" data-file=" + row.banner_img + " >' +
                  '<i class="fa fa-trash" aria-hidden="true"></i>' +
                  '</a>';
              }
              return '';
            }
          }
        ]
      });


      // invoiceTable

      $('#invoiceTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/api/getInvoiceData",
          type: "POST",
          data: {
            phase: $('#phase').val()
          }
        },
        columns: [
          { data: 'index' , 
        
          "render": function(data, type, row, meta) {
            if (type === 'display') {
              return meta.row + 1;
            }
            return data;
          }
          },
          { data: 'tp_name' },
          { data: 'tc_name' },
          { data: 'batch_id'},
          { data: 'invoice_percentage'},
          { data: 'invoice_no'},
        ]

      });
 
     //Data Table Method for Resedential Invoice
      $('#ResidentialinvoiceTable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: true,
        center: false,
        ajax: {
          url: "/api/getResidentialInvoiceData",
          type: "POST",
          data: {
            phase: $('#phase').val()
          }
        },
        columns: [
          { data: 'index' , 
        
          "render": function(data, type, row, meta) {
            if (type === 'display') {
              return meta.row + 1;
            }
            return data;
          }
          },
          { data: 'tp_name' },
          { data: 'tc_name' },
          { data: 'batch_id'},
          { data: 'year'},
          { data: 'month'},
          { data: 'invoice_no'},
          // {
          //   data: 'invoice_no',
          //   render: function(data, type, row) {
          //     if (data) {
          //       return '<img src="/' + data + '" style="object-fit: contain" width="250" />';
          //     }
          //     return '';
          //   }
          // },
        ]

      });

      //Data table Method for Assesment Invoices
      $('#AssesmentInvoiceTable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: true,
        center: false,
        ajax: {
          url: "/api/getAssessmentInvoiceData",
          type: "POST",
          data: {
            phase: $('#phase').val()
          }
        },
        columns: [
          { data: 'index' , 
        
          "render": function(data, type, row, meta) {
            if (type === 'display') {
              return meta.row + 1;
            }
            return data;
          }
          },
          { data: 'tp_name' },
          { data: 'batch_id'},
          { data: 'invoice_no'},
          // {
          //   data: 'invoice_no',
          //   render: function(data, type, row) {
          //     if (data) {
          //       return '<img src="/' + data + '" style="object-fit: contain" width="250" />';
          //     }
          //     return '';
          //   }
          // },
        ]

      });


      //**Guest Client Data Table */
      $('#GuestCandidateTable').DataTable({
        processing: true,
        serverSide: true,
        autoWidth: true,
        center: false,
        ajax: {
          url: "/admin/getGuestCandidateData",
          type: "POST",
          data: {
            phase: $('#phase').val(),
            _token: $('meta[name="csrf-token"]').attr('content')
          }
        },
        columns: [
          { data: 'index' , 
          
            "render": function(data, type, row, meta) {
              if (type === 'display') {
                return meta.row + 1;
              }
              return data;
            }
          },
          { data: 'first_name' },
          { data: 'middle_name'},
          { data: 'last_name'},
          { data: 'mobile_number'},
          { data: 'email_id'},
          { data: 'status'},
          { data: 'action'},
        ]
      });  


      $('#trainingagencylist').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/api/getTrainingAgency",
          type: "POST",
          data: {
            phase: $('#phase').val()
          }
        },
        columns: [
          { data: 'index' , 
        
          "render": function(data, type, row, meta) {
            if (type === 'display') {
              return meta.row + 1;
            }
            return data;
          }
          },
          { data: 'reg_id' },
          { data: 'org_name' },
          { data: 'state'},
          { data: 'district'},
          { data: 'taluka'},
          { data: 'mobile_no'},
          { data: 'email'},
          { data: 'registered'},
          { data: 'status'},
          { data: 'action'},
        ]

      });

      $('#traininginactiveagencylist').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
          url: "/api/getinactiveTrainingAgency",
          type: "POST",
          data: {
            phase: $('#phase').val()
          }
        },
        columns: [
          { data: 'index' , 
        
          "render": function(data, type, row, meta) {
            if (type === 'display') {
              return meta.row + 1;
            }
            return data;
          }
          },
          { data: 'reg_id' },
          { data: 'org_name' },
          { data: 'state'},
          { data: 'district'},
          { data: 'taluka'},
          { data: 'mobile_no'},
          { data: 'email'},
          { data: 'registered'},
          { data: 'status'},
          { data: 'action'},
        ]

      });
      

      // Candidate Listing Table
      // Jquery Ajax Data Table
    $('#adminCandidateList').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "/api/getAdminCandidate",
        type: "POST",
        data: {
          alise: $('#alise').val()
        }
      },
      columns: [
        { data: 'index' , 
      
        "render": function(data, type, row, meta) {
          if (type === 'display') {
            return meta.row + 1;
          }
          return data;
        }
        },
        { data: 'candidate_reg_id' },
        { data: 'first_name' },
        { data: 'middle_name'},
        { data: 'last_name'},
        { data: 'district'},
        { data: 'taluka'},
        { data: 'training_taluka'},
        { data: 'training_district'},
        { data: 'email'},
        { data: 'mobile_no'},
        { data: 'registered_under'},
        { data: 'status'},
        { data: 'action'},
      ]

    });


    /**Upload Section Ajax Data Table **/ 
    /** uploadBatchDocument */

    $('#uploadAdminBatchDocument').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "/api/uploadAdminBatchDocument",
        type: "POST",
        data: {
          phase: $('#phase').val()
        }
      },
      columns: [
        { data: 'index' , 
      
        "render": function(data, type, row, meta) {
          if (type === 'display') {
            return meta.row + 1;
          }
          return data;
        }
        },
        { data: 'tp_name' },
        { data: 'tc_name' },
        { data: 'batch_register_id'},
        { data: 'batch_document'},
        { data: 'batch_uploaded_date'},
        { data: 'status'},
        { data: 'batch_approval_date'},
        { data: 'action'},

      ]

    });

    //Tpmis report

    $('#tpmisReport').DataTable({
      processing: true,
      serverSide: true,
      ajax: {
        url: "/api/tpmisReport",
        type: "POST",
        data: {
          phase: $('#phase').val()
        }
      },
      columns: [
        { data: 'sr_no' , 
      
        "render": function(data, type, row, meta) {
          if (type === 'display') {
            return meta.row + 1;
          }
          return data;
        }
        },
        { data: 'tp_organizations_name' },
        { data: 'tp_address' },
        { data: 'tp_spoc_name'},
        { data: 'tp_mobile_no'},
        { data: 'tp_email_id'},
        { data: 'training_center_count'},
        { data: 'sanction_order_date'},
        { data: 'financial_sancition'},
        { data: 'physical_target'},
        { data: 'training_type'},
        { data: 'first_invoice'},
        { data: 'second_invoice'},
        { data: 'residential'},
        { data: 'third_invoice'},
        { data: 'total_amount'},
        { data: 'liablity_amount'},
        { data: 'training_under_process'},
        { data: 'no_batches'},
        { data: 'assessment_done'},
        { data: 'acieved'},
        { data: 'no_placed'},
        { data: 'training_done'},
        { data: 'placement_done'},

      ]

    });
    

});


