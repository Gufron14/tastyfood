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

                <div class="row gap-4 mb-4">
                    <div class="col-6">
                        <label for="image" class="form-lable">Image</label>
                        <input type="file" name="image" id="image" class="form-control @error('image')
                            is-invalid
                        @enderror">
                        @error('image')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="col-6">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control @error('status')
                            is-invalid
                        @enderror">
                            <option value="">-- Select Status --</option>
                            <option value="1">Publish</option>
                            <option value="0">unPublish</option>
                        </select>
                        @error('status')
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
