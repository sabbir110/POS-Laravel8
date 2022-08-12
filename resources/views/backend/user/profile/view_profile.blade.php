@extends('backend.layouts.master')
@push('css')
@endpush

@php
$user = isset($user) && !empty($user) ? $user : [];
$name = isset($user->name) ? $user->name : '';
$email = isset($user->email) ? $user->email : '';
$address = isset($user->address) ? $user->address : '';
$mobile = isset($user->mobile) ? $user->mobile : '';
$gender = isset($user->gender) ? $user->gender : '';
$image = isset($user->image) ? $user->image : '';
$id = isset($user->id) ? $user->id : '';
// dd($id);
@endphp
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header mb-3 pb-2" style="background: white;">
            <div class="container-fluid" style="line-height: 0;">
                <div class="row mx-2">
                    <div class="col-sm-6">
                        <h3 style="line-height: 1;">Manage Profile</h3>
                        <span class="font-italic">Manage/Profile</span>
                    </div>
                    <div class="col-sm-6 text-right pt-1">
                    </div>
                </div>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-md-4 offset-4">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ (!empty($image)) ? url('/storage/upload/user_image/'.$image)  : url('/storage/upload/no_image.png') }}"
                                        alt="User profile picture">
                                </div>
                                {{-- url('storage/app/public/upload/user_image/'.$image) --}}

                                <h3 class="profile-username text-center">{{ $name }}</h3>

                                <p class="text-muted text-center">{{ $address }}</p>

                                <table width="100%" class="table table-bordered" id="datatable">
                                    <thead>
                                        <tr><td><strong>Mobile No</strong></td><td>{{ $mobile }}</td></tr>
                                        <tr><td><strong>Email</strong></td><td>{{ $email }}</td></tr>
                                        <tr><td><strong>Gender</strong></td><td>{{ $gender }}</td></tr>
                                    </thead>
                                </table>

                                <a  class="btn btn-info btn-block open_modal" data-id="{{ $id }}" data-action="{{ route('profiles.edit') }}" data-title="Update Your Profile" data-modal="common_modal_lg"><b><i class="bi-pencil-square h4"></i> Edit Profile</b></a>
                            </div>
                            <!-- /.card-body -->
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
@endpush
