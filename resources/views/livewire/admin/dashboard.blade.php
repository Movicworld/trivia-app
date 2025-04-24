@extends('layouts.user')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="content">
        <h2 class="fw-bold">Dashboard</h2>
        <p>Welcome to Trivia, {{ Auth::user()->name }}!</p>
    </div>
@endsection
