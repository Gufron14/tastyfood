@extends('admin.layout.app')
@section('title', 'Dashboard')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
        </div>
    @endif

    <h3 class="mb-5 mt-5">Welcome 
        
        @auth
            {{ Auth::user()->name }}
        @endauth
        
        to Tasty Food Panel</h3>

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
                                    Gallery</div>
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
@endsection