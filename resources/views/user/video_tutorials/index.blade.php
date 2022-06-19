@extends('layouts.app')

@section('title')
    Tutorials | Videos
@endsection
<?php $nav = 'Tutorials'; ?>

@section('content')
    <!-- Start Header Section -->
    <div class="page-header mt-0">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Video Tutorials</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->





    <!-- Start Blog Page Section -->
    <div class="container mt-4">
        <div class="row">

            <!-- Start Blog Body Section -->
            <div class="col-md-8 blog-body mb-5">
                <table id="myTable" class="table table-borderless table-sm">
                    <thead>
                        <tr>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $item)
                            <tr>
                                <td>
                                    <!-- Start Blog post -->
                                    <div class="blog-post card">
                                        <div class="post-img">
                                            <iframe width="100%" height="420"
                                                src="https://www.youtube.com/embed/{{ $item->video_link }}"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="card-body">
                                            <h1 class="post-title"><a href="#">{{ $item->title }}</a></h1>

                                            <ul class="post-meta">
                                                <li><i class="fas fa-clock"></i>
                                                    {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}
                                                </li>
                                                <li><i class="fa fa-user"></i><a href="#">{{ $item->username }}</a>
                                                </li>
                                                <li><i class="fas fa-tag"></i><a
                                                        href="#">{{ $item->category_name }}</a></li>
                                                <li><i class="fa fa-tags"></i><a
                                                        href="#">{{ $item->subcategory_name }}</a>
                                                </li>
                                            </ul>
                                            <hr>
                                            <code>{{ $item->tags }}</code>
                                        </div>
                                    </div>
                                    <!-- End Blog Post -->
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <!-- End Blog Body Section -->

            <!-- Start Sidebar Section -->
            <div class="col-md-4 sidebar right-sidebar">

                <!-- Start Recent Post Widget -->
                <div class="widget widget-recent-post">

                    <div class="section-heading-2">
                        <h3 class="section-title mb-3">
                            <span>Recent Post</span>
                        </h3>
                    </div>

                    <div class="media">
                        <div class="media-left">
                            <a href="{{ route('tutorials.view', $R1->id) }}">
                                <img class="media-object" src="{{ asset('public/images/articles') . '/' . $R1->image }}"
                                    alt="...">
                            </a>
                        </div>
                        <div class="media-body ml-2">
                            <h4 class="media-heading"><a
                                    href="{{ route('tutorials.view', $R1->id) }}">{{ $R1->title }}</a>
                            </h4>
                            <ul>
                                <li><a href="#">{{ $R1->username }}</a></li>
                                <li><small><i>({{ date('d F, Y', strtotime($R1->post_date)) }})</i></small></li>
                            </ul>
                        </div>
                    </div>

                    <div class="media my-3">
                        <div class="media-left">
                            <a href="{{ route('services.softwares') }}">
                                <img class="media-object"
                                    src="{{ asset('public/images/thumbnails') . '/' . $R2->thumb }}" alt="...">
                            </a>
                        </div>
                        <div class="media-body ml-2">
                            <h4 class="media-heading"><a
                                    href="{{ route('services.softwares') }}">{{ $R2->name }}</a>
                            </h4>
                            <ul>
                                <li><a href="#">{{ $R2->username }}</a></li>
                                <li><small><i>({{ date('d F, Y', strtotime($R2->post_date)) }})</i></small></li>
                            </ul>
                        </div>
                    </div>

                    <div class="media my-3">
                        <div class="media-left">
                            <a href="{{ route('services.designs') }}">
                                <img class="media-object"
                                    src="{{ asset('public/images/thumbnails') . '/' . $R3->thumb }}" alt="...">
                            </a>
                        </div>
                        <div class="media-body ml-2">
                            <h4 class="media-heading"><a href="{{ route('services.designs') }}">{{ $R3->name }}</a>
                            </h4>
                            <ul>
                                <li><a href="#">{{ $R3->username }}</a></li>
                                <li><small><i>({{ date('d F, Y', strtotime($R3->post_date)) }})</i></small></li>
                            </ul>
                        </div>
                    </div>

                    <div class="media my-3">
                        <div class="media-left">
                            <a href="{{ route('tutorials.video') }}">
                                <img class="media-object"
                                    src="{{ asset('public/images/thumbnails/video_tutorials.png') }}" alt="...">
                            </a>
                        </div>
                        <div class="media-body ml-2">
                            <h4 class="media-heading"><a href="{{ route('tutorials.video') }}">{{ $R4->title }}</a>
                            </h4>
                            <ul>
                                <li><a href="#">{{ $R4->username }}</a></li>
                                <li><small><i>({{ date('d F, Y', strtotime($R4->post_date)) }})</i></small></li>
                            </ul>
                        </div>
                    </div>

                </div>
                <!-- End Recent Post Widget -->


                <!-- Start Blog categories widget -->
                <div class="widget widget-categories">

                    <div class="section-heading-2">
                        <h3 class="section-title mb-3">
                            <span>Resource Categories</span>
                        </h3>
                    </div>

                    <ul>
                        @foreach ($category as $item)
                            <li>
                                <i class="fa fa-angle-double-right"></i>
                                <a href="#">{{ $item->category_name }}</a>
                                {{-- <a href="#" class="cat-counter">({{ $item->category_name->count() }})</a> --}}
                            </li>
                        @endforeach
                    </ul>

                </div>
                <!-- End Blog categories widget -->


            </div>
            <!-- End Sidebar Section -->

        </div>
    </div>
    <!-- End Blog Page Section -->
@endsection
