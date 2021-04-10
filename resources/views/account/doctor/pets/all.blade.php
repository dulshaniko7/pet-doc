
@extends('account.layouts.master')

@section('styles')
    <!-- Datatable -->
    <link href="{{URL('admin_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
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
                    <span>Patients</span>
                </div>
            </div>
            <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Account</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Patients</a></li>
                </ol>
            </div>
        </div>
        <!-- row -->


        <div class="row">

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Patient</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example5" class="display" style="min-width: 845px">
                                <thead>
                                    <tr>
                                        <th>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="checkAll" required="">
                                                <label class="custom-control-label" for="checkAll"></label>
                                            </div>
                                        </th>
                                        <th>Patient ID</th>
                                        <th>Date Check in</th>
                                        <th>Patient Name</th>
                                        <th>Doctor Assgined</th>
                                        <th>Disease</th>
                                        <th>Status</th>
                                        <th>Room no</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox2" required="">
                                                <label class="custom-control-label" for="customCheckBox2"></label>
                                            </div>
                                        </td>
                                        <td>#P-00001</td>
                                        <td>26/02/2020, 12:42 AM</td>
                                        <td>Tiger Nixon</td>
                                        <td>Dr. Cedric</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-001</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    {{--  <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>  --}}
                                                    <a class="dropdown-item" href="{{ URL('account/patient/profile') }}">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox3" required="">
                                                <label class="custom-control-label" for="customCheckBox3"></label>
                                            </div>
                                        </td>
                                        <td>#P-00002</td>
                                        <td>28/02/2020, 12:42 AM</td>
                                        <td>Garrett Winters</td>
                                        <td>Dr. Cedric</td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-002</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox4" required="">
                                                <label class="custom-control-label" for="customCheckBox4"></label>
                                            </div>
                                        </td>
                                        <td>#P-00003</td>
                                        <td>26/02/2020, 12:42 AM</td>
                                        <td>Ashton Cox</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-success">
                                                <i class="fa fa-circle text-success mr-1"></i>
                                                Recovered
                                            </span>
                                        </td>
                                        <td>AB-003</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox5" required="">
                                                <label class="custom-control-label" for="customCheckBox5"></label>
                                            </div>
                                        </td>
                                        <td>#P-00004</td>
                                        <td>29/02/2020, 12:42 AM</td>
                                        <td>Ashton Cox</td>
                                        <td>Dr. Cedric</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-004</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox6" required="">
                                                <label class="custom-control-label" for="customCheckBox6"></label>
                                            </div>
                                        </td>
                                        <td>#P-00005</td>
                                        <td>28/02/2020, 12:42 AM</td>
                                        <td>Ashton Cox</td>
                                        <td>Dr. Cedric</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-005</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox7" required="">
                                                <label class="custom-control-label" for="customCheckBox7"></label>
                                            </div>
                                        </td>
                                        <td>#P-00006</td>
                                        <td>28/02/2020, 12:42 AM</td>
                                        <td>Ashton Cox</td>
                                        <td>Dr. Rhona</td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-006</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox8" required="">
                                                <label class="custom-control-label" for="customCheckBox8"></label>
                                            </div>
                                        </td>
                                        <td>#P-00007</td>
                                        <td>26/02/2020, 12:42 AM</td>
                                        <td>Airi Satou</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-007</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox9" required="">
                                                <label class="custom-control-label" for="customCheckBox9"></label>
                                            </div>
                                        </td>
                                        <td>#P-00008</td>
                                        <td>29/02/2020, 12:42 AM</td>
                                        <td>Airi Satou</td>
                                        <td>Dr. Garrett </td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-008</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox10" required="">
                                                <label class="custom-control-label" for="customCheckBox10"></label>
                                            </div>
                                        </td>
                                        <td>#P-00009</td>
                                        <td>25/02/2020, 12:42 AM</td>
                                        <td>Airi Satou</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-009</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox11" required="">
                                                <label class="custom-control-label" for="customCheckBox11"></label>
                                            </div>
                                        </td>
                                        <td>#P-00010</td>
                                        <td>26/02/2020, 12:42 AM</td>
                                        <td>Airi Satou</td>
                                        <td>Dr. Rhona</td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-010</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox12" required="">
                                                <label class="custom-control-label" for="customCheckBox12"></label>
                                            </div>
                                        </td>
                                        <td>#P-00011</td>
                                        <td>28/02/2020, 12:42 AM</td>
                                        <td>Airi Satou</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-011</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox13" required="">
                                                <label class="custom-control-label" for="customCheckBox13"></label>
                                            </div>
                                        </td>
                                        <td>#P-00012</td>
                                        <td>29/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Garrett</td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-012</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox14" required="">
                                                <label class="custom-control-label" for="customCheckBox14"></label>
                                            </div>
                                        </td>
                                        <td>#P-00013</td>
                                        <td>25/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-013</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox15" required="">
                                                <label class="custom-control-label" for="customCheckBox15"></label>
                                            </div>
                                        </td>
                                        <td>#P-00014</td>
                                        <td>26/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Garrett</td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-014</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox16" required="">
                                                <label class="custom-control-label" for="customCheckBox16"></label>
                                            </div>
                                        </td>
                                        <td>#P-00015</td>
                                        <td>28/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-015</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox17" required="">
                                                <label class="custom-control-label" for="customCheckBox17"></label>
                                            </div>
                                        </td>
                                        <td>#P-00016</td>
                                        <td>29/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Garrett</td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-016</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox18" required="">
                                                <label class="custom-control-label" for="customCheckBox18"></label>
                                            </div>
                                        </td>
                                        <td>#P-00017</td>
                                        <td>25/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-017</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox19" required="">
                                                <label class="custom-control-label" for="customCheckBox19"></label>
                                            </div>
                                        </td>
                                        <td>#P-00018</td>
                                        <td>26/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Rhona</td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-018</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox20" required="">
                                                <label class="custom-control-label" for="customCheckBox20"></label>
                                            </div>
                                        </td>
                                        <td>#P-00019</td>
                                        <td>28/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Rhona</td>
                                        <td>Cold & Flu</td>
                                        <td>
                                            <span class="badge light badge-danger">
                                                <i class="fa fa-circle text-danger mr-1"></i>
                                                New Patient
                                            </span>
                                        </td>
                                        <td>AB-019</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="custom-control custom-checkbox ml-2">
                                                <input type="checkbox" class="custom-control-input" id="customCheckBox21" required="">
                                                <label class="custom-control-label" for="customCheckBox21"></label>
                                            </div>
                                        </td>
                                        <td>#P-00020</td>
                                        <td>25/02/2020, 12:42 AM</td>
                                        <td>Sonya Frost</td>
                                        <td>Dr. Garrett</td>
                                        <td>Sleep Problem</td>
                                        <td>
                                            <span class="badge light badge-warning">
                                                <i class="fa fa-circle text-warning mr-1"></i>
                                                In Treatment
                                            </span>
                                        </td>
                                        <td>AB-020</td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Accept Patient</a>
                                                    <a class="dropdown-item" href="#">Reject Order</a>
                                                    <a class="dropdown-item" href="#">View Details</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
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

<script src="{{URL('admin_assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL('admin_assets/js/plugins-init/datatables.init.js')}}"></script>
@endsection


