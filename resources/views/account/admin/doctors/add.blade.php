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
                        <h4>Doctor Form</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Doctors</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Add</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <form id="DoctorAddForm">
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
                                            <div id="imagePreview" class="preview-div" style="background-image: url({{URL('/admin_assets/images/avatar/doctor.svg')}});">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <fieldset disabled>
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="text" class="form-control" id="petdoc_id" name="petdoc_id" value="{{$doc_petdoc_id}}">
                                </div>
                            </fieldset>
                            <input type="hidden" name="petdoc_id" value="{{$doc_petdoc_id}}">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea type="text" class="form-control" id="about" name="about"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" class="form-control" id="phone" name="phone" onchange="validateForm()" required>
                            </div>
                            <div id="error"></div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" id="email" name="email" onchange="validateEmail()" required>
                            </div>
                            <div id="errorEmail"></div>
                            <div class="form-group">
                                <label>Registration No</label>
                                <input type="text" class="form-control" id="reg_no" name="reg_no">
                            </div>
                            <div class="form-group">
                                <label>Specialization</label>
                                <input type="text" class="form-control" id="spec" name="spec">
                            </div>
                            <div class="form-group">
                                <label>Clinic Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>
                            <div class="form-group">
                                <label>Rate</label>
                                <input type="text" class="form-control" id="rate" name="rate">
                            </div>
                            <div class="form-group">
                                <label>House Visit Rate</label>
                                <input type="text" class="form-control" id="visit_rate" name="visit_rate">
                            </div>

                            <div class="form-group">
                                <label>Gender</label>
                                <select id="gender" class="form-control" name="gender">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
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
                                            <input type="text" class="form-control" id="bank" name="bank" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Branch</label>
                                            <input type="text" class="form-control" id="branch" name="branch" required>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Account Name</label>
                                            <input type="text" class="form-control" id="account_name" name="account_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Bank Account No</label>
                                            <input type="text" class="form-control" id="bank_acc_no" name="bank_acc_no" required>
                                        </div>
                                    </div>


                                </div>
                            </div>

                        </div>
                    </div>
{{--                    <button type="submit" class="btn btn-primary mt-3">Add</button>--}}
                    <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                        <button type="submit" class="btn btn-primary mt-3">Add</button>
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


        $('#DoctorAddForm').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: "{{url('/account/admin/doctor/save')}}",
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
                                    location.href = "{{URL('/account/admin/doctors')}}";
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
