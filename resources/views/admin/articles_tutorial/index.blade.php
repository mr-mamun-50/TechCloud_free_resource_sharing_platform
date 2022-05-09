@extends('admin.layouts.app')
@section('title')
    Article Tutorials
@endsection
@section('content')
    <div class="card">
        <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
            <b>Article Tutorials</b>
            <!-- Button trigger modal -->
            <button type="button" class="btn hor-grd btn-grd-primary btn-sm" data-toggle="modal"
                data-target="#staticBackdrop">
                <i class="fas fa-plus"></i> Add Article
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
                        <th>Thumbnail</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $index => $item)
                        <tr>
                            <td> {{ ++$index }} </td>
                            <td> {{ $item->category_name }} /<br>
                                {{ $item->subcategory_name }} </td>
                            <td> {{ $item->username }}
                                <div class="text-muted">
                                    <small><i>Created:</i>
                                        {{ date('d F, Y | h:m A', strtotime($item->post_date)) }}</small>
                                    @if ($item->update_date)
                                        <br> <small><i>Updated:</i>
                                            {{ date('d F, Y | h:m A', strtotime($item->update_date)) }}</small>
                                    @endif
                                </div>
                            </td>
                            <td> {{ $item->title }} <br>
                                @if ($item->status)
                                    <span class="badge badge-success">Public</span>
                                @else
                                    <span class="badge badge-warning">Private</span>
                                @endif
                            </td>
                            <td> <img src="{{ asset('images/articles') . '/' . $item->image }}" alt="Thumbnail"
                                    style="width: 100px"> </td>

                            <td class="d-flex justify-content-center">

                                <button type="button" class="btn btn-info mr-1 pt-1 pb-0 pl-1 pr-0" data-toggle="modal"
                                    data-target="{{ '#staticBackdrop' . $item->id }}"><i
                                        class="bi bi-eye"></i></button>

                                <a href=" {{ route('articles.edit', $item->id) }} "
                                    class="btn btn-primary mr-1 pt-1 pb-0 pl-1 pr-0"><i class="bi bi-pencil-square"></i></a>

                                <form action=" {{ route('articles.destroy', $item->id) }} " method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete pt-1 pb-0 pl-1 pr-0"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>

                        <!-- Modal for view article -->
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
                                    <img src="{{ asset('images/articles') . '/' . $item->image }}" alt="Thumbnail"
                                        class="w-100">
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
                                                    {{ date('d F, Y | h:m A', strtotime($item->post_date)) }}</small>
                                                @if ($item->update_date)
                                                    <br> <small><i>Updated:</i>
                                                        {{ date('d F, Y | h:m A', strtotime($item->update_date)) }}</small>
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
                                            {{ $item->tags }}
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
                        <h5 class="modal-title" id="staticBackdropLabel">Create New Article</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action=" {{ route('articles.store') }} " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="article_title">Title</label>
                                <input class="form-control @error('article_title') is-invalid @enderror" type="text"
                                    name="article_title" value=" {{ old('article_title') }} ">
                                @error('article_title')
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
                                        <option value=" {{ $item->id }} " class="text-info font-weight-bold" disabled>
                                            {{ $item->category_name }} </option>
                                        @foreach ($subcategories as $subcat)
                                            <option value=" {{ $subcat->id }} "> > {{ $subcat->subcategory_name }}
                                            </option>
                                        @endforeach
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="article_description">Description</label>
                                <textarea name="article_description" class="form-control @error('article_description') is-invalid @enderror " cols="30"
                                    rows="7"> {{ old('article_description') }} </textarea>
                                @error('article_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="article_tags">Tags</label>
                                <input class="form-control @error('article_tags') is-invalid @enderror" type="text"
                                    name="article_tags" value=" {{ old('article_tags') }} ">
                                @error('article_tags')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="article_thumb">Thumbnail</label>
                                <input type="file" name="article_thumb" class="form-control" placeholder="">
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="article_status" value="1">
                                    Publish now
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn hor-grd btn-grd-primary">Create Article</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
