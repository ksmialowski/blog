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
            <div class="mb-5">
                <div class="input-group rounded">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Kategorie</option>
                        <option value="1">X</option>
                        <option value="2">Y</option>
                        <option value="3">Z</option>
                    </select>
                    <input type="search" class="form-control rounded" placeholder="Szukaj" aria-label="Search" aria-describedby="search-addon" />
                    <span class="input-group-text border-0" id="search-addon">
                                <i class="fas fa-search"></i>
                            </span>
                </div>
            </div>
            <!-- Post preview-->
            <div class="post-preview">
                <div class="row">
                    <div class="col-4">
                        <img src="assets/img/placeholder.png" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <a href="#"><h2 class="post-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
                            <h3 class="post-subtitle">Maecenas nunc orci, volutpat ac ipsum ultricies, aliquet fermentum orci. Sed suscipit dui massa.</h3></a>
                    </div>
                    <p class="post-meta">
                        Wysłane przez
                        <a href="#!">autor</a>
                        w dniu 12 maja 2022
                    </p>
                </div>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <div class="row">
                    <div class="col-4">
                        <img src="assets/img/placeholder.png" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <a href="#"><h2 class="post-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
                            <h3 class="post-subtitle">Maecenas nunc orci, volutpat ac ipsum ultricies, aliquet fermentum orci. Sed suscipit dui massa.</h3></a>
                    </div>
                    <p class="post-meta">
                        Wysłane przez
                        <a href="#!">autor</a>
                        w dniu 12 maja 2022
                    </p>
                </div>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <div class="row">
                    <div class="col-4">
                        <img src="assets/img/placeholder.png" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <a href="#"><h2 class="post-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
                            <h3 class="post-subtitle">Maecenas nunc orci, volutpat ac ipsum ultricies, aliquet fermentum orci. Sed suscipit dui massa.</h3></a>
                    </div>
                    <p class="post-meta">
                        Wysłane przez
                        <a href="#!">autor</a>
                        w dniu 12 maja 2022
                    </p>
                </div>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Post preview-->
            <div class="post-preview">
                <div class="row">
                    <div class="col-4">
                        <img src="assets/img/placeholder.png" class="img-fluid">
                    </div>
                    <div class="col-8">
                        <a href="#"><h2 class="post-title">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
                            <h3 class="post-subtitle">Maecenas nunc orci, volutpat ac ipsum ultricies, aliquet fermentum orci. Sed suscipit dui massa.</h3></a>
                    </div>
                    <p class="post-meta">
                        Wysłane przez
                        <a href="#!">autor</a>
                        w dniu 12 maja 2022
                    </p>
                </div>
            </div>
            <!-- Divider-->
            <hr class="my-4" />
            <!-- Pager-->
            <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Starsze posty →</a></div>
        </div>
    </div>
</div>
@endsection
