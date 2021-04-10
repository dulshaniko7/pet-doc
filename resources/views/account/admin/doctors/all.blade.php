
@extends('account.layouts.master')

@section('styles')
    <!-- Datatable -->
    <link href="{{URL('admin_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <!--**********************************
    Content body start
***********************************-->
    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <span>All Doctors</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Doctors</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Doctors</h4>
                            <a href="{{URL('/account/admin/doctor/add')}}" class="btn btn-primary ml-auto">+ Add Doctor</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
{{--                                        <th>--}}
{{--                                            <div class="custom-control custom-checkbox">--}}
{{--                                                <input type="checkbox" class="custom-control-input" id="checkAll" required="">--}}
{{--                                                <label class="custom-control-label" for="checkAll"></label>--}}
{{--                                            </div>--}}
{{--                                        </th>--}}
                                        <th>Doctor ID</th>
                                        <th>Name</th>
                                        <th>Registration No</th>
                                        <th>Phone</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($doctors as $doctor)
                                        <tr>
{{--                                        <td>--}}
{{--                                            <div class="custom-control custom-checkbox ml-2">--}}
{{--                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">--}}
{{--                                                <label class="custom-control-label" for="customCheckBox2"></label>--}}
{{--                                            </div>--}}
{{--                                        </td>--}}
                                        <td>{{$doctor->petdoc_id}}</td>
                                        <td>{{$doctor->user->name}}</td>
                                        <td>{{$doctor->registration_no}}</td>
                                        <td>{{$doctor->user->phone}}</td>
                                        <td>{{$doctor->rate}}</td>
                                        <td>
                                            @if($doctor->user->active == 1)
                                            <span class="badge light badge-success">
                                                <i class="fa fa-circle text-success mr-1"></i>
                                                Active
                                            </span>
                                            @else
                                                <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                Active
                                            </span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{--  <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>  --}}
                                                    <a class="dropdown-item" href="{{ URL('account/admin/doctor/edit') }}/{{$doctor->doctor_id}}">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
        Content body end
    ***********************************-->
@endsection



@section('scripts')

    <script src="{{URL('admin_assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL('admin_assets/js/plugins-init/datatables.init.js')}}"></script>
@endsection


