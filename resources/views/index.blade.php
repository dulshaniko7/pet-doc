@extends('layouts.default')

@section('styles')
    <style>
        h4{
            font-size: 1.5em;
        }
    </style>

@endsection
@section('content')
<div class="slider-container">
    <!-- Controls -->
    <div class="slider-control left inactive"></div>
    <div class="slider-control right"></div>
    <ul class="slider-pagi"></ul>
    <!--Slider -->
    <div class="slider">
        <!-- Slide 0 -->
        <div class="slide slide-0 active" style="background-image:url('assets/img/banner/cat.png')">
            <div class="slide__bg"></div>
            <div class="slide__content">
                <div class="slide__overlay">
                </div>
                <!-- slide text-->
                <div class="slide__text">
                    <h1 class="slide__text-heading">Welcome to Petdoc.lk</h1>
                    <div class="hidden-mobile">
                        <p class="lead">We are a team of professionals with a similar vision. </p>
                        <a href="{{URL('/our_service')}}" class="btn btn-default">our services</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 1 -->
        <div class="slide slide-1" style="background-image:url('assets/img/banner/dog.jpg')">
            <div class="slide__bg"></div>
            <div class="slide__content">
                <div class="slide__overlay">
                </div>
                <!-- slide text-->
                <div class="slide__text">
                    <h1 class="slide__text-heading">We Love Pets!</h1>
                    <div class="hidden-mobile">
                        <p class="lead">We believe that pet care should not be left to chance. </p>
                        <a href="{{URL('/about')}}" class="btn btn-default">About Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="slide slide-2" style="background-image:url('assets/img/banner/people.jpg')">
            <div class="slide__bg"></div>
            <div class="slide__content">
                <div class="slide__overlay">
                </div>
                <!-- slide text-->
                <div class="slide__text">
                    <h1 class="slide__text-heading">Amazing Services</h1>
                    <div class="hidden-mobile">
                        <p class="lead">Our pets need to have guaranteed service when required</p>
                        <a href="{{URL('/contact')}}" class="btn btn-default">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
        <!--/Slide2 -->
    </div>
    <!--/Slider-->
</div>
<!--/ Slider ends -->
<!-- SVG Curve Up -->
<svg id="curveUp" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none" fill="#fff">
    <path d="M0 100 C 20 0 50 0 100 100 Z"/>
