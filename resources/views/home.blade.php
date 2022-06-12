@extends('layouts.app')

@section('title')
    Home
@endsection
<?php $nav = 'Home'; ?>

@section('content')
    <!-- Start Header Section -->
    <div class="banner">
        <div class="overlay">
            <div class="container">
                <div class="intro-text">
                    <h1>Welcome To <span>Tech Cloud</span></h1>
                    <p>Generate a flood of new business with the <br> power of a digital media platform</p>
                    <a href="#feature" class="page-scroll btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->


    <!-- Start About Us Section -->
    <section id="about-section" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>About Us</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="about-img">
                        <img src="{{ asset('asset') }}/images/corporate1.jpg" class="img-responsive" alt="About images">
                        <div class="head-text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec iaculis metus vitae ligula
                                elementum ut luctus lorem facilisis.</p>
                            <span>CEO, Themebean</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="about-text">
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo. Sed ut perspiciatis unde omnis iste natus
                            error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
                            ab illo inventore veritatis et quasi. Sed ut perspiciatis unde omnis iste natus error sit
                            voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
                            inventore veritatis et quasi.</p>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                            laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                            architecto beatae vitae dicta sunt explicabo.</p>
                    </div>

                    <div class="about-list">
                        <h4>Some important Feature</h4>
                        <ul>
                            <li><i class="fa fa-check-square"></i>Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium.</li>
                            <li><i class="fa fa-check-square"></i>Lorem ipsum dolor sit amet, consectetur adipiscing
                                adipiscing.</li>
                            <li><i class="fa fa-check-square"></i>Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusan.</li>
                            <li><i class="fa fa-check-square"></i>Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</li>
                            <li><i class="fa fa-check-square"></i>Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem.</li>
                            <li><i class="fa fa-check-square"></i>Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</li>
                        </ul>

                        <h4>More Feature</h4>
                        <ul>
                            <li><i class="fa fa-check-square"></i>Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium.</li>
                            <li><i class="fa fa-check-square"></i>Lorem ipsum dolor sit amet, consectetur adipiscing
                                adipiscing.</li>
                            <li><i class="fa fa-check-square"></i>Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusan.</li>
                            <li><i class="fa fa-check-square"></i>Lorem ipsum dolor sit amet, consectetur adipiscing
                                elit.</li>
                        </ul>
                    </div>

                </div>



            </div>
        </div>
    </section>


    <!-- Start Call to Action Section -->
    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow zoomIn" data-wow-duration="2s" data-wow-delay="300ms">
                    <p>Awesome Aires Template is ready for <br> Business, Agency, Landing or Creative Portfolio<br>Aires
                        is Responsive and help you to grow your business</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End Call to Action Section -->




    <!-- Start Team Member Section -->
    <section id="team-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Our Team</h2>
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                    <div class="team-member">
                        <img src="{{ asset('asset') }}/images/team/team-1.jpg" class="img-responsive" alt="">
                        <div class="team-details">
                            <h4>John Doe</h4>
                            <p>Founder & Director</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                    <div class="team-member">
                        <img src="{{ asset('asset') }}/images/team/team-2.jpg" class="img-responsive" alt="">
                        <div class="team-details">
                            <h4>John Doe</h4>
                            <p>Founder & Director</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="900ms">
                    <div class="team-member">
                        <img src="{{ asset('asset') }}/images/team/team-3.jpg" class="img-responsive" alt="">
                        <div class="team-details">
                            <h4>John Doe</h4>
                            <p>Founder & Director</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
                <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1200ms">
                    <div class="team-member">
                        <img src="{{ asset('asset') }}/images/team/team-4.jpg" class="img-responsive" alt="">
                        <div class="team-details">
                            <h4>John Doe</h4>
                            <p>Founder & Director</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div><!-- /.col-md-3 -->
            </div>
        </div>
    </section>
    <!-- End Team Member Section -->


    <!-- Start Portfolio Section -->
    <section id="portfolio" class="portfolio-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Our Portfolio</h2>
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <!-- Start Portfolio items -->
                    <ul id="portfolio-list">
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                            <div class="portfolio-item">
                                <img src="{{ asset('asset') }}/images/portfolio/img1.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption">
                                    <h4>Portfolio Title</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium</p>
                                    <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i
                                            class="fa fa-magic"></i></a>
                                    <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="600ms">
                            <div class="portfolio-item">
                                <img src="{{ asset('asset') }}/images/portfolio/img2.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption">
                                    <h4>Portfolio Title</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium</p>
                                    <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i
                                            class="fa fa-magic"></i></a>
                                    <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="900ms">
                            <div class="portfolio-item">
                                <img src="{{ asset('asset') }}/images/portfolio/img3.jpg" class="img-responsive" alt="" />
                                <div class="portfolio-caption">
                                    <h4>Portfolio Title</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium</p>
                                    <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i
                                            class="fa fa-magic"></i></a>
                                    <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1200ms">
                            <div class="portfolio-item">
                                <img src="{{ asset('asset') }}/images/portfolio/img4.jpg" class="img-responsive"
                                    alt="" />
                                <div class="portfolio-caption">
                                    <h4>Portfolio Title</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium</p>
                                    <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i
                                            class="fa fa-magic"></i></a>
                                    <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1500ms">
                            <div class="portfolio-item">
                                <img src="{{ asset('asset') }}/images/portfolio/img5.jpg" class="img-responsive"
                                    alt="" />
                                <div class="portfolio-caption">
                                    <h4>Portfolio Title</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium</p>
                                    <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i
                                            class="fa fa-magic"></i></a>
                                    <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </li>
                        <li class="wow fadeInLeft" data-wow-duration="2s" data-wow-delay="1800ms">
                            <div class="portfolio-item">
                                <img src="{{ asset('asset') }}/images/portfolio/img6.jpg" class="img-responsive"
                                    alt="" />
                                <div class="portfolio-caption">
                                    <h4>Portfolio Title</h4>
                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                                        praesentium</p>
                                    <a href="#portfolio-modal" data-toggle="modal" class="link-1"><i
                                            class="fa fa-magic"></i></a>
                                    <a href="#" class="link-2"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                        </li>


                    </ul>
                    <!-- End Portfolio items -->
                </div>
            </div>
        </div>
    </section>
    <!-- End Portfolio Section -->


    <!-- Start Service Section -->
    <section id="service-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center wow fadeInDown" data-wow-duration="2s" data-wow-delay="50ms">
                        <h2>Our Services</h2>
                        <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="#"><i class="fab fa-skyatlas"></i></a>
                        <h2>RESPONSIVE DESIGN</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="#"><i class="fa fa-magic"></i></a>
                        <h2>RESPONSIVE DESIGN</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="#"><i class="fa fa-gift"></i></a>
                        <h2>RESPONSIVE DESIGN</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="#"><i class="far fa-gem"></i></a>
                        <h2>RESPONSIVE DESIGN</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="#"><i class="fab fa-wordpress"></i></a>
                        <h2>RESPONSIVE DESIGN</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="#"><i class="fab fa-forumbee"></i></a>
                        <h2>RESPONSIVE DESIGN</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="#"><i class="fa fa-bicycle"></i></a>
                        <h2>RESPONSIVE DESIGN</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="#"><i class="fab fa-foursquare"></i></a>
                        <h2>RESPONSIVE DESIGN</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Start Service Section -->



    <!-- Start Testimonial Section -->
    <section id="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="testimonial-wrapper">
                        <div class="testimonial-item">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo. </p>
                            <img src="{{ asset('asset') }}/images/team/team-1.jpg" alt="Testimonial images">
                            <h5>John Doe</h5>
                            <div class="desgnation">CEO, ThemeBean</div>
                        </div>
                        <div class="testimonial-item">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo.</p>
                            <img src="{{ asset('asset') }}/images/team/team-2.jpg" alt="Testimonial images">
                            <h5>John Doe</h5>
                            <div class="desgnation">CEO, ThemeBean</div>
                        </div>
                        <div class="testimonial-item">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo.</p>
                            <img src="{{ asset('asset') }}/images/team/team-3.jpg" alt="Testimonial images">
                            <h5>John Doe</h5>
                            <div class="desgnation">CEO, ThemeBean</div>
                        </div>
                        <div class="testimonial-item">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo.</p>
                            <img src="{{ asset('asset') }}/images/team/team-4.jpg" alt="Testimonial images">
                            <h5>John Doe</h5>
                            <div class="desgnation">CEO, ThemeBean</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Testimonial Section -->


    <!-- Start Client Section -->
    <div id="client-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="client-box">
                        <ul class="client-list">
                            <li><a href="#"><img src="{{ asset('asset') }}/images/clients/client1.png"
                                        class="img-responsive" alt="Clients Logo"></a></li>
                            <li><a href="#"><img src="{{ asset('asset') }}/images/clients/client2.png"
                                        class="img-responsive" alt="Clients Logo"></a></li>
                            <li><a href="#"><img src="{{ asset('asset') }}/images/clients/client3.png"
                                        class="img-responsive" alt="Clients Logo"></a></li>
                            <li><a href="#"><img src="{{ asset('asset') }}/images/clients/client4.png"
                                        class="img-responsive" alt="Clients Logo"></a></li>
                            <li><a href="#"><img src="{{ asset('asset') }}/images/clients/client5.png"
                                        class="img-responsive" alt="Clients Logo"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Client Section -->
@endsection
