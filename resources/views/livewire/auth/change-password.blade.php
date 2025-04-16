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
                        <h1 class="h3 fw-bold mt-4 mb-1">Reset Your Password</h1>
                        <h2 class="fs-5 lh-base fw-normal text-muted mb-0">Choose a new password below</h2>
                    </div>

                    @if (session()->has('message'))
                        <div class="alert alert-success text-center">{{ session('message') }}</div>
                    @endif

                    <form wire:submit.prevent="resetPassword" class="js-validation-reminder">
                        <div class="block block-themed block-rounded block-fx-shadow">
                            <div class="block-header bg-gd-dusk">
                                <h3 class="block-title">Change Password</h3>
                            </div>
                            <div class="block-content">
                                <div class="form-floating mb-4">
                                    <input wire:model.defer="email" type="email" class="form-control" id="email"
                                           placeholder="Email" readonly>
                                    <label class="form-label" for="email">Email</label>
                                    @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-floating mb-4">
                                    <input wire:model.defer="password" type="password" class="form-control"
                                           id="password" placeholder="New Password">
                                    <label class="form-label" for="password">New Password</label>
                                    @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="form-floating mb-4">
                                    <input wire:model.defer="password_confirmation" type="password"
                                           class="form-control" id="password_confirmation"
                                           placeholder="Confirm Password">
                                    <label class="form-label" for="password_confirmation">Confirm Password</label>
                                    @error('password_confirmation') <small class="text-danger">{{ $message }}</small> @enderror
                                </div>

                                <div class="mb-3 text-end">
                                    <button type="submit" class="btn btn-alt-primary fw-semibold">
                                        Reset Password
                                    </button>
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
