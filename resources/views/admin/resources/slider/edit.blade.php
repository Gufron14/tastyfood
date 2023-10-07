@extends('admin.layout.app')

@section('title', 'Edit Slider Image')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
        </div>
    @endif --}}
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{ route('slider') }}">Slider</a></li>
              <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>
    </div>
    <div class="card shadow">
        <div class="card-header">
            <div class="text-primary font-weight-bold">
                Edit Image
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('slider.update', $sliders->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="container">
                    <div class="row">
                        <div class="col-6 ">
                            <div class="rounded">
                                <img class="rounded" src="{{ asset('slider/' . $sliders->image ) }}" alt="{{ $sliders->image }}" width="400px">
                            </div>
                        </div>
                        <div class="col-6 ">
                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" id="image" class="form-control" value="{{ old('image', $sliders->image) }}">
                            </div>
                    
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" name="description" id="description" class="form-control" value="{{ old('description', $sliders->description) }}">
                            </div>
                            @error('description')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                    
                            <div class="mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="custom-select" aria-label="Default select example" name="status" id="status">
                                    <option selected>-- Select Status --</option>
                                    <option value="1">Publish</option>
                                    <option value="0">unPublish</option>
                                </select>
                            </div>
                        </div>
                    </div>
    
                    <div class="mt-5">
                        <a href="{{ route('slider') }}" class="btn btn-danger">
                            <i class="far fa-times-circle"></i>
                            &nbsp;Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i>
                            &nbsp;Update
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
