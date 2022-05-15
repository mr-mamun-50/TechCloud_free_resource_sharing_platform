@extends('admin.layouts.app')
@section('title')
    Video Tutorials
@endsection
<?php $menu = 'videos';
$submenu = 'manage_vid'; ?>

@section('content')
    <div class="card">
        <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
            <b>Video Tutorials</b>
            <!-- Button trigger modal -->
            <button type="button" class="btn hor-grd btn-grd-primary btn-sm" data-toggle="modal"
                data-target="#staticBackdrop">
                <i class="fas fa-plus"></i> Add Video
            </button>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Category / Subcategory</th>
                        <th>Author & Time</th>
                        <th>Title & Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($videos as $index => $item)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td>{{ $item->category_name }}/<br>
                                {{ $item->subcategory_name }}</td>
                            <td>{{ $item->username }}
                                <div class="text-muted">
                                    <small><i>Created:</i>
                                        {{ date('d F, Y | h:i A', strtotime($item->post_date)) }}</small>
                                    @if ($item->update_date)
                                        <br> <small><i>Updated:</i>
                                            {{ date('d F, Y | h:i A', strtotime($item->update_date)) }}</small>
                                    @endif
                                </div>
                            </td>
                            <td>{{ $item->title }}<br>
                                @if ($item->status)
                                    <span class="badge badge-success">Public</span>
                                @else
                                    <span class="badge badge-warning">Private</span>
                                @endif
                            </td>

                            <td class="d-flex justify-content-center">

                                <button type="button" class="btn btn-info mr-1 pt-1 pb-0 pl-1 pr-0" data-toggle="modal"
                                    data-target="{{ '#staticBackdrop' . $item->id }}"><i
                                        class="bi bi-eye"></i></button>

                                <a href="{{ route('videos.edit', $item->id) }}"
                                    class="btn btn-primary mr-1 pt-1 pb-0 pl-1 pr-0"><i class="bi bi-pencil-square"></i></a>

                                <form action="{{ route('videos.destroy', $item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete pt-1 pb-0 pl-1 pr-0"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal for view video -->
                        <div class="modal fade" id="{{ 'staticBackdrop' . $item->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1"
                            aria-labelledby="{{ 'staticBackdrop' . $item->id . 'Label' }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content card">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $item->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <iframe width="100%" height="315"
                                        src="https://www.youtube.com/embed/{{ $item->video_link }}"
                                        title="YouTube video player" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>

                                    <div class="modal-body">

                                        <div class="text-muted d-flex justify-content-between">
                                            <div>
                                                <small class="text-muted">Author: </small><a
                                                    href="#"><b>{{ $item->username }}</b></a><br>
                                                <small class="text-muted">Visibility: </small>
                                                @if ($item->status)
                                                    <span class="badge badge-success">Public</span>
                                                @else
                                                    <span class="badge badge-warning">Private</span>
                                                @endif
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
                                            <small class="text-muted">Category: </small>{{ $item->category_name }}
                                            <span class="text-danger">|</span>
                                            <small class="text-muted">Subcategory:
                                            </small>{{ $item->subcategory_name }}
                                        </div>
                                        <hr>
                                        <div>
                                            <h6>Tags:</h6>
                                            <code>{{ $item->tags }}</code>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal for add category -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-default text-dark rounded">
                        <h5 class="modal-title" id="staticBackdropLabel">Create New Video</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('videos.store') }}" method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="video_title">Title</label>
                                <input class="form-control @error('video_title') is-invalid @enderror" type="text"
                                    name="video_title" value="{{ old('video_title') }}">
                                @error('video_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subcategory_id">Category</label>
                                <select name="subcategory_id" class="form-control" id="">
                                    <option disabled selected>Choose Category</option>
                                    @foreach ($category as $item)
                                        @php
                                            $subcategories = DB::table('subcategories')
                                                ->where('category_id', $item->id)
                                                ->get();
                                        @endphp
                                        <option value="{{ $item->id }}" class="text-info font-weight-bold" disabled>
                                            {{ $item->category_name }}</option>
                                        @foreach ($subcategories as $subcat)
                                            <option value="{{ $subcat->id }}"> >{{ $subcat->subcategory_name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="video_link">Video YouTube Link</label>
                                <input type="text" name="video_link"
                                    class="form-control @error('video_link') is-invalid @enderror"
                                    value="{{ old('video_link') }}">
                                @error('video_link')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="video_tags">Tags</label>
                                <input class="form-control @error('video_tags') is-invalid @enderror" type="text"
                                    name="video_tags" value="{{ old('video_tags') }}">
                                @error('video_tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="video_status" value="1">
                                    Publish now
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn">Reset</button>
                            <button type="submit" class="btn hor-grd btn-grd-primary">Add Video</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
