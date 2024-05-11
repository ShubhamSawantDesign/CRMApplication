@extends('header')
@section('content')
<style>
    .connectedSortable #Clientlists_filter label {
        float: right;
    }

    #Clientlists_paginate {
        float: right;
    }

    .red-asterisk {
        color: red;
    }
</style>
<div class="wrapper">
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Create Qutation</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Create Qutation</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="card-title">Create Qutation</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="row">

                        <div class="col-12 col-sm-20">
                            <div class="card-body">
                                <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                        <!-- Submit Form -->
                                        <form action="{{ url('doCustomerUpdate'); }}" method="POST">
                                            @csrf 
                                            <input type="hidden" name="customer_id" value="" />
                                            <div class="table-responsive data-table-wrapper" id="">
                                                <div class="modal-body">
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label>Customer Name</label>
                                                            <select class="form-control selectpicker" id="customer" name='customer' data-live-search="true">
                                                                <option value="" selected>-- SELECT CUSTOMER --</option>
                                                                @foreach($customers as $customer)
                                                                <option value="{{ $customer->id }}">{{ $customer->customer_name }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <label>Address</label>
                                                             <textarea class='form-control' id='address' placeholder="Enter Address"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label>Estimate</label>
                                                             <input type="text" name="estimate" class='form-control' placeholder="EST-202401"></input>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Reference</label>
                                                             <input type="text" name="reference" class='form-control' placeholder="Reference-202401"></input>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Estimate Date</label>
                                                             <input type="date" name="estimateDate" class='form-control'></input>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label>Sales Person</label>
                                                             <input type="text" name="sales_person" class='form-control' placeholder="Sales Person"></input>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Project Name</label>
                                                             <input type="text" name="project_name" class='form-control' placeholder="Project Name"></input>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label>Subject</label>
                                                                <textarea class='form-control' id='Subject' placeholder="Enter Subject"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label>Customer Note</label>
                                                                <textarea class='form-control' id='customerNote' placeholder="Enter Note for Customer"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label>Terms and Condition</label>
                                                                <textarea class='form-control' id='termsnconditions' placeholder="Enter Terms and Condition"></textarea>
                                                        </div>
                                                    </div>

                                                    <hr class="verticle_line" style="">
                                                     <h1>Item Section</h1>
                                                    <div class="">

                                                        <div id="itemContainer"></div>

                                                        <div class="col-12 col-sm-6">
                                                            <a name="addNewItem" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i> Add New Item</a>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label>Total Amount</label>
                                                                <input type="text" name="total_amount" class='form-control' placeholder="Total Amount"></input>
                                                        </div>
                                                    </div>


                                                    <hr class="verticle_line" style="">
                                                    <div class="row form-group">
                                                        <div class="col-md-4">
                                                            <label>Enter CGST</label>
                                                             <input type="text" name="sales_person" class='form-control' placeholder="Enter CGST"></input>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Enter SGST</label>
                                                             <input type="text" name="project_name" class='form-control' placeholder="Enter SGST Name"></input>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label>Other Tax such as TCS</label>
                                                             <input type="text" name="project_name" class='form-control' placeholder="Enter TCS Amount"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <a href="http://dev.trti-maha.in/admin/trainingagency/p1" class="btn btn-default" data-dismiss="modal">Close</a>
                                                <button type="submit" id="btn-submit" class="btn btn-primary">Create Qutation</button>
                                            </div>
                                            <!-- form ended -->
                                    </div>
                                </div>
                            </div>
                            <!-- /.card -->
                        </div>
                        <!-- /.Left col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    @include('footer')

</div>
<!-- ./wrapper -->
<!-- Add Client Moodal -->
<script>
    document.getElementById('customer').addEventListener('change', function() {
        var customerId = this.value;
        
        // Making an Ajax request
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/get-customer-address/' + customerId, true);
        
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // Update the address in the HTML
                document.getElementById('address').value = xhr.responseText;
            }
        };
        
        xhr.send();
    });
    </script>
<script>
    var devcostimpcount =  0;
    $(document).ready(function() {

    $('a[name=addNewItem]').click(function (event) {
        devcostimpcount++;
        var itemContainer = $('#itemContainer');
        var newDiv = `<div class="row direct_price_section" id="direct_dev_cost_${devcostimpcount}">
            <div class="col-2 col-sm-1">
                <div class="form-group">
                <label>Sr No</label>
                <input type="input" class="form-control" name="sr_no[]" value="${devcostimpcount}" />
                </div>
            </div>
            <div class="col-3 col-sm-3">
                <div class="form-group">
                <label>Item</label>
                <input type="input" class="form-control" id=""  name="item[]" placeholder="Enter Particulars" />
                </div>
            </div>
            <div class="col-2 col-sm-2">
                <div class="form-group">
                    <label>Quantity</label>
                    <input type="input" class="form-control input_decimal_field quantity" id="quantity_${devcostimpcount}" name="quantity[]" placeholder="Enter The Quantity" />
                </div>
            </div>
            <div class="col-2 col-sm-2">
                <div class="form-group">
                    <label>Cost</label>
                    <input type="input" class="form-control input_decimal_field dev_price" id="cost_${devcostimpcount}" name="cost_[]" placeholder="Enter Cost" />
                </div>
            </div>
            <div class="col-2 col-sm-2">
                <div class="form-group">
                    <label>Total Cost</label>
                    <input type="input" class="form-control input_decimal_field dev_price" id="total_Cost_${devcostimpcount}" name="total_Cost[]" placeholder="Enter Dev Price" />
                </div>
            </div>
            <div class="col-1 col-sm-1">
                <button class="btn btn-danger removeDev" data-unique-id=${devcostimpcount} type="button">Remove</button>
            </div>
        </div>`;
        itemContainer.append(newDiv);
    });
});


</script>
@endsection