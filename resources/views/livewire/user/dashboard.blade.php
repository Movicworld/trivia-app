@extends('layouts.user')

@section('title', 'Dashboard')

@section('content')
    <div class="content">
        <h2 class="fw-bold">Dashboard</h2>
        <p>Welcome to Trivi, {{ Auth::user()->name }}!</p>
    </div>
@endsection
