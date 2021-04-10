@extends('account.layouts.master')

@section('styles')
<link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/css/samples.css') }}">
<link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/toolbarconfigurator/lib/codemirror/neo.css') }}">
<link href="{{URL('admin_assets/vendor/clockpicker/css/bootstrap-clockpicker.min.css')}}" rel="stylesheet">
<link href="{{URL('admin_assets/vendor/jquery-asColorPicker/css/asColorPicker.min.css')}}" rel="stylesheet">
<link href="{{URL('admin_assets/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}"
      rel="stylesheet">
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

    .preview-div {
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

    #First {
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
    }

    #Last {
        border-bottom-left-radius: 5px;
        border-bottom-right-radius: 5px;
    }

    #error {
        color: red;
    }
    #errorReg {
        color: red;
    }
    #errorB {
        color: red;
    }
    #errorBr {
        color: red;
    }
    #errorAccount {
        color: red;
    }

    .bank {
        border: grey solid;
        padding: 3rem;
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
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" id="about" name="about"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Registration No</label>
                            <input type="text" class="form-control" id="reg_no" name="reg_no" onchange="validateFormReg()" required>
                            <div id="errorReg"></div>
                        </div>
                        <div class="form-group">
                            <label>Phone No</label>
                            <input type="text" class="form-control" id="phone" name="phone" onchange="validateForm()"
                                   required>
                            <div id="error"></div>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>
                        <div class="form-group">
                            <label>Skill</label>
                            <input type="text" class="form-control" id="spec" name="spec">
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select class="form-control" id="gender" name="gender">
                                <option value="male" selected>Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>
                        <!--
                        <div class="form-group">
                            <label>House Visit Rate</label>
                            <input type="text" class="form-control" id="visit_rate" name="visit_rate">
                        </div>
                        -->
                        <div class="form-group">
                            <label>Rate</label>
                            <input type="text" class="form-control" id="rate" name="rate">
                        </div>
<!--
                        <div class="form-group">
                            <label>Treatment Method</label>
                            <br>

                            <label for="mobile">Home Vist</label>
                            <input type="checkbox" name="treatment_method" id="mobile" value="1" class="mr-5" >

                            <label for="house">In House</label>
                            <input type="checkbox" name="treatment_method" id="house" value="2">


                        </div>
-->
                        <label>Bank Details</label>
                        <div class="bank">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank</label>
                                        <input type="text" class="form-control" id="bank" name="bank" required onchange="validateFormB()">
                                        <div id="errorB"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <input type="text" class="form-control" id="branch" name="branch" required onchange="validateFormBr()">
                                        <div id="errorBr"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Name</label>
                                        <input type="text" class="form-control" id="account_name" name="account_name" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank Account No</label>
                                        <input type="text" class="form-control" id="bank_acc_no" name="bank_acc_no" required onchange="validateFormAccount()">
                                        <div id="errorAccount"></div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <input type="hidden" value="{{$lastdoctor_id}}" id="lastDoc">

                        <div
                            class="p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                            <!-- scheduling() is removed for new req ..when mobile visit back in req add scheduling() to onclick-->
                            <button type="submit" id="btnsubmit" onclick="ableUpdate()"
                                    class="btn btn-primary mt-3">Save
                            </button>
                        </div>


                    </div>


                </div>
            </div>


          {{--  <div class="row">
                <div class="col-12">
                    <div class="card" id="scheduleCard">
                        <div class="card-header">
                            <h4 class="card-title">Home Visit Schedule</h4>
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
                                                            <a class="nav-link active" id="monday-tab" data-toggle="tab"
                                                               href="#monday" role="tab" aria-controls="home"
                                                               aria-expanded="true">Monday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="tuesday-tab" data-toggle="tab"
                                                               href="#tuesday" role="tab" aria-controls="province">Tuesday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="wednesday-tab" data-toggle="tab"
                                                               href="#wednesday" role="tab" aria-controls="city">Wednesday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="thursday-tab" data-toggle="tab"
                                                               href="#thursday" role="tab"
                                                               aria-controls="city">Thursday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="friday-tab" data-toggle="tab"
                                                               href="#friday" role="tab" aria-controls="city">Friday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="saturday-tab" data-toggle="tab"
                                                               href="#saturday" role="tab"
                                                               aria-controls="city">Saturday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="sunday-tab" data-toggle="tab"
                                                               href="#sunday" role="tab" aria-controls="city">Sunday</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content text-muted" id="myTabContent">
                                                        <div role="tabpanel" class="tab-pane fade in active show"
                                                             id="monday" aria-labelledby="monday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_monday"
                                                                                                name="start_monday">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_monday"
                                                                                                name="end_monday">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddSchedule(1); mondayAddClick(); filter()">
                                                                                            + Add
                                                                                        </button>


                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="monday">
                                                                                <table id="datatable1"
                                                                                       class="table table-bordered dt-responsive nowrap mondayTable">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>Id</th>
                                                                                        <th>Date</th>
                                                                                        <th>Start time</th>
                                                                                        <th>End Time</th>
                                                                                    </tr>
                                                                                    </thead>


                                                                                    <tbody>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane fade" id="tuesday" role="tabpane2"
                                                             aria-labelledby="tuesday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_tuesday">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_tuesday">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddSchedule(2); tuesdayAddClick(); filter2()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable2"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="wednesday" role="tabpane3"
                                                             aria-labelledby="wednesday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_wednesday">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_wednesday">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddSchedule(3); wednesdayAddClick(); filter3()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable3"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="thursday" role="tabpane3"
                                                             aria-labelledby="thursday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_thursday">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_thursday">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddSchedule(4); thursdayAddClick(); filter4()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable4"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>
                                                                                @foreach($thursdays as $thursday)
                                                                                <tr>
                                                                                    <td>{{$thursday->id}}</td>
                                                                                    <td>{{$thursday->date}}</td>
                                                                                    <td>{{$thursday->time_from}}</td>
                                                                                    <td>{{$thursday->time_to}}</td>
                                                                                </tr>
                                                                                @endforeach

                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="friday" role="tabpane3"
                                                             aria-labelledby="friday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_friday">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_friday">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddSchedule(5) ; fridayAddClick(); filter5()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable5"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="saturday" role="tabpane3"
                                                             aria-labelledby="saturday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_saturday">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_saturday">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddSchedule(6); satAddClick(); filter6()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable6"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>
                                                                                @foreach($saturdays as $saturday)
                                                                                <tr>
                                                                                    <td>{{$saturday->id}}</td>
                                                                                    <td>{{$saturday->date}}</td>
                                                                                    <td>{{$saturday->time_from}}</td>
                                                                                    <td>{{$saturday->time_to}}</td>
                                                                                </tr>
                                                                                @endforeach

                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="sunday" role="tabpane3"
                                                             aria-labelledby="sunday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_sunday">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_sunday">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddSchedule(7); sunAddClick(); filter7()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable7"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>
                                                                                @foreach($sundays as $sunday)
                                                                                <tr>
                                                                                    <td>{{$sunday->id}}</td>
                                                                                    <td>{{$sunday->date}}</td>
                                                                                    <td>{{$sunday->time_from}}</td>
                                                                                    <td>{{$sunday->time_to}}</td>
                                                                                </tr>
                                                                                @endforeach

                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->

                                                            </div>
                                                        </div>


                                                    </div>
                                                    <a href="{{URL('/account/hospital/doctors')}}" class="btn btn-primary pull-right"  >Update
                                                        Doctor
                                                        Schedule
                                                    </a>
                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div> --}}



            <div class="row">
                <div class="col-12">
                    <div class="card" id="scheduleCardH">
                        <div class="card-header">
                            <h4 class="card-title">In House Schedule</h4>
                        </div>
                        <div class="card-body">
                            <form id="sheduleForm">
                                <div class="row page-titles mx-0">
                                    <div class="tab-content col-md-12">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-box">

                                                    <ul class="nav nav-tabs" id="myTabH" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active " id="monday-tabH" data-toggle="tab"
                                                               href="#mondayH" role="tab" aria-controls="home"
                                                               aria-expanded="true">Monday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link " id="tuesday-tabH" data-toggle="tab"
                                                               href="#tuesdayH" role="tab" aria-controls="province">Tuesday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="wednesday-tabH" data-toggle="tab"
                                                               href="#wednesdayH" role="tab" aria-controls="city">Wednesday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="thursday-tabH" data-toggle="tab"
                                                               href="#thursdayH" role="tab"
                                                               aria-controls="city">Thursday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="friday-tabH" data-toggle="tab"
                                                               href="#fridayH" role="tab" aria-controls="city">Friday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="saturday-tabH" data-toggle="tab"
                                                               href="#saturdayH" role="tab"
                                                               aria-controls="city">Saturday</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="sunday-tabH" data-toggle="tab"
                                                               href="#sundayH" role="tab" aria-controls="city">Sunday</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content text-muted" id="myTabContent">
                                                        <div role="tabpanel" class="tab-pane fade in active show"
                                                             id="mondayH" aria-labelledby="monday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_mondayH"
                                                                                                name="start_mondayH">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach

                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_mondayH"
                                                                                                name="end_mondayH">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddScheduleHouse(1); mondayAddClickH(); filterH();">
                                                                                            + Add
                                                                                        </button>


                                                                                    </div>

                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="monday">
                                                                                <table id="datatable1H"
                                                                                       class="table table-bordered dt-responsive nowrap mondayTable">
                                                                                    <thead>
                                                                                    <tr>
                                                                                        <th>Id</th>
                                                                                        <th>Date</th>
                                                                                        <th>Start time</th>
                                                                                        <th>End Time</th>
                                                                                    </tr>
                                                                                    </thead>


                                                                                    <tbody>

                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>

                                                        </div>
                                                        <div class="tab-pane  fade" id="tuesdayH" role="tabpane2"
                                                             aria-labelledby="tuesday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_tuesdayH">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_tuesdayH">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddScheduleHouse(2); tuesdayAddClickH(); filter2H()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable2H"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="wednesdayH" role="tabpane3"
                                                             aria-labelledby="wednesday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_wednesdayH">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_wednesdayH">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddScheduleHouse(3); wednesdayAddClickH(); filter3H()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable3H"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="thursdayH" role="tabpane3"
                                                             aria-labelledby="thursday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_thursdayH">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_thursdayH">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddScheduleHouse(4); thursdayAddClickH(); filter4H()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable4H"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>
                                                                                @foreach($thursdays as $thursday)
                                                                                <tr>
                                                                                    <td>{{$thursday->id}}</td>
                                                                                    <td>{{$thursday->date}}</td>
                                                                                    <td>{{$thursday->time_from}}</td>
                                                                                    <td>{{$thursday->time_to}}</td>
                                                                                </tr>
                                                                                @endforeach

                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="fridayH" role="tabpane3"
                                                             aria-labelledby="friday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_fridayH">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_fridayH">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddScheduleHouse(5) ; fridayAddClickH(); filter5H()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable5H"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>


                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="saturdayH" role="tabpane3"
                                                             aria-labelledby="saturday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_saturdayH">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_saturdayH">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddScheduleHouse(6); satAddClickH(); filter6H()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable6H"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>
                                                                                @foreach($saturdays as $saturday)
                                                                                <tr>
                                                                                    <td>{{$saturday->id}}</td>
                                                                                    <td>{{$saturday->date}}</td>
                                                                                    <td>{{$saturday->time_from}}</td>
                                                                                    <td>{{$saturday->time_to}}</td>
                                                                                </tr>
                                                                                @endforeach

                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade" id="sundayH" role="tabpane3"
                                                             aria-labelledby="sunday-tab">
                                                            <div class="province-table my-2">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="card-header"
                                                                             style="border-bottom:0;">
                                                                            <div class="col-md-12">
                                                                                <div class="row">
                                                                                    <div class="col-sm-3">
                                                                                        <select id="start_sundayH">
                                                                                            @foreach($slots1 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-3">
                                                                                        <select id="end_sundayH">
                                                                                            @foreach($slots2 as $s)
                                                                                            <option value="{{$s}}">
                                                                                                {{$s}}
                                                                                            </option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6 d-flex ">
                                                                                        <button type="button"
                                                                                                class="btn btn-sm btn-success"
                                                                                                onclick="AddScheduleHouse(7); sunAddClickH(); filter7H()">
                                                                                            + Add
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                        <div class="card-body">
                                                                            <table id="datatable7H"
                                                                                   class="table table-bordered dt-responsive nowrap">
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Id</th>
                                                                                    <th>Date</th>
                                                                                    <th>Start time</th>
                                                                                    <th>End Time</th>
                                                                                </tr>
                                                                                </thead>
                                                                                @foreach($sundays as $sunday)
                                                                                <tr>
                                                                                    <td>{{$sunday->id}}</td>
                                                                                    <td>{{$sunday->date}}</td>
                                                                                    <td>{{$sunday->time_from}}</td>
                                                                                    <td>{{$sunday->time_to}}</td>
                                                                                </tr>
                                                                                @endforeach

                                                                                <tbody>

                                                                                </tbody>
                                                                            </table>

                                                                        </div>
                                                                    </div>
                                                                </div> <!-- end row -->

                                                            </div>
                                                        </div>


                                                    </div>
                                                    <a href="{{URL('/account/hospital/doctors')}}" class="btn btn-primary pull-right" id="updateBtn" onclick="exit1()">Update
                                                        Doctor
                                                        Schedule
                                                    </a>
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

<script
    src="{{URL('admin_assets/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>
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
    const updateBtn = document.querySelector('#updateBtn')

    $('document').ready(function() {
      //  document.getElementById("updateBtn").disabled=true;

       updateBtn.style.display = 'none'

    })






    function AddScheduleNew() {

        $.ajax({
            url: "{{url('/account/hospital/doctors/add/fetch')}}",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    $.confirm({
                        icon: 'fa fa-check',
                        theme: 'modern',
                        animation: 'left',
                        type: 'green',
                        title: 'Update!',
                        content: response.message,
                        buttons: {
                          ok: function () {
                        //    location.href = "{{URL('/account/hospital/doctors/add')}}";
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
                            ok: function () {
                               // location.reload();
                            }
                        }
                    });
                }
            }
        });
    }
    function exit1() {
        event.preventDefault();
        $.ajax({
            url: "{{url('/account/hospital/doctors/add/fetch')}}",
            method: "get",

            success: function (response) {
                if (response.success) {
                    $.confirm({
                        icon: 'fa fa-check',
                        theme: 'modern',
                        animation: 'left',
                        type: 'green',
                        title: 'Update!',
                        content: response.message,
                        buttons: {
                            ok: function () {
                                //    location.href = "{{URL('/account/hospital/doctors/add')}}";
                            }
                        }
                    });
                }

                if (!response.success) {
                    $.confirm({
                        icon: 'fa fa-check',
                        theme: 'modern',
                        animation: 'left',
                        type: 'green',
                        title: 'Update!',
                        content: response.message,
                        buttons: {
                            ok: function () {
                                    location.href = "{{URL('/account/hospital/doctors')}}";
                            }
                        }
                    });
                }
            }
        });


    }


    function AddSchedule(id) {
        var date = '';
        var start;
        var end;
        var lastDoc = document.getElementById('lastDoc').value
        var intDoc = parseInt(lastDoc)
        var doc_id = intDoc + 1;
        var type = 1

        if (id == 1) {
            date = 'monday';
            start = $('#start_monday').val();
            end = $('#end_monday').val();
        } else if (id == 2) {
            date = 'tuesday';
            start = $('#start_tuesday').val();
            end = $('#end_tuesday').val();
        } else if (id == 3) {
            date = 'wednesday';
            start = $('#start_wednesday').val();
            end = $('#end_wednesday').val();
        } else if (id == 4) {
            date = 'thursday';
            start = $('#start_thursday').val();
            end = $('#end_thursday').val();
        } else if (id == 5) {
            date = 'friday';
            start = $('#start_friday').val();
            end = $('#end_friday').val();
        } else if (id == 6) {
            date = 'saturday';
            start = $('#start_saturday').val();
            end = $('#end_saturday').val();
        } else if (id == 7) {
            date = 'sunday';
            start = $('#start_sunday').val();
            end = $('#end_sunday').val();
        }

        console.log(start);
        if (start < end) {
            $.ajax({
                url: "{{url('/account/hospital/doctor/add/schedule')}}",
                method: "POST",
                data: "date=" + date + "&start=" + start + "&end=" + end + "&doc_id=" + doc_id + "&type=" + type,
                success: function (response) {
               /*
                    if (response.success) {
                        $.confirm({
                            icon: 'fa fa-check',
                            theme: 'modern',
                            animation: 'right',
                            type: 'green',
                            title: 'Success!',
                            content: response.message,
                              buttons: {
                                 ok: function () {
                            //         location.reload();
                                 }
                               }
                        });
                    }
*/
                    if (!response.success) {
                        $.confirm({
                            icon: 'fa fa-exclamation-triangle',
                            theme: 'modern',
                            animation: 'right',
                            type: 'red',
                            title: 'Error!',
                            content: response.message,
                            buttons: {
                                ok: function () {

                                }
                            }
                        });
                    }
                }
            });
        } else {
            alert('Enter valid time slot');
            return false;
        }

    }

    function AddScheduleHouse(id) {
        var date = '';
        var start;
        var end;
        var lastDoc = document.getElementById('lastDoc').value
        var intDoc = parseInt(lastDoc)
        var doc_id = intDoc + 1;
        var type = 2

        if (id == 1) {
            date = 'monday';
            start = $('#start_mondayH').val();
            console.log('start monday '+start)

            end = $('#end_mondayH').val();
        } else if (id == 2) {
            date = 'tuesday';
            start = $('#start_tuesdayH').val();
            end = $('#end_tuesdayH').val();
            console.log('start T '+start)
        } else if (id == 3) {
            date = 'wednesday';
            start = $('#start_wednesdayH').val();
            end = $('#end_wednesdayH').val();
            console.log('start W '+start)
        } else if (id == 4) {
            date = 'thursday';
            start = $('#start_thursdayH').val();
            end = $('#end_thursdayH').val();
            console.log('start TH '+start)
        } else if (id == 5) {
            date = 'friday';
            start = $('#start_fridayH').val();
            end = $('#end_fridayH').val();
            console.log('start F '+start)
        } else if (id == 6) {
            date = 'saturday';
            start = $('#start_saturdayH').val();
            end = $('#end_saturdayH').val();
            console.log('start SA '+start)
        } else if (id == 7) {
            date = 'sunday';
            start = $('#start_sundayH').val();
            end = $('#end_sundayH').val();
            console.log('start SU '+start)
        }

        console.log(start);
        console.log(end);
        if (start < end) {
            $.ajax({
                url: "{{url('/account/hospital/doctor/add/schedule')}}",
                method: "POST",
                data: "date=" + date + "&start=" + start + "&end=" + end + "&doc_id=" + doc_id + "&type=" + type,
                success: function (response) {
               /*
                    if (response.success) {
                        $.confirm({
                            icon: 'fa fa-check',
                            theme: 'modern',
                            animation: 'right',
                            type: 'green',
                            title: 'Success!',
                            content: response.message,
                             buttons: {
                                 ok: function () {
                                     //location.reload();
                                  }
                                }
                        });
                    }
*/
                    if (!response.success) {
                        $.confirm({
                            icon: 'fa fa-exclamation-triangle',
                            theme: 'modern',
                            animation: 'right',
                            type: 'red',
                            title: 'Error!',
                            content: response.message,
                            buttons: {
                                ok: function () {

                                }
                            }
                        });
                    }
                }
            });
        } else {
            alert('Enter valid time slot');
            return false;
        }

    }
    //accordian collapse
    var acc = document.getElementsByClassName("Button");
    var i;



    for (i = 0; i < acc.length; i++) {

        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            console.log('hiii')
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

    $('#checkMonday').change(function () {
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

    $('#checkTuesday').change(function () {
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

    $('#checkWednesday').change(function () {
        // this will contain a reference to the checkbox
        if (this.checked) {
            $('#wednesday_start_2').prop("disabled", false);
            $('#wednesday_end_2').prop("disabled", false);
        } else {
            $('#wednesday_start_2').prop("disabled", false);
            $('#wednesday_end_2').prop("disabled", false);
        }
    });

    $('#checkThursday').change(function () {
        // this will contain a reference to the checkbox
        if (this.checked) {
            $('#thursday_start_2').prop("disabled", false);
            $('#thursday_end_2').prop("disabled", false);
        } else {
            $('#thursday_start_2').prop("disabled", false);
            $('#thursday_end_2').prop("disabled", false);
        }
    });

    $('#checkFriday').change(function () {
        // this will contain a reference to the checkbox
        if (this.checked) {
            $('#friday_start_2').prop("disabled", false);
            $('#friday_end_2').prop("disabled", false);
        } else {
            $('#friday_start_2').prop("disabled", false);
            $('#friday_end_2').prop("disabled", false);
        }
    });

    $('#checkSaturday').change(function () {
        // this will contain a reference to the checkbox
        if (this.checked) {
            $('#saturday_start_2').prop("disabled", false);
            $('#saturday_end_2').prop("disabled", false);
        } else {
            $('#saturday_start_2').prop("disabled", false);
            $('#saturday_end_2').prop("disabled", false);
        }
    });

    $('#checkSunday').change(function () {
        // this will contain a reference to the checkbox
        if (this.checked) {
            $('#sunday_start_2').prop("disabled", false);
            $('#sunday_end_2').prop("disabled", false);
        } else {
            $('#sunday_start_2').prop("disabled", false);
            $('#sunday_end_2').prop("disabled", false);
        }
    });


    $('#addDoctorForm').on('submit', function (event) {
        event.preventDefault();


        $.ajax({
            url: "{{url('/account/hospital/doctors/save')}}",
            method: "POST",
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.success) {
                    $.confirm({
                        icon: 'fa fa-check',
                        theme: 'modern',
                        animation: 'left',
                        type: 'green',
                        title: 'Update!',
                        content: response.message,
                        buttons: {
                         ok: function () {
                        //    location.href = "{{URL('/account/hospital/doctors/add')}}";
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
                            ok: function () {
                                //location.reload();
                            }
                        }
                    });
                }
            }
        });
    });

/*
    $('#branch').change(function () {
        var form_data = new FormData(document.querySelector("#addDoctorForm"));
        var c1 = document.querySelector('#mobile');
        var c2 = document.querySelector('#house');
        if (c1.checked == true && c2.checked == true) {
            console.log('hi')
            document.getElementById('house').value = 3
        } else {
            console.log('no')
        }
    });
*/
    let error = document.getElementById('error')
    let errorReg = document.getElementById('errorReg')
    let errorB = document.getElementById('errorB')
    let errorBr = document.getElementById('errorBr')
    let errorAccount = document.getElementById('errorAccount')

    let errorCount = 5
    function validateForm() {
        let messages = []

        const phone = document.getElementById('phone')
        var validNo = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;



        if (!phone.value.match(validNo)) {
            messages.push('Please enter valid phone number')
            errorCount++
        }
        else{
            errorCount--
        }




        if (messages.length > 0) {
            error.textContent = messages.join(', ')
        }
        else{
            error.textContent =''
        }
    }
    function validateFormReg() {
        let messages = []



        const regNo = document.querySelector('#reg_no')
        var validReg = /^[0-9]*$/


        if (!regNo.value.match(validReg)) {
            messages.push('Please enter correct Registration number')

        }
        else{
            errorCount--

        }

        if (messages.length > 0) {
            errorReg.textContent = messages.join(', ')
        }
        else{
            errorReg.textContent = ''
        }
    }
    function validateFormB() {
        let messages = []



        const bank = document.querySelector('#bank')
        var validBank = /^$|\s*/


        if (!bank.value.match(validBank)) {
            messages.push('Please enter  bank name')
        }
        else{
            errorCount--

        }

        if (messages.length > 0) {
            errorB.textContent = messages.join(', ')
        }
        else{
            errorB.textContent = ''
        }
    }
    function validateFormBr() {
        let messages = []



        const branch = document.querySelector('#branch')
        var validBranch = /^$|\s*/


        if (!branch.value.match(validBranch)) {
            messages.push('Please enter  Branch name')
        }
        else{
            errorCount--

        }

        if (messages.length > 0) {
            errorBr.textContent = messages.join(', ')
        }
        else{
            errorBr.textContent = ''
        }
    }
    function validateFormAccount() {
        let messages = []



        const account = document.querySelector('#bank_acc_no')
        var validAccount = /^[0-9]*$/


        if (!account.value.match(validAccount)) {
            messages.push('Please enter  valid Account Number')
        }
        else{
            errorCount--

        }

        if (messages.length > 0) {
            errorAccount.textContent = messages.join(', ')
        }
        else{
            errorAccount.textContent = ''
        }
    }


    //getting doc id
    let docId = document.querySelector('#lastDoc')
    let docIdString = docId.value
    let intDocId = parseInt(docIdString)
    let newDocId = intDocId + 1

    let saveBtn = document.querySelector('#btnsubmit')
    let scheduleCard = document.querySelector('#scheduleCard')
    let branch = document.querySelector('#branch')

    /////let newAdd = document.querySelector('#newAdd')
    let mondayTab = document.querySelector('#monday')
    let mondayStart = document.querySelector('#start_monday')
    let mondayEnd = document.querySelector('#end_monday')
    let mondayStartH = document.querySelector('#start_mondayH')
    let mondayEndH = document.querySelector('#end_mondayH')
    //////let mondayId = document.querySelector('#monday_id')
    let tableMonday = document.querySelector('#datatable1')
    let tableMondayH = document.querySelector('#datatable1H')
    //tuesday tab
    let tuesdayTab = document.querySelector('#tuesday')
    let table2 = document.querySelector('#datatable2')
    let table2H = document.querySelector('#datatable2H')
    let tuesdayStart = document.querySelector('#start_tuesday')
    let tuesdayEnd = document.querySelector('#end_tuesday')
    let tuesdayStartH = document.querySelector('#start_tuesdayH')
    let tuesdayEndH = document.querySelector('#end_tuesdayH')

    //wed tab
    let WedTab = document.querySelector('#wednesday')
    let table3 = document.querySelector('#datatable3')
    let table3H = document.querySelector('#datatable3H')
    let wedStart = document.querySelector('#start_wednesday')
    let wedEnd = document.querySelector('#end_wednesday')
    let wedStartH    = document.querySelector('#start_wednesdayH')
    let wedEndH = document.querySelector('#end_wednesdayH')
    //thur tab
    let thurTab = document.querySelector('#thursday')
    let table4 = document.querySelector('#datatable4')
    let table4H = document.querySelector('#datatable4H')
    let thurStart = document.querySelector('#start_thursday')
    let thurEnd = document.querySelector('#end_thursday')
    let thurStartH = document.querySelector('#start_thursdayH')
    let thurEndH = document.querySelector('#end_thursdayH')

    //friday tab
    let fridayTab = document.querySelector('#friday')
    let table5 = document.querySelector('#datatable5')
    let table5H = document.querySelector('#datatable5H')
    let fStart = document.querySelector('#start_friday')
    let fEnd = document.querySelector('#end_friday')
    let fStartH = document.querySelector('#start_fridayH')
    let fEndH = document.querySelector('#end_fridayH')

    //sat tab
    let satTab = document.querySelector('#saturday')
    let table6 = document.querySelector('#datatable6')
    let table6H = document.querySelector('#datatable6H')
    let sStart = document.querySelector('#start_saturday')
    let sEnd = document.querySelector('#end_saturday')
    let sStartH = document.querySelector('#start_saturdayH')
    let sEndH = document.querySelector('#end_saturdayH')
    //sun tab
    let sunTab = document.querySelector('#sunday')
    let table7 = document.querySelector('#datatable7')
    let table7H = document.querySelector('#datatable7H')
    let sunStart = document.querySelector('#start_sunday')
    let sunEnd = document.querySelector('#end_sunday')
    let sunStartH = document.querySelector('#start_sundayH')
    let sunEndH = document.querySelector('#end_sundayH')

  //  scheduleCard.style.display = 'none'
    scheduleCardH.style.display = 'block'

    function scheduling() {

        let mobileTreat = document.querySelector('#mobile')
        let houseTreat = document.querySelector('#house')
let houseCard = document.querySelector('#scheduleCardH')
        let mobileCard = document.querySelector('#scheduleCard')
       if(mobileTreat.checked){

           scheduleCard.style.display = 'block'
           scheduleCardH.style.display = 'none'
       }
        if(houseTreat.checked){

            scheduleCardH.style.display = 'block'
            scheduleCard.style.display = 'none'
        }
        if(houseTreat.checked && mobileTreat.checked){
            scheduleCard.style.display = 'block'
            scheduleCardH.style.display = 'block'
        }

        if(errorCount > 0){
            alert('Please fill the form with valid values')

        }
       if(errorCount == 0) {

        }


        //saveBtn.style.display = 'none'

    }

    function mondayAddClick() {

        let t1 = mondayStart.value
        let t2 = mondayEnd.value
        let t1int = parseInt(mondayStart.value)
        let t2int = parseInt(mondayEnd.value)

        if (t1 === t2 || t1int > t2int) {

            alert(' Please enter valid time slot ')
        } else {
            let row = tableMonday.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'monday'
            cel3.textContent = mondayStart.value
            cel4.textContent = mondayEnd.value
        }

    }

    function mondayAddClickH() {

        let t1 = mondayStartH.value
        let t2 = mondayEndH.value
        let t1int = parseInt(mondayStartH.value)
        let t2int = parseInt(mondayEndH.value)

        if (t1 === t2 || t1int > t2int) {

            alert(' Please enter valid time slot ')
        }



   else {
            let row = tableMondayH.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'monday'
            cel3.textContent = mondayStartH.value
            cel4.textContent = mondayEndH.value
        }

    }

    function tuesdayAddClick() {

        let t1 = tuesdayStart.value
        let t2 = tuesdayEnd.value
        let t1int = parseInt(tuesdayStart.value)
        let t2int = parseInt(tuesdayEnd.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table2.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'tuesday'
            cel3.textContent = tuesdayStart.value
            cel4.textContent = tuesdayEnd.value
        }
    }
    function tuesdayAddClickH() {

        let t1 = tuesdayStartH.value
        let t2 = tuesdayEndH.value
        let t1int = parseInt(tuesdayStartH.value)
        let t2int = parseInt(tuesdayEndH.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table2H.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'tuesday'
            cel3.textContent = tuesdayStartH.value
            cel4.textContent = tuesdayEndH.value
        }
    }

    function wednesdayAddClick() {

        let t1 = wedStart.value
        let t2 = wedEnd.value
        let t1int = parseInt(wedStart.value)
        let t2int = parseInt(wedEnd.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table3.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'wednesday'
            cel3.textContent = wedStart.value
            cel4.textContent = wedEnd.value
        }
    }
    function wednesdayAddClickH() {

        let t1 = wedStartH.value
        let t2 = wedEndH.value
        let t1int = parseInt(wedStartH.value)
        let t2int = parseInt(wedEndH.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table3H.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'wednesday'
            cel3.textContent = wedStartH.value
            cel4.textContent = wedEndH.value
        }
    }

    function thursdayAddClick() {

        let t1 = thurStart.value
        let t2 = thurEnd.value
        let t1int = parseInt(thurStart.value)
        let t2int = parseInt(thurEnd.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table4.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'thursday'
            cel3.textContent = thurStart.value
            cel4.textContent = thurEnd.value
        }
    }

    function thursdayAddClickH() {

        let t1 = thurStartH.value
        let t2 = thurEndH.value
        let t1int = parseInt(thurStartH.value)
        let t2int = parseInt(thurEndH.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table4H.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'thursday'
            cel3.textContent = thurStartH.value
            cel4.textContent = thurEndH.value
        }
    }

    function fridayAddClick() {

        let t1 = fStart.value
        let t2 = fEnd.value
        let t1int = parseInt(fStart.value)
        let t2int = parseInt(fEnd.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table5.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'friday'
            cel3.textContent = fStart.value
            cel4.textContent = fEnd.value
        }
    }

    function fridayAddClickH() {

        let t1 = fStartH.value
        let t2 = fEndH.value
        let t1int = parseInt(fStartH.value)
        let t2int = parseInt(fEndH.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table5H.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'friday'
            cel3.textContent = fStartH.value
            cel4.textContent = fEndH.value
        }
    }
    function satAddClick() {

        let t1 = sStart.value
        let t2 = sEnd.value
        let t1int = parseInt(sStart.value)
        let t2int = parseInt(sEnd.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table6.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'saturday'
            cel3.textContent = sStart.value
            cel4.textContent = sEnd.value
        }
    }
    function satAddClickH() {

        let t1 = sStartH.value
        let t2 = sEndH.value
        let t1int = parseInt(sStartH.value)
        let t2int = parseInt(sEndH.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table6H.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'saturday'
            cel3.textContent = sStartH.value
            cel4.textContent = sEndH.value
        }
    }

    function sunAddClick() {

        let t1 = sunStart.value
        let t2 = sunEnd.value
        let t1int = parseInt(sunStart.value)
        let t2int = parseInt(sunEnd.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table7.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'sunday'
            cel3.textContent = sunStart.value
            cel4.textContent = sunEnd.value
        }
    }
    function sunAddClickH() {

        let t1 = sunStartH.value
        let t2 = sunEndH.value
        let t1int = parseInt(sunStartH.value)
        let t2int = parseInt(sunEndH.value)

        if (t1 === t2 || t1int > t2int) {
            alert('Please enter valid time slot')
        } else {
            let row = table7H.insertRow(-1)
            let cel1 = row.insertCell(0);
            let cel2 = row.insertCell(1);
            let cel3 = row.insertCell(2);
            let cel4 = row.insertCell(3);
            cel1.textContent = newDocId
            cel2.textContent = 'sunday'
            cel3.textContent = sunStartH.value
            cel4.textContent = sunEndH.value
        }
    }
    function goBack() {

    }

    $('#btnRearrange').bind("click", function () {
        var contents = {}, text;
        $("#datatable1 td").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    });

    function filter() {
        var contents = {}, text;
        $("#datatable1 td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function filterH() {
        var contents = {}, text;
        $("#datatable1H td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function newfilterH() {
        var contents = {}, text2;
        $("#datatable1H td:nth-child(4)").each(function () {

            text2 = $(this).text();
            console.log("text2 "+text2)
            $("#datatable1H td:nth-child(3)").each(function () {
                text1 = $(this).text();
                text1Part1 = text1.substr(0,2)
                text1Part2 = text1.substr(4,6)
                console.log("text1 "+text1)
                console.log("text1 part1 "+text1Part1)
                console.log("text1 part2 "+text1Part2)
                console.log("text2 in block"+text2)
                let t1 = parseInt(text1)
                let t2 = parseInt(text2)
                text2Part1 = text2.substr(0,2)
                text2Part2 = text2.substr(3,5)
                console.log("text2 "+text2)
                console.log("text2 part1 "+text2Part1)
                console.log("text2 part2 "+text2Part2)
                console.log("text2 in block"+text2)
                console.log("text1 in int"+t1)
                console.log("text2 in int"+t2)

            })

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function filter2() {
        var contents = {}, text;
        $("#datatable2 td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function filter2H() {
        var contents = {}, text;
        $("#datatable2H td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }

    function filter3() {
        var contents = {}, text;
        $("#datatable3 td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function filter3H() {
        var contents = {}, text;
        $("#datatable3H td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }

    function filter4() {
        var contents = {}, text;
        $("#datatable4 td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function filter4H() {
        var contents = {}, text;
        $("#datatable4H td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }

    function filter5() {
        var contents = {}, text;
        $("#datatable5 td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }

    function filter5H() {
        var contents = {}, text;
        $("#datatable5H td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function filter6() {
        var contents = {}, text;
        $("#datatable6 td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function filter6H() {
        var contents = {}, text;
        $("#datatable6H td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }

    function filter7() {
        var contents = {}, text;
        $("#datatable7 td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
    function filter7H() {
        var contents = {}, text;
        $("#datatable7H td:nth-child(3)").each(function () {

            text = $(this).text();

            if (!(text in contents)) {
                contents[text] = true;
            } else {
                $(this.parentNode).remove();
            }

        });
    }
   // const saveBtn = document.querySelector('#btnsubmit')
  //  const updateBtn = document.querySelector('#updateBtn')


    function ableUpdate(){

        updateBtn.style.display = 'block'
    }


</script>

@endsection
