@extends('backend.layouts.master')
@push('css')
<link rel="stylesheet" href="{{ asset('backend/datatable/datatables.min.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mx-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Manage User</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="">Manage</a></li>
                            <li class="breadcrumb-item active">User</li>
                        </ol>
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
                            <div class="card-header d-flex justify-content-between">
                                <h5>Add User</h5>
                                <a class="btn btn-info ml-auto "  href="{{ route('user.view') }}" data-title="User List">
                                    <i class="bi bi-list-task "></i> User List</a>
                            </div>
                            <div class="card-body pt-1">
                                @include('backend.user.create_user_form')
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
