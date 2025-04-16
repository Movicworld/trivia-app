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
                    <form wire:submit.prevent="login" class="js-validation-signin">
                        <div class="block block-themed block-rounded block-fx-shadow">
                            <div class="block-header bg-gd-dusk">
                                <h3 class="block-title">Please Sign In</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-floating mb-4">
                                    <input wire:model="email" type="text" class="form-control" id="login-email"
                                        placeholder="Enter your email">
                                    <label class="form-label" for="login-email">Email</label>
                                </div>
                                <div class="form-floating mb-4">
                                    <input wire:model="password" type="password" class="form-control" id="login-password"
                                        placeholder="Enter your password">
                                    <label class="form-label" for="login-password">Password</label>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 d-sm-flex align-items-center push">
                                        <div class="form-check">
                                            <input wire:model="remember" class="form-check-input" type="checkbox"
                                                id="login-remember-me">
                                            <label class="form-check-label" for="login-remember-me">Remember Me</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 text-sm-end push">
                                        <button type="submit" class="btn btn-lg btn-alt-primary fw-medium">
                                            Sign In
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
