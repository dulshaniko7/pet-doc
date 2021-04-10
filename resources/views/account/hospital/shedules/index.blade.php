@extends('account.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/toolbarconfigurator/lib/codemirror/neo.css') }}">
@endsection

@section('content')

    <div class="content-body">
        <div class="container-fluid">
            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Hi, welcome back!</h4>
                        <span>Doctors</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Account</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Schedule</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <div class="container">
                <div class="tab-content">
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
                                                    <div class="card-body">
                                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name of The Doctor</th>
                                                                <th>Start time</th>
                                                                <th>End Time</th>
                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                            @foreach($monday as $sh)
                                                                <tr>
                                                                    <td>{{$sh->hospital_doctor_id}}</td>
                                                                    <td>{{$sh->doctor->display_name}}</td>
                                                                    <td>{{$sh->time_from}}</td>
                                                                    <td>{{$sh->time_to}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="tuesday" role="tabpane2" aria-labelledby="tuesday-tab">
                                        <div class="province-table my-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-body">
                                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name of The Doctor</th>
                                                                <th>Start time</th>
                                                                <th>End Time</th>
                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                            @foreach($tuesday as $sh)
                                                                <tr>
                                                                    <td>{{$sh->hospital_doctor_id}}</td>
                                                                    <td>{{$sh->doctor->display_name}}</td>
                                                                    <td>{{$sh->time_from}}</td>
                                                                    <td>{{$sh->time_to}}</td>
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
                                                    <div class="card-body">
                                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name of The Doctor</th>
                                                                <th>Start time</th>
                                                                <th>End Time</th>
                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                            @foreach($wednesday as $sh)
                                                                <tr>
                                                                    <td>{{$sh->hospital_doctor_id}}</td>
                                                                    <td>{{$sh->doctor->display_name}}</td>
                                                                    <td>{{$sh->time_from}}</td>
                                                                    <td>{{$sh->time_to}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="thursday" role="tabpane3" aria-labelledby="wednesday-tab">
                                        <div class="province-table my-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-body">
                                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name of The Doctor</th>
                                                                <th>Start time</th>
                                                                <th>End Time</th>
                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                            @foreach($thursday as $sh)
                                                                <tr>
                                                                    <td>{{$sh->hospital_doctor_id}}</td>
                                                                    <td>{{$sh->doctor->display_name}}</td>
                                                                    <td>{{$sh->time_from}}</td>
                                                                    <td>{{$sh->time_to}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="friday" role="tabpane3" aria-labelledby="wednesday-tab">
                                        <div class="province-table my-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-body">
                                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name of The Doctor</th>
                                                                <th>Start time</th>
                                                                <th>End Time</th>
                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                            @foreach($friday as $sh)
                                                                <tr>
                                                                    <td>{{$sh->hospital_doctor_id}}</td>
                                                                    <td>{{$sh->doctor->display_name}}</td>
                                                                    <td>{{$sh->time_from}}</td>
                                                                    <td>{{$sh->time_to}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="saturday" role="tabpane3" aria-labelledby="wednesday-tab">
                                        <div class="province-table my-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-body">
                                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name of The Doctor</th>
                                                                <th>Start time</th>
                                                                <th>End Time</th>
                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                            @foreach($saturday as $sh)
                                                                <tr>
                                                                    <td>{{$sh->hospital_doctor_id}}</td>
                                                                    <td>{{$sh->doctor->display_name}}</td>
                                                                    <td>{{$sh->time_from}}</td>
                                                                    <td>{{$sh->time_to}}</td>
                                                                </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div> <!-- end row -->
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="sunday" role="tabpane3" aria-labelledby="wednesday-tab">
                                        <div class="province-table my-2">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card-body">
                                                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                                                            <thead>
                                                            <tr>
                                                                <th>Id</th>
                                                                <th>Name of The Doctor</th>
                                                                <th>Start time</th>
                                                                <th>End Time</th>
                                                            </tr>
                                                            </thead>


                                                            <tbody>
                                                            @foreach($sunday as $sh)
                                                                <tr>
                                                                    <td>{{$sh->hospital_doctor_id}}</td>
                                                                    <td>{{$sh->doctor->display_name}}</td>
                                                                    <td>{{$sh->time_from}}</td>
                                                                    <td>{{$sh->time_to}}</td>
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



        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{ URL('admin_assets/chk_edit/js/ckeditor.js') }}"></script>
    <script src="{{ URL('admin_assets/chk_edit/js/sample.js') }}"></script>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        {{--initSample();--}}

        $( ".day" ).click(function() {
            // alert( "Handler for .click() called." );
            $('.day').removeClass('btn-danger active');
            $(this).addClass('btn-danger active');
            $(this).addClass('btn-danger active');
        });
        // function showSubmisssion(day,status) {
        //     console.log(this.className);
        //     if(status == 1) {
        //         $(".tuesday_submissions").show();
        //         $(".incomplete_submissions").hide();
        //         resetCompleteBtns1();
        //         $(".complete_btn").addClass('btn-danger');
        //         $(".incomplete_btn").addClass('btn-default');
        //     } else if(status == 2) {
        //         $(".complete_submissions").show();
        //         $(".incomplete_submissions").hide();
        //         resetCompleteBtns1();
        //         $(".complete_btn").addClass('btn-danger');
        //         $(".incomplete_btn").addClass('btn-default');
        //     }
        //     else{
        //         $(".complete_submissions").hide();
        //         $(".incomplete_submissions").show();
        //         resetCompleteBtns1();
        //         $(".complete_btn").addClass('btn-default');
        //         $(".incomplete_btn").addClass('btn-danger');
        //     }
        // }
        //
        // function resetCompleteBtns1() {
        //     $(".complete_btn").removeClass('btn-default');
        //     $(".complete_btn").removeClass('btn-danger');
        //     $(".incomplete_btn").removeClass('btn-danger');
        //     $(".incomplete_btn").removeClass('btn-danger');
        // }
        {{--$('#addDoctorForm').on('submit', function(event) {--}}
        {{--    event.preventDefault();--}}


        {{--    $.ajax({--}}
        {{--        url: "{{url('/account/hospital/doctors/save')}}",--}}
        {{--        method: "POST",--}}
        {{--        data: new FormData(this),--}}
        {{--        dataType: 'JSON',--}}
        {{--        contentType: false,--}}
        {{--        cache: false,--}}
        {{--        processData: false,--}}
        {{--        success: function(response) {--}}
        {{--            if (response.success) {--}}
        {{--                $.confirm({--}}
        {{--                    icon: 'fa fa-check',--}}
        {{--                    theme: 'modern',--}}
        {{--                    animation: 'left',--}}
        {{--                    type: 'green',--}}
        {{--                    title: 'Update!',--}}
        {{--                    content: response.message,--}}
        {{--                    buttons: {--}}
        {{--                        ok: function() {--}}
        {{--                            location.href = "{{URL('/account/hospital/doctors')}}";--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            }--}}

        {{--            if (!response.success) {--}}
        {{--                $.confirm({--}}
        {{--                    icon: 'fa fa-exclamation-triangle',--}}
        {{--                    theme: 'modern',--}}
        {{--                    animation: 'right',--}}
        {{--                    type: 'red',--}}
        {{--                    title: 'Error!',--}}
        {{--                    content: response.message,--}}
        {{--                    buttons: {--}}
        {{--                        ok: function() {--}}
        {{--                            location.reload();--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}
        {{--});--}}




    </script>

@endsection
