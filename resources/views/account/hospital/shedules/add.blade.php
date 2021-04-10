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
                    <div class="tab-pane active" id="tab_smart_forms">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12 padding0">
                                    <button class="btn btn-danger day active">Monday</button>

                                    <button class="btn btn-default day">Tuesday</button>

                                    <button class="btn btn-default day">Wednesday</button>

                                    <button class="btn btn-default day" >Thursday</button>

                                    <button class="btn btn-default day" >Friday</button>

                                    <button class="btn btn-default day" >Saturday</button>

                                    <button class="btn btn-default day" >Sunday</button>

                                    <hr>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 padding0 monday_submissions">
                                    <label for="">Monday</label>
                                </div>
                                <div class="col-md-12 padding0 tuesday_submissions">
                                    <label for="">Tuesday</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane" id="tab_marketing_funnels">
                        <div class="col-sm-12">

                            <div class="row">
                                <div class="col-md-12 padding0 moday">
                                    <label for="">before test</label>
                                </div>

                                <div class="col-md-12 padding0 hide tuesday">
                                    <label for="">Test</label>
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
