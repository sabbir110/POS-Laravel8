@extends('backend.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('backend/datatable/datatables.min.css') }}">
@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header mb-3 pb-2" style="background: white;">
            <div class="container-fluid" style="line-height: 0;">
                <div class="row mx-2" >
                    <div class="col-sm-6">
                        <h3  style="line-height: 1;">Manage Password</h3>
                        <span class="font-italic">Manage/Password</span>
                    </div>
                    <div class="col-sm-6 text-right mt-2">
                        <a class="btn btn-sm btn-info ml-auto " href="{{ route('profiles.view') }}" data-title="User List">
                            <i class="bi bi-list-task "></i> View Profile</a>
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
                                <h5>Change Password</h5>
                                >
                            </div>
                            <div class="card-body pt-1">
                                <form action="{{ route('profiles.update_password') }}" id="user_form" method="POST">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="">Old Password</label>
                                            <input type="password" name="old_password" class="form-control"
                                                placeholder="Enter Password">
                                            <span class="text-danger error_text old_password-error"></span>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="">New Password</label>
                                            <input type="password" name="new_password" class="form-control"
                                                placeholder="Enter Password">
                                            <span class="text-danger error_text new_password-error"></span>
                                        </div>
                                            <div class="form-group col-md-4">
                                                <label for="">Confirm Password</label>
                                                <input type="password" name="confirm_password" class="form-control"
                                                    placeholder="Confirm Password">
                                                <span class="text-danger error_text confirm_password-error"></span>
                                            </div>
                                        <div class="form-group col-md-12">
                                            @php
                                                $url = route('profiles.view');
                                            @endphp
                                            <button type="submit"
                                                onclick="saveUpdate(this,'{{ $url }}','#datatable')"
                                                class="btn btn-info float-right"><i class="bi bi-cloud-download"></i>
                                                Save</button>
                                        </div>
                                    </div>
                                </form>
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
