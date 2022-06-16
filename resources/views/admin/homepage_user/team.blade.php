@extends('admin.layouts.app')
@section('title')
    Team
@endsection
<?php $menu = 'homepage';
$submenu = 'team'; ?>

@section('content')
    <div class="card">
        <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
            <b>TechCloud Team</b>
            <!-- Button trigger modal -->
            <button type="button" class="btn hor-grd btn-grd-primary btn-sm" data-toggle="modal"
                data-target="#staticBackdrop">
                <i class="fas fa-plus"></i> Add Member
            </button>
        </div>
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Quote</th>
                        <th>Contact</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($team as $index => $item)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td> <img src="{{ asset('images/homepage') . '/' . $item->image }}" alt="Photo"
                                    style="width: 100px"> </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->designation }}</td>
                            <td style="white-space:normal">{{ $item->quote }}</td>
                            <td>
                                <a class="text-primary mr-2" href="{{ $item->facebook }}" target="blank"><i
                                        class="bi bi-facebook fa-lg"></i></a>
                                <a class="text-primary" href="{{ $item->twitter }}" target="blank"><i
                                        class="bi bi-twitter fa-lg"></i></a><br><br>
                                <a class="text-dark mr-2" href="{{ $item->github }}" target="blank"><i
                                        class="bi bi-github fa-lg"></i></a>
                                <a class="text-primary" href="{{ $item->linkedin }}" target="blank"><i
                                        class="bi bi-linkedin fa-lg"></i></a>
                            </td>


                            <td class="d-flex justify-content-center">

                                <button type="button" class="btn btn-primary mr-1 pt-1 pb-0 pl-1 pr-0" data-toggle="modal"
                                    data-target="{{ '#edit' . $item->id }}"><i class="bi bi-pencil-square"></i></button>

                                <form action="{{ route('team.destroy', $item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete pt-1 pb-0 pl-1 pr-0"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>


                        <!-- Modal for edit video -->
                        <div class="modal fade" id="{{ 'edit' . $item->id }}" data-backdrop="static"
                            data-keyboard="false" tabindex="-1" aria-labelledby="{{ 'edit' . $item->id . 'Label' }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header bg-default text-dark rounded">
                                        <h5 class="modal-title" id="staticBackdropLabel">{{ $item->name }}</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('team.update', $item->id) }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="_method" value="put">
                                        <div class="modal-body">


                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn hor-grd btn-grd-primary">Update
                                                Software</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Modal for add software -->
        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-default text-dark rounded">
                        <h5 class="modal-title" id="staticBackdropLabel">Add New Member</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('team.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="designation">Designation</label>
                                <input class="form-control @error('designation') is-invalid @enderror" type="text"
                                    name="designation" value="{{ old('designation') }}">
                                @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="image">Photo</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                    value="{{ old('image') }}">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="quote">Quote</label>
                                <textarea name="quote" cols="30" rows="5" class="form-control @error('quote') is-invalid @enderror">{{ old('quote') }}</textarea>
                                @error('quote')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="facebook">Facebook</label>
                                    <input class="form-control @error('facebook') is-invalid @enderror" type="text"
                                        name="facebook" value="{{ old('facebook') }}">
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="twitter">Twitter</label>
                                    <input class="form-control @error('twitter') is-invalid @enderror" type="text"
                                        name="twitter" value="{{ old('twitter') }}">
                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="github">Github</label>
                                    <input class="form-control @error('github') is-invalid @enderror" type="text"
                                        name="github" value="{{ old('github') }}">
                                    @error('github')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input class="form-control @error('linkedin') is-invalid @enderror" type="text"
                                        name="linkedin" value="{{ old('linkedin') }}">
                                    @error('linkedin')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn">Reset</button>
                            <button type="submit" class="btn hor-grd btn-grd-primary">Add Member</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
