@extends('layouts.app')

@section('title','Panel admina - ')

@section('content')

<header class="masthead" style="background-image: url({{asset('assets/img/adminhome-bg.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-12">
                <div class="site-heading">
                    <h1>Panel administratora</h1>
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
            <table class="table align-middle mb-0 bg-white">
                <tbody>
                    @if ($posts->count())
                        @foreach($posts as $post)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="{{ $post->author->avatar ? asset('storage/'.$post->author->avatar) : asset('storage/avatars/default.jpg') }}" alt="" style="width: 45px; height: 45px" class="rounded-circle"/>
                                        <div class="ms-3">
                                            <p class="fw-bold mb-1">{{ $post->author->name }}</p>
                                            <p class="text-muted m-0">{{ $post->author->email }}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="fw-normal mb-1">
                                        <a class="nav-link text-decoration-none" href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                                    </p>
                                </td>
                                <td>
                                    <span class="badge badge-success rounded-pill d-inline text-dark">
                                        {{ $post->published ? 'Opublikowane' : 'Wersja robocza' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="/admin/posts/{{ $post->id }}/edit" class="btn btn-link btn-sm btn-rounded">
                                        Edytuj
                                    </a>
                                </td>
                                <td>
                                    </button>
                                    <form method="POST" action="/admin/posts/{{ $post->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-sm btn-rounded">
                                            Usuń
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center m-4">{{ $posts->links() }}</div>
                    @else
                        <p class="post-meta text-center m-5">Niestety, nie ma jeszcze postów.</p>
                    @endif
        </div>
    </div>
</div>
@endsection
