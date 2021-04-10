@extends('layouts.default')
@section('content')
      <section id="about" class="pages">
         <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
               <h1>About Us</h1>
            </div>
         </div>
         <!-- container -->
         <div class="container">
            <div class="row">
               <div class="col-lg-7 col-md-6">
                  <h3>High Quality Services</h3>
                  <p>We are a team of professionals with a similar vision. We believe that pet care should not be left to chance. 
                  Our pets need to have guaranteed service when required, at a location convenient to you.
                  </p>
                  <p>We use the latest technology to provide you with this and other essential services to ensure that your pet is well taken care of and happy.
                  With this, we work to challenge the status quo.
                  </p>
               </div>
               <!-- /col-lg-7 -->
               <!-- image -->
               <div class="col-lg-5 col-md-6 res-margin">
                  <img src="{{URL('assets/img/about.jpg')}}" class="img-rounded center-block img-responsive" alt="">
               </div>
               <!-- /col-lg-5-->
            </div>
   
         </div>
         <!-- /container-->
      </section>
      <!-- /Section ends -->
@stop
