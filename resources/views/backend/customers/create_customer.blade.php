@extends('backend.layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('backend/datatable/datatables.min.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header mb-3 pb-2" style="background: white;">
            <div class="container-fluid" style="line-height: 0.6;">
                <div class="row mx-2">
                    <div class="col-sm-6">
                        <h1  style="line-height: 1;">Add New Customer</h1>
                        <span class="font-italic">Add/Customer</span>
                    </div>
                    <div class="col-sm-6 text-right mt-2">
                        <a class="btn btn-info btn-sm "  href="{{ route('customer.index') }}" data-title="Customer List"><i class="bi bi-list-task "></i> Customer List</a>
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12">
                        <div class="card">
                            <div class="card-header pb-0 pt-0  bg-secondary bg-gradient">
                                <h5>Add Customer</h5>
                            </div>
                            <div class="card-body pt-1">
                                @include('backend.customers.create_customer_form')
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
<script src="{{ asset('backend/datatable/datatables.min.js') }}"></script>

@endpush
