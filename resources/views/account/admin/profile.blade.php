@extends('account.layouts.master')
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
                        <li class="breadcrumb-item"><a href="/account/doctor/treatment/save">Admin</a></li>
                        <li class="breadcrumb-item active"><a href="">Profile</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

                <div class="row col-12 col-md-12">
                    <div class="card col-md-6">
                        <div class="card-body">
                            <div class="col-lg-12 col-md-12">
                                        <div class="dashboard-list-box margin-top-0">
                                            <h4 class="gray">Profile Details</h4>
                                            <div class="dashboard-list-box-static">


                                                <!-- Details -->
{{--                                                <form id="editDetailsForm">--}}
{{--                                                    <div class="my-profile">--}}
{{--                                                        <div class="form-group row" style="margin-bottom: 10px;">--}}
{{--                                                            <label class="control-label">Your Name</label>--}}
{{--                                                            <input type="text" class="form-group" name="name" value="{{$user->name}}">--}}
{{--                                                        </div>--}}
{{--                                                        <label>Email</label>--}}
{{--                                                        <input value="{{$user->email}}" class="form-group" name="email" type="text">--}}
{{--                                                    </div>--}}

{{--                                                    <button type="submit" class="button margin-top-15">Save Changes</button>--}}
{{--                                                </form>--}}
                                                <form id="userDetails" onsubmit="return false;">
                                                    <div class="col-sm-12">
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
                                                        <div class="form-group row" style="margin-bottom: 10px;">
                                                            <div class="form-buttons-w">
                                                                <button type="submit" class="btn btn-primary ml-auto">Save</button>
                                                            </div>
                                                        </div>

                                                    </div>

{{--                                                    <div class="col-sm-12 text-right">--}}
{{--                                                        <div class="form-buttons-w">--}}
{{--                                                            <button type="submit" class="btn btn-primary ml-auto">Save</button>--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                        </div>
                    </div>
                    <div class="card col-md-6">
                        <div class="card-body">
                            <!-- Change Password -->
                            <div class="col-lg-12 col-md-12">
                                <div class="dashboard-list-box margin-top-0">
                                    <h4 class="gray">Change Password</h4>
                                    <div class="dashboard-list-box-static" style="padding-bottom: 280px !important;">
                                        <form id="agentAccountSettingsForm" onsubmit="return false;">
                                            <div class="col-sm-12">
                                                <div class="form-group row{{ $errors->has('current_password') ? ' has-error' : '' }}" style="margin-bottom: 10px;">
                                                    <label for="current_password" class="col-md-4 control-label">Current Password</label>

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
                                                    <label for="password" class="col-md-4 control-label">New
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
                                                    <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

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
