@extends('admin.layouts.app')
@section('title')
    Subcategories
@endsection
<?php $menu = 'subcategories'; $submenu=''; ?>

@section('content')
    <div class="card">
        <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
            <b>Sub Categories</b>
            <!-- Button trigger modal -->
            <button type="button" class="btn hor-grd btn-grd-primary btn-sm" data-toggle="modal"
                data-target="#staticBackdrop">
                <i class="fas fa-plus"></i> Add Subcategory
            </button>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Subcategory Name</th>
                        <th>Subcategory Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td> {{ ++$key }} </td>
                            <td> {{ $item->category_name }} </td>
                            <td> {{ $item->subcategory_name }} </td>
                            <td> {{ $item->subcategory_slug }} </td>
                            <td class="d-flex">
                                <a href=" {{ route('subcategory.edit', $item->id) }} "
                                    class="btn btn-primary mr-1 pt-1 pl-1 pr-0 pb-0"><i class="bi bi-pencil-square"></i></a>

                                <form action=" {{ route('subcategory.destroy', $item->id) }} " method="post">
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
                        <h5 class="modal-title" id="staticBackdropLabel">Create New Subcategory</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action=" {{ route('subcategory.store') }} " method="post">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="category_id">Select Category</label>
                                <select name="category_id" class="form-control" id="">
                                    @foreach ($cat_data as $item)
                                        <option value=" {{ $item->id }} "> {{ $item->category_name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="subcategory_name">Subcategory Name</label>
                                <input id="subcategory_name"
                                    class="form-control @error('subcategory_name') is-invalid @enderror" type="text"
                                    name="subcategory_name" value=" {{ old('subcategory_name') }} ">
                                @error('subcategory_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn hor-grd btn-grd-primary">Create Subcategory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
