<!DOCTYPE html>
<html lang="en">


    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">
        <meta name="robots" content="noindex">
        <title>PetDoc - Dashboard </title>
        <!-- Favicon icon -->
        <link rel="shortcut icon" href="{{URL('assets/favicon.ico')}}" type="image/x-icon">
        <link href="{{URL('admin_assets/vendor/jqvmap/css/jqvmap.min.css')}}" rel="stylesheet">
        <link rel="stylesheet" href="{{URL('admin_assets/vendor/chartist/css/chartist.min.css')}}">
        <link href="{{URL('admin_assets/css/font-awesome.min.css')}}" rel="stylesheet">
        <link href="{{URL('admin_assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
        <link href="{{URL('admin_assets/css/style.css')}}" rel="stylesheet">

        <link href="{{URL('admin_assets/css/LineIcons.css')}}" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ URL('admin_assets/css/jquery-confirm.css') }}"/>
        <link href="{{URL('admin_assets/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">


        @yield('styles')
        <style>
            .hide_logo{
                display: none;
            }
        </style>
    </head>
    <body>

        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="sk-three-bounce">
                <div class="sk-child sk-bounce1"></div>
                <div class="sk-child sk-bounce2"></div>
                <div class="sk-child sk-bounce3"></div>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->

        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
                Nav header start
            ***********************************-->
            <div class="nav-header">
                <a href="{{URL('/')}}" class="brand-logo">
                    <img class="logo-abbr hide_logo" src="{{URL('assets/logo.png')}}" alt="" id="small">
{{--                    <img class="logo-compact log" src="{{URL('assets/logo.png')}}" alt="">--}}
                    <img class="brand-title" src="{{URL('assets/logo.png')}}" id="main" alt="">
                </a>

                <div class="nav-control" id="mobile_click">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>


            @include('account.layouts.header')

            @include('account.layouts.sidebar')



            @yield('content')




    </div>


    <!--**********************************
    Scripts
    ***********************************-->
    <!-- Required vendors -->

    <script src="{{URL('admin_assets/js/jquery-3.4.1.min.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/global/global.min.js')}}"></script>
    <script src="{{URL('admin_assets/js/jquery-confirm.js')}}"></script>
    <script src="{{URL('admin_assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    <script src="{{URL('admin_assets/js/custom.min.js')}}"></script>
    <script src="{{URL('admin_assets/js/deznav-init.js')}}"></script>
    <!-- Apex Chart -->
    <script src="{{URL('admin_assets/vendor/apexchart/apexchart.js')}}"></script>


         <script>
             $('#mobile_click').click(function() {

                 if($("#small").hasClass("hide_logo"))
                 {
                     $('#small').removeClass( "hide_logo" );
                     $('#main').addClass( "hide_logo" );
                 }
                 else
                 {
                     $('#main').removeClass( "hide_logo" );
                     $('#small').addClass( "hide_logo" );
                 }

             });
         </script>
   @yield('scripts')

    </body>
<footer>
    @include('account.layouts.footer')
</footer>
</html>
