@extends('admin.layouts.app')
@section('title')
    Edit Article
@endsection
<?php $menu = 'articles';
$submenu = 'manage_artcl'; ?>

@section('content')
    <div class="row justify-content-center">
        {{-- <div class="col-md-8"> --}}
        <div class="card">
            <div class="card-header bg-default text-dark py-2 px-4 d-flex justify-content-between align-items-center">
                <b>{{ $article->title }}</b>
                <a href="{{ route('articles.index') }}" class="btn btn-primary btn-sm">All Articles</a>
            </div>
            <div class="p-2">

                <form action="{{ route('articles.update', $article->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method" value="put">

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="article_title">Title</label>
                            <input class="form-control @error('article_title') is-invalid @enderror" type="text"
                                name="article_title" value="{{ $article->title }}">
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
                                    <option value="{{ $item->id }}" class="text-info font-weight-bold" disabled>
                                        {{ $item->category_name }}</option>
                                    @foreach ($subcategories as $subcat)
                                        <option value="{{ $subcat->id }}"
                                            @if ($subcat->id == $article->subcategory_id) selected @endif>
                                            >{{ $subcat->subcategory_name }}
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
                            <textarea name="article_description" class="form-control @error('article_description') is-invalid @enderror summernote"
                                cols="30" rows="7">{{ $article->description }}</textarea>
                            @error('article_description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="article_tags">Tags</label>
                            <input class="form-control @error('article_tags') is-invalid @enderror" type="text"
                                name="article_tags" value="{{ $article->tags }}">
                            @error('article_tags')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="article_thumb">Thumbnail</label>
                            <input type="file" name="article_thumb" class="form-control">
                            <input type="hidden" name="old_thumb" value="{{ $article->image }}">
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="article_status" value="1"
                                    @if ($article->status) checked @endif>
                                Publish now
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn hor-grd btn-grd-primary">Update Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
