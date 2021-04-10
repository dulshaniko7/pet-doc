@extends('account.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/toolbarconfigurator/lib/codemirror/neo.css') }}">
    <!-- Datatable -->
    <link href="{{URL('admin_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
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
        #errorEmail {
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
                        <h4>Hospital Information</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Hospitals</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <form id="HospitalEditForm">
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
                                                            <div id="imagePreview" class="preview-div" style="background-image: url('{{asset('storage/avatars/hospitals/')}}/{{$hospital->image}}')">
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
                                                            <input type="text" class="form-control" id="petdoc_id" name="petdoc_id" value="{{$hospital->petdoc_id}}">
                                                        </div>
                                                    </fieldset>
                                                    <input type="hidden" name="petdoc_id" value="{{$hospital->petdoc_id}}">
                                                </div>
                                                <div class="col-md-6"><div class="form-group">
                                                        <label>Name</label>
                                                        <input type="text" class="form-control" id="name" name="name" value="{{$hospital->display_name}}">
                                                    </div></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Phone</label>
                                                    <input type="number" class="form-control" id="phone" name="phone" required  onchange="validateForm()" value="{{$hospital->user->phone}}">
                                                </div>
                                                <div id="error"></div>
                                                <div class="col-md-6 form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control" id="email" name="email"  required value="{{$hospital->user->email}}" onchange="validateEmail()">
                                                </div>
                                                <div id="errorEmail"></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Registration No</label>
                                                    <input type="text" class="form-control" id="reg_no" name="reg_no" value="{{$hospital->registration_no}}">
                                                </div>
                                                <div class="col-md-6 form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" id="address" name="address" value="{{$hospital->address}}">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 form-group">
                                                    <label>Rate</label>
                                                    <input type="text" class="form-control" id="rate" name="rate" value="{{$hospital->rate}}">
                                                </div>
{{--                                                <div class="col-md-6 form-group">--}}
{{--                                                    <label>Password</label>--}}
{{--                                                    <input type="password" class="form-control" id="password" name="password" value="{{$hospital->user->password}}">--}}
{{--                                                </div>--}}
                                            </div>

                                            <label>Bank Details</label>
                                            <div class="bank">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Bank</label>
                                                            <input type="text" class="form-control" id="bank" name="bank" value="{{$hospital->bank}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Branch</label>
                                                            <input type="text" class="form-control" id="branch" name="branch" value="{{$hospital->branch}}" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Account Name</label>
                                                            <input type="text" class="form-control" id="bank_acc_no" name="account_name" value="{{$hospital->account_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Bank Account No</label>
                                                            <input type="text" class="form-control" id="bank_acc_no" name="bank_acc_no" value="{{$hospital->bank_account}}" >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                                            </div>
                                        </div>

                                    </div>
                                    {{--                    <button type="submit" class="btn btn-primary mt-3">Add</button>--}}

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0">
                    <div class="welcome-text">
                        <h4>Doctors</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Doctors</h4>
                            <a href="{{URL('/account/admin/hospital/doctors/add')}}/{{$hospital->hospital_id}}" class="btn btn-primary ml-auto">+ Add Doctor</a>
                        </div>
                        <div class="card-body">
                                <div class="row page-titles mx-0">
                                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                                        <div class="col-md-12">
                                            <div class="table-responsive">
                                                <table id="example5" class="display" style="min-width: 845px">
                                                    <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Registration No</th>
                                                        <th>Phone</th>
                                                        <th>Address</th>
                                                        <th>Gender</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($hospital_doctors as $doctor)
                                                        <tr>
                                                            <td>{{$doctor->id}}</td>
                                                            <td>{{$doctor->display_name}}</td>
                                                            <td>{{$doctor->registration_no}}</td>
                                                            <td>{{$doctor->phone}}</td>
                                                            <td>{{$doctor->address}}</td>
                                                            <td>{{$doctor->gender}}</td>
{{--                                                            <td>--}}
{{--                                                                @if($doctor->user->active == 1)--}}
{{--                                                                    <span class="badge light badge-success">--}}
{{--                                                <i class="fa fa-circle text-success mr-1"></i>--}}
{{--                                                Active--}}
{{--                                            </span>--}}
{{--                                                                @else--}}
{{--                                                                    <span class="badge light badge-danger">--}}
{{--                                                <i class="fa fa-circle text-danger mr-1"></i>--}}
{{--                                                Active--}}
{{--                                            </span>--}}
{{--                                                                @endif--}}
{{--                                                            </td>--}}
                                                        <td>
                                                            <div class="dropdown ml-auto text-right">
                                                                <div class="btn-link" data-toggle="dropdown">
                                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                                </div>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a class="dropdown-item" href="{{ URL('account/admin/hospital/doctor') }}/{{$doctor->id}}">View Details</a>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>
                                    {{--                    <button type="submit" class="btn btn-primary mt-3">Add</button>--}}

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
    <script src="{{URL('admin_assets/vendor/chart.js/Chart.bundle.min.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{URL('admin_assets/js/plugins-init/datatables.init.js')}}"></script>

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


        $('#HospitalEditForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{url('/account/admin/hospital/edit/save')}}",
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
                                    location.href = "{{URL('/account/admin/hospitals')}}";
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

        let error = document.getElementById('error')
        let errorEmail = document.getElementById('errorEmail')
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
