@extends('layouts.app')

@section('title','Logowanie')

@section('content')
    <header class="masthead" style="background-image: url({{asset('assets/img/login-bg.jpg')}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-12">
                    <div class="site-heading">
                        <h1>Zaloguj się</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <form method="POST" action="/login">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" autocomplete="email" required>
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Hasło</label>
                        <input type="password" name="password" autocomplete="current-password" class="form-control" required>
                        @error('email')
                        <div class="alert alert-danger small mt-3" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg my-3">Zaloguj się</button>
                </form>
            </div>
        </div>
@endsection
