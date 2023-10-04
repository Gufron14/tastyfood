@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <h3>Welcome to Tasty Food Panel</h3>
@endsection