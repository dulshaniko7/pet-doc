
@extends('account.layouts.master')

@section('styles')
    <!-- Datatable -->
    <link href="{{URL('admin_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">
            <div class="form-head mb-md-5 mb-3 align-items-start" style="text-align: right;">
                @if($appointment->status_id == 1)
                    <a href="javascript:void(0);" class="btn btn-outline-danger ml-auto" onclick="changeStatus(3,{{$appointment->id}})"><i class="flaticon-381-error"></i> Reject</a>
                    <a href="javascript:void(0);" class="btn btn-success ml-2" onclick="changeStatus(2,{{$appointment->id}})"><i class="flaticon-381-success-2"></i> Accept</a>
                @endif
                @if($appointment->status_id == 2)
                    <a href="{{URL('/account/doctor/treatments/add/')}}/{{$appointment->pets->id}}" class="btn btn-primary ml-auto">+ Make Treatment</a>
                    <a href="javascript:void(0);" class="btn btn-outline-danger ml-auto" onclick="changeStatus(3,{{$appointment->id}})"><i class="flaticon-381-error"></i> Reject</a>
                @endif
                @if($appointment->status_id == 3)
                    <a href="javascript:void(0);" class="btn btn-success ml-auto" onclick="changeStatus(2,{{$appointment->id}})"><i class="flaticon-381-success-2"></i> Accept</a>
                @endif
            </div>

            <div class="row">
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex doctor-info-details mb-5">
                                        <div class="media align-self-start">
                                            <img alt="image" class="rounded" width="130" src="{{URL('admin_assets/images/avatar/2.jpg')}}">
                                            <i class="flaticon-381-heart"></i>
                                        </div>
                                        <div class="media-body">
                                            <h2 class="mb-2">{{$appointment->pets->name}}</h2>
                                            <span class="mb-md-0 mb-3 d-block"><i class="flaticon-381-clock"></i> {{$appointment->created_at}}</span>
                                        </div>
                                        <div class="text-md-right">
                                            <div class="dropdown mb-md-3 mb-2">
                                                <div class="btn btn-primary">
                                                    <i class="flaticon-381-user-7 mr-2"></i>
                                                    <span>{{$appointment->pets->disease}}</span>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-left">
                                                    <a class="dropdown-item" href="#">A To Z List</a>
                                                    <a class="dropdown-item" href="#">Z To A List</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="doctor-info-content">
                                        <h3 class="text-black mb-3">Story About Disease</h3>
                                        <p class="mb-2">{{$appointment->note}} </p>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Reports</h4>
                                </div>
                                <div class="card-body">
                                    <div class="basic-list-group">
                                        <ul class="list-group">
                                            @foreach($reports as $report)
                                                <li class="list-group-item"><a href="{{ URL('storage/reports/') }}/{{$report->name_original}}">{{$report->name_saved}}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Special Notes</h4>
                                </div>
                                <div class="card-body">
                                    <p class="mb-2">{{$appointment->special_note  ??''}} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="patient-map-area mb-4">
                                        <img src="images/map.jpg" alt=""/>
                                        <a href="javascript:void(0);" class="btn btn-danger btn-xs">View in Fullscreen</a>
                                        <i class="flaticon-381-location-4"></i>
                                    </div>
                                    <div class="iconbox">
                                        <i class="las la-map-marker-alt"></i>
                                        <small>Address</small>
                                        <p>{{$appointment->address}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="iconbox">
                                        <i class="las la-phone"></i>
                                        <small>Phone</small>
                                        <p>{{$appointment->pets->pet_owner->telephone}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="iconbox">
                                        <i class="las la-envelope-open"></i>
                                        <small>Email</small>
                                        <p>{{$appointment->pets->pet_owner->user->email}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



@section('scripts')

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function changeStatus(status,id) {

            $.ajax({
                url: "{{url('/account/doctor/appointment/status')}}",
                method: "POST",
                data: "status="+status+"&id="+id,
                dataType: 'JSON',
                success: function(response) {
                    if (response.success) {
                        $.confirm({
                            icon: 'fa fa-check',
                            theme: 'modern',
                            animation: 'left',
                            type: 'green',
                            title: 'Update!',
                            content: response.message,
                            buttons: {
                                ok: function() {
                                    location.reload();
                                }
                            }
                        });
                    }

                    if (!response.success) {
                        $.confirm({
                            icon: 'fa fa-exclamation-triangle',
                            theme: 'modern',
                            animation: 'right',
                            type: 'red',
                            title: 'Error!',
                            content: response.message,
                            buttons: {
                                ok: function() {
                                    location.reload();
                                }
                            }
                        });
                    }
                }
            });

        }
    </script>


@endsection


