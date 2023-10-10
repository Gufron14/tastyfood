@extends('admin.layout.app')

@section('title', 'Edit Image')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
        </div>
    @endif --}}

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('gallery') }}">Gallery</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow">
        <div class="card-header">
            <div class="text-primary font-weight-bold">
                Edit Gallery Image
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('gallery.update', $galleries->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="row align-items-center">
                    <div class="col-4">
                        <div class="gallery">
                            <img class="rounded w-100 h-100 object-fit-cover" src="{{ asset('image/'. $galleries->image) }}" alt="{{ $galleries->image }}">
                        </div>
                    </div>
                    <div class="col-8">
                        <div>
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control"
                                value="{{ old('image', $galleries->id) }}">
                        </div>
        
                        <div class="mt-3">
                            <a href="{{route('gallery')}}" class="btn btn-danger">
                                <i class="far fa-times-circle"></i>
                                &nbsp;Cancel
                            </a>
                            <button class="btn btn-primary">
                                <i class="fas fa-save"></i>
                                &nbsp;Update
                            </button>
                        </div>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
@endsection
