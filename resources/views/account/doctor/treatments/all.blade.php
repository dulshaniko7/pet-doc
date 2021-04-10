
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
                        <h4>Hi, welcome back!</h4>
                        <span>Treatments</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Treatments</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Treatments</h4>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example5" class="display" style="min-width: 845px">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Pet Name</th>
                                        <th>Pet Owner Name</th>
                                        <th>Date</th>
{{--                                        <th>Action</th>--}}
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($treatments as $treatment)
                                        <tr>
                                            <td>{{$treatment->id}}</td>
                                            <td>{{$treatment->pets->name}}</td>
                                            <td>{{$treatment->pets->pet_owner->display_name}}</td>
                                            <td>{{$treatment->created_at}}</td>
                                            <td>
{{--                                                <div class="dropdown ml-auto text-right">--}}
{{--                                                    <div class="btn-link" data-toggle="dropdown">--}}
{{--                                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                        @if($treatment->status_id == 1)--}}
{{--                                                            <a class="dropdown-item" href="#" onclick="changeStatus(2,{{$treatment->id}})">Accept</a>--}}
{{--                                                            <a class="dropdown-item" href="#" onclick="changeStatus(3,{{$treatment->id}})">Reject</a>--}}
{{--                                                        @endif--}}
{{--                                                        @if($treatment->status_id == 2)--}}
{{--                                                            <a class="dropdown-item" href="#" onclick="changeStatus(3,{{$appointment->id}})">Reject</a>--}}
{{--                                                        @endif--}}

{{--                                                        @if($treatment->status_id == 3)--}}
{{--                                                            <a class="dropdown-item" href="#" onclick="changeStatus(2,{{$treatment->id}})">Accept</a>--}}
{{--                                                        @endif--}}
{{--                                                        <a class="dropdown-item" href="{{URL('/account/doctor/appointment')}}/{{$treatment->id}}">View Details</a>--}}

{{--                                                    </div>--}}
{{--                                                </div>--}}
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

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


    </script>
@endsection


