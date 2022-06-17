@extends('admin.layouts.app')
@section('title')
    Feedback
@endsection
<?php $menu = 'Feedback';
$submenu = ''; ?>

@section('content')
    <div class="card">
        <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
            <b>User Feedbacks</b>
        </div>
        <div class="card-body table-responsive">

            <table class="table table-bordered table-striped" id="example1">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Photo</th>
                        <th>Name & Email</th>
                        <th>Feedback</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($feedback as $index => $item)
                        <tr>
                            <td>{{ ++$index }}</td>
                            <td> <img src="{{ asset('images/users') . '/' . $item->user_image }}" alt="Photo"
                                    style="width: 100px"> </td>
                            <td>
                                <b>{{ $item->name }} </b><br><br>
                                Email: <a href="mailto:{{ $item->email }}" target="blank">{{ $item->email }}</a>
                            </td>
                            <td style="white-space:normal">{{ $item->feedback }}</td>

                            <td class="d-flex justify-content-center">

                                <form action="{{ route('feedback.destroy', $item->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="btn btn-danger delete pt-1 pb-0 pl-1 pr-0"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
