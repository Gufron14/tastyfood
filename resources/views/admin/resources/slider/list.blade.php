@extends('admin.layout.app')

@section('title', 'Slider')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp;&nbsp; {{ session('success') }}
        </div>
    @endif --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="text-primary font-weight-bold">
                List Slider Image
            </div>
            <div>
                <a href="create" class="btn btn-primary font-weight-bold">Add New Image</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            {{-- <th>Description</th> --}}
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $slider)
                            <tr>
                                <td>
                                    <div class="slider mx-auto">
                                        <img src="{{ asset('slider/' . $slider->image) }}" alt="{{ $slider->image }}" class="rounded w-100 h-100 object-fit-cover"> </td>
                                    </div>
                                {{-- <td> {{ $slider->description }} </td> --}}
                                <td> 
                                    @if ($slider->status == 1)
                                        <div class="badge badge-success">
                                            Published
                                        </div>
                                    @else
                                        <div class="badge badge-secondary">
                                            Unpublished
                                        </div>
                                    @endif    
                                </td>
                                <td>
                                    <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-warning mb-2">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <form action="{{ route('slider.delete', $slider->id) }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="5" class="text-center p-5">
                                <i class="far fa-times-circle" style="font-size: 58px"></i>
                                <div class="text-danger mt-3">
                                    Slider Image Empty.
                                </div>
                                <div class="mt-3">
                                    <a href="create" class="btn btn-primary font-weight-bold">Add New Image</a>
                                </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
