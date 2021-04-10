@extends('account.layouts.master')

@section('styles')

<link href="{{URL('admin_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL('admin_assets/vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">
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
        <form id="HospitalAddForm">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="row page-titles mx-0">
                                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="container">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" class="upload-img"
                                                               name="image" accept=".png, .jpg, .jpeg, .svg"/>
                                                        <label for="imageUpload" class="upload-label"></label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" class="preview-div"
                                                             style="background-image: url('{{asset('storage/avatars/hospital_doctors/')}}/{{$doctor->image}}')">
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
                                                        <input type="text" class="form-control" id="petdoc_id"
                                                               name="petdoc_id" value="{{$doctor->id}}">
                                                    </div>
                                                </fieldset>
                                                <input type="hidden" name="petdoc_id" value="{{$doctor->id}}">
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control" id="name" name="name"
                                                           value="{{$doctor->display_name}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Registration No</label>
                                                <input type="text" class="form-control" id="reg_no" name="reg_no"
                                                       value="{{$doctor->registration_no}}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" id="address" name="address"
                                                       value="{{$doctor->address}}">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 form-group">
                                                <label>Phone</label>
                                                <input type="number" class="form-control" id="phone" name="phone" required onchange="validateForm()"
                                                       value="{{$doctor->phone}}">
                                            </div>
                                            <div id="error"></div>

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
                                                <input type="text" class="form-control" id="rate" name="rate"
                                                       value="{{$doctor->rate}}">
                                            </div>
                                            <div class="col-md-6 form-group">
                                                <label>Skill</label>
                                                <input type="text" class="form-control" id="skill" name="specialization"
                                                       value="{{$doctor->specialization}}">
                                            </div>
<!--
                                            <div class="col-md-6 form-group">
                                                <label>House Visit Rate</label>
                                                <input type="text" class="form-control" id="rate" name="visit_rate"
                                                       value="{{$doctor->visit_rate}}">
                                            </div>
                                        </div>

