@extends('account.layouts.master')

@section('styles')

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
                        <span>Schedule</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Doctor</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Schedule</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <input type="hidden" id="doc_id" value="{{$doctor->id  ?? ''}}">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Schedule</h4>
                        </div>
                        <div class="card-body">
                            <form id="sheduleForm">
                                <div class="row page-titles mx-0">
                                    <div class="tab-content col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-box">

                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="monday-tab" data-toggle="tab" href="#monday" role="tab" aria-controls="home" aria-expanded="true">Monday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="tuesday-tab" data-toggle="tab" href="#tuesday" role="tab" aria-controls="province">Tuesday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="wednesday-tab" data-toggle="tab" href="#wednesday" role="tab" aria-controls="city">Wednesday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#thursday" role="tab" aria-controls="city">Thursday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="friday-tab" data-toggle="tab" href="#friday" role="tab" aria-controls="city">Friday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="saturday-tab" data-toggle="tab" href="#saturday" role="tab" aria-controls="city">Saturday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="sunday-tab" data-toggle="tab" href="#sunday" role="tab" aria-controls="city">Sunday</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content text-muted" id="myTabContent">
                                                        <div role="tabpanel" class="tab-pane fade in active show" id="monday" aria-labelledby="monday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header" style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_monday" name="start_monday">
                                                                                            @foreach($slots1 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_monday" name="end_monday">
                                                                                            @foreach($slots2 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button" class="btn btn-sm btn-success" onclick="AddSchedule(1)">+ Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="monday">
                                                                                <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>Id</th>
                                                                                        <th>Date</th>
                                                                                        <th>Start time</th>
                                                                                        <th>End Time</th>
                                                                                    </tr>
                                                                                    </thead>


                                                                                    <tbody>
                                                                                    @foreach($mondays as $monday)
                                                                                        <tr>
                                                                                            <td>{{$monday->id}}</td>
                                                                                            <td>{{$monday->date}}</td>
                                                                                            <td>{{$monday->time_from}}</td>
                                                                                            <td>{{$monday->time_to}}</td>
                                                                                        </tr>
                                                                                    @endforeach
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade" id="tuesday" role="tabpane2" aria-labelledby="tuesday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header" style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_tuesday">
                                                                                            @foreach($slots1 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_tuesday">
                                                                                            @foreach($slots2 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button" class="btn btn-sm btn-success" onclick="AddSchedule(2)">+ Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>
                                                                                @foreach($tuesdays as $tuesday)
                                                                                    <tr>
                                                                                        <td>{{$tuesday->id}}</td>
                                                                                        <td>{{$tuesday->date}}</td>
                                                                                        <td>{{$tuesday->time_from}}</td>
                                                                                        <td>{{$tuesday->time_to}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="wednesday" role="tabpane3" aria-labelledby="wednesday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header" style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_wednesday">
                                                                                            @foreach($slots1 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_wednesday">
                                                                                            @foreach($slots2 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button" class="btn btn-sm btn-success" onclick="AddSchedule(3)">+ Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>
                                                                                @foreach($wednesdays as $wednesday)
                                                                                    <tr>
                                                                                        <td>{{$wednesday->id}}</td>
                                                                                        <td>{{$wednesday->date}}</td>
                                                                                        <td>{{$wednesday->time_from}}</td>
                                                                                        <td>{{$wednesday->time_to}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="thursday" role="tabpane3" aria-labelledby="thursday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header" style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_thursday">
                                                                                            @foreach($slots1 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_thursday">
                                                                                            @foreach($slots2 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button" class="btn btn-sm btn-success" onclick="AddSchedule(4)">+ Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>
                                                                                @foreach($thursdays as $thursday)
                                                                                    <tr>
                                                                                        <td>{{$thursday->id}}</td>
                                                                                        <td>{{$thursday->date}}</td>
                                                                                        <td>{{$thursday->time_from}}</td>
                                                                                        <td>{{$thursday->time_to}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="friday" role="tabpane3" aria-labelledby="friday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header" style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_friday">
                                                                                            @foreach($slots1 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_friday">
                                                                                            @foreach($slots2 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button" class="btn btn-sm btn-success" onclick="AddSchedule(5)">+ Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>
                                                                                @foreach($fridays as $friday)
                                                                                    <tr>
                                                                                        <td>{{$friday->id}}</td>
                                                                                        <td>{{$friday->date}}</td>
                                                                                        <td>{{$friday->time_from}}</td>
                                                                                        <td>{{$friday->time_to}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="saturday" role="tabpane3" aria-labelledby="saturday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header" style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_saturday">
                                                                                            @foreach($slots1 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_saturday">
                                                                                            @foreach($slots2 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button" class="btn btn-sm btn-success" onclick="AddSchedule(6)">+ Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>
                                                                                @foreach($saturdays as $saturday)
                                                                                    <tr>
                                                                                        <td>{{$saturday->id}}</td>
                                                                                        <td>{{$saturday->date}}</td>
                                                                                        <td>{{$saturday->time_from}}</td>
                                                                                        <td>{{$saturday->time_to}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="sunday" role="tabpane3" aria-labelledby="sunday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header" style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_sunday">
                                                                                            @foreach($slots1 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_sunday">
                                                                                            @foreach($slots2 as $s)
                                                                                                <option value="{{$s}}">{{$s}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button" class="btn btn-sm btn-success" onclick="AddSchedule(7)">+ Add</button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>
                                                                                @foreach($sundays as $sunday)
                                                                                    <tr>
                                                                                        <td>{{$sunday->id}}</td>
                                                                                        <td>{{$sunday->date}}</td>
                                                                                        <td>{{$sunday->time_from}}</td>
                                                                                        <td>{{$sunday->time_to}}</td>
                                                                                    </tr>
                                                                                @endforeach
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
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

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function AddSchedule(id)
        {
            var date = '';
            var start;
            var end;
            var doc_id = $('#doc_id').val();

            if(id == 1)
            {
                date = 'monday';
                start = $('#start_monday').val();
                end = $('#end_monday').val();
            }
            else if(id == 2)
            {
                date = 'tuesday';
                start = $('#start_tuesday').val();
                end = $('#end_tuesday').val();
            }
            else if(id == 3)
            {
                date = 'wednesday';
                start = $('#start_wednesday').val();
                end = $('#end_wednesday').val();
            }
            else if(id == 4)
            {
                date = 'thursday';
                start = $('#start_thursday').val();
                end = $('#end_thursday').val();
            }
            else if(id == 5)
            {
                date = 'friday';
                start = $('#start_friday').val();
                end = $('#end_friday').val();
            }
            else if(id == 6)
            {
                date = 'saturday';
                start = $('#start_saturday').val();
                end = $('#end_saturday').val();
            }
            else if(id == 7)
            {
                date = 'sunday';
                start = $('#start_sunday').val();
                end = $('#end_sunday').val();
            }

            console.log(start);
            if(start < end)
            {
                $.ajax({
                    url: "{{url('/account/doctor/add/schedule')}}",
                    method: "POST",
                    data: "date=" + date + "&start=" + start + "&end=" + end + "&doc_id=" + doc_id,
                    success: function(response) {
                        if (response.success) {
                            $.confirm({
                                icon: 'fa fa-check',
                                theme: 'modern',
                                animation: 'right',
                                type: 'green',
                                title: 'Success!',
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

                                    }
                                }
                            });
                        }
                    }
                });
            }
            else{
                alert('Enter valid time slot');
                return false;
            }

        }

    </script>
@endsection



