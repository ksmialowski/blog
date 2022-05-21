@extends('layouts.app')

@section('title','post')

@section('content')
<!-- Page Header-->
<header class="masthead" style="background-image: url({{ asset('storage/' . $post->image) }})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="post-heading">
                    <h1>{{ $post->title }}</h1>
                    <h2 class="subheading">{{ $post->excerpt }}</h2>
                    <span class="meta">
                        {{ $post->created_at->diffForHumans() }}
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
                <p class="text-justify">{{ $post->body }}</p>
                <p class="text-justify">Napisane przez {{ $post->author->name }}</p>
                <hr class="my-5" />
{{--Comment Content--}}
                <div class="d-flex flex-column comment-section">
                    <h4 class="pb-4 fw-normal">Komentarze</h4>
                    @foreach($post->comments as $comment)
                        <div class="bg-white p-2">
                            <div class="d-flex flex-row user-info py-2">
                                @if(!is_null( auth()->user()->avatar))
                                    <img class="rounded-circle" src="{{ asset('storage/' . auth()->user()->avatar) }}" width="100">
                                @else
                                    <img class="rounded-circle" src="{{ asset('assets/img/avatar.jpg') }}" width="100">
                                @endif
                                <div class="d-flex flex-column justify-content-center p-2">
                                    <span class="d-block font-weight-bold name">{{ $comment->author->name }}</span>
                                    <span class="date text-black-50 small">{{ $comment->created_at->format('j F Y, H:i') }}</span>
                                </div>
                            </div>
                            <div>
                                <p class="text-justify m-0">{{ $comment->body }}</p>
                            </div>
                        </div>
                        <hr class="my-3" />
                    @endforeach
                    @auth
                        <form method="POST" action="/posts/{{ $post->slug }}/comments">
                            @csrf
                            <div class="bg-light p-4">
                                <div class="d-flex flex-row align-items-start">
                                    @if(!is_null( auth()->user()->avatar))
                                        <img class="rounded-circle m-2" src="{{ asset('storage/' . auth()->user()->avatar) }}" width="100">
                                    @else
                                        <img class="rounded-circle m-2" src="{{ asset('assets/img/avatar.jpg') }}" width="100">
                                    @endif
                                    <textarea style="resize: none;" name="body" placeholder="Napisz coś..." class="form-control ml-1 shadow-none textarea" id="commentOutput" required></textarea>
                                </div>
                                <div class="mt-4 text-right">
                                    @error('body')
                                        <div class="alert alert-danger small mt-3" role="alert">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <button class="btn btn-secondary btn-sm shadow-none m-1" type="submit">Zostaw komentarz</button>
                                    <button class="btn btn-outline-secondary btn-sm shadow-none" type="button" onclick="javascript:eraseText();">Wyczyść</button>
                                </div>
                            </div>
                        </form>
                    @else
                        <p class="text-center">
                            <a href="/register" class="text-decoration-none">Zarejestruj się</a> lub
                            <a href="/login" class="text-decoration-none">zaloguj,</a> aby zostawić komentarz.
                        </p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</article>
@endsection
