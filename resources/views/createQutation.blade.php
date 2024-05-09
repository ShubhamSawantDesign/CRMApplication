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
                                                             <textarea class='form-control' id='address'></textarea>
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

                                                </div>
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