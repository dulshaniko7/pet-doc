@extends('layouts.default')

@section('content')

      <section id="contact" class="pages no-padding">
         <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
               <h1>Contact</h1>
            </div>
         </div>
         <!-- container -->
         <div class="container" style="margin-bottom: 50px;">
            <div class="row">
               <!-- Contact Form -->
               <div class="col-lg-6 col-md-6 col-lg-offset-3 col-md-offset-3 res-margin">
                  <!-- Form Starts -->
                   <h4 class="margin1">Send us a Message</h4>
                   <ul class="list-inline">
                       <li><i class="fa fa-envelope"></i><a href="mailto:youremailaddress">info@petdoc.lk</a></li>
                       <li><i class="fa fa-phone margin-icon"></i>Call Us </li>
                       {{--                <li><i class="fa fa-map-marker margin-icon"></i>Lorem Ipsum 505</li>--}}
                   </ul>
                   <!-- address info -->
                   <p>Submit the enquiry through below forms
                   </p>

                   <div id="contact_form">
                       <div class="form-group">
                           <label>Name<span class="required">*</span></label>
                           <input type="text" name="name" class="form-control input-field" required="">
                           <label>Email Adress <span class="required">*</span></label>
                           <input type="email" name="email" class="form-control input-field" required="">
                           <label>Subject</label>
                           <input type="text" name="subject" class="form-control input-field" required="">
                           <label>Message<span class="required">*</span></label>
                           <textarea name="message" id="message" class="textarea-field form-control" rows="3"  required=""></textarea>
                       </div>
                       <button type="submit" id="submit_btn" value="Submit" class="btn center-block">Send message</button>
                   </div>
                  <!-- Contact results -->
                  <div id="contact_results"></div>
               </div>
               <!--/col-lg-6 -->
            </div>
            <!-- /row-->
         </div>
      </section>
@endsection
