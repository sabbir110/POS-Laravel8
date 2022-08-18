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
                        <h3  style="line-height: 1;">Manage Unit</h3>
                        <span class="font-italic">Manage/Unit</span>
                    </div>
                    <div class="col-sm-6 text-right mt-2">
                        <button class="btn btn-info   btn-sm open_modal" data-modal="common_modal_lg" data-action="{{ route('unit.create_form') }}" data-title="Add Customer">
                            <i class="bi-plus-circle me-2"></i>
                            Add Unit</button>
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
                                <h5>User List </h5>
                            </div>
                            <div class="card-body pt-1">
                                <table id="datatable"
                                    class=" table table-striped table-sm text-center align-middle  table-bordered table-hover data_table"
                                    style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th>SL.</th>
                                            <th>Unit Name</th>
                                            <th>Created At</th>
                                            <th>Last Update</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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
    <script>
        //Fetch Data
        $(function() {
            var table = $('#datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('unit.index') }}",
                "pageLength": 20,
                "aLengthMenu": [
                    [20, 25, 30, 50, -1],
                    [20, 25, 30, 50, "All"]
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex'
                    },
                    {
                        data: 'unit_name',
                        name: 'unit_name',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        render: function(data, type, full, meta) {
                            var d = new Date(data);
                            return `${d.getDate()+'/'+(d.getMonth() + 1)+'/'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds()}`;
                        },
                        orderable: false
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        render: function(data, type, full, meta) {
                            var d = new Date(data);
                            return `${d.getDate()+'/'+(d.getMonth() + 1)+'/'+d.getFullYear()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds()}`;
                        },
                        orderable: false
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ]
            })
        })
    </script>
@endpush
