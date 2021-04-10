@extends('account.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/toolbarconfigurator/lib/codemirror/neo.css') }}">
    <link href="{{URL('admin_assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
    <link href="{{URL('admin_assets/vendor/jquery-asColorPicker/css/asColorPicker.min.css')}}" rel="stylesheet">
    <link href="{{URL('admin_assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
    <link href="{{URL('admin_assets/vendor/pickadate/themes/default.css')}}" rel="stylesheet">
    <link href="{{URL('admin_assets/vendor/pickadate/themes/default.date.css')}}" rel="stylesheet">

    <style>
        .container {
            max-width: 960px;
            margin: 30px auto;
            padding: 20px;
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }
        .upload-img {
            display: none;
        }

        .upload-label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all .2s ease-in-out;
        }

        .upload-label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .upload-label:after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .preview-div{
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }

        /*///////////////////////////////*/

        @import url('https://fonts.googleapis.com/css2?family=Nerko+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@200&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Teko&display=swap');



        .Button {
            background-color: #8d877a29;
            color: #450b5a;
            cursor: pointer;
            padding: 18px;
            width: 100%;
            border: none;
            text-align: left;
            outline: none;
            font-size: 19px;
            /*font-family: 'Nerko One', cursive;*/
            transition: 0.4s;
        }

        .Button:hover {
            background-color: #450b5a;
            color: #ffffff;
        }


        .Button:after {
            content: '\002B';
            color: #8d877a29;
            font-weight: bold;
            float: right;
            margin-left: 5px;
        }

        .panel {
            padding: 0 18px;
            background-color: #e8e8e8;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.2s ease-out;
        }

        #First{
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        #Last{
            border-bottom-left-radius: 5px;
            border-bottom-right-radius: 5px;
        }

    </style>
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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add Doctor</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <form id="addDoctorForm">
                <div class="row page-titles mx-0">
                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" class="form-control" id="about" name="about" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Registration No</label>
                                <input type="text" class="form-control" id="reg_no" name="reg_no" required>
                            </div>
                            <div class="form-group">
                                <label>Phone No</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" id="address" name="address" required>
                            </div>
                            <div class="form-group">
                                <label>Specialization</label>
                                <input type="text" class="form-control" id="spec" name="spec" required>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control" id="gender" name="gender" required>
                                    <option value="male" selected>Male</option>
                                    <option value="female">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Bank Account No</label>
                                <input type="text" class="form-control" id="bank_acc_no" name="bank_acc_no" required>
                            </div>
                            <div class="form-group">
                                <label>Branch</label>
                                <input type="text" class="form-control" id="branch" name="branch" required>
                            </div>
                            <input type="hidden" name="hospital_id" value="{{$hospital_id}}">
                            <div class="p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                                <button type="submit" id="btnsubmit" class="btn btn-primary mt-3">Save</button>
                            </div>
                        </div>
                    </div>
                </div>




            </form>
        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{ URL('admin_assets/chk_edit/js/ckeditor.js') }}"></script>
    <script src="{{ URL('admin_assets/chk_edit/js/sample.js') }}"></script>
    <script src="{{URL('admin_assets/vendor/moment/moment.min.js')}}"></script>

    <script src="{{URL('admin_assets/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- clockpicker -->
    <script src="{{URL('admin_assets/vendor/clockpicker/js/bootstrap-clockpicker.min.js')}}"></script>
    <!-- asColorPicker -->
    <script src="{{URL('admin_assets/vendor/jquery-asColor/jquery-asColor.min.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/jquery-asGradient/jquery-asGradient.min.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/jquery-asColorPicker/js/jquery-asColorPicker.min.js')}}"></script>

    <script src="{{URL('admin_assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/pickadate/picker.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/pickadate/picker.time.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/pickadate/picker.date.js')}}"></script>


    <!-- Daterangepicker -->
    <script src="{{URL('admin_assets/js/plugins-init/bs-daterange-picker-init.js')}}"></script>
    <!-- Clockpicker init -->
    <script src="{{URL('admin_assets/js/plugins-init/clock-picker-init.js')}}"></script>
    <!-- asColorPicker init -->
    <script src="{{URL('admin_assets/js/plugins-init/jquery-asColorPicker.init.js')}}"></script>
    <!-- Material color picker init -->
    <script src="{{URL('admin_assets/js/plugins-init/material-date-picker-init.js')}}"></script>
    <!-- Pickdate -->
    <script src="{{URL('admin_assets/js/plugins-init/pickadate-init.js')}}"></script>

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        {{--initSample();--}}
        //accordian collapse
        var acc = document.getElementsByClassName("Button");
        var i;

        for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight) {
                    panel.style.maxHeight = null;
                } else {
                    panel.style.maxHeight = panel.scrollHeight + "px";
                }
            });
        }

        $('#checkMonday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#monday_start_2').prop("disabled", false);
                $('#monday_end_2').prop("disabled", false);
                $('#monday_start_2').prop("required", true);
                $('#monday_end_2').prop("required", true);
            } else {
                $('#monday_start_2').prop("required", false);
                $('#monday_end_2').prop("required", false);
                $('#monday_start_2').prop("disabled", true);
                $('#monday_end_2').prop("disabled", false);
            }
        });

        $('#checkTuesday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#tuesday_start_2').prop("disabled", false);
                $('#tuesday_end_2').prop("disabled", false);
                $('#tuesday_start_2').prop("required", true);
                $('#tuesday_end_2').prop("required", true);
            } else {
                $('#tuesday_start_2').prop("required", false);
                $('#tuesday_end_2').prop("required", false);
                $('#tuesday_start_2').prop("disabled", false);
                $('#tuesday_end_2').prop("disabled", false);
            }
        });

        $('#checkWednesday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#wednesday_start_2').prop("disabled", false);
                $('#wednesday_end_2').prop("disabled", false);
            } else {
                $('#wednesday_start_2').prop("disabled", false);
                $('#wednesday_end_2').prop("disabled", false);
            }
        });

        $('#checkThursday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#thursday_start_2').prop("disabled", false);
                $('#thursday_end_2').prop("disabled", false);
            } else {
                $('#thursday_start_2').prop("disabled", false);
                $('#thursday_end_2').prop("disabled", false);
            }
        });

        $('#checkFriday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#friday_start_2').prop("disabled", false);
                $('#friday_end_2').prop("disabled", false);
            } else {
                $('#friday_start_2').prop("disabled", false);
                $('#friday_end_2').prop("disabled", false);
            }
        });

        $('#checkSaturday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#saturday_start_2').prop("disabled", false);
                $('#saturday_end_2').prop("disabled", false);
            } else {
                $('#saturday_start_2').prop("disabled", false);
                $('#saturday_end_2').prop("disabled", false);
            }
        });

        $('#checkSunday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#sunday_start_2').prop("disabled", false);
                $('#sunday_end_2').prop("disabled", false);
            } else {
                $('#sunday_start_2').prop("disabled", false);
                $('#sunday_end_2').prop("disabled", false);
            }
        });


        $('#addDoctorForm').on('submit', function(event) {
            event.preventDefault();


            $.ajax({
                url: "{{url('/account/admin/hospital/doctors/save')}}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
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
                                    location.href = "{{URL('/account/admin/hospital/edit')}}/"+response.id;
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
        });




    </script>

@endsection
