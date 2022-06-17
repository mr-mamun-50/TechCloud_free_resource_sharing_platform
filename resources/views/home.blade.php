@extends('layouts.app')

@section('title')
    Home
@endsection
<?php $nav = 'Home'; ?>

@php
$about = DB::table('about')->first();
$team = DB::table('team')->get();
@endphp

@section('content')
    <!-- Start Header Section -->
    <div class="banner">
        <div class="overlay">
            <div class="container">
                <div class="intro-text">
                    <h1>Welcome To <span>Tech Cloud</span></h1>
                    <p>Generate a flood of new business with the <br> power of a digital media platform</p>
                    <a href="#about-section" class="page-scroll btn btn-primary">Explore More</a>
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
                        <img src="{{ asset('images/homepage') . '/' . $about->image }}" class="img-responsive"
                            alt="About images">
                        <div class="head-text">
                            <p>{{ $about->qoi }}</p>
                            <span>{{ $about->qoib }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    @php
                        echo $about->description;
                    @endphp
                </div>
            </div>
        </div>
    </section>


    <!-- Start Call to Action Section -->
    <section class="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-md-12 wow zoomIn" data-wow-duration="2s" data-wow-delay="300ms">
                    <p>{{ $about->sos }}</p>
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
                @foreach ($team as $member)
                    <div class="col-md-3 wow fadeInLeft" data-wow-duration="2s" data-wow-delay="300ms">
                        <div class="team-member">
                            <img src="{{ asset('images/homepage') . '/' . $member->image }}" class="img-responsive"
                                alt="">
                            <div class="team-details">
                                <h4>{{ $member->name }}</h4>
                                <p>{{ $member->designation }}</p>
                                <ul>
                                    <li><a href="{{ $member->facebook }}" target="blank"><i
                                                class="fab fa-facebook"></i></a></li>
                                    <li><a href="{{ $member->twitter }}" target="blank"><i class="fab fa-twitter"></i></a>
                                    </li>
                                    <li><a href="{{ $member->github }}" target="blank"><i class="fab fa-github"></i></a>
                                    </li>
                                    <li><a href="{{ $member->linkedin }}" target="blank"><i
                                                class="fab fa-linkedin"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End Team Member Section -->



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
                        <a href="{{ route('services.softwares') }}"><i class="bi bi-microsoft"></i></a>
                        <h2>PREMIUM SOFTWARES FOR FREE</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="{{ route('services.designs') }}"><i class="fas fa-bezier-curve"></i></a>
                        <h2>PREMIUM DESIGNS FOR FREE</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="{{ route('tutorials.article') }}"><i class="bi bi-newspaper"></i></a>
                        <h2>VARIOUS ARTICLES</h2>
                        <p>Donec odio. Quisque volutpat mattis eros. Nullam malesuada </p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services-post">
                        <a href="{{ route('tutorials.video') }}"><i class="fas fa-chalkboard-teacher"></i></a>
                        <h2>FREE CRASH COURCES</h2>
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
                        @foreach ($team as $member)
                            <div class="testimonial-item">
                                <p>{{ $member->quote }}</p>
                                <img src="{{ asset('images/homepage') . '/' . $member->image }}"
                                    alt="Testimonial images">
                                <h5>{{ $member->name }}</h5>
                                <div class="desgnation">{{ $member->designation }}</div>
                            </div>
                        @endforeach
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
