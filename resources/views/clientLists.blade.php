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
                        <h1 class="m-0">Client Lists</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Client Lists</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="col-lg-12 col-md-12 col-sm-12 tr">
                    <button type="button" class="btn  btn-info" data-toggle="modal" data-target="#addClient"><i class="bi bi-plus-circle mr-1"></i>Add Client </button>
                </div>
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->

                        <div class="col-12 col-sm-20">
                            <div class="card card-primary card-outline card-tabs">

                                <div class="card-body">



                                    <div class="tab-content" id="custom-tabs-three-tabContent">
                                        <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                            <!-- Invoice Table -->
                                            <div class="table-responsive data-table-wrapper" id="">
                                                <table id='Clientlists' class='table table-bordered table-hover data-table'>
                                                    <thead>
                                                        <tr>
                                                            <th width='5%'>Sr no</th>
                                                            <th width='15%'>Customer Name </th>
                                                            <th width='21%'>Email </th>
                                                            <th>Contact No</th>
                                                            <th>Country</th>
                                                            <th>State</th>
                                                            <th>City</th>
                                                            <th width='10%'>Status</th>
                                                            <th width='10%'> Actions </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php 
                                                           $cn = 1;
                                                        @endphp
                                                        @foreach($listCustomer as $data)
                                                        <tr>
                                                            <td>{{ $cn++; }}</td>
                                                            <td>{{ $data->customer_name }}</td>
                                                            <td>{{ $data->customer_email }}</td>
                                                            <td>{{ $data->customer_mobile_no }}</td>
                                                            <td>{{ $data->country }}</td>
                                                            <td>{{ $data->state }}</td>
                                                            <td>{{ $data->city }}</td>
                                                            <td>
                                                                @if($data->status == 'active')
                                                                    <center>
                                                                    <a href="javascript:void(0)" onclick="updateCustomerStatus({{ $data->id }},'inactive')" class="btn btn-sm btn-outline-success w-90"><i class="fa fa-check" aria-hidden="true"></i> Active</a>
                                                                    </center>
                                                                @else
                                                                    <center>
                                                                    <a href="javascript:void(0)" onclick="updateCustomerStatus({{ $data->id }}, 'active')" class="btn btn-sm btn-outline-danger w-90" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Batch Not Approved" data-bs-original-title=" Not Active" aria-label=" Not Active"><i class="bi bi-x-square ml-1 mr-1"></i>  Not Active</a>
                                                                    </center>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="http://27.107.4.122/admin/editCustomer/62" class="btn-sm btn-warning mx-2"> <i class="fa fa-edit"></i> </a>
                                                                <a class="btn-sm btn-danger" data-id="62" onclick="removeCustomer(62)"> <i class="fa fa-trash"></i> </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- Invoice Table -->
                                        </div>
                                        <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card -->
                            </div>
                        </div>

                        <!-- /.card -->

                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map card -->

                        <!-- /.card -->
                    </section>
                    <!-- right col -->
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

<div class="modal fade" id="addClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="{{ url('doAddCustomer'); }}" enctype="multipart/form-data" method="POST" id="addVendorForm">
        @csrf
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <!--Header-->
                <div class="modal-header bg-info">
                    <h4 class="modal-title" id="myModalLabel">Add New Customer</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" class="text-white">×</span>
                    </button>
                </div>
                <!--Body-->
                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="customer_name">Customer Name </label>
                            <input type="text" name="customer_name" id="customer_name" class="form-control capitaliaze" placeholder="Enter Customer Name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="customer_email">Customer E-Mail </label>
                            <input type="text" name="customer_email" id="customer_email" class="form-control capitaliaze" placeholder="Enter Customer E-Mail" required>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="customer_number">Customer Mobile Number</label>
                            <input type="number" name="customer_mobile_no" id="customer_mobile_no" class="form-control" placeholder="Enter Mobile Number" required>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label for="address">Address</label>
                            <textarea class="form-control capitaliaze" id="address" name="address" placeholder="Enter Address"></textarea>
                            <!-- <input type="text" name="course_duration" id="course_duration" class="form-control" placeholder="Course Duration" pattern="[0-9]{1,}" title="Enter Numbers Only" required> -->
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="">Select Countries</label>
                            <select name="country" id="country" class="form-control" required onchange="getStateName(this.value,'state','')">
                                <option value=""> --- Select Country---</option>
                                <option value="1" class="dropdown-item"> India</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="state">State</label>
                            <select class="form-control" id="state" name="state" required onchange="getCityByState(this.value,'city','')">
                                <option value=""> --- Select State---</option>
                                <option value="Maharashtra">Maharashtra</option>
 
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-6">
                            <label for="city">City </label>
                            <select class="form-control" id="city" name="city" required>
                                <option value=""> --- Select City---</option>
                                <option value="Pune">Pune</option>
                                <option value="Mumbai">Mumbai</option>
                                <option value="Kolhapur">Kolhapur</option>
                            </select>
                        </div>
                    </div>


                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- Moodal Ended -->
@endsection