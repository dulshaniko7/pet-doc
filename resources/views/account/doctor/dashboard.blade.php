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
                                        <div class="media-body text-white ">
                                            <p class="mb-1">Appointments Pending</p>
                                            <h3 class="text-white">{{$appointmentsPending ?? ''}}</h3>
                                        </div>

                                        <div class="media-body text-white text-right">
                                            <p class="mb-1">Appointments Appored</p>
                                            <h3 class="text-white">{{$appointmentsAppored ?? ''}}</h3>
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
                    </div>

                    <div class="row">
{{--                        <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header border-0 pb-0">--}}
{{--                                    <h4 class="card-title">Revenue</h4>--}}
{{--                                    <div class="dropdown">--}}
{{--                                        <button type="button" class="btn btn-dark dropdown-toggle light" data-toggle="dropdown" aria-expanded="false">--}}
{{--                                            2020--}}
{{--                                        </button>--}}
{{--                                        <div class="dropdown-menu" >--}}
{{--                                            <a class="dropdown-item" href="#">2020</a>--}}
{{--                                            <a class="dropdown-item" href="#">2019</a>--}}
{{--                                            <a class="dropdown-item" href="#">2018</a>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-body pt-2">--}}
{{--                                    <h3 class="text-primary font-w600">$41,512k <small class="text-dark ml-2">$25,612k</small></h3>--}}
{{--                                    <div id="chartBar"></div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-12">--}}
{{--                            <div class="card">--}}
{{--                                <div class="card-header border-0 pb-0">--}}
{{--                                    <h4 class="card-title">Top 5 Best Doctor</h4>--}}
{{--                                    <a class="btn-link ml-auto" href="#">More >></a>--}}
{{--                                </div>--}}
{{--                                <div class="card-body">--}}
{{--                                    <div class="widget-media best-doctor">--}}
{{--                                        <ul class="timeline">--}}
{{--                                            <li>--}}
{{--                                                <div class="timeline-panel">--}}
{{--                                                    <div class="media mr-4">--}}
{{--                                                        <img alt="image" width="90" src="{{URL('admin_assets/images/avatar/1.jpg')}}">--}}
{{--                                                        <div class="number">#1</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h4 class="mb-2">Dr. Samantha Queque</h4>--}}
{{--                                                        <p class="mb-2 text-primary">Gynecologist</p>--}}
{{--                                                        <div class="star-review">--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-gray"></i>--}}
{{--                                                            <i class="fa fa-star text-gray"></i>--}}
{{--                                                            <span class="ml-3">451 reviews</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="social-media">--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="timeline-panel active">--}}
{{--                                                    <div class="media mr-4">--}}
{{--                                                        <img alt="image" width="90" src="{{URL('admin_assets/images/avatar/2.jpg')}}">--}}
{{--                                                        <div class="number">#2</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h4 class="mb-2">Dr. Abdul Aziz Lazis</h4>--}}
{{--                                                        <p class="mb-2 text-primary">Physical Therapy</p>--}}
{{--                                                        <div class="star-review">--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-gray"></i>--}}
{{--                                                            <span class="ml-3">238 reviews</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="social-media">--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="timeline-panel">--}}
{{--                                                    <div class="media mr-4">--}}
{{--                                                        <img alt="image" width="90" src="{{URL('admin_assets/images/avatar/3.jpg')}}">--}}
{{--                                                        <div class="number">#3</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h4 class="mb-2">Dr. Samuel Jr.</h4>--}}
{{--                                                        <p class="mb-2 text-primary">Dentist</p>--}}
{{--                                                        <div class="star-review">--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-gray"></i>--}}
{{--                                                            <i class="fa fa-star text-gray"></i>--}}
{{--                                                            <span class="ml-3">300 reviews</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="social-media">--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="timeline-panel">--}}
{{--                                                    <div class="media mr-4">--}}
{{--                                                        <img alt="image" width="90" src="{{URL('admin_assets/images/avatar/4.jpg')}}">--}}
{{--                                                        <div class="number">#4</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h4 class="mb-2">Dr. Alex Siauw</h4>--}}
{{--                                                        <p class="mb-2 text-primary">Physical Therapy</p>--}}
{{--                                                        <div class="star-review">--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-gray"></i>--}}
{{--                                                            <i class="fa fa-star text-gray"></i>--}}
{{--                                                            <span class="ml-3">451 reviews</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="social-media">--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                            <li>--}}
{{--                                                <div class="timeline-panel">--}}
{{--                                                    <div class="media mr-4">--}}
{{--                                                        <img alt="image" width="90" src="{{URL('admin_assets/images/avatar/5.jpg')}}">--}}
{{--                                                        <div class="number">#5</div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="media-body">--}}
{{--                                                        <h4 class="mb-2">Dr. Jennifer Ruby</h4>--}}
{{--                                                        <p class="mb-2 text-primary">Nursingc</p>--}}
{{--                                                        <div class="star-review">--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <i class="fa fa-star text-orange"></i>--}}
{{--                                                            <span class="ml-3">700 reviews</span>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                    <div class="social-media">--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-instagram btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-twitter btn-sm"></a>--}}
{{--                                                        <a href="javascript:void(0);" class="btn btn-outline-primary btn-rounded fa fa-facebook btn-sm"></a>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="card-footer border-0 pt-0 text-center">--}}
{{--                                    <a href="#" class="btn-link">See More >></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
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
