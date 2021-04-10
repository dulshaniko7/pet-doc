
@if(auth()->user()->hasRole('super-admin'))
    <!--**********************************
        Sidebar start
    ***********************************-->
        <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li><a href="{{ URL('account/super-admin/dashboard') }}" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

    {{--            <li><a href="{{ URL('/account/appoinmet') }}"  aria-expanded="false">--}}
    {{--                <i class="fa fa-home fa-fw" aria-hidden="true"></i>--}}
    {{--                <span class="nav-text">Appoinments</span>--}}
    {{--            </a>--}}
    {{--            </li>--}}

                <li><a href="{{ URL('/account/super-admin/pets') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Pets</span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL('/account/super-admin/doctors') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Doctors</span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL('/account/super-admin/hospitals') }}" class="ai-icon" aria-expanded="false">
                    <i class="flaticon-381-settings-2"></i>
                    <span class="nav-text">Hospitals</span>
                    </a>
                </li>

    {{--            <li>--}}
    {{--                <a href="{{ URL('/account/patients') }}" class="ai-icon" aria-expanded="false">--}}
    {{--                <i class="flaticon-381-settings-2"></i>--}}
    {{--                <span class="nav-text">Admins</span>--}}
    {{--                </a>--}}
    {{--            </li>--}}

    {{--            <li>--}}
    {{--                <a href="{{ URL('/account/patients') }}" class="ai-icon" aria-expanded="false">--}}
    {{--                <i class="flaticon-381-settings-2"></i>--}}
    {{--                <span class="nav-text">Account Settings</span>--}}
    {{--                </a>--}}
    {{--            </li>--}}

            </ul>

            <!-- <div class="plus-box">
                <p>Create new appointment</p>
            </div>
            <div class="copyright">
                <p><strong>Mediqu Hospital Admin Dashboard</strong> © 2020 All Rights Reserved</p>
                <p>Made with <i class="fa fa-heart"></i> by DexignZone</p>
            </div> -->
        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
@endif

@if(auth()->user()->hasRole('doctor'))
    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li><a href="{{ URL('account/doctor/dashboard') }}" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li><a href="{{ URL('/account/doctor/schedule') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span class="nav-text">Schedule</span>
                    </a>
                </li>

                <li><a href="{{ URL('/account/doctor/appointments') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="nav-text">Appointments</span>
                    </a>
                </li>

                <li><a href="{{ URL('/account/doctor/treatments') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                        <span class="nav-text">Treatments</span>
                    </a>
                </li>

                <li><a href="#" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Account Settings</span>
                    </a>
                </li>


            </ul>

        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
@endif

@if(auth()->user()->hasRole('admin'))
    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li><a href="{{ URL('account/admin/dashboard') }}" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL('/account/admin/doctors') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Doctors</span>
                    </a>
                </li>

                <li>
                    <a href="{{ URL('/account/admin/hospitals') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Hospitals</span>
                    </a>
                </li>

                <li><a href="{{ URL('/account/admin/doctor/schedule') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span class="nav-text">Doctors Schedule</span>
                    </a>
                </li>

                <li><a href="{{ URL('/account/admin/hospital/shedules') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span class="nav-text">Hospitals Schedule</span>
                    </a>
                </li>

                <li><a href="{{URL('/account/admin/profile')}}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Account Settings</span>
                    </a>
                </li>

            </ul>

        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
@endif


@if(auth()->user()->hasRole('hospital'))
    <!--**********************************
        Sidebar start
    ***********************************-->
    <div class="deznav">
        <div class="deznav-scroll">
            <ul class="metismenu" id="menu">
                <li><a href="{{ URL('account/hospital/dashboard') }}" aria-expanded="false">
                        <i class="flaticon-381-networking"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li><a href="{{ URL('/account/hospital/appointments') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <span class="nav-text">Appointments</span>
                    </a>
                </li>

                <li><a href="{{ URL('/account/hospital/doctors') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-user-md" aria-hidden="true"></i>
                        <span class="nav-text">Doctors</span>
                    </a>
                </li>
                <li><a href="{{ URL('/account/hospital/shedules') }}" class="ai-icon" aria-expanded="false">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                        <span class="nav-text">Schedule</span>
                    </a>
                </li>
                <li><a href="{{ URL('/account/hospital/profile') }}" class="ai-icon" aria-expanded="false">
                        <i class="flaticon-381-settings-2"></i>
                        <span class="nav-text">Account Settings</span>
                    </a>
                </li>

            </ul>

        </div>
    </div>
    <!--**********************************
        Sidebar end
    ***********************************-->
@endif
