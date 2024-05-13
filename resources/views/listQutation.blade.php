@extends('header')
@section('content')
<style>
    .connectedSortable #QuoteList_filter label {
        float: right;
    }

    #QuoteList_paginate {
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
                        <h1 class="m-0">Quotation Lists</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Quotation Lists</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <div class="col-lg-12 col-md-12 col-sm-12 tr">
                    <a  href="{{ url('/createQuatation'); }}" class="btn  btn-info"><i class="nav-icon fa fa-calculator mr-1"></i>Create Quotation</a>
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
                                                <table id='QuoteList' class='table table-bordered table-hover data-table'>
                                                    <thead>
                                                        <tr>
                                                            <th width='5%'>Sr no</th>
                                                            <th width='15%'>Customer Name </th>
                                                            <th width='21%'>Estimation Id </th>
                                                            <th>Reference ID</th>
                                                            <th>Total Amount</th>
                                                            <th>Final Amount</th>
                                                            <th>Sales Persone Name</th>
                                                            <th>Project Name</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php 
                                                           $cn = 1;
                                                        @endphp
                                                        @foreach($invoice_Details as $data)
                                                        <tr>
                                                            <td>{{ $cn++; }}</td>
                                                            <td>{{ $data->customer_name }}</td>
                                                            <td>{{ $data->estimate_id }}</td>
                                                            <td>{{ $data->reference_id }}</td>
                                                            <td>{{ $data->total_amount }}</td>
                                                            <td>{{ $data->final_amount }}</td>
                                                            <td>{{ $data->sales_person }}</td>
                                                            <td>{{ $data->project_name }}</td>
                                                            <td>
                                                                <a href="{{ url('viewClientDetails/'.$data->id); }}" class="btn-sm btn-warning mx-2"> <i class="fa fa-edit"></i> </a>
                                                                <a href="{{ url('/generate-quotation/'.$data->id); }}" class="btn-sm btn-danger" > <i class="fas fa-file-pdf"></i> </a>
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
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    @include('footer')
</div>
@endsection