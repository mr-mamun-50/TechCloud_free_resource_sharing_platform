@extends('layouts.app')

@section('title')
    designs | Videos
@endsection
<?php $nav = 'Designs'; ?>

@section('content')
    <!-- Start Header Section -->
    <div class="page-header mt-0">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Free Designs</h1>
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
            <div class="col-md-9 blog-body">

                <table id="myTable" class="table table-light">
                    <thead>
                        <tr>
                            <td>order</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($designs as $item)
                            <tr>
                                <td>
                                    <div class="media jumbotron py-5 px-4 d-flex align-items-center blog-post">
                                        <img src="{{ asset('images/thumbnails') . '/' . $item->thumb }}"
                                            class="mr-3 w-25" alt="...">
                                        <div class="media-body">
                                            <h5 class="mb-3">{{ $item->name }}</h5>

                                            <ul class="post-meta">
                                                <li><i class="fas fa-tag"></i><a
                                                        href="#">{{ $item->category_name }}</a></li>
                                                <li><i class="fa fa-tags"></i><a
                                                        href="#">{{ $item->subcategory_name }}</a></li>
                                                <li><i class="fa fa-user"></i><a href="#">{{ $item->username }}</a>
                                                </li>
                                                <li><i class="fas fa-clock"></i>
                                                    {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}
                                                </li>
                                            </ul>
                                        </div>
                                        <button type="button" class="btn btn-success " data-toggle="modal"
                                            data-target="{{ '#staticBackdrop' . $item->id }}"><i
                                                class="bi bi-download"></i> Download</button>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal for download design -->
                            <div class="modal fade" id="{{ 'staticBackdrop' . $item->id }}" data-backdrop="static"
                                data-keyboard="false" tabindex="-1"
                                aria-labelledby="{{ 'staticBackdrop' . $item->id . 'Label' }}" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content card">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">{{ $item->name }}</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <img src="{{ asset('images/thumbnails') . '/' . $item->thumb }}" alt="Thumbnail"
                                            class="w-100">
                                        <div class="modal-body">

                                            <div class="text-muted d-flex justify-content-between">
                                                <div>
                                                    <small class="text-muted">Author: </small><a
                                                        href="#"><b>{{ $item->username }}</b></a><br>
                                                    {{-- <small class="text-muted">Visibility: </small>
                                                    @if ($item->status)
                                                        <span class="badge badge-success">Public</span>
                                                    @else
                                                        <span class="badge badge-warning">Private</span>
                                                    @endif --}}
                                                </div>
                                                <div>
                                                    <small><i>Created:</i>
                                                        {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}</small>
                                                    @if ($item->update_date)
                                                        <br> <small><i>Updated:</i>
                                                            {{ date('d F, Y | h:i A', strtotime($item->update_date)) }}</small>
                                                    @endif
                                                </div>
                                            </div>
                                            <div>
                                                <small class="text-muted">Category:
                                                </small>{{ $item->category_name }}
                                                <span class="text-danger">|</span>
                                                <small class="text-muted">Subcategory:
                                                </small>{{ $item->subcategory_name }}
                                            </div>
                                            <hr>
                                            <div>
                                                <h6>Description:</h6>
                                                <?php echo $item->description; ?>
                                            </div>
                                            <hr>
                                            <div>
                                                <h6>Tags:</h6>
                                                <code>{{ $item->tags }}</code>
                                            </div>
                                            <hr>
                                            <div>
                                                <a href="{{ asset('designs') . '/' . $item->source_file }}"
                                                    download=""><button class="btn btn-success btn-block"><i
                                                            class="bi bi-download"></i> Download</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>


                <!-- Start Pagination -->
                {{-- {{ $videos->links('pagination::bootstrap-5') }} --}}

            </div>
            <!-- End Blog Body Section -->

            <!-- Start Sidebar Section -->
            <div class="col-md-3 sidebar right-sidebar">

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
                                <img class="media-object" src="{{ asset('images/articles') . '/' . $R1->image }}"
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
                                <img class="media-object" src="{{ asset('images/thumbnails') . '/' . $R2->thumb }}"
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
                                <img class="media-object" src="{{ asset('images/thumbnails') . '/' . $R3->thumb }}"
                                    alt="...">
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
                                <img class="media-object" src="{{ asset('images/thumbnails/video_tutorials.png') }}"
                                    alt="...">
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
