@extends('layouts.guest')

@section('content')
<div class="content content-full text-center">
    <h1 class="display-4 fw-bold mt-5">Welcome to Trivia App</h1>
    <p class="fs-5 text-muted">Join thousands playing daily online trivia games.</p>
    {{-- <a href="{{ route('register') }}" class="btn btn-primary mt-3">Sign In</a> --}}
    <a href="{{ route('login') }}" class="btn btn-primary mt-3">Sign In</a>
</div>
@endsection
