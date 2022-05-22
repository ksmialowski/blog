@extends('layouts.app')

@section('title','Zarejestruj się do ')

@section('content')

    <header class="masthead" style="background-image: url({{asset('assets/img/register-bg.jpg')}})">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-12">
                    <div class="site-heading">
                        <h1>Zarejestruj się</h1>
                        <span class="subheading">aby komentować posty</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <form method="POST" action="/register">
                    @csrf
                    <!-- Name input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Imię i nazwisko</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="alert alert-danger small mt-3" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Username input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Nazwa użytkownika</label>
                        <input type="text" name="username" class="form-control" value="{{ old('username') }}" required>
                        @error('username')
                            <div class="alert alert-danger small mt-3" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="alert alert-danger small mt-3" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-2">
                        <label class="form-label">Hasło</label>
                        <input type="password" name="password" autocomplete="new-password" class="form-control" required>
                        @error('password')
                            <div class="alert alert-danger small mt-3" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg my-3">Zarejestruj się</button>
                </form>
            </div>
        </div>
@endsection
