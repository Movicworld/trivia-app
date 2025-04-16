@extends('layouts.guest')

@section('content')
<div class="bg-body-dark">
    <div class="hero-static content content-full px-1">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-6 col-xl-5">
                <div class="py-4 text-center">
                    <a class="link-fx fw-bold" href="{{ url('/') }}">
                        <i class="fa fa-fire"></i> <span class="fs-4">Trivia App</span>
                    </a>
                    <h1 class="h3 fw-bold mt-4 mb-1">Forgot Password</h1>
                    <p class="fs-sm text-muted">We’ll send you a link to reset it.</p>
                </div>

                @if (session('message'))
                    <div class="alert alert-success">{{ session('message') }}</div>
                @elseif (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form wire:submit.prevent="sendResetLink" class="js-validation-signin">
                    <div class="block block-rounded block-themed block-fx-shadow">
                        <div class="block-header bg-gd-sea">
                            <h3 class="block-title">Reset Your Password</h3>
                        </div>
                        <div class="block-content">
                            <div class="form-floating mb-4">
                                <input wire:model="email" type="email" class="form-control" id="email"
                                       placeholder="Enter your email">
                                <label class="form-label" for="email">Email Address</label>
                                @error('email') <span class="text-danger small">{{ $message }}</span> @enderror
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-alt-primary">Send Reset Link</button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="text-center mt-3">
                    <a class="fs-sm" href="{{ route('login') }}">
                        <i class="fa fa-sign-in-alt opacity-50 me-1"></i> Back to Sign In
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
