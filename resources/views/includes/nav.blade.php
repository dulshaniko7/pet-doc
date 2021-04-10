<nav class="navbar navbar-custom navbar-fixed-top" style="background-color: #363636 !important;">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="navbar-brand navbar-brand-centered">
                        <a href="{{URL('/')}}">
                            <img src="{{URL('/assets/logo_1.png')}}" style="height: 100%" class="img-responsive" alt="">
                        </a>
                    </div>
                </div>
                <div class="collapse navbar-collapse" id="navbar-brand-centered">
                    <ul class="nav navbar-nav">
                        <li class="{{ request()->is('/') ? 'active' : '' }}"><a href="{{URL('/')}}">Home</a></li>
                        <li class="{{ request()->is('about') ? 'active' : '' }}"><a href="{{URL('/about')}}">About</a></li>
                         <li class="{{ request()->is('our_service') ? 'active' : '' }}"><a href="{{URL('/our_service')}}">Our Services</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="{{ request()->is('contact') ? 'active' : '' }}"><a href="{{URL('/contact')}}">Contact Us</a></li>

                        @guest
                            <li class="{{ request()->is('login') ? 'active' : '' }}"><a href="{{ route('login') }}">Login</a></li>
{{--                            <li class="{{ request()->is('register') ? 'active' : '' }}"><a href="{{URL('/register')}}">Register</a></li>--}}
                        @else
                            @switch(Auth::user()->getRoleNames()->first())
                                @case(\App\Enums\RoleType::DOCTOR())
                                    <li><a href="{{URL('/account/doctor/dashboard')}}">Dashboard -  {{ Auth::user()->name }}</a></li>
                                    @break
                                @case(\App\Enums\RoleType::HOSPITAL())
                                    <li><a href="{{URL('/account/hospital/dashboard')}}">Dashboard -  {{ Auth::user()->name }}</a></li>
                                    @break
                                @case(\App\Enums\RoleType::ADMIN())
                                    <li><a href="{{URL('/account/admin/dashboard')}}">Dashboard -  {{ Auth::user()->name }}</a></li>
                                    @break
                                @case(\App\Enums\RoleType::SUPER_ADMIN())
                                    <li><a href="{{URL('/account/admin/dashboard')}}">Dashboard -  {{ Auth::user()->name }}</a></li>
                                    @break
                            @endswitch

                            <li><a href="{{URL('/logout')}}"  onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">Logout</a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                            </form>
                        @endguest

                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
