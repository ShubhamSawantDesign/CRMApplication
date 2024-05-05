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
                        <h1 class="m-0">Update Customer Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Update Customer Details</li>
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
                        <h3 class="card-title">Edit Customer</h3>
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
                                            <input type="hidden" name="customer_id" value="{{ $customer->id }}" />
                                            <div class="table-responsive data-table-wrapper" id="">
                                                <div class="modal-body">
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="customer_name">Customer Name </label>
                                                            <input type="text" name="customer_name" id="customer_name" class="form-control capitaliaze" value="{{ $customer->customer_name }}" required>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label for="customer_email">Customer E-Mail </label>
                                                            <input type="text" name="customer_email" id="customer_email" class="form-control capitaliaze" value="{{ $customer->customer_email }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="customer_mobile_no">Customer Mobile Number</label>
                                                            <input type="number" name="customer_mobile_no" id="customer_mobile_no" class="form-control" value="{{ $customer->customer_mobile_no }}" required>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-12">
                                                            <label for="address">Address</label>
                                                            <textarea class="form-control" id="address" name="address" placeholder="Enter Address capitaliaze">{{ $customer->address }}</textarea>
                                                            <!-- <input type="text" name="course_duration" id="course_duration" class="form-control" placeholder="Course Duration" pattern="[0-9]{1,}" title="Enter Numbers Only" required> -->
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="">Select Countries</label>
                                                            <select name="country" id="country" class="form-control" required onchange="getStateName(this.value,'state','')">
                                                                <option value=""> --- Select Country---</option>
                                                                <option value="{{ $customer->country }}" class="dropdown-item" selected> India</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label for="state">State</label>
                                                            <select class="form-control" id="state" name="state" required onchange="getCityByState(this.value,'city','')">
                                                                <option value="{{ $customer->state }}">{{ $customer->state }}</option>
                                                                <option value="Maharashtra">Maharashtra</option>
                                
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="row form-group">
                                                        <div class="col-md-6">
                                                            <label for="city">City </label>
                                                            <select class="form-control" id="city" name="city" required>
                                                                <option value="{{ $customer->city }}">{{ $customer->city }}</option>
                                                                <option value="Pune">Pune</option>
                                                                <option value="Mumbai">Mumbai</option>
                                                                <option value="Kolhapur">Kolhapur</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <!-- Calling Jquery fucntion -->
                                                    <div class="tr">
                                                        <a href="{{ url('clientMaster'); }}" class="btn btn-outline-primary" data-dismiss="modal">Back</a>
                                                        <button type="submit" id="submit" class="btn btn-primary">Submit</button>
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
@endsection