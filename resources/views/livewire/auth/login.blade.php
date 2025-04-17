@extends('layouts.guest')

@section('content')
    <div class="bg-body-dark">
        <div class="hero-static content content-full px-1">
            <div class="row mx-0 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <!-- Header -->
                    <div class="py-4 text-center">
                        <a class="link-fx fw-bold" href="{{ url('/') }}">
                            <i class="fa fa-fire"></i>
                            <span class="fs-4">Trivia App</span>
                        </a>
                        <h1 class="h3 fw-bold mt-4 mb-1">Sign in to your account</h1>
                        <h2 class="fs-5 lh-base fw-normal text-muted mb-0">It’s a great day today!</h2>
                    </div>

                    @if (session()->has('message'))
                        <div class="alert alert-info">{{ session('message') }}</div>
                    @endif

                    <!-- Login Form -->
                    <form wire:submit="save">
                        <div class="block block-themed block-rounded block-fx-shadow">
                            <div class="block-header bg-gd-dusk">
                                <h3 class="block-title">Please Sign In</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-floating mb-4">
                                    <input type="text" wire:model="email" class="form-control" id="email"
                                        placeholder="Enter your email">
                                    <label class="form-label" for="email">Email</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input type="password" wire:model="password" class="form-control" id="password"
                                        placeholder="Enter your password">
                                    <label class="form-label" for="password">Password</label>
                                </div>
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="form-check">
                                        <input type="checkbox" wire:model="remember" class="form-check-input" type="checkbox" id="remember">
                                        <label class="form-check-label" for="remember">Remember Me</label>
                                    </div>
                                    <a class="fs-sm text-primary" href="{{ route('password.request') }}">
                                        Forgot Password?
                                    </a>
                                </div>
                                <div class="text-center mb-3">
                                    <a href="{{ route('auth.google') }}" class="btn btn-danger w-100">
                                        <i class="fab fa-google me-2"></i> Sign in with Google
                                    </a>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                        Sign In
                                    </button>
                                </div>

                                <br>
                            </div>
                            <div class="block-content block-content-full bg-body-light text-center">
                                <span class="text-muted me-2">No account yet?</span>
                                <a class="fw-semibold" href="{{ route('register') }}">Sign up</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
