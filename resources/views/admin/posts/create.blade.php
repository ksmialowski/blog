@extends('layouts.app')

@section('title','Utwórz post - ')

@section('content')

    <header class="masthead" style="background-image: url({{asset('assets/img/adminhome-bg.jpg')}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-12">
                    <div class="site-heading">
                        <h1>Utwórz post</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-2 col-lg-2 col-xl-2 mt-5">
                <div class="list-group list-group-light">
                    <a href="/admin/posts" class="list-group-item list-group-item-action px-3 border-0 {{ request()->is('admin/posts') ? 'active' : '' }}" aria-current="true">Posty</a>
                    <a href="/admin/posts/create" class="list-group-item list-group-item-action px-3 border-0 {{ request()->is('admin/posts/create') ? 'active' : '' }}">Nowy post</a>
                </div>
            </div>
            <div class="col-md-10 col-lg-8 col-xl-7">
                <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                    @csrf
                    <!-- Title input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Tytuł</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        @error('title')
                        <div class="alert alert-danger small mt-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <!-- Category input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Kategoria</label>
                        <select class="form-select" name="category_id" id="category_id" required>
                            @foreach ($categories as $category)
                                <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                                >{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="alert alert-danger small mt-3" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Slug input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required>
                        @error('slug')
                        <div class="alert alert-danger small mt-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Image input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Obrazek</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}" required>
                        @error('image')
                        <div class="alert alert-danger small mt-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Thumbnail input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Miniaturka</label>
                        <input type="file" name="thumbnail" class="form-control" value="{{ old('thumbnail') }}" required>
                        @error('thumbnail')
                        <div class="alert alert-danger small mt-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Excerpt input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Fragment</label>
                        <input type="text" name="excerpt" class="form-control" value="{{ old('excerpt') }}" required>
                        @error('excerpt')
                        <div class="alert alert-danger small mt-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <!-- Body input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Opis</label>
                        <textarea style="resize: none;" name="body" placeholder="{{ old('body') }}" class="form-control ml-1 shadow-none textarea" rows="10" ></textarea>
                        @error('body')
                        <div class="alert alert-danger small mt-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg my-3" name="published" value="0">Zapisz jako wersja robocza</button>
                    <button type="submit" class="btn btn-primary btn-lg my-3" name="published" value="1">Publikuj</button>
                </form>
            </div>
        </div>
@endsection
