@extends('admin.layouts.app')
@section('title')
    Edit Category
@endsection
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header bg-default text-dark p-3">
                    <b>Edit subcategory</b>
                </div>
                <div class="card-body">

                    <form action=" {{ route('subcategory.update', $data->id) }} " method="post">
                        @csrf
                        <input type="hidden" name="_method" value="put">

                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                            <select name="category_id" class="form-control">
                                @foreach ($cat_data as $item)
                                    <option value=" {{ $item->id }} " @if ($item->id == $data->category_id) selected @endif>
                                        {{ $item->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="subcategory_name">Subcategory Name</label>
                            <input id="subcategory_name" class="form-control @error('subcategory_name') is-invalid @enderror"
                                type="text" name="subcategory_name" value=" {{ $data->subcategory_name }} ">
                            @error('subcategory_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="text-right">
                            <button type="submit" class="btn hor-grd btn-grd-primary">Update Subcategory</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
