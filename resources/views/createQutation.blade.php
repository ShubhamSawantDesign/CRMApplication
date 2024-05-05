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