--><!--
                                        <div class="row">
                                            <input type="hidden" id="type" value="{{$type}}">
                                            <div class="col-md-6 form-group">
                                                <label>Treatment Method</label>


                                                <br>
                                                <br>
                                                <label>

                                                    <div id="checkboxes">
                                                        <input type="checkbox" id="mobile" name="treatment_method"
                                                               value="1" onchange="scheduling()">House Visit
                                                </label>


                                                <label>
                                                    <input type="checkbox" id="house" name="treatment_method" value='2' onchange="scheduling()">In House
                                                </label>
                                            </div>
                                        </div>
      -->
                                    </div>

                                    <label>Bank Details</label>
                                    <div class="bank">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bank</label>
                                                    <input type="text" class="form-control" id="bank" name="bank" value="{{$doctor->bank}}"required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Branch</label>
                                                    <input type="text" class="form-control" id="branch" name="branch" value="{{$doctor->branch}}" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Account Name</label>
                                                    <input type="text" class="form-control" id="bank_acc_no" name="account_name" value="{{$doctor->account_name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Bank Account No</label>
                                                    <input type="text" class="form-control" id="bank_acc_no" name="bank_acc_no" value="{{$doctor->bank_account}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <input type="hidden" name="doctor_id" value="{{$doctor->id}}">

                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>


    <!-- row -->
    <input type="hidden" id="doc_id" value="{{$doctor->id  ?? ''}}">

 {{--   <div class="row">
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
                                                                        <table id="datatable1" class="table table-bordered dt-responsive nowrap">
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
                                                                    <table id="datatable2" class="table table-bordered dt-responsive nowrap">
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
                                                        </div> <!-- end row-->
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
                                                                    <table id="datatable3" class="table table-bordered dt-responsive nowrap">
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
                                                                    <table id="datatable4" class="table table-bordered dt-responsive nowrap">
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
                                                                    <table id="datatable5" class="table table-bordered dt-responsive nowrap">
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
                                                                    <table id="datatable6" class="table table-bordered dt-responsive nowrap">
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
                                                                    <table id="datatable7" class="table table-bordered dt-responsive nowrap">
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
                                                <div class="p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                                                    <button type="submit" class="btn btn-primary mt-3">Update</button>
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

                                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="monday-tab" data-toggle="tab" href="#mondayH" role="tab" aria-controls="home" aria-expanded="true">Monday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="tuesday-tab" data-toggle="tab" href="#tuesdayH" role="tab" aria-controls="province">Tuesday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="wednesday-tab" data-toggle="tab" href="#wednesdayH" role="tab" aria-controls="city">Wednesday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="thursday-tab" data-toggle="tab" href="#thursdayH" role="tab" aria-controls="city">Thursday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="friday-tab" data-toggle="tab" href="#fridayH" role="tab" aria-controls="city">Friday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="saturday-tab" data-toggle="tab" href="#saturdayH" role="tab" aria-controls="city">Saturday</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="sunday-tab" data-toggle="tab" href="#sundayH" role="tab" aria-controls="city">Sunday</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content text-muted" id="myTabContent">
                                                <div role="tabpanel" class="tab-pane fade in active show" id="mondayH" aria-labelledby="monday-tab">
                                                    <div class="province-table my-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card-header" style="border-bottom:0;">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <select id="start_mondayH" name="start_mondayH">
                                                                                    @foreach($slots1 as $s)
                                                                                    <option value="{{$s}}">{{$s}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select id="end_mondayH" name="end_mondayH">
                                                                                    @foreach($slots2 as $s)
                                                                                    <option value="{{$s}}">{{$s}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-6 d-flex ">
                                                                                <button type="button" class="btn btn-sm btn-success" onclick="AddScheduleHouse(1)">+ Add</button>
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
                                                                            @foreach($mondaysH as $monday)
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
                                                <div class="tab-pane fade" id="tuesdayH" role="tabpane2" aria-labelledby="tuesday-tab">
                                                    <div class="province-table my-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card-header" style="border-bottom:0;">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <select id="start_tuesdayH">
                                                                                    @foreach($slots1 as $s)
                                                                                    <option value="{{$s}}">{{$s}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select id="end_tuesdayH">
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
                                                                        @foreach($tuesdaysH as $tuesday)
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
                                                <div class="tab-pane fade" id="wednesdayH" role="tabpane3" aria-labelledby="wednesday-tab">
                                                    <div class="province-table my-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card-header" style="border-bottom:0;">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <select id="start_wednesdayH">
                                                                                    @foreach($slots1 as $s)
                                                                                    <option value="{{$s}}">{{$s}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select id="end_wednesdayH">
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
                                                                        @foreach($wednesdaysH as $wednesday)
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
                                                <div class="tab-pane fade" id="thursdayH" role="tabpane3" aria-labelledby="thursday-tab">
                                                    <div class="province-table my-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card-header" style="border-bottom:0;">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <select id="start_thursdayH">
                                                                                    @foreach($slots1 as $s)
                                                                                    <option value="{{$s}}">{{$s}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select id="end_thursdayH">
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
                                                                        @foreach($thursdaysH as $thursday)
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
                                                <div class="tab-pane fade" id="fridayH" role="tabpane3" aria-labelledby="friday-tab">
                                                    <div class="province-table my-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card-header" style="border-bottom:0;">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <select id="start_fridayH">
                                                                                    @foreach($slots1 as $s)
                                                                                    <option value="{{$s}}">{{$s}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select id="end_fridayH">
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
                                                                        @foreach($fridaysH as $friday)
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
                                                <div class="tab-pane fade" id="saturdayH" role="tabpane3" aria-labelledby="saturday-tab">
                                                    <div class="province-table my-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card-header" style="border-bottom:0;">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <select id="start_saturdayH">
                                                                                    @foreach($slots1 as $s)
                                                                                    <option value="{{$s}}">{{$s}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select id="end_saturdayH">
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
                                                                        @foreach($saturdaysH as $saturday)
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
                                                <div class="tab-pane fade" id="sundayH" role="tabpane3" aria-labelledby="sunday-tab">
                                                    <div class="province-table my-2">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="card-header" style="border-bottom:0;">
                                                                    <div class="col-md-12">
                                                                        <div class="row">
                                                                            <div class="col-sm-3">
                                                                                <select id="start_sundayH">
                                                                                    @foreach($slots1 as $s)
                                                                                    <option value="{{$s}}">{{$s}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <div class="col-sm-3">
                                                                                <select id="end_sundayH">
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
                                                                        @foreach($sundaysH as $sunday)
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
                                                <div class="p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                                                    <button type="submit" class="btn btn-primary mt-3">Update</button>
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

    </form>
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
                {{--                    </div>--}}
            {{--                </form>--}}
        {{--            </div>--}}
</div>
</div>
        --}}
        {{--
    </div>
            --}}
            {{--
        </form>
        --}}
        {{--
    </div>
    --}}
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


    /*
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
                url: "{{url('/account/hospital/doctor/add/schedule')}}",
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
*/
    function AddSchedule(id) {
        var date = '';
        var start;
        var end;
       // var lastDoc = document.getElementById('lastDoc').value
       // var intDoc = parseInt(lastDoc)
        //var doc_id = intDoc + 1;
        var doc_id = $('#doc_id').val();
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
        var doc_id = $('#doc_id').val();
     //   var lastDoc = document.getElementById('lastDoc').value
       // var intDoc = parseInt(lastDoc)
        //var doc_id = intDoc + 1;
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

    $('#HospitalAddForm').on('submit', function(event) {
        event.preventDefault();

        var monday = $('#monday tr').length;
        var tuesday = $('#tuesday tr').length;
        var wednesday = $('#wednesday tr').length;
        var thursday = $('#thursday tr').length;
        var friday = $('#friday tr').length;
        var saturday = $('#saturday tr').length;
        var sunday = $('#sunday tr').length;

        var mondayH = $('#mondayH tr').length;
        var tuesdayH = $('#tuesdayH tr').length;
        var wednesdayH = $('#wednesdayH tr').length;
        var thursdayH = $('#thursdayH tr').length;
        var fridayH = $('#fridayH tr').length;
        var saturdayH = $('#saturdayH tr').length;
        var sundayH = $('#sundayH tr').length;

        console.log(monday);
        console.log(mondayH);
        if(monday > 1 || tuesday > 1 || wednesday > 1 || thursday > 1 || friday > 1 || saturday > 1 || sunday > 1 || mondayH > 1 || tuesdayH > 1 || wednesdayH > 1 || thursdayH > 1 || fridayH > 1 || saturdayH > 1 || sundayH > 1) {
            $.ajax({
                url: "{{url('/account/hospital/doctor/update')}}",
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
                                    location.href = "{{URL('/account/hospital/doctors')}}";
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

    let mobileCard = document.querySelector("#scheduleCard")
    let houseCard = document.querySelector("#scheduleCardH")

    $(document).ready(function () {

        if (($('#type').val()) == '3') {
            houseCard.style.display = 'block'
            mobileCard.style.display = 'block'
            $('#mobile').prop("checked", true)
            $('#house').prop("checked", true)
        } else if (($('#type').val()) == '2') {
            console.log('2')
            houseCard.style.display = 'block'
            mobileCard.style.display = 'none'
            $('#mobile').prop("checked", false)
            $('#house').prop("checked", true)
        } else if (($('#type').val()) == '1') {
            mobileCard.style.display = 'block'
            houseCard.style.display = 'none'
            $('#mobile').prop("checked", true)
            $('#house').prop("checked", false)
        } else if (($('#type').val()) == 'null') {
            $('#mobile').prop("checked", false)
            $('#house').prop("checked", false)
        }

        houseCard.style.display = 'block'
    })

    $('#checkboxes').change( function () {
        var c1 = document.querySelector('#mobile');
        var c2 = document.querySelector('#house');
        if (c1.checked == true && c2.checked == true) {
            console.log('hi')
            document.getElementById('house').value = 3
        } else {
            console.log('no')
        }
    })


    let error = document.getElementById('error')
    function validateForm() {
        let messages = []

        const phone = document.getElementById('phone')
        var validNo = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;


        if (!phone.value.match(validNo)) {
            messages.push('Please enter valid phone number')
        }


        if (messages.length > 0) {
            error.textContent = messages.join(', ')
        }
    }

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

</script>

@endsection
