@extends('admin.layouts.app')
@section('title')
    Designs
@endsection
<?php $menu = 'Designs';
$submenu = ''; ?>

@section('content')
    <div class="card">
        <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
            <b>All designs</b>
            <!-- Button trigger modal -->
            <button type="button" class="btn hor-grd btn-grd-primary btn-sm" data-toggle="modal" data-target="#staticBackdrop">
                <i class="fas fa-plus"></i> Add design
            </button>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Thumbnail</th>
                        <th>Name & Status</th>
                        <th>Category / Subcategory</th>
                        <th>Provider & Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($designs as $index => $item)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td> <img src="{{ asset('public/images/thumbnails') . '/' . $item->thumb }}" alt="Thumbnail"
                                    style="width: 100px"> </td>
                            <td>{{ $item->name }}<br>
                                @if ($item->status)
                                    <span class="badge badge-success">Public</span>
                                @else
                                    <span class="badge badge-warning">Private</span>
                                @endif
                            </td>
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

                            <td class="d-flex justify-content-center">

                                <button type="button" class="btn btn-success mr-1 pt-1 pb-0 pl-1 pr-0" data-toggle="modal"
                                    data-target="{{ '#staticBackdrop' . $item->id }}"><i
                                        class="bi bi-download"></i></button>

                                <button type="button" class="btn btn-primary mr-1 pt-1 pb-0 pl-1 pr-0" data-toggle="modal"
                                    data-target="{{ '#edit' . $item->id }}"><i class="bi bi-pencil-square"></i></button>

                                <form action="{{ route('designs.destroy', $item->id) }}" method="post">
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
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $item->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <img src="{{ asset('public/images/thumbnails') . '/' . $item->thumb }}"
                                        alt="Thumbnail" class="w-100">
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
                                            <a href="{{ asset('public/designs') . '/' . $item->source_file }}"
                                                download=""><button class="btn btn-grd-success hor-grd btn-block"><i
                                                        class="bi bi-download"></i> Download</button></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- Modal for edit video -->
                        <div class="modal fade" id="{{ 'edit' . $item->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1" aria-labelledby="{{ 'edit' . $item->id . 'Label' }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-default text-dark rounded">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $item->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('designs.update', $item->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="put">
                                        <div class="modal-body">

                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input class="form-control" type="text" name="name"
                                                    value="{{ $item->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="subcategory_id">Category</label>
                                                <select name="subcategory_id" class="form-control" id="">
                                                    <option disabled selected>Choose Category</option>
                                                    @foreach ($category as $cat)
                                                        @php
                                                            $subcategories = DB::table('subcategories')
                                                                ->where('category_id', $cat->id)
                                                                ->get();
                                                        @endphp
                                                        <option value="{{ $cat->id }}"
                                                            class="text-info font-weight-bold" disabled>
                                                            {{ $cat->category_name }}</option>
                                                        @foreach ($subcategories as $subcat)
                                                            <option value="{{ $subcat->id }}"
                                                                @if ($subcat->id == $item->subcategory_id) selected @endif>
                                                                >{{ $subcat->subcategory_name }}
                                                            </option>
                                                        @endforeach
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="source_file">design File</label>
                                                <input type="file" name="source_file" class="form-control"
                                                    placeholder="">
                                                <input type="hidden" name="old_source_file"
                                                    value="{{ $item->source_file }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="c">Thumbnail</label>
                                                <input type="file" name="thumb" class="form-control"
                                                    placeholder="">
                                                <input type="hidden" name="old_thumb" value="{{ $item->thumb }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea name="description" class="form-control summernote" cols="30" rows="7">{{ $item->description }}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label for="tags">Tags</label>
                                                <input class="form-control @error('tags') is-invalid @enderror"
                                                    type="text" name="tags" value="{{ $item->tags }}">
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input type="checkbox" class="form-check-input" name="status"
                                                        value="1" @if ($item->status) checked @endif>
                                                    Publish now
                                                </label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn hor-grd btn-grd-primary">Update
                                                design</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal for add design -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-default text-dark rounded">
                        <h5 class="modal-title" id="staticBackdropLabel">Upload New Design</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('designs.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Title</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name') }}">
                                @error('name')
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
                                <label for="source_file">Design Source File</label>
                                <input type="file" name="source_file"
                                    class="form-control @error('source_file') is-invalid @enderror" placeholder="">
                                @error('source_file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="c">Thumbnail</label>
                                <input type="file" name="thumb"
                                    class="form-control @error('thumb') is-invalid @enderror" placeholder="">
                                @error('thumb')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror summernote"
                                    cols="30" rows="7">{{ old('description') }}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="tags">Tags</label>
                                <input class="form-control @error('tags') is-invalid @enderror" type="text"
                                    name="tags" value="{{ old('tags') }}">
                                @error('tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="status" value="1">
                                    Publish now
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn">Reset</button>
                            <button type="submit" class="btn hor-grd btn-grd-primary">Add Design</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
