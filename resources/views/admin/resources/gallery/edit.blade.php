@extends('admin.layout.app')

@section('title', 'Edit Image')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header">
            <div class="text-primary font-weight-bold">
                Galleries
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('gallery.update', $galleries->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div>
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image"
                        class="form-control @error('image')
                        is-invalid                        
                    @enderror"
                        value="{{ old('image', $galleries->id) }}">
                </div>
                @error('image')
                    <div class="text-danger">
                        {{ $message }}
                    </div>
                @enderror

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
            </form>
        </div>
    </div>
@endsection
