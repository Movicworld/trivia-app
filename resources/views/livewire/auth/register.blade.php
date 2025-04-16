@extends('layouts.guest')

@section('content')

<div id="page-container" class="main-content-boxed">
    <main id="main-container">
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
                <h1 class="h3 fw-bold mt-4 mb-1">
                  Create New Account
                </h1>
                <h2 class="fs-5 lh-base fw-normal text-muted mb-0">
                  We’re excited to have you on board!
                </h2>
              </div>

              @if (session()->has('message'))
              <div class="alert alert-info">{{ session('message') }}</div>
              @endif

              <!-- Sign Up Form -->
              <form wire:submit.prevent="register">
                <div class="block block-themed block-rounded block-fx-shadow">
                  <div class="block-header bg-gd-emerald">
                    <h3 class="block-title">Please add your details</h3>
                  </div>
                  <div class="block-content">
                    <div class="form-floating mb-4">
                      <input type="text" class="form-control" id="signup-name" wire:model.defer="name" placeholder="Enter your name">
                      <label for="signup-name">Name</label>
                      @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="email" class="form-control" id="signup-email" wire:model.defer="email" placeholder="Enter your email">
                      <label for="signup-email">Email</label>
                      @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="password" class="form-control" id="signup-password" wire:model.defer="password" placeholder="Enter your password">
                      <label for="signup-password">Password</label>
                      @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-floating mb-4">
                      <input type="password" class="form-control" id="signup-password-confirm" wire:model.defer="password_confirmation" placeholder="Confirm password">
                      <label for="signup-password-confirm">Confirm Password</label>
                    </div>
                    <div class="row">
                      <div class="col-sm-6 d-sm-flex align-items-center push">
                        <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="signup-terms" name="signup-terms">
                          <label class="form-check-label" for="signup-terms">I agree to Terms</label>
                        </div>
                      </div>
                      <div class="text-center mb-3">
                        <a href="{{ route('auth.google') }}" class="btn btn-danger w-100">
                            <i class="fab fa-google me-2"></i> Sign in with Google
                        </a>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-alt-primary fw-semibold">
                            Create Account
                        </button>
                    </div>
                </div>
                <br>
                  </div>
                  <div class="block-content block-content-full bg-body-light text-center">
                    <span class="text-muted me-2">Already have an account?</span>
                    <a class="fw-semibold" href="{{ route('login') }}">Sign in</a>
                </div>
                  </div>
                </div>
              </form>
              <!-- END Sign Up Form -->
            </div>
          </div>
        </div>
      </div>
    </main>
</div>

@endsection
