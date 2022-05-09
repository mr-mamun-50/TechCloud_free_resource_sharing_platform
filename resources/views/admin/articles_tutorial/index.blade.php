@extends('admin.layouts.app')
@section('title')
    Subcategories
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
                        <th>Category</th>
                        <th>Subcategory</th>
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
                            <td> {{ $item->category_name }} </td>
                            <td> {{ $item->subcategory_name }} </td>
                            <td> {{ $item->username }} <div class="text-muted"> {{ $item->post_date }} </div>
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
                                <a href="  " class="btn btn-primary mr-1 pt-1 pl-1 pr-0 pb-0"><i
                                        class="bi bi-pencil-square"></i></a>

                                <form action=" {{ route('articles.destroy', $item->id) }} " method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete pt-1 pl-1 pr-0 pb-0"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                                {{-- <a href=" {{ route('category.destroy', $item->id) }} " class="btn btn-danger p-2 "><i
                                        class="far fa-trash-alt"></i></a> --}}
                            </td>
                        </tr>
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
                            {{-- <div class="form-group">
                                    <label for="subcategory_id">Select Subcategory</label>
                                    <select name="subcategory_id" class="form-control" id="">
                                        <option value="  ">  </option>
                                    </select>
                                </div> --}}
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
