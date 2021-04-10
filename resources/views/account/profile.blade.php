@extends('account.layouts.master')

@section('styles')

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

    </style>

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
                        <span>Profile</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL('/account/hospital/dashboard')}}">Hospital</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="col-12">
            <div class="row">
                    <div class="col-md-6">
                        <form id="userDetails" onsubmit="return false;">
                        <div class="card" style="height: fit-content;">
                            <div class="card-header">
                                <h4 class="card-title">Profile Details</h4>
                            </div>
                            <div class="card-body">
                                <!-- Profile -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="dashboard-list-box margin-top-0">
                                        <div class="dashboard-list-box-static">
                                            <div class="col-sm-12">
                                                <div class="container">
                                                    <div class="avatar-upload">
                                                        <div class="avatar-edit">
                                                            <input type='file' id="imageUpload" class="upload-img" name="image" accept=".png, .jpg, .jpeg, .svg" />
                                                            <label for="imageUpload" class="upload-label"></label>
                                                        </div>
                                                        <div class="avatar-preview">
                                                            <div id="imagePreview" class="preview-div" style="background-image: url({{URL('/storage/avatars/users')}}/{{$user->image}});">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 10px;">
                                                    <label for="name" class="col-md-4 control-label">Your Name</label>

                                                    <div class="col-md-12">
                                                        <input id="name" type="text"
                                                               class="form-control" value="{{$user->name}}"
                                                               name="name" required autofocus>

                                                    </div>
                                                </div>
                                                <div class="form-group row" style="margin-bottom: 10px;">
                                                    <label for="email" class="col-md-4 control-label">Email</label>

                                                    <div class="col-md-12">
                                                        <input id="email" type="email"
                                                               class="form-control" value="{{$user->email}}"
                                                               name="email" required>
                                                    </div>
                                                </div>
                                                @if(auth()->user()->hasRole('admin'))
                                                    <input type="hidden" name="role" value="1">
                                                @endif
                                                @if(auth()->user()->hasRole('hospital'))
                                                    <input type="hidden" name="role" value="2">
                                                @endif
                                                @if(auth()->user()->hasRole('doctor'))
                                                    <input type="hidden" name="role" value="3">
                                                @endif

                                                <div class="form-group row" style="margin-bottom: 10px;">
                                                    <div class="form-buttons-w">
                                                        <button type="submit" class="btn btn-primary ml-auto">Save
                                                        </button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="height: fit-content;">
                            <div class="card-header">
                                <h4 class="gray">Change Password</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <!-- Change Password -->
                                    <div class="col-lg-12 col-md-12">
                                        <div class="dashboard-list-box margin-top-0">
                                            <div class="dashboard-list-box-static">
                                                <form id="agentAccountSettingsForm" onsubmit="return false;">
                                                    <div class="col-sm-12">
                                                        <div class="form-group row{{ $errors->has('current_password') ? ' has-error' : '' }}" style="margin-bottom: 10px;">
                                                            <label for="current_password" class="col-md-6 control-label">Current Password</label>

                                                            <div class="col-md-12">
                                                                <input id="current_password" type="password"
                                                                       class="form-control{{ $errors->has('current_password') ? ' is-invalid' : '' }}"
                                                                       name="current_password" required autofocus>

                                                                @if ($errors->has('current_password'))
                                                                    <div class="invalid-feedback">
                                                                        <strong>{{ $errors->first('current_password') }}</strong>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}" style="margin-bottom: 10px;">
                                                            <label for="password" class="col-md-6 control-label">New
                                                                Password</label>

                                                            <div class="col-md-12">
                                                                <input id="password" type="password"
                                                                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                                       name="password" required>

                                                                @if ($errors->has('password'))
                                                                    <div class="invalid-feedback">
                                                                        <strong>{{ $errors->first('password') }}</strong>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="form-group row" style="margin-bottom: 10px;">
                                                            <label for="password-confirm" class="col-md-6 control-label">Confirm Password</label>

                                                            <div class="col-md-12">
                                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-12 ">
                                                        <div class="form-buttons-w">
                                                            <button type="submit" onclick="changePassword(this)" class="btn btn-primary ml-auto">Save</button>
                                                        </div>
                                                    </div>
                                                </form>
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
    </div>

    <!--**********************************
        Content body end
    ***********************************-->
@endsection


@section('scripts')

    <!-- Dashboard 1 -->
    <script src="{{URL('admin_assets/js/dashboard/dashboard-1.js')}}"></script>
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

        $('#userDetails').on('submit', function(event) {

            $.ajax({
                url: "{{url('/profile/update')}}",
                method: "POST",
                data: new FormData(this),
                dataType: 'JSON',
                contentType: false,
                cache: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        showErrorSuccess("success", response.message);
                    }
                    else {
                        showErrorSuccess("error", response.message);
                        $("#showerr").text(response.message);
                        // $("#showerr").show();

                    }
                }
            });
        });

        $('#agentAccountSettingsForm').on('submit', function(event) {
            event.preventDefault();
            var current_password = $("#current_password").val();
            var password = $("#password").val();
            var password_confirm = $("#password-confirm").val();


            if ((current_password === "") || (password === "") || (password_confirm === "")) {
                if (current_password === "") {
                    showErrorSuccess("error", "Please enter current password!");
                    return false;
                }

                if (password === "") {
                    showErrorSuccess("error", "Please enter new password!");
                    return false;
                }

                if (password_confirm === "") {
                    showErrorSuccess("error", "Please enter confirm password!");
                    return false;
                }
            }

            if (password !== password_confirm) {
                showErrorSuccess("error", "Please enter correct confirm password!");
                return false;
            }

            if (password.length < 6) {
                showErrorSuccess("error", "Password should have minimum of 6 characters!");
                return false;
            }

            var currentFormData = this;

            $.ajax({
                url: "{{url('/password_verification')}}",
                method: "POST",
                data: "current_password=" + current_password,
                success: function(response) {
                    if (response.success) {
                        $.ajax({
                            url: "{{url('/password')}}",
                            method: "POST",
                            data: new FormData(currentFormData),
                            dataType: 'JSON',
                            contentType: false,
                            cache: false,
                            processData: false,
                            success: function(response) {
                                if (response.success) {
                                    showErrorSuccess('success', response.message);
                                } else {
                                    showErrorSuccess('error', response.message);
                                }
                            }
                        });
                    }
                    else {
                        showErrorSuccess("error", response.message);
                        $("#showerr").text(response.message);
                        // $("#showerr").show();

                    }
                }
            });
        });

        function showErrorSuccess(type, message) {
            if(type === "success") {
                $.confirm({
                    icon: 'fa fa-check text-success',
                    theme: 'modern',
                    animation: 'left',
                    type: 'green',
                    title: 'Update!',
                    content: message,
                    buttons: {
                        ok: function() {
                            location.reload();
                        }
                    }
                });
            } else {
                $.confirm({
                    icon: 'fa fa-exclamation-triangle',
                    theme: 'modern',
                    animation: 'left',
                    type: 'red',
                    title: 'Error!',
                    content: message,
                    buttons: {
                        close: function() {}
                    }
                });
            }
        }

    </script>
@endsection
