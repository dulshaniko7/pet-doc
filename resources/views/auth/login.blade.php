@extends('layouts.default')

@section('content')

    <!-- Section Contact -->
    <section id="contact" class="pages no-padding">
        <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
                <h1>Login</h1>
            </div>
        </div>
        <!-- container -->
        <div class="container" style="margin-bottom: 50px;">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="row">
                    <!-- Contact Form -->
                    <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 res-margin">
                        <!-- Form Starts -->
                        <div id="contact_form">
                            <div class="form-group">
                                <label>Email <span class="required">*</span></label>
                                <input id="email" type="email" class="form-control input-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <label>Password</label>
                                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Login</button>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <!-- Contact results -->
                        <div id="contact_results"></div>
                    </div>
                    <!--/col-lg-6 -->
                </div>
            </form>
            <!-- /row-->
        </div>
    </section>
@endsection
