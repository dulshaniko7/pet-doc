@extends('account.layouts.master')

@section('styles')

    <link href="{{URL('admin_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{URL('admin_assets/vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
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
                        <h4>Doctor Information</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Hospitals</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Doctors</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="HospitalAddForm">
                                <div class="row page-titles mx-0">
                                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="container">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload" class="upload-img" name="image" accept=".png, .jpg, .jpeg, .svg" />
                                                            <label for="imageUpload" class="upload-label"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview" class="preview-div" style="background-image: url('{{asset('storage/avatars/hospital_doctors/')}}/{{$doctor->image}}')">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <fieldset disabled>
                                                        <div class="form-group">
                                                            <label>ID</label>
                                                            <input type="text" class="form-control" id="petdoc_id" name="petdoc_id" value="{{$doctor->id}}">
                                                        </div>
                                                    </fieldset>
                                                    <input type="hidden" name="petdoc_id" value="{{$doctor->id}}">
                                                </div>
                                                <div class="col-md-6"><div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{$doctor->display_name}}">
                                                    </div></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Registration No</label>
                                                    <input type="text" class="form-control" id="reg_no" name="reg_no" value="{{$doctor->registration_no}}">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$doctor->address}}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Phone</label>
                                                    <input type="number" class="form-control" id="phone" name="phone" value="{{$doctor->phone}}">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Gender</label>
                                                    <select id="gender" class="form-control" name="gender">
                                                        @if($doctor->gender === "Male")
                                                            <option value="Male" selected>Male</option>
                                                            <option value="Female">Female</option>
                                                        @else
                                                            <option value="Male">Male</option>
                                                            <option value="Female" selected>Female</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Rate</label>
                                                    <input type="text" class="form-control" id="rate" name="rate" value="{{$doctor->rate}}">
                                                </div>
                                            </div>
                                            <input type="hidden" name="doctor_id" value="{{$doctor->id}}">
                                            <div class="p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

