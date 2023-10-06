@extends('layout.app')

@section('title')
    {{ $posts->title }}
@endsection

@section('content')
    <div class="container border p-5" style="width: 600px">
        <div class="d-flex justify-content-center">
            <div class="mb-5">
                <img src="{{ asset('thumbnail/' . $posts->thumbnail) }}" alt="{{ $posts->thumbnail }}" width="500px" class="rounded">
            </div>
        </div>
        
        <div class="mb-4">
            <h2 class="fw-bold">{{ $posts->title }}</h2>
        </div>
        <p class="text-justify">
            {{ strip_tags($posts->content) }}
        </p>

@endsection
