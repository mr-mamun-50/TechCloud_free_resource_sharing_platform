@extends('layouts.app')

@section('title')
    Tutorials | Articles
@endsection
<?php $nav = 'Tutorials'; ?>

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
                                <img src="{{ asset('public/images/articles') . '/' . $article->image }}"
                                    class="img-responsive" alt="Blog image">
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
                                    <li><i class="fa fa-comments"></i><a href="#">{{ $cntcmt }} Comments</a>
                                    </li>
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
                        <div class="blog-author mb-5">
                            <h3>About The Author</h3>
                            <div class="media d-flex align-items-center jumbotron">
                                <div class="media-left">
                                    <a href="#">
                                        @if ($article->username == 'M R Mamun')
                                            <img class="media-object rounded-circle"
                                                src="{{ asset('public/images/admn/admin_pic.jpg') }}" alt="Author">
                                        @else
                                            @if ($author->user_image != null)
                                                <img class="media-object rounded-circle"
                                                    src="{{ asset('public/images/users') . '/' . $author->user_image }}"
                                                    alt="Author">
                                            @else
                                                <img class="media-object rounded-circle"
                                                    src={{ asset('public/images/users/user-icon.png') }}""
                                                    alt="Author">
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
                            <h2 class="comments-title">{{ $cntcmt }} comments</h2>
                            <ol class="comments-list mb-0">
                                @foreach ($comment as $item)
                                    <li>
                                        <div class="comment-box clearfix py-1">
                                            <div class="avatar">
                                                @if ($item->user_image != null)
                                                    <img src="{{ asset('public/images/users') . '/' . $item->user_image }}"
                                                        alt="User">
                                                @else
                                                    <img src="{{ asset('public/images/users/user-icon.png') }}"
                                                        alt="User">
                                                @endif
                                            </div>
                                            <div class="comment-content align-self-center">
                                                <div class="comment-meta">
                                                    <span
                                                        class="comment-by font-weight-bold">{{ $item->username }}</span>
                                                    <small
                                                        class="comment-date">({{ date('d F, Y | h:i A', strtotime($item->c_date)) }})</small>
                                                </div>
                                                <p><?php echo $item->comment; ?></p>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                                <!-- Start Pagination -->
                                {{ $comment->links('pagination::bootstrap-5') }}
                            </ol>

                            <!-- Start comment Form -->
                            <div id="respond">
                                <h2 class="respond-title">Leave a comment</h2>

                                <form action="{{ route('article.comment.store') }}" method="POST">
                                    @csrf
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <input type="hidden" name="post_id" value="{{ $article->id }}">

                                            <textarea name="comment" cols="45" rows="7" aria-required="true"
                                                class="form-control summernote @error('comment') is-invalid @enderror"></textarea>
                                            @error('comment')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror

                                            <button type="submit" class="btn btn-primary mt-2">Submit Comment</button>
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
                                    <a href="{{ route('tutorials.view', $R1->id) }}">
                                        <img class="media-object"
                                            src="{{ asset('public/images/articles') . '/' . $R1->image }}"
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
                                            src="{{ asset('public/images/thumbnails') . '/' . $R2->thumb }}"
                                            alt="...">
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
                                            src="{{ asset('public/images/thumbnails') . '/' . $R3->thumb }}"
                                            alt="...">
                                    </a>
                                </div>
                                <div class="media-body ml-2">
                                    <h4 class="media-heading"><a
                                            href="{{ route('services.designs') }}">{{ $R3->name }}</a>
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
                                            src="{{ asset('public/images/thumbnails/video_tutorials.png') }}"
                                            alt="...">
                                    </a>
                                </div>
                                <div class="media-body ml-2">
                                    <h4 class="media-heading"><a
                                            href="{{ route('tutorials.video') }}">{{ $R4->title }}</a>
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
        </div>
    </div>
@endsection