{{--            <div class="row page-titles mx-0">--}}
{{--                <div class="col-sm-12 p-md-0">--}}
{{--                    <div class="welcome-text">--}}
{{--                        <h4>Doctor Shedule</h4>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <div class="row">--}}
{{--                <form id="default_form">--}}
{{--                    <div class="col-sm-12">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row page-titles mx-0">--}}
{{--                                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="row">--}}
{{--                                                <button class="Button" type="button" id="First">Monday</button>--}}
{{--                                                <div class="panel col-md-12">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="monday_start_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="monday_end_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="custom-control custom-checkbox mb-3">--}}
{{--                                                            <input type="checkbox" class="custom-control-input" id="checkMonday">--}}
{{--                                                            <label class="custom-control-label" for="checkMonday">Select if you want to active second slot</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="monday_start_2" autocomplete="off" name="monday_start_2" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="monday_end_2" name="monday_end_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        --}}{{--                                                        <div><a class="btn btn-sm btn-primary mb-3" style="color: #fff;" onclick="addSec()">+ Add Another Time Slot</a></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                <button class="Button" type="button">Tuesday </button>--}}
{{--                                                <div class="panel col-md-12">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="tuesday_start_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="tuesday_end_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="custom-control custom-checkbox mb-3">--}}
{{--                                                            <input type="checkbox" class="custom-control-input" id="checkTuesday">--}}
{{--                                                            <label class="custom-control-label" for="checkTuesday">Select if you want to active second slot</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="tuesday_start_2" name="tuesday_start_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="tuesday_end_2" name="tuesday_end_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        --}}{{--                                                        <div><a class="btn btn-sm btn-primary mb-3" style="color: #fff;" onclick="addSec()">+ Add Another Time Slot</a></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <button class="Button" type="button">Wednesday </button>--}}
{{--                                                <div class="panel col-md-12">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="wednesday_start_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="wednesday_end_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="custom-control custom-checkbox mb-3">--}}
{{--                                                            <input type="checkbox" class="custom-control-input" id="checkWednesday">--}}
{{--                                                            <label class="custom-control-label" for="checkWednesday">Select if you want to active second slot</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="wednesday_start_2" name="wednesday_start_2" autocomplete="off"is=""  disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="wednesday_end_2" name="wednesday_end_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            --}}{{--                                                        <div><a class="btn btn-sm btn-primary mb-3" style="color: #fff;" onclick="addSec()">+ Add Another Time Slot</a></div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}


{{--                                                </div>--}}
{{--                                                <button class="Button" type="button">Thursday </button>--}}
{{--                                                <div class="panel col-md-12">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="thursday_start_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="thursday_end_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="custom-control custom-checkbox mb-3">--}}
{{--                                                            <input type="checkbox" class="custom-control-input" id="checkThursday">--}}
{{--                                                            <label class="custom-control-label" for="checkThursday">Select if you want to active second slot</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="thursday_start_2" name="thursday_start_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="thursday_end_2" name="thursday_end_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        --}}{{--                                                        <div><a class="btn btn-sm btn-primary mb-3" style="color: #fff;" onclick="addSec()">+ Add Another Time Slot</a></div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <button class="Button" type="button">Friday </button>--}}
{{--                                                <div class="panel col-md-12">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="friday_start_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="friday_end_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="custom-control custom-checkbox mb-3">--}}
{{--                                                            <input type="checkbox" class="custom-control-input" id="checkFriday">--}}
{{--                                                            <label class="custom-control-label" for="checkFriday">Select if you want to active second slot</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="friday_start_2" name="friday_start_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="friday_end_2" name="friday_end_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <button class="Button" type="button">Saturday </button>--}}
{{--                                                <div class="panel col-md-12">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="saturday_start_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="saturday_end_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="custom-control custom-checkbox mb-3">--}}
{{--                                                            <input type="checkbox" class="custom-control-input" id="checkSaturday">--}}
{{--                                                            <label class="custom-control-label" for="checkSaturday">Select if you want to active second slot</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="saturday_start_2" name="saturday_start_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="saturday_end_2" name="saturday_end_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}

{{--                                                <button class="Button" id="Last" type="button">Sunday </button>--}}
{{--                                                <div class="panel col-md-12">--}}
{{--                                                    <div class="col-md-12">--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="sunday_start_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" name="sunday_end_1" autocomplete="off"> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="custom-control custom-checkbox mb-3">--}}
{{--                                                            <input type="checkbox" class="custom-control-input" id="checkSunday">--}}
{{--                                                            <label class="custom-control-label" for="checkSunday">Select if you want to active second slot</label>--}}
{{--                                                        </div>--}}
{{--                                                        <div class="row">--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>Start time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="sunday_start_2" name="sunday_start_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                            <div class="col-md-6">--}}
{{--                                                                <label>End time</label>--}}
{{--                                                                <div class="input-group clockpicker mb-3" data-placement="bottom" data-align="top" data-autoclose="true">--}}
{{--                                                                    <input type="text" class="form-control" id="sunday_end_2" name="sunday_end_2" autocomplete="off" disabled> <span class="input-group-append"><span class="input-group-text"><i--}}
{{--                                                                                class="fa fa-clock-o"></i></span></span>--}}
{{--                                                                </div>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}

{{--                                            <input type="hidden" name="petdoc_id" value="{{$doctor->id}}">--}}
{{--                                            <div class="p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">--}}
{{--                                                <button type="submit" id="btnsubmit" class="btn btn-primary mt-3">Save</button>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                </div>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>



@endsection

@section('scripts')
    <script src="{{URL('admin_assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL('admin_assets/js/plugins-init/datatables.init.js')}}"></script>
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
//default days disable
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


        //exception days disable
        $('#exceptMonday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#except_monday_start_2').prop("disabled", false);
                $('#except_monday_end_2').prop("disabled", false);
                $('#except_monday_start_2').prop("required", true);
                $('#except_monday_end_2').prop("required", true);
            } else {
                $('#except_monday_start_2').prop("required", false);
                $('#except_monday_end_2').prop("required", false);
                $('#except_monday_start_2').prop("disabled", true);
                $('#except_monday_end_2').prop("disabled", true);
            }
        });

        $('#exceptTuesday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#except_tuesday_start_2').prop("disabled", false);
                $('#except_tuesday_end_2').prop("disabled", false);
                $('#except_tuesday_start_2').prop("required", true);
                $('#except_tuesday_end_2').prop("required", true);
            } else {
                $('#except_tuesday_start_2').prop("required", false);
                $('#except_tuesday_end_2').prop("required", false);
                $('#except_tuesday_start_2').prop("disabled", true);
                $('#except_tuesday_end_2').prop("disabled", true);
            }
        });

        $('#exceptWednesday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#except_wednesday_start_2').prop("disabled", false);
                $('#except_wednesday_end_2').prop("disabled", false);
            } else {
                $('#except_wednesday_start_2').prop("disabled", true);
                $('#except_wednesday_end_2').prop("disabled", true);
            }
        });

        $('#exceptThursday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#except_thursday_start_2').prop("disabled", false);
                $('#except_thursday_end_2').prop("disabled", false);
            } else {
                $('#except_thursday_start_2').prop("disabled", true);
                $('#except_thursday_end_2').prop("disabled", true);
            }
        });

        $('#exceptFriday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#except_friday_start_2').prop("disabled", false);
                $('#except_friday_end_2').prop("disabled", false);
            } else {
                $('#except_friday_start_2').prop("disabled", true);
                $('#except_friday_end_2').prop("disabled", true);
            }
        });

        $('#exceptSaturday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#except_saturday_start_2').prop("disabled", false);
                $('#except_saturday_end_2').prop("disabled", false);
            } else {
                $('#except_saturday_start_2').prop("disabled", true);
                $('#except_saturday_end_2').prop("disabled", true);
            }
        });

        $('#exceptSunday').change(function() {
            // this will contain a reference to the checkbox
            if (this.checked) {
                $('#except_sunday_start_2').prop("disabled", false);
                $('#except_sunday_end_2').prop("disabled", false);
            } else {
                $('#except_sunday_start_2').prop("disabled", true);
                $('#except_sunday_end_2').prop("disabled", true);
            }
        });

        //image upload
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });


        $('#HospitalAddForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{url('/account/admin/hospital/doctor/update')}}",
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

        $('#default_form').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{url('/account/admin/hospital/doctor/schedule/save')}}",
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
        });

        $('#exception_form').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{url('/account/admin/hospital/doctor/exception_schedule/save')}}",
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
        });


    </script>

@endsection
