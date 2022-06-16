@extends('admin.layouts.app')
@section('title')
    Homepage
@endsection
<?php $menu = 'homepage';
$submenu = 'about'; ?>

@section('content')
    <div class="card">
        <div class="card-header bg-default text-dark py-3">
            <b>Customize About Information</b>
        </div>
        <div class="p-2">

            <form action="{{ route('about.update', 1) }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">

                <div class="modal-body">

                    <div class="form-group">
                        <label for="qoi">Quote over image</label>
                        <input class="form-control @error('qoi') is-invalid @enderror" type="text" name="qoi"
                            value="{{ $about->qoi }}">
                        @error('qoi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="qoib">Quote by</label>
                            <input class="form-control @error('qoib') is-invalid @enderror" type="text" name="qoib"
                                value="{{ $about->qoib }}">
                            @error('qoib')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="image">Image <i><small>(4:3)</small></i></label>
                            <input class="form-control-file" type="file" name="image">
                            <input type="hidden" name="old_image" value="{{ $about->image }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" cols="30" rows="10"
                            class="form-control summernote @error('description') is-invalid @enderror">{{ $about->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sos">Summary of service</label>
                        <textarea name="sos" cols="30" rows="5" class="form-control @error('sos') is-invalid @enderror">{{ $about->sos }}</textarea>
                        @error('sos')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn hor-grd btn-grd-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
@endsection
