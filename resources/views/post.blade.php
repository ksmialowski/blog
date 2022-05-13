@extends('layouts.app')

@section('title','post')

@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url({{asset('assets/img/post-bg.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{$post->title}}</h1>
                    <h2 class="subheading">{{$post->excerpt}}</h2>
                    <span class="meta">
                                Wysłane przez
                                <a href="#!">autor</a>
                                w dniu 12 maja 2022
                            </span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Post Content-->
<article class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <p class="text-justify">{{$post->body}}</p>
                <hr class="my-4" />
                <div class="d-flex flex-column comment-section">
                    <div class="bg-white p-2">
                        <div class="d-flex flex-row user-info">
                            <img class="rounded-circle" src="assets/img/avatar.jpg">
                            <div class="d-flex flex-column justify-content-center p-2">
                                <span class="d-block font-weight-bold name">Kamil Śmiałowski</span>
                                <span class="date text-black-50"> 12 maja 2022</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        </div>
                    </div>
                    <div class="bg-light p-4">
                        <div class="d-flex flex-row align-items-start">
                            <img class="rounded-circle m-2" src="assets/img/avatar.jpg" width="40">
                            <textarea style="resize: none;" placeholder="Napisz coś..." class="form-control ml-1 shadow-none textarea" id="commentOutput"></textarea>
                        </div>
                        <div class="mt-4 text-right">
                            <button class="btn btn-secondary btn-sm shadow-none m-1" type="button">Zostaw komentarz</button>
                            <button class="btn btn-outline-secondary btn-sm shadow-none" type="button" onclick="javascript:eraseText();">Wyczyść</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
