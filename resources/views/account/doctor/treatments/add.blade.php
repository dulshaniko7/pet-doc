@extends('account.layouts.master')

@section('styles')
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/css/samples.css') }}">
    <link rel="stylesheet" href="{{ URL('admin_assets/chk_edit/toolbarconfigurator/lib/codemirror/neo.css') }}">
@endsection

@section('content')

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
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Treatment</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->
            <form id="treatmentForm">
             <div class="row page-titles mx-0">
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <div class="col-md-12">
                        <fieldset disabled>
                            <div class="form-group">
                                <label>Pet ID</label>
                                <input type="text" class="form-control" id="pet_id" name="pet_id" value="{{$pets->id}}">
                            </div>
                        </fieldset>
                            <div class="form-group">
                                <label>Pet Name</label>
                                <input type="text" class="form-control" id="pet_name" name="pet_name" value="{{$pets->name}}">
                            </div>
                    </div>
                </div>
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <div class="col-md-12">
                        <div id="editor">

                        </div>
                    </div>
                </div>
                <div class="col-sm-12 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex text-right">
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
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

        initSample();

        $('#treatmentForm').on('submit', function(event) {
            event.preventDefault();
            var pet_id = $("#pet_id").val();
            var pet_name = $("#pet_name").val();
            var data = CKEDITOR.instances.editor.getData();
            console.log(data);

            $.ajax({
                url: "{{url('/account/doctor/treatment/save')}}",
                method: "POST",
                data: "pet_id="+pet_id+"&pet_name="+pet_name+"&treatments="+data,
                dataType: 'JSON',
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
                                    location.href = "{{URL('/account/doctor/treatments')}}";
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