</svg>
<!-- Section Services-index -->
<section id="services-index" class="bg-pattern"  data-bottom-top="background-position: 0px 70%,99% 70%;"
         data-top-bottom="background-position: 0px -50%,99% -50%;">
    <!-- container -->
    <div class="container">
        <div class="section-heading">
            <h2>Our Services</h2>
        </div>
        <!-- /section-heading-->
        <div class="col-md-10 col-md-offset-1 text-center">
            <p>We offer a variety of services from vet channeling to pet grooming to pet products. Talk to us about this and any other services you may require for your cherished pet.</p>
        </div>
        <!-- /col-md-10-->
    </div>
    <!-- /container-->
    <div class="container-fluid margin1">
        <div class="col-md-10 col-md-offset-1">
            <!-- Services -->
            <div id="owl-services" class="owl-carousel">
                <!-- Feature Box 1  -->
                <div class="col-xs-12">
                    <div class="box_icon">
                        <div class="icon">
                            <!-- icon -->
                            <div class="image">
                                <img src="{{URL('assets/img/service1.jpg')}}" class="img-responsive" alt="">
                            </div>
                            <div class="info">
                                <h4>E-VET channeling </h4>
                                <p>Let us take away the headache of channeling a vet for your pet .</p>
                                <!-- Button-->
                            </div>
                        </div>
                    </div>
                    <!-- /box_icon -->
                </div>
                <!-- /col-xs-12 ends -->
                <!-- Feature Box 2 -->
                <div class="col-xs-12">
                    <div class="box_icon">
                        <div class="icon">
                            <!-- icon -->
                            <div class="image">
                                <img src="{{URL('assets/img/service2.jpg')}}" class="img-responsive" alt="">
                            </div>
                            <div class="info">
                                <h4>E-Vet Scan</h4>
                                <p>Need a scan for your pet? We can channel e-Vet services for a time convenient for you. </p>
                            </div>
                        </div>
                    </div>
                    <!-- /box_icon -->
                </div>
                <!-- /col-xs-12 ends -->
                <!-- Feature Box 3  -->
                <div class="col-xs-12">
                    <div class="box_icon">
                        <div class="icon">
                            <!-- icon -->
                            <div class="image">
                                <img src="{{URL('assets/img/service3.jpg')}}" class="img-responsive" alt="">
                            </div>
                            <div class="info">
                                <h4>Services for Consultation</h4>
                                <p>Need a consult for a pesky problem? Let us help you get time to meet a vet</p>
                            </div>
                        </div>
                    </div>
                    <!-- /box_icon -->
                </div>
                <!-- /col-xs-12 ends -->
                <!-- Feature Box 4  -->
                <div class="col-xs-12">
                    <div class="box_icon">
                        <div class="icon">
                            <!-- icon -->
                            <div class="image">
                                <img src="{{URL('assets/img/service4.jpg')}}" class="img-responsive" alt="">
                            </div>
                            <div class="info">
                                <h4>Channeling for pet grooming</h4>
                                <p>Groom and care for your pet. we will get the time and place for you.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /box_icon -->
                </div>
                <!-- /col-xs-12 ends -->
                <!-- Feature Box 5  -->
                <div class="col-xs-12">
                    <div class="box_icon">
                        <div class="icon">
                            <!-- icon -->
                            <div class="image">
                                <img src="{{URL('assets/img/service5.jpg')}}" class="img-responsive" alt="">
                            </div>
                            <div class="info">
                                <h4>Pet surgeries</h4>
                                <p>Don't worried about a required surgery? We will take care of channeling the Vet</p>
                            </div>
                        </div>
                    </div>
                    <!-- /box_icon -->
                </div>
                <!-- /col-xs-12 ends -->
                <div class="col-xs-12">
                    <div class="box_icon">
                        <div class="icon">
                            <!-- icon -->
                            <div class="image">
                                <img src="{{URL('assets/img/feature5.jpg')}}" class="img-responsive" alt="">
                            </div>
                            <div class="info">
                                <h4>Pet Medication</h4>
                                <p>Don’t let your pet go without medication, channel a Vet today</p>
                            </div>
                        </div>
                    </div>
                    <!-- /box_icon -->
                </div>

                <div class="col-xs-12">
                    <div class="box_icon">
                        <div class="icon">
                            <!-- icon -->
                            <div class="image">
                                <img src="{{URL('assets/img/slider-repeat3.jpeg')}}" class="img-responsive" alt="">
                            </div>
                            <div class="info">
                                <h4>Discounted pet products</h4>
                                <p>We provide pet products at discounted rates.</p>
                            </div>
                        </div>
                    </div>
                    <!-- /box_icon -->
                </div>
            </div>
            <!-- /owl-services -->
        </div>
        <!-- /col-md-9 -->
    </div>
    <!-- /container-fluid-->
</section>
<!-- Section About-index -->
<section id="about-index" class="bg-lightcolor1" >
    <div class="container">
        <div class="section-heading text-center">
            <h2>About Us</h2>
        </div>
        <!-- row -->
        <div class="row">
            <div class="col-md-6 col-lg-7 text-center">
                <h3>High Quality Services</h3>
                <p>
                    We are a team of professionals with a similar vision. We believe that pet care should not be left to chance. It is essential for our pets to have guaranteed service when required, at a location convenient to you.

                    We use the latest technology to provide you with this and other essential services to ensure that your pet is well taken care of and happy. With this, we work to challenge the status quo.
                </p>
            </div>
            <!-- /col-md-7-->
            <!-- Parallax object -->
            <div class="parallax-object1 hidden-sm hidden-xs"  data-100-start="right: 0%;"
                 data-center-bottom="right:30%;"  >
                <!-- Image -->
                <img src="{{URL('assets/img/illustrations/petbowl.png')}}" alt="">
            </div>
            <!-- /parallax-object1-->
            <div class="col-md-6 col-lg-5" >
                <img src="{{URL('assets/img/about-index.png')}}" class="img-responsive" alt="">
            </div>
            <!-- /col-md-5-->
        </div>
    </div>
    <!-- /container -->
</section>

