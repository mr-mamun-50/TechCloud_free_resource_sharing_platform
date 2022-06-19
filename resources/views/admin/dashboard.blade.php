@extends('admin.layouts.app')
@section('title')
    Dashboard
@endsection
<?php $menu = 'dashboard';
$submenu = ''; ?>

@php
$soft_cnt = DB::table('softwares')
    ->where('status', 1)
    ->count('id');
$soft_cnt_priv = DB::table('softwares')
    ->where('status', null)
    ->count('id');
$des_cnt = DB::table('designs')
    ->where('status', 1)
    ->count('id');
$des_cnt_priv = DB::table('designs')
    ->where('status', null)
    ->count('id');
$artcl_cnt = DB::table('articles_tutorial')
    ->where('status', 1)
    ->count('id');
$artcl_cnt_priv = DB::table('articles_tutorial')
    ->where('status', null)
    ->count('id');
$video_cnt = DB::table('video_tutorials')
    ->where('status', 1)
    ->count('id');
$video_cnt_priv = DB::table('video_tutorials')
    ->where('status', null)
    ->count('id');

$cmnt_cnt = DB::table('article_comments')->count('comment');
$cmnt_post_cnt = DB::table('article_comments')
    ->distinct()
    ->count('post_id');
$uncmnt_posts = $artcl_cnt - $cmnt_post_cnt;

$users = DB::table('users')
    ->orderBy('id', 'DESC')
    ->get();
$admins = DB::table('admins')
    ->orderBy('id', 'DESC')
    ->get();
@endphp

@section('content')
    <div class="page-body">
        <div class="row">

            <!-- order-card start -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Softwares</h6>
                        <h2 class="text-right"><i class="bi bi-microsoft f-left"></i><span>{{ $soft_cnt }}</span>
                        </h2>
                        <p class="m-b-0">Private<span class="f-right">{{ $soft_cnt_priv }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Designs</h6>
                        <h2 class="text-right"><i class="fas fa-bezier-curve f-left"></i><span>{{ $des_cnt }}</span>
                        </h2>
                        <p class="m-b-0">Private<span class="f-right">{{ $des_cnt_priv }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Articles</h6>
                        <h2 class="text-right"><i class="bi bi-newspaper f-left"></i><span>{{ $artcl_cnt }}</span>
                        </h2>
                        <p class="m-b-0">Private<span class="f-right">{{ $artcl_cnt_priv }}</span></p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <h6 class="m-b-20">Video Tutorials</h6>
                        <h2 class="text-right"><i
                                class="fas fa-chalkboard-teacher f-left"></i><span>{{ $video_cnt }}</span>
                        </h2>
                        <p class="m-b-0">Private<span class="f-right">{{ $video_cnt_priv }}</span></p>
                    </div>
                </div>
            </div>
            <!-- order-card end -->

            <!-- statustic and process start -->
            <div class="col-lg-7 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Statistics</h5>
                        <div class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li><i class="fa fa-chevron-left"></i></li>
                                <li><i class="fa fa-window-maximize full-card"></i>
                                </li>
                                <li><i class="fa fa-minus minimize-card"></i></li>
                                <li><i class="fa fa-refresh reload-card"></i></li>
                                <li><i class="fa fa-times close-card"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block">
                        {{-- <canvas id="Statistics-chart" height="200"></canvas> --}}
                        <div id="columnchart_material" style="width: 100%; height: 225px;"></div>

                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Article Comments</h5>
                    </div>
                    <div class="card-block">
                        <div id="piechart_3d" style="width: 100%; height: 225px;"></div>

                    </div>
                </div>
            </div>
            <!-- statustic and process end -->
            <!-- tabs card start -->
            <div class="col-sm-12">
                <div class="card tabs-card">
                    <div class="card-block p-0">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs md-tabs" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i
                                        class="fa fa-home"></i>Users</a>
                                <div class="slide"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i
                                        class="fa fa-key"></i>Admins</a>
                                <div class="slide"></div>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content card-block">
                            <div class="tab-pane active" id="home3" role="tabpanel">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $index => $item)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>
                                                        @if ($item->user_image)
                                                            <img src="{{ asset('public/images/users') . '/' . $item->user_image }}"
                                                                class="rounded-circle" alt="Thumbnail" style="width: 70px">
                                                        @else
                                                            <img src="{{ asset('public/images/users/user-icon.png') }}"
                                                                class="rounded-circle" alt="Thumbnail" style="width: 70px">
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td class="d-flex justify-content-between">
                                                        {{ $item->email }}
                                                        <a href="mailto:{{ $item->email }}"><button
                                                                class="btn btn-grd-danger pl-2 pr-1 py-1"><i
                                                                    class="bi bi-envelope-open-fill"></i></button></a>
                                                        </tdc>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile3" role="tabpanel">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered" id="example1">
                                        <thead>
                                            <tr>
                                                <th>SL</th>
                                                <th>Photo</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Password</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $index => $item)
                                                <tr>
                                                    <td>{{ ++$index }}</td>
                                                    <td>
                                                        <img src="{{ asset('public/images/admn/admin_pic.jpg') }}"
                                                            class="rounded-circle" alt="Thumbnail" style="width: 70px">
                                                    </td>
                                                    <td>{{ $item->name }}</td>
                                                    <td class="d-flex justify-content-between">
                                                        {{ $item->email }}
                                                        <a href="mailto:{{ $item->email }}"><button
                                                                class="btn btn-grd-danger pl-2 pr-1 py-1"><i
                                                                    class="bi bi-envelope-open-fill"></i></button></a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="{{ route('admin.password.change') }}"><button
                                                                class="btn btn-grd-primary pl-2 pr-1 py-1"><i
                                                                    class="bi bi-pencil-square"></i></button></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- tabs card end -->

        </div>
    </div>
@endsection



{{-- <x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>
</x-admin-layout> --}}
