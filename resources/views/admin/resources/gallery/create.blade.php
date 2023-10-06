@extends('admin.layout.app')

@section('title', 'Add Image')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
        </div>
    @endif --}}

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="list">Gallery</a></li>
          <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </nav>

    <div class="card shadow">
        <div class="card-header">
            <div class="text-primary font-weight-bold">
                Add Gallery Image
            </div>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image')
                        is-invalid                        
                    @enderror ">
                </div>
                @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

                <div class="mt-3">
                    <a href="list" class="btn btn-danger">
                        <i class="far fa-times-circle"></i>
                        &nbsp;Cancel
                    </a>
                    <button class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        &nbsp;Add
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