{{--<!-- Section Reviews -->--}}
{{--<section id="reviews">--}}
{{--    <div class="container">--}}
{{--        <div class="section-heading text-center">--}}
{{--            <h2>CSR</h2>--}}
{{--        </div>--}}
{{--        <!-- Parallax object -->--}}
{{--        <div class="parallax-object2 hidden-sm hidden-xs hidden-md"--}}
{{--             data-100-start="transform:rotate(-0deg); left:20%;"--}}
{{--             data-top-bottom="transform:rotate(-370deg);">--}}
{{--            <!-- Image -->--}}
{{--            <img src="{{URL('assets/img/illustrations/toy.png')}}" alt="">--}}
{{--        </div>--}}
{{--        <!-- /col-md-3 -->--}}
{{--        <div class="col-md-9 col-md-offset-3">--}}
{{--            <!-- Reviews -->--}}
{{--            <div id="owl-reviews" class="owl-carousel margin1">--}}
{{--                <!-- review 1 -->--}}
{{--                <div class="review">--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <!-- caption -->--}}
{{--                        <div class="review-caption">--}}
{{--                            <h5>Sue Shei</h5>--}}
{{--                            <div class="small-heading">--}}
{{--                                Dog Lover--}}
{{--                            </div>--}}
{{--                            <blockquote>--}}
{{--                                Patatemp dolupta orem retibusam qui commolu--}}
{{--                                Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies,--}}
{{--                                vest ibulum orci eget, viverra.--}}
{{--                            </blockquote>--}}
{{--                        </div>--}}
{{--                        <!-- Profile image -->--}}
{{--                        <div class="review-profile-image">--}}
{{--                            <img src="{{URL('assets/img/review1.jpg')}}" alt=""/>--}}
{{--                        </div>--}}
{{--                        <!--/review profile image -->--}}
{{--                    </div>--}}
{{--                    <!-- /col-xs-12 ends -->--}}
{{--                </div>--}}
{{--                <!-- /review-->--}}
{{--                <!-- review 2 -->--}}
{{--                <div class="review">--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <!-- caption -->--}}
{{--                        <div class="review-caption">--}}
{{--                            <h5>Jonas Smith</h5>--}}
{{--                            <div class="small-heading">--}}
{{--                                Cat Specialist--}}
{{--                            </div>--}}
{{--                            <blockquote>--}}
{{--                                Patatemp dolupta orem retibusam qui commolu--}}
{{--                                Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies,--}}
{{--                                vest ibulum orci eget, viverra.--}}
{{--                            </blockquote>--}}
{{--                        </div>--}}
{{--                        <!-- Profile image -->--}}
{{--                        <div class="review-profile-image">--}}
{{--                            <img src="{{URL('assets/img/review2.jpg')}}" alt=""/>--}}
{{--                        </div>--}}
{{--                        <!--/review profile image -->--}}
{{--                    </div>--}}
{{--                    <!-- /col-xs-12 ends -->--}}
{{--                </div>--}}
{{--                <!-- /review-->--}}
{{--                <!-- review 3 -->--}}
{{--                <div class="review">--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <!-- caption -->--}}
{{--                        <div class="review-caption">--}}
{{--                            <h5>Maria Silva</h5>--}}
{{--                            <div class="small-heading">--}}
{{--                                Exotic Birds Vet--}}
{{--                            </div>--}}
{{--                            <blockquote>--}}
{{--                                Patatemp dolupta orem retibusam qui commolu--}}
{{--                                Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies,--}}
{{--                                vest ibulum orci eget, viverra.--}}
{{--                            </blockquote>--}}
{{--                        </div>--}}
{{--                        <!-- Profile image -->--}}
{{--                        <div class="review-profile-image">--}}
{{--                            <img src="{{URL('assets/img/review3.jpg')}}" alt=""/>--}}
{{--                        </div>--}}
{{--                        <!--/review profile image -->--}}
{{--                    </div>--}}
{{--                    <!-- /col-xs-12 ends -->--}}
{{--                </div>--}}
{{--                <!-- /review-->--}}
{{--                <!-- review 4 -->--}}
{{--                <div class="review">--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <!-- caption -->--}}
{{--                        <div class="review-caption">--}}
{{--                            <h5>Lou Lou</h5>--}}
{{--                            <div class="small-heading">--}}
{{--                                Veterinarian--}}
{{--                            </div>--}}
{{--                            <blockquote>--}}
{{--                                Patatemp dolupta orem retibusam qui commolu--}}
{{--                                Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies,--}}
{{--                                vest ibulum orci eget, viverra.--}}
{{--                            </blockquote>--}}
{{--                        </div>--}}
{{--                        <!-- Profile image -->--}}
{{--                        <div class="review-profile-image">--}}
{{--                            <img src="{{URL('assets/img/review4.jpg')}}" alt=""/>--}}
{{--                        </div>--}}
{{--                        <!--/review profile image -->--}}
{{--                    </div>--}}
{{--                    <!-- /col-xs-12 ends -->--}}
{{--                </div>--}}
{{--                <!-- /review-->--}}
{{--                <!-- review 4 -->--}}
{{--                <div class="review">--}}
{{--                    <div class="col-xs-12">--}}
{{--                        <!-- caption -->--}}
{{--                        <div class="review-caption">--}}
{{--                            <h5>James Doe</h5>--}}
{{--                            <div class="small-heading">--}}
{{--                                Pet Lover--}}
{{--                            </div>--}}
{{--                            <blockquote>--}}
{{--                                Patatemp dolupta orem retibusam qui commolu--}}
{{--                                Fusce mollis imperdiet interdum donec eget metus auguen unc vel mauris ultricies,--}}
{{--                                vest ibulum orci eget, viverra.--}}
{{--                            </blockquote>--}}
{{--                        </div>--}}
{{--                        <!-- Profile image -->--}}
{{--                        <div class="review-profile-image">--}}
{{--                            <img src="{{URL('assets/img/review5.jpg')}}" alt=""/>--}}
{{--                        </div>--}}
{{--                        <!--/review profile image -->--}}
{{--                    </div>--}}
{{--                    <!-- /col-xs-12 ends -->--}}
{{--                </div>--}}
{{--                <!-- /review-->--}}
{{--            </div>--}}
{{--            <!-- /owl-carousel -->--}}
{{--        </div>--}}
{{--        <!-- /col-md-10 -->--}}
{{--    </div>--}}
{{--    <!-- /.container -->--}}
{{--</section>--}}
{{--<!-- /Section ends -->--}}
<!-- callout-->
{{--<section class="callout container-fluid no-padding">--}}
{{--    <!-- row-fluid -->--}}
{{--    <div class="row-fluid">--}}
{{--        <div class="col-lg-8 col-md-12 no-padding" data-start="right: 20%;"--}}
{{--             data-center="right:0%;">--}}
{{--            <!-- image  -->--}}
{{--            <img src="{{URL('assets/img/call1.jpg')}}" class="img-responsive img-rounded" alt="">--}}
{{--        </div>--}}
{{--        <!-- text box  -->--}}
{{--        <div class="callout-box col-lg-6 col-lg-offset-6 bg-darkcolor"  data-start="left: 20%;"--}}
{{--             data-center="left:0%;">--}}
{{--            <h3>We Love Pets</h3>--}}
{{--            <p>Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus vi tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>--}}
{{--            <a href="contact.html" class="btn">Contact us</a>--}}
{{--        </div>--}}
{{--        <!-- /callout-box  -->--}}
{{--    </div>--}}
{{--    <!-- /row-fluid -->--}}
{{--</section>--}}
<!-- /callout -->
<!-- Section Stats -->
<section id="stats" class="bg-lightcolor2">
    <div class="section-heading text-center">
        <h2>Our Stats</h2>
    </div>
    <div class="container">
        <div class="col-lg-9 col-md-8 col-sm-8">
            <div class="text-center">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Number 1 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max='180' data-delay='20' data-increment="19">0</div>
                    <h5>Customers</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Number 2 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max='16' data-delay='10' data-increment="9">0</div>
                    <h5>Professionals</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Number 3 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max='67' data-delay='20' data-increment="19">0</div>
                    <h5>Pets Hosted</h5>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <!-- Number 4 -->
                    <div class="numscroller" data-slno='1' data-min='0' data-max='50' data-delay='10' data-increment="9">0</div>
                    <h5>Products</h5>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Section Ends-->

<!-- Section Contact  -->
<section id="contact-index">
    <div class="container">
        <div class="section-heading">
            <h2>Contact Us</h2>
        </div>
        <div class="col-lg-7 col-lg-offset-5 col-md-8 col-md-offset-2">
            <!-- contact info -->
            <h4>Information </h4>
            <ul class="list-inline">
                <li><i class="fa fa-envelope"></i><a href="mailto:youremailaddress">info@petdoc.lk</a></li>
                <li><i class="fa fa-phone margin-icon"></i><a href="tel:(076) 374-5257">Call Us (076) 374-5257</a></li>
            </ul>
            <!-- address info -->
            <p>Submit the inquiry through the below form.
            </p>
            <h4 class="margin1">Send us a Message</h4>
            <!-- Form Starts -->
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
        <!-- Contact -->
        <!-- /col-lg-5-->
    </div>
    <!-- /container -->
</section>
<!-- /Section ends -->
<div class="container-fluid">

</div>
@stop
