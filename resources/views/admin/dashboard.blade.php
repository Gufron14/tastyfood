@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
        </div>
    @endif

    <h4 class="py-3 font-weight-bold">Welcome

        @auth
            {{ Auth::user()->name }}
        @endauth

        to Tasty Food Panel</h4>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                posts</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countPost }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-newspaper fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Gallery</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countGallery }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-images fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tasks Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Slider</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countSlider }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="far fa-image fa-2x text-gray-300"></i>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Message</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countMessage }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-envelope fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row mt-3 mx-3">
        <div class="col-6 d-flex justify-content-between">
            <h5>Latest Post</h5>
            <a href="{{ route('posts') }}" class="mr-5">See all <i class="bi bi-arrow-right"></i></a>
        </div>
        <div class="col-6 d-flex justify-content-between">
            <h5>Latest Messages</h5>
            <a href="{{ route('message') }}" class="mr-3">See all <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
    <div class="row p-3  gap-3 mb-4">
        <div class="col-6">
            @foreach ($posts as $post)
            <div class="mb-5">
                <div class="thumbnail border rounded">
                    <img src="{{ asset('thumbnail/' . $post->thumbnail) }}" alt="" class="rounded h-100 w-100 object-fit-cover">
                </div>
                <div class="mt-3">
                    <h6 class="font-weight-bold">{{ $post->title }}</h6>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-6 ">
            @foreach ($messages as $message)
                <div class="card mb-3">
                    <div class="card-header bg-primary d-flex justify-content-between">
                        <div class="text-white">
                            <h6 class="font-weight-bold">{{ $message->name }} </h6>
                        </div>
                        <div class="text-white">
                            <small>{{ $message->created_at->format('D, d-m-Y h.i A') }}</small>
                        </div>
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <small>{{ Str::limit($message->message, 60) }}</small>
                        <small>
                            <a href="{{ route('viewmessage', $message->id)  }}">Read more</a>
                        </small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
