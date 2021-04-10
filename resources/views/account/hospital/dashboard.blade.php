@extends('account.layouts.master')
@section('content')

    <!--**********************************
    Content body start
***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head d-flex mb-3 mb-md-5 align-items-start">
                <div class="mr-auto d-none d-lg-block">
                    <h3 class="text-primary font-w600">Welcome to Petdoc.lk!</h3>
                    <p class="mb-0">Dashboard</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-xxl-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="widget-stat card bg-primary">
                                <div class="card-body  p-4">
                                    <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-calendar-1"></i>
                                    </span>
                                        <div class="media-body text-white text-right">
                                            <p class="mb-1">Appointments</p>
                                            <h3 class="text-white">{{count($appointments)}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="widget-stat card bg-primary">
                                <div class="card-body  p-4">
                                    <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-user-7"></i>
                                    </span>
                                        <div class="media-body text-white text-right">
                                            <p class="mb-1">Doctors</p>
                                            <h4 class="text-white" >{{count($hospital_doctors)}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="widget-stat card bg-danger">
                                <div class="card-body  p-4">
                                    <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-calendar-1"></i>
                                    </span>
                                        <div class="media-body text-white text-right">
                                            <p class="mb-1">Monthly Channels</p>
                                            <h3 class="text-white">{{$appointmentsCount}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-sm-6">
                            <div class="widget-stat card bg-danger">
                                <div class="card-body  p-4">
                                    <div class="media">
                                    <span class="mr-3">
                                        <i class="flaticon-381-user-7"></i>
                                    </span>
                                        <div class="media-body text-white text-right">
                                            <p class="mb-1">Best Doctor</p>
                                            <h4 class="text-white" id="docName">{{$bestDocName?? ''}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">

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

    <!-- Dashboard 1 -->
    <script src="{{URL('admin_assets/js/dashboard/dashboard-1.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL('admin_assets/js/plugins-init/datatables.init.js')}}"></script>
<script>
    $(document).ready(function() {
        let docName = document.querySelector('#docName')
        let docNameValue = docName.textContent
        let capDoctor = docNameValue[0].toUpperCase() + docNameValue.substring(1)

        docName.textContent = capDoctor
    });
</script>
@endsection
