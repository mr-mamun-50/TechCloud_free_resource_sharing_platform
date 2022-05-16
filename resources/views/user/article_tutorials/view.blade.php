@extends('layouts.app')

@section('title')
    Tutorials | Articles
@endsection

@section('content')
    <!-- Start Header Section -->
    <div class="page-header mt-0">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>{{ $article->title }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Section -->





    <!-- Start Blog Page Section -->
    <div class="container mt-4">
        <div class="row">

            <!-- Start Blog Page Section -->
            <div class="container">
                <div class="row">

                    <!-- Start Blog Body Section -->
                    <div class="col-md-8 blog-body">

                        <!-- Start Blog post -->
                        <div class="single-blog-post">
                            <div class="post-img">
                                <img src="{{ asset('images/articles') . '/' . $article->image }}" class="img-responsive"
                                    alt="Blog image">
                            </div>
                            <h1 class="post-title"><a href="#">{{ $article->title }}</a>
                            </h1>

                            <div class="post-meta">
                                <ul class="pull-left">
                                    <li><i class="fas fa-clock"></i>
                                        {{ date('d F, Y | h:i A', strtotime($article->post_date)) }}</li>
                                    <li><i class="fa fa-user"></i><a href="#">{{ $article->username }}</a></li>
                                    <li><i class="fas fa-tag"></i><a href="#">{{ $article->category_name }}</a></li>
                                    <li><i class="fa fa-tags"></i><a href="#">{{ $article->subcategory_name }}</a>
                                    </li>
                                    <li><i class="fa fa-comments"></i><a href="#">4 Comments</a></li>
                                </ul>
                                {{-- <ul class="pull-right">
                                    <li>font-size<i class="fa fa-minus-circle"></i><i class="fa fa-plus-circle"></i></li>
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Email</a></li>
                                </ul> --}}
                            </div>


                            <p class="post-content"><?php echo $article->description; ?></p>

                            <div class="item-content-footer">
                                <ul>
                                    <li>Read 286 times</li>
                                    <li class="rating">
                                        Rate this item
                                        <span class="active"><i class="bi bi-star"></i></span>
                                        <span class="active"><i class="bi bi-star"></i></span>
                                        <span class="active"><i class="bi bi-star"></i></span>
                                        <span><i class="bi bi-star"></i></span>
                                        <span><i class="bi bi-star"></i></span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <!-- End Blog Post -->


                        <!-- Start Blog Author Section -->
                        <div class="blog-author">
                            <h3>About The Author</h3>
                            <div class="media d-flex align-items-center">
                                <div class="media-left">
                                    <a href="#">
                                        @if ($article->username == 'M R Mamun')
                                            <img class="media-object rounded-circle"
                                                src="{{ asset('images/admn/admin_pic.jpg') }}" alt="Author">
                                        @else
                                            @if ($author->user_image != null)
                                                <img class="media-object rounded-circle"
                                                    src="{{ asset('images/users') . '/' . $author->user_image }}"
                                                    alt="Author">
                                            @else
                                                <img class="media-object rounded-circle"
                                                    src={{ asset('images/users/user-icon.png') }}"" alt="Author">
                                            @endif
                                        @endif
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">{{ $article->username }}</a></h4>
                                    <p><a href="mailto:{{ $article->useremail }}"
                                            target="blank">{{ $article->useremail }}</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- End Blog Author Section -->

                        <!-- Start Comments Section -->
                        <div id="comments">
                            <h2 class="comments-title">4 comments</h2>
                            <ol class="comments-list">
                                <li>
                                    <div class="comment-box clearfix">
                                        <div class="avatar"><img alt=""
                                                src="{{ asset('asset') }}/images/user-2.png"></div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <span class="comment-by">fghfghjfghj</span>
                                                <span class="reply-link pull-right"><a href="#">Comment Link</a></span>
                                            </div>
                                            <span class="comment-date">Sunday, 15 February 2015 at 20:39</span>
                                            <p>Dette er en besked</p>
                                        </div>
                                    </div>

                                    <ul>
                                        <li>
                                            <div class="comment-box clearfix">
                                                <div class="avatar"><img alt=""
                                                        src="{{ asset('asset') }}/images/user-2.png"></div>
                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <span class="comment-by">sdfaasdfb</span>
                                                        <span class="reply-link pull-right"><a href="#">Comment
                                                                Link</a></span>
                                                    </div>
                                                    <span class="comment-date">Sunday, 15 February 2015 20:39</span>
                                                    <p>sdfadasdfawefasdf a</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                                <li>
                                    <div class="comment-box clearfix">
                                        <div class="avatar"><img alt=""
                                                src="{{ asset('asset') }}/images/user-2.png"></div>
                                        <div class="comment-content">
                                            <div class="comment-meta">
                                                <span class="comment-by">sa</span>
                                                <span class="reply-link pull-right"><a href="#">Comment Link</a></span>
                                            </div>
                                            <span class="comment-date">Tuesday, 03 February 2015 06:41</span>
                                            <p>daaass</p>
                                        </div>
                                    </div>

                                    <ul>
                                        <li>
                                            <div class="comment-box clearfix">
                                                <div class="avatar"><img alt=""
                                                        src="{{ asset('asset') }}/images/user-2.png"></div>
                                                <div class="comment-content">
                                                    <div class="comment-meta">
                                                        <span class="comment-by">xc zc</span>
                                                        <span class="reply-link pull-right"><a href="#">Comment
                                                                Link</a></span>
                                                    </div>
                                                    <span class="comment-date">Wednesday, 10 December 2014 11:42</span>
                                                    <p>fsfsfs</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </li>

                            </ol>

                            <!-- Start Respond Form -->
                            <div id="respond">
                                <h2 class="respond-title">Leave a comment</h2>
                                <span class="form-caution">Make sure you enter the (*) required information where
                                    indicated. HTML code is not allowed.</span>
                                <form action="#">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="author">Name<span class="required">*</span></label>
                                            <input id="author" name="author" type="text" size="30" aria-required="true"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email">Email<span class="required">*</span></label>
                                            <input id="email" name="author" type="text" size="30" aria-required="true"
                                                class="form-control">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="url">Website<span class="required">*</span></label>
                                            <input id="url" name="url" type="text" size="30" aria-required="true"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label for="comment">Add Your Comment</label>
                                            <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" class="form-control"></textarea>
                                            <input name="submit" type="submit" id="submit" class="btn btn-primary mt-2"
                                                value="Submit Comment">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Respond Form -->

                        </div>
                        <!-- End Comments Section -->

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
                                    <a href="#">
                                        <img class="media-object"
                                            src="{{ asset('asset') }}/images/recent-post/post-02.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Nulla facilisi integer lacinia sollicitudin
                                            massa</a>
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
                                        <img class="media-object"
                                            src="{{ asset('asset') }}/images/recent-post/post-03.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Quisque cursus metus vitae pharetra auctor sem
                                            massa</a>
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
                                        <img class="media-object"
                                            src="{{ asset('asset') }}/images/recent-post/post-04.jpg" alt="...">
                                    </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading"><a href="#">Praesent libero sed cursus ante dapibus diam</a>
                                    </h4>
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
        </div>
    </div>
@endsection
