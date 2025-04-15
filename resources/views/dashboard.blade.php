@extends('layouts.app')

@section('content')
<div class="content content-full">
    <h1 class="h3">Welcome {{ Auth::user()->name }}</h1>
    <p class="fs-sm text-muted">
        You are logged in as {{ Auth::user()->getRoleNames()->first() ?? 'User' }}.
    </p>
</div>
@endsection
