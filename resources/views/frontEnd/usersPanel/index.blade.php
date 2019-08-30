@extends('frontEnd.master')

@section('title', '')

@section('body')

    <section id="intro" class="clearfix">

        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                @forelse($sliders as $slider)
                    <div class="carousel-item {{ $loop->index==0? 'active': '' }}">
                        <img class="d-block w-100" src="{{asset('frontEnd/Slider/'.$slider->image)}}" alt="First slide">
                        <div class="carousel-caption d-block pb-5 mb-5">
                            <a href="{{ route('getStart') }}" class="btn btn-danger">{{ $slider->button_text }}</a>
                        </div>
                    </div>
                @empty
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{asset('/')}}frontEnd/Slider/s1.jpg" alt="First slide">
                        <div class="carousel-caption d-block pb-5 mb-5">
                            <a href="{{ route('getStart') }}" class="btn btn-danger">Get Start</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('/')}}frontEnd/Slider/s2.jpg" alt="Second slide">
                        <div class="carousel-caption d-block pb-5 mb-5">
                            <a href="{{ route('getStart') }}" class="btn btn-danger">Get Start</a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{asset('/')}}frontEnd/Slider/s3.jpg" alt="Third slide">
                        <div class="carousel-caption d-block pb-5 mb-5">
                            <a href="{{ route('getStart') }}" class="btn btn-danger">Get Start</a>
                        </div>
                    </div>
                @endforelse
            </div>
            <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <!--==========================
        Social Section
============================-->


<div class="icon-bar d-md-block d-none">
    <a href="https://www.facebook.com/EpeakUp/" class="facebook" target="_blank"><i class="fa fa-facebook"></i></a>
    <a href="#" class="twitter" target="_blank"><i class="fa fa-whatsapp"></i></a>
    <a href="https://www.instagram.com/epeakup.au/" class="instagram" target="_blank"><i class="fa fa-instagram"></i></a>
     <a href="https://www.youtube.com/channel/UCg4KKHmBd0MsWbFoTfq2Ruw/" class="youtube" target="_blank"><i class="fa fa-youtube-play"></i></a>
