@extends('admin.layout.app')

@section('title', 'Add Slider Image')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
        </div>
    @endif --}}
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="list">Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>
    </div>
    <div class="card shadow">
        <div class="card-header">
            <div class="text-primary font-weight-bold">
                Add Slider Image
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-4">
                        <div class="mb-4">
                            <label for="image">Image</label>
                            <input type="file" name="image" id="image"
                                class="form-control @error('image')
                                is-invalid                        
                            @enderror ">
                            @error('image')
                                <small class="text-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="status" class="form-label">Status</label>
                            <select class="custom-select" aria-label="Default select example" id="status" name="status">
                                <option mute selected>-- Select Status --</option>
                                <option value="1">Publish</option>
                                <option value="0">unPublish</option>
                            </select>
                            @error('status')
                                <small class="alert alert-danger">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-8">
                        <div>
                            <label for="description" class="form-label">Description</label>
                            <input type="text" name="description" id="description"
                                class="form-control @error('description')
                                is-invalid
                            @enderror">
                        </div>
                        @error('description')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                <div class="mt-3">
                    <a href="list" class="btn btn-danger">
                        <i class="far fa-times-circle me-3"></i>
                            &nbsp;Cancel
                    </a>
                    <button class="btn btn-primary">
                        <i class="fas fa-save me-3"></i>
                        &nbsp;Add
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
