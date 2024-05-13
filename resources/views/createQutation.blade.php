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
                                        <form action="{{ url('doCreateQuotation'); }}" method="POST">
                                            @csrf 
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
                                                                <textarea class='form-control' name='subject' id='Subject' placeholder="Enter Subject"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label>Customer Note</label>
                                                                <textarea class='form-control' name='customerNote' id='customerNote' placeholder="Enter Note for Customer"></textarea>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label>Terms and Condition</label>
                                                                <textarea class='form-control' name='termsnconditions' id='termsnconditions' placeholder="Enter Terms and Condition"></textarea>
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

                                                    <hr class="verticle_line" style="">
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label>Total Amount</label>
                                                                <input type="number" name="total_amount" id="total_amount" class='form-control' placeholder="Total Amount"></input>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Enter CGST</label>
                                                             <input type="number" name="cgst" id="cgst" class='form-control' placeholder="Enter CGST"></input>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Enter SGST</label>
                                                             <input type="number" name="sgst" id="sgst" class='form-control' placeholder="Enter SGST Name"></input>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label>Other Tax such as TCS</label>
                                                             <input type="number" name="other" id="other" class='form-control' placeholder="Enter TCS Amount"></input>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-2">
                                                            <label>Final Amount</label>
                                                                <input type="number" name="final_amount" id="final_amount" class='form-control' placeholder="Total Amount"></input>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer justify-content-between">
                                                <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
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
@endsection