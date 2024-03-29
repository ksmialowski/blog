@extends('layouts.app')

@section('title',$user->name.' - ')

@section('content')

<header class="masthead" style="background-image: url({{asset('assets/img/adminhome-bg.jpg')}})">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-12">
                <div class="site-heading">
                    <h1>{{ $user->name }}</h1>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <div class="text-center">
                    <img src="{{ auth()->user()->avatar ? asset('storage/'.auth()->user()->avatar) : asset('storage/avatars/default.jpg') }}" style="width:300px;height:300px;margin:0 auto;" class="card-img-top " alt="...">
                    <h5 class="card-title pt-3">{{ $user->username }}</h5>
                    <p class="card-text m-2">{{ $user->email }}</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{ $user->name }}</li>
                    <li class="list-group-item">

                    </li>
                </ul>
                <form method="POST" action="/profile/{{ $user->username }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-outline mb-2">
                        <label class="form-label">Avatar</label>
                        <input type="file" name="avatar" class="form-control">
                        <x-error name="avatar" />
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg my-3">Zatwierdź</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
