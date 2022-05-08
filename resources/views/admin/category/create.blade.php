@extends('admin.layouts.app')
@section('title')
    Create Category
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
                    <b>Add new category</b>
                    <a href=" {{ route('category.index') }} " class="btn btn-primary btn-sm">All Categories</a>
                </div>
                <div class="card-body">

                    <form action=" {{ route('category.store') }} " method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input id="category_name" class="form-control @error('category_name') is-invalid @enderror"
                                type="text" name="category_name" value=" {{ old('category_name') }} ">
                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_description">Category Description</label>
                            <textarea class="form-control @error('category_description') is-invalid @enderror" name="category_description"
                                id="category_description" rows="3"> {{ old('category_description') }} </textarea>
                            @error('category_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn hor-grd btn-grd-primary">Add to Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
