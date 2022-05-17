@extends('layouts.app')

@section('title','strona główna')


@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-12">
                <div class="site-heading">
                    <h1>Pogoda, klimat, przyroda</h1>
                    <span class="subheading">Wszystko o zjawiskach przyrodniczych występujących na Ziemi</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <form method="GET" action="/">
            <div class="mb-5">
                @php

                @endphp
                <div class="input-group rounded">
                    <div class="dropdown">
                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Kategorie' }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <li><a class="dropdown-item" href="/?{{ http_build_query(request()->except('category','page')) }}"
                                   :active="request()->routeIs('home') && is_null(request()->getQueryString())">Wszystkie</a></li>

                            @foreach ($categories as $category)
                                <li><a class="dropdown-item {{isset($currentCategory) && $currentCategory->is($category) ? 'active' : ''}}" href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                                       :active='request()->fullUrlIs("*?category={$category->slug}*")'
                                    >
                                        {{ ucwords($category->name) }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}">
                        @endif

                        <input type="text"
                               name="search"
                               placeholder="Szukaj"
                               class="form-control rounded"
                               value="{{ request('search') }}"
                               aria-label="Search"
                               aria-describedby="search-addon"
                        >
                        <button class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- Post preview-->
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="post-preview">
                        <div class="row">
                            <div class="col-4">
                                <img src="assets/img/placeholder.png" class="img-fluid">
                                <span class="badge rounded-pill bg-light mt-3"><a href="/?category={{ $post->category->slug }}">{{ $post->category->name }}</a></span>
                            </div>
                            <div class="col-8">
                                <a href="/posts/{{ $post->slug }}"><h2 class="post-title">{{$post->title}}</h2>
                                    <h3 class="post-subtitle">{{ $post->excerpt }}</h3></a>
                            </div>
                            <p class="post-meta">
                                Opublikowane przez
                                <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                                w dniu {{ $post->created_at->format('d.m.Y') }}
                            </p>
                        </div>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                @endforeach
                <!-- Pager-->
                <div class="d-flex justify-content-center mb-4">{{ $posts->links() }}</div>
            @else
                <p class="post-meta text-center">Niestety, nie ma jeszcze postów.</p>
            @endif
        </div>
    </div>
</div>
@endsection
