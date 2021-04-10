@extends('layouts.default')

@section('content')

<section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
                <h1>Register</h1>
            </div>
        </div>
        <!-- container -->
        <div class="container" style="margin-bottom: 50px;">
            <div class="row">
                <!-- Contact Form -->
                <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 res-margin">
                    <!-- Form Starts -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div id="contact_form">
                            <div class="form-group">
                                <label>Username<span class="required">*</span></label>
                                <input id="name" type="text" class="form-control input-field @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label>Email <span class="required">*</span></label>
                                <input type="email" class="form-control input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label>Password</label>
                                <input id="password" type="password" class="form-control input-field @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label>Confirm Password</label>
                                <input id="password-confirm" type="password" class="form-control input-field" name="password_confirmation" required autocomplete="new-password">

                                <label>Choose Your Role</label>
                                <select id="password-confirm" class="form-control input-field" name="role" required>
                                    <option class="form-control input-field" value="{{\App\Enums\RoleType::DOCTOR}}">Doctor</option>
                                    <option class="form-control input-field" value="{{\App\Enums\RoleType::HOSPITAL}}">Hospital</option>
                                </select>
                            </div>
                            <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Register</button>
                        </div>
                    </form>
                    <!-- Contact results -->
                    <div id="contact_results"></div>
                </div>
                <!--/col-lg-6 -->
            </div>
            <!-- /row-->
        </div>
    </section>


@endsection
