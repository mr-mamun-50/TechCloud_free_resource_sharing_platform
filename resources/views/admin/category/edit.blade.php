@extends('admin.layouts.app')
@section('title')
    Edit Category
@endsection
<?php $menu = 'categories'; $submenu = 'manage_cat'; ?>

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-default text-dark p-3">
                    <b>Edit category</b>
                </div>
                <div class="card-body">

                    <form action=" {{ route('category.update', $category->id) }} " method="post">
                        @csrf
                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="category_name">Category Name</label>
                            <input id="category_name" class="form-control @error('category_name') is-invalid @enderror"
                                type="text" name="category_name" value=" {{ $category->category_name }} ">
                            @error('category_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_description">Category Description</label>
                            <textarea class="form-control @error('category_description') is-invalid @enderror" name="category_description"
                                id="category_description" rows="3"> {{ $category->category_description }} </textarea>
                            @error('category_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn hor-grd btn-grd-primary">Update Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
