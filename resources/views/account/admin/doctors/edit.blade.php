@extends('account.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/toolbarconfigurator/lib/codemirror/neo.css') }}">
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
        #error{
            color:red;
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
                        <h4>Doctor Details</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Doctors</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <form id="DoctorEditForm">
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
                                            <div id="imagePreview" class="preview-div" style="@if($doctor->image)background-image: url({{URL('storage/avatars/doctors')}}/{{$doctor->image}}) @else
                                                background-image: url({{URL('/admin_assets/images/avatar/doctor.svg')}})@endif;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <fieldset disabled>
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" class="form-control" id="petdoc_id" name="petdoc_id" value="{{$doctor->petdoc_id ?? ''}}">
                                </div>
                            </fieldset>
                            <input type="hidden" name="petdoc_id" value="{{$doctor->petdoc_id  ?? ''}}">
                            <input type="hidden" id="doc_id" value="{{$doctor->doctor_id  ?? ''}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$doctor->user->name  ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" onchange="validateForm()" value="{{$doctor->user->phone  ?? ''}}" required>
                            </div>
                            <div id="error"></div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{$doctor->user->email  ?? ''}}" onchange="validateEmail()">
                            </div>
                            <div id="errorEmail"></div>
                            <div class="form-group">
                                <label>Registration No</label>
                                <input type="text" class="form-control" id="reg_no" name="reg_no" value="{{$doctor->registration_no  ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Clinic Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="{{$doctor->clinic_address  ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Rate</label>
                                <input type="text" class="form-control" id="rate" name="rate" value="{{$doctor->rate  ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>House Visit Rate</label>
                                <input type="text" class="form-control" id="rate" name="rate" value="{{$doctor->visit_rate  ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select id="gender" class="form-control" name="gender">
                                    @if($doctor->gender == "Male")
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                    @elseif($doctor->gender == "Female")
                                        <option value="Male">Male</option>
                                        <option value="Female" selected>Female</option>
                                    @endif

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password">
                            </div>

                            <label>Bank Details</label>
                            <div class="bank">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank</label>
                                            <input type="text" class="form-control" id="bank" name="bank" value="{{$doctor->bank  ?? ''}}"  required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <input type="text" class="form-control" id="branch" name="branch"  value="{{$doctor->branch  ?? ''}}" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" class="form-control" id="bank_acc_no" name="account_name" value="{{$doctor->account_name  ?? ''}}" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Account No</label>
                                            <input type="text" class="form-control" id="bank_acc_no" name="bank_acc_no" value="{{$doctor->bank_account  ?? ''}}" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{--                    <button type="submit" class="btn btn-primary mt-3">Add</button>--}}


                </div>

                <div class="row page-titles mx-0 container-fluid">
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
                            <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
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

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

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
                    url: "{{url('/account/admin/doctor/add/schedule')}}",
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

        $('#DoctorEditForm').on('submit', function(event) {
            event.preventDefault();
            var monday = $('#monday tr').length;
            var tuesday = $('#tuesday tr').length;
            var wednesday = $('#wednesday tr').length;
            var thursday = $('#thursday tr').length;
            var friday = $('#friday tr').length;
            var saturday = $('#saturday tr').length;
            var sunday = $('#sunday tr').length;

            console.log(monday);
            if(monday > 1 || tuesday > 1 || wednesday > 1 || thursday > 1 || friday > 1 || saturday > 1 || sunday > 1)
            {
                $.ajax({
                    url: "{{url('/account/admin/doctor/update')}}",
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
            }
            else{
                alert('please enter at least one time slot');
                return false;
            }
        });

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

        function validateEmail() {
            let messages = []

            const email = document.getElementById('email')
            var valid = /\S+@\S+\.\S+/;


            if (!email.value.match(valid)) {
                messages.push('Please enter valid email address')
            }


            if (messages.length > 0) {
                errorEmail.textContent = messages.join(', ')
            }
        }




    </script>

@endsection
