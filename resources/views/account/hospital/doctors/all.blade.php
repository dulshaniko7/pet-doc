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
                        <span>Doctors</span>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{URL('/account/hospital/dashboard')}}">Hospital</a></li>
                        <li class="breadcrumb-item active"><a href="">Doctors</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Doctors</h4>
                            <a href="{{URL('/account/hospital/doctors/add')}}" class="btn btn-primary ml-auto">+ Add Doctor</a>
                        </div>
                        <div class="card-body" id="card">
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
{{--                                        <th>Treatment Method</th>--}}
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
{{--                                            <td class="type">{{$doctor->treatment_method}}</td>--}}
                                            <td>
                                                <div class="dropdown ml-auto text-right">
                                                    <div class="btn-link" data-toggle="dropdown">
                                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item" href="{{ URL('account/hospital/doctor') }}/{{$doctor->id}}">View Details</a>
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

    <script>

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        {{--function changeStatus(status, id) {--}}

        {{--    $.ajax({--}}
        {{--        url: "{{url('/account/hospital/appointment/status')}}",--}}
        {{--        method: "POST",--}}
        {{--        data: "status=" + status + "&id=" + id,--}}
        {{--        dataType: 'JSON',--}}
        {{--        success: function (response) {--}}
        {{--            if (response.success) {--}}
        {{--                $.confirm({--}}
        {{--                    icon: 'fa fa-check',--}}
        {{--                    theme: 'modern',--}}
        {{--                    animation: 'left',--}}
        {{--                    type: 'green',--}}
        {{--                    title: 'Update!',--}}
        {{--                    content: response.message,--}}
        {{--                    buttons: {--}}
        {{--                        ok: function () {--}}
        {{--                            location.reload();--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            }--}}

        {{--            if (!response.success) {--}}
        {{--                $.confirm({--}}
        {{--                    icon: 'fa fa-exclamation-triangle',--}}
        {{--                    theme: 'modern',--}}
        {{--                    animation: 'right',--}}
        {{--                    type: 'red',--}}
        {{--                    title: 'Error!',--}}
        {{--                    content: response.message,--}}
        {{--                    buttons: {--}}
        {{--                        ok: function () {--}}
        {{--                            location.reload();--}}
        {{--                        }--}}
        {{--                    }--}}
        {{--                });--}}
        {{--            }--}}
        {{--        }--}}
        {{--    });--}}

        {{--}--}}

        $(document).ready( function() {

            $('.type').each( function(){


                if(($(this).text()) == '3'){
                    $(this).text('Home visit, In House')
                }
                else if (($(this).text()) == '2'){
                    $(this).text('In House')
                }
                else if (($(this).text()) == '1'){
                    $(this).text('Home visit')
                }
            })

        })

        var table = document.getElementById('example5');

        $('#card').on('click', function() {
            $('.type').each( function(){


                if(($(this).text()) == '3'){
                    $(this).text('Home visit, In House')
                }
                else if (($(this).text()) == '2'){
                    $(this).text('In House')
                }
                else if (($(this).text()) == '1'){
                    $(this).text('Home visit')
                }
            })
        })

    </script>
@endsection


