@extends('admin.layouts.app')

@section('content')
    <div class="card">
        <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
            <b>All Categories</b>
            <!-- Button trigger modal -->
            <button type="button" class="btn hor-grd btn-grd-primary btn-sm" data-toggle="modal"
                data-target="#staticBackdrop">
                <i class="fas fa-plus"></i> Add Category
            </button>
        </div>
        <div class="card-body">

            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                        <th>Category Slug</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $row)
                        <tr>
                            <td> {{ ++$key }} </td>
                            <td> {{ $row->category_name }} </td>
                            <td> {{ $row->category_description }} </td>
                            <td> {{ $row->category_slug }} </td>
                            <td class="d-flex">
                                <a href=" {{ route('category.edit', $row->id) }} "
                                    class="btn btn-primary mr-1 pt-1 pl-1 pr-0 pb-0"><i class="bi bi-pencil-square"></i></a>

                                <form action=" {{ route('category.destroy', $row->id) }} " method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete pt-1 pl-1 pr-0 pb-0"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                                {{-- <a href=" {{ route('category.destroy', $row->id) }} " class="btn btn-danger p-2 "><i
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
                        <h5 class="modal-title" id="staticBackdropLabel">Create New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action=" {{ route('category.store') }} " method="post">
                        @csrf
                        <div class="modal-body">

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
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn hor-grd btn-grd-primary">Create Category</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
