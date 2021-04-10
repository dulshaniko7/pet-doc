@extends('layouts.default')
@section('styles')
    <style>
        h4{
            font-size: 1.5em;
        }
    </style>

@endsection
@section('content')

<section id="services" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <!-- Heading -->
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Our Services</h1>
        </div>
    </div>
    <!-- container-->
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h3>Everything for your Pet</h3>
                <p>We offer a variety of services from vet channeling to pet grooming to pet products.
                    Talk to us about this and any other services you may require for your cherished pet.
                </p>
                <!-- ul custom-->
            </div>
            <!-- /col-md-7-->
            <div class="col-md-5">
                <img src="img/services.jpg" class="center-block img-responsive" alt="">
            </div>
            <!-- col-md-5-->
        </div>
        <!-- /row-->
        <div class="row">
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
                                <p>We can channel e-Vet services for a time convenient for you. </p>
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
                                <p>Groom and care for your pet, we will get the time and place for you.</p>
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
                                <p>Worried about a required surgery? We will take care of channeling the Vet.</p>
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
                                <p>Don’t let your pet go without medication, channel a Vet today.</p>
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
        <!-- /row -->
        <div class="row">
            <h3>CSR</h3>
            <p>In addition to our work for your pets, we will be partnering with Embark shortly in our CSR endeavors.
            </p>
            <ul class="custom no-margin">
                <li>Caring for your precious pet</li>
                <li>We care for your pet</li>
                <li>Help us take care of your pet</li>
                <li>The best care for your precious pet</li>
            </ul>
        </div>
    </div>
    <!-- /container -->
</section>

@stop
