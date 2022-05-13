@extends('layouts.app')

@section('title')
    Tutorials | Articles
@endsection

@section('content')
    <!-- Start Header Section -->
    <div class="page-header mt-4">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Article Tutorials</h1>
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
            <div class="col-md-8 blog-body">

                @foreach ($articles as $item)
                    <!-- Start Blog post -->
                    <div class="blog-post card">
                        <div class="post-img">
                            <img src="{{ asset('images/articles') . '/' . $item->image }}" class="img-responsive"
                                alt="Blog image">
                        </div>
                        <div class="card-body">
                            <h1 class="post-title"><a href="#">{{ $item->title }}</a></h1>

                            <ul class="post-meta">
                                <li><i class="fas fa-clock"></i>
                                    {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}
                                </li>
                                <li><i class="fa fa-user"></i><a href="#">{{ $item->username }}</a></li>
                                <li><i class="fas fa-tag"></i><a href="#">{{ $item->category_name }}</a></li>
                                <li><i class="fa fa-tags"></i><a href="#">{{ $item->subcategory_name }}</a></li>
                                <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                            </ul>
                            <hr>
                            <p class="post-content"><?php echo $item->description; ?></p>
                            <a href="#" class="btn btn-primary readmore">Read more...<i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                    <!-- End Blog Post -->
                @endforeach




                <!-- Start Pagination -->
                {{ $articles->links('pagination::bootstrap-5') }}

                {{-- <nav>
                    <ul class="pagination">
                        <li class="disabled"><a href="#" aria-label="Start">Start</a></li>
                        <li class="disabled"><a href="#" aria-label="Previous">Prev</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">Next</a></li>
                        <li><a href="#">End</a></li>
                    </ul>
                </nav> --}}
                <!-- End Pagination -->

            </div>
            <!-- End Blog Body Section -->

            <!-- Start Sidebar Section -->
            <div class="col-md-4 sidebar right-sidebar">


                <!-- Start Flickr Widget -->
                <div class="widget flickr-widget">

                    <div class="section-heading-2">
                        <h3 class="section-title mb-3">
                            <span>Flickr Stream</span>
                        </h3>
                    </div>

                    <ul class="flickr-list">
                        <li>
                            <a href="{{ asset('asset') }}/images/flickr/8.jpg" data-lightbox="picture-1">
                                <img src="{{ asset('asset') }}/images/flickr/8.jpg" alt="" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('asset') }}/images/flickr/7.jpg" data-lightbox="picture-2">
                                <img src="{{ asset('asset') }}/images/flickr/7.jpg" alt="" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('asset') }}/images/flickr/6.jpg" data-lightbox="picture-3">
                                <img src="{{ asset('asset') }}/images/flickr/6.jpg" alt="" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('asset') }}/images/flickr/5.jpg" data-lightbox="picture-4">
                                <img src="{{ asset('asset') }}/images/flickr/5.jpg" alt="" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('asset') }}/images/flickr/4.jpg" data-lightbox="picture-5">
                                <img src="{{ asset('asset') }}/images/flickr/4.jpg" alt="" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('asset') }}/images/flickr/3.jpg" data-lightbox="picture-6">
                                <img src="{{ asset('asset') }}/images/flickr/3.jpg" alt="" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('asset') }}/images/flickr/2.jpg" data-lightbox="picture-7">
                                <img src="{{ asset('asset') }}/images/flickr/2.jpg" alt="" class="img-responsive">
                            </a>
                        </li>
                        <li>
                            <a href="{{ asset('asset') }}/images/flickr/1.jpg" data-lightbox="picture-8">
                                <img src="{{ asset('asset') }}/images/flickr/1.jpg" alt="" class="img-responsive">
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Flickr Widget -->


                <!-- Start Recent Post Widget -->
                <div class="widget widget-recent-post">

                    <div class="section-heading-2">
                        <h3 class="section-title mb-3">
                            <span>Recent Post</span>
                        </h3>
                    </div>

                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{ asset('asset') }}/images/recent-post/post-02.jpg"
                                    alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Nulla facilisi integer lacinia sollicitudin massa</a>
                            </h4>
                            <ul>
                                <li><a href="#">Super User</a></li>
                                <li>15 October 2014</li>
                            </ul>
                        </div>
                    </div>

                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{ asset('asset') }}/images/recent-post/post-03.jpg"
                                    alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Quisque cursus metus vitae pharetra auctor sem massa</a>
                            </h4>
                            <ul>
                                <li><a href="#">Super User</a></li>
                                <li>15 October 2014</li>
                            </ul>
                        </div>
                    </div>

                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="{{ asset('asset') }}/images/recent-post/post-04.jpg"
                                    alt="...">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="#">Praesent libero sed cursus ante dapibus diam</a></h4>
                            <ul>
                                <li><a href="#">Super User</a></li>
                                <li>15 October 2014</li>
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


                <!-- Start Tag Cloud Widget -->
                <div class="widget widget-tags">

                    <div class="section-heading-2">
                        <h3 class="section-title mb-3">
                            <span>Popular Tags</span>
                        </h3>
                    </div>

                    <div class="tagcloud">
                        <a href="#">Charity</a>
                        <a href="#">Children</a>
                        <a href="#">Education</a>
                        <a href="#">Elderly</a>
                        <a href="#">Humanity</a>
                        <a href="#">Women Rights</a>
                    </div>

                </div>
                <!-- End Tag Cloud Widget -->



            </div>
            <!-- End Sidebar Section -->

        </div>
    </div>
    <!-- End Blog Page Section -->
@endsection