</div>


        <!--==========================
                  End Section
        ============================-->


    </section>






    <main id="main">

        <section id="about">
            <div class="container">

                <header class="section-header">
                    <h3>Services</h3>
                    <p>Hi,We are offering lots of services.Please have a look and pick up your desire Service</p>
                </header>
            </div>
        </section><!-- #about -->
        <!--==========================
          Services Section
        ============================-->
        <section id="services" class="section-bg">
            <div class="container">

                <div class="row">
                    <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-ion-chatbox" style="color: #ff689b;"></i></div>
                            <h4 class="title text-center"><a href="">bKash Payment Service</a></h4>
                            <p class="description">
                                bKash is one of the easiest and safest way to send or receive payment in Bangladesh.
                                Enter the bKash account number and send payment direct from your Poli/Paypal & bank,
                                debit card, VISA, payment to Bangladesh from overseas for your family through bKash
                                within 24 hours.

                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-ion-chatbox" style="color: #e9bf06;"></i></div>
                            <h4 class="title text-center"><a href="">Rocket Payment Service</a></h4>
                            <p class="description">
                                Rocket is one of the easiest and safest ways to send or receive payment in Bangladesh.
                                Enter the Rocket account number and send payment direct from your Poli/Paypal & bank,
                                debit card, VISA, payment to Bangladesh from overseas for your family through Rocket
                                within 24 hours.

                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-ion-chatbox" style="color: #ff689b;"></i></div>
                            <h4 class="title text-center"><a href="">Grameen Phone Bangladesh Recharge Online</a></h4>
                            <p class="description">
                                Recharge Bangladesh mobile online via epeakup.com , the trusted and fast site for
                                online mobile credit in Bangladesh. Flexiload Grameen Phone online 24/7 for your family
                                and friends. We accept Poli/Paypal & VISA, Mastercard, debit card, bank transfer. Fast,
                                secure and on time Grameenphone mobile top up.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-ion-chatbox" style="color: #e9bf06;"></i></div>
                            <h4 class="title text-center"><a href="">Airtel Bangladesh Recharge Online</a></h4>
                            <p class="description">
                                Recharge Bangladesh mobile online via epeakup.com , the trusted and fast site for
                                online mobile credit in Bangladesh. Flexiload Airtel  online 24/7 for your family and
                                friends. We accept Poli/Paypal & VISA, Mastercard, debit card, bank transfer. Fast,
                                secure and on time Airtel mobile top-up.

                            </p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 offset-lg-1 wow bounceInUp" data-wow-delay="0.1s"
                         data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-ion-chatbox" style="color: #3fcdc7;"></i></div>
                            <h4 class="title text-center"><a href="">Robi Recharge Online</a></h4>
                            <p class="description">
                                Recharge Bangladesh mobile online via epeakup.com  , the trusted and fast site for
                                online mobile credit in Bangladesh. Flexiload Robi online 24/7 for your family and
                                friends. We accept Poli/Paypal & VISA, Mastercard, debit card, bank transfer. Fast,
                                secure and on time Robi mobile top-up.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-5 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                        <div class="box">
                            <div class="icon"><i class="ion-ios-ion-chatbox" style="color:#41cf2e;"></i></div>
                            <h4 class="title text-center">
                                <a href="">
                                    Banglalink Recharge Online
                                </a>
                            </h4>
                            <p class="description">
                                Recharge Bangladesh mobile online via epeakup.com, the trusted and fast site for
                                online mobile credit in Bangladesh. Flexiload Banglalink online 24/7 for your family and
                                friends. We accept Poli/Paypal & VISA, Mastercard, debit card, bank transfer. Fast,
                                secure and on time Banglalink mobile top-up.

                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #services -->

        <!--==========================
          Why Us Section
        ============================-->
        <section id="why-us" class="wow fadeIn">
            <div class="container">
                <header class="section-header">
                    <h3 class="text-dark">Why choose epeakup ?</h3>
                </header>

                <div class="row row-eq-height justify-content-center">

                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card wow bounceInUp">
                            <i class="fa fa-money"></i>
                            <i class="fas fa-money-bill-alt"></i>
                            <div class="card-body">
                                <h2 class="card-title"><b>Lower of cost</b></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card wow bounceInUp">
                            <i class="fa fa-rocket"></i>
                            <div class="card-body">
                                <h2 class="card-title"><b>Faster</b></h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card wow bounceInUp">
                            <i class="fa fa-hand-o-right"></i>
                            <div class="card-body">
                                <h2 class="card-title"><b>Easy to use</b></h2>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card wow bounceInUp">
                            <i class="fa fa-simplybuilt"></i>
                            <div class="card-body">
                                <h2 class="card-title"><b>Very Simple</b></h2>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card wow bounceInUp">
                            <i class="fa fa-gavel"></i>
                            <div class="card-body">
                                <h2 class="card-title"><b>Trusted</b></h2>

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <div class="card wow bounceInUp">
                            <i class="fa fa-cog"></i>
                            <div class="card-body">
                                <h2 class="card-title"><b>Secure</b></h2>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-toggle="counter-up">
                            @if($users != 0)
                                {{ $users }}
                            @endif
                        </span>
                        <p>Users</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-toggle="counter-up">50</span>
                        <p>total used time</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-toggle="counter-up">365</span>
                        <p>Support</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-toggle="counter-up">0</span>
                        <p>Issues</p>
                    </div>

                </div>

            </div>
        </section>


        <!--==========================
          Clients Section
        ============================-->
        <section id="clients" class="section-bg">

            <div class="container">

                <div class="section-header">
                    <h3>We Are Available For</h3>
                </div>

                <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                    <div class="col-lg-4 col-md-4 col-lg-4">
                        <div class="client-logo">
                            <img src="{{asset('/')}}frontEnd/img/clients/client-1.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-lg-4">
                        <div class="client-logo">
                            <img src="{{asset('/')}}frontEnd/img/clients/client-2.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-lg-4">
                        <div class="client-logo">
                            <img src="{{asset('/')}}frontEnd/img/clients/Airtel.jpg" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-lg-4">
                        <div class="client-logo">
                            <img src="{{asset('/')}}frontEnd/img/clients/robi.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-lg-4">
                        <div class="client-logo">
                            <img src="{{asset('/')}}frontEnd/img/clients/bl.png" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-lg-4">
                        <div class="client-logo">
                            <img src="{{asset('/')}}frontEnd/img/clients/gp.png" class="img-fluid" alt="">
                        </div>
                    </div>

                </div>

            </div>

        </section>
        <!--==========================
       About Us Section
     ============================-->
        <section id="about">
            <div class="container">

                <header class="section-header">
                    <h3>About Us</h3>
                </header>

                <div class="row about-container">
                    <div class="col-lg-6 content order-lg-1 order-2">
                        <p>
                            Epeakup.com is powered by Easily bkash/Rocket Payment and Mobile Top-up Service which has
                            start at Australia and has been providing bkash/ Rocket and Mobile Top up Service in all
                            major cities in Australia for the last few years.
                        </p>

                        <div class="icon-box wow fadeInUp">
                            <div class="icon"><i class="fa fa-check-square-o"></i></div>
                            <p class="description">
                                Epeakup.com is Registered and regulated by the rules and regulations governed by
                                Australia.
                            </p>
                        </div>

                        <div class="icon-box wow fadeInUp" data-wow-delay="0.2s">
                            <div class="icon"><i class="fa fa-check-square-o"></i></div>
                            <p class="description">
                                Our company is managed by people who have extensive experience in <b>bkash/ Rocket &
                                    Mobile Top-Up</b>, consumer payments processing and data security.
                            </p>
                        </div>

                        <div class="icon-box wow fadeInUp" data-wow-delay="0.4s">
                            <div class="icon"><i class="fa fa-check-square-o"></i></div>
                            <p class="description">
                                We understand how important each and every payment service is to our customers and are
                                committed to earning your business. With in short time anyone can <b>bkash/ Rocket/
                                    Mobile Top-up</b> to Bangladesh.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 content order-lg-1 order-2">
                        <div class="features">
{{--                             <h2>Features of Epeakup.com</h2>
 --}}                            <ul class="list-group mt-5">
                                <li class="list-group-item">Free Registration from any part of the world</li>
                                <li class="list-group-item">Easy payment option</li>
                                <li class="list-group-item">Safe - Secure – Reliable</li>
                                <li class="list-group-item">Free Sign up</li>
                                <li class="list-group-item">For Bkash/Rocket fees will be charged $4.5 AUD</li>
                                <li class="list-group-item">For Top Up fees will be charged $2 AUD</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- #about -->

        <!--==========================
          Clients Section 
        ============================-->

        <!--==========================
          Contact Section
        ============================-->
        <section id="contact">
            <div class="container">

                <div class="section-header">
                    <h3>Contact Us</h3>
                </div>

                <div class="row wow fadeInUp">

                    <div class="col-lg-6 offset-lg-3">

                        <div class="form">
                            <div id="sendmessage">Your message has been sent.Thank you!</div>
                            <div id="errormessage"></div>
                            <form action="{{ route('issue.send') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <label for="name"></label>
                                        <input type="text" name="name" class="form-control" id="name"
                                               placeholder="Your Name" data-rule="minlen:4"
                                               data-msg="Please enter at least 4 chars">
                                        <div class="validation"></div>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="email"></label>
                                        <input type="email" class="form-control" name="email" id="email"
                                               placeholder="Your Email" data-rule="email"
                                               data-msg="Please enter a valid email">
                                        <div class="validation"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="subject"></label>
                                    <input type="text" class="form-control" name="subject" id="subject"
                                           placeholder="Subject" data-rule="minlen:4"
                                           data-msg="Please enter at least 8 chars of subject"/>
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <label for="message"></label>
                                    <textarea id="message" class="form-control" name="message" rows="5"
                                              data-rule="required" data-msg="Please write something for us"
                                              placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>
                                <div class="text-center">
                                    <input type="submit" title="Send Message" value="Send Message" class="btn btn-primary rounded">
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>
               
                </div>

            </div>
        </section><!-- #contact -->

    </main>
@endsection