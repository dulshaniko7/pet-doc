@extends('layouts.default')
@section('content')
      <section id="about" class="pages">
         <div class="jumbotron" data-stellar-background-ratio="0.5">
            <!-- Heading -->
            <div class="jumbo-heading" data-stellar-background-ratio="1.2">
               <h1>FAQ</h1>
            </div>
         </div>
         <!-- container -->
         <div class="container">
            <div class="row">
               <div class="col-lg-7 col-md-6">
                   <!-- Accordion -->
                   <div class="panel-group" id="accordion">
                       <!-- Question 1 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">What is PetDoc.lk?</a>
                               </h5>
                           </div>
                           <div id="collapseOne" class="panel-collapse collapse in">
                               <div class="panel-body">
                                   <p>We are an e-Vet channeling service for taking care of your pets. Whether it is an appointment for your pet’s vet or a grooming session, we will help you take care of your pet’s medical and grooming needs. Additionally,
                                       we offer pet nutritional products at a discounted rate.
                                   </p>
                               </div>
                           </div>
                       </div>
                       <!-- Question 2 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">What is your policy for cancellations?</a>
                               </h5>
                           </div>
                           <div id="collapseTwo" class="panel-collapse collapse">
                               <div class="panel-body">
                                   <p>We guarantee your appointment, but if something unexpected happens and the vet is unable to see you, we will refund your money you.
                                   (Need some information about how you do it. Is it instantaneous? Account? Etc.)
                                   </p>
                               </div>
                           </div>
                       </div>
                       <!-- Question 3 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">What services do you offer?</a>
                               </h5>
                           </div>
                           <div id="collapseThree" class="panel-collapse collapse">
                               <div class="panel-body">
                                       <p>We offer a slew of services geared at pets and pet owners. These include:</p>
                                       <ul>
                                           <li>	e-Vet channeling services</li>
                                           <li>	Channeling for scans</li>
                                           <li>	Channeling services for Vet consultation</li>
                                           <li>	Channeling for pet grooming</li>
                                           <li>	Channeling services for pet surgeries</li>
                                           <li>	Channeling services to get pet medication</li>
                                           <li>	Discounted pet products</li>
                                       </ul>
                               </div>
                           </div>
                       </div>

                       <!-- Question 4 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFour">What information do you collect on your website?</a>
                               </h5>
                           </div>
                           <div id="collapseFour" class="panel-collapse collapse">
                               <div class="panel-body">
                                   <p>We collect your name, address, mobile number, and card details for booking the appointment.)
                                   </p>
                               </div>
                           </div>
                       </div>

                       <!-- Question 5 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Why do you collect this data?</a>
                               </h5>
                           </div>
                           <div id="collapseFive" class="panel-collapse collapse">
                               <div class="panel-body">
                                   <p>We collect this data only to make the booking and to receive payment. We will not be sharing your financial data with a third-party.
                                      We will only share your contact details with the Vet for your pet’s vet consultation purposes only.
                                   </p>
                               </div>
                           </div>
                       </div>

                       <!-- Question 6 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSix">Who do you share the data with?</a>
                               </h5>
                           </div>
                           <div id="collapseSix" class="panel-collapse collapse">
                               <div class="panel-body">
                                   <p>We will share the name of your pet, you (owner), and the contact number with the Vet. This will help in case of changes to the appointment date or time. We will also share the details of the Vet with you for you to reach them in an emergency.
                                   </p>
                               </div>
                           </div>
                       </div>
                       <!-- Question 7 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven">How do you store your data?</a>
                               </h5>
                           </div>
                           <div id="collapseSeven" class="panel-collapse collapse">
                               <div class="panel-body">
                                   <p>
                                   </p>
                               </div>
                           </div>
                       </div>


                       <!-- Question 9 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTen">What are the security methods you use to safeguard my data?</a>
                               </h5>
                           </div>
                           <div id="collapseTen" class="panel-collapse collapse">
                               <div class="panel-body">
                                   <p>
                                   </p>
                               </div>
                           </div>
                       </div>

                       <!-- Question 10 -->
                       <div class="panel">
                           <div class="panel-heading">
                               <h5 class="panel-title">
                                   <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseEleven">How can I unsubscribe?</a>
                               </h5>
                           </div>
                           <div id="collapseEleven" class="panel-collapse collapse">
                               <div class="panel-body">
                                   <p>
                                   </p>
                               </div>
                           </div>
                       </div>

                   </div>
                   <!-- /.accordion -->
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
