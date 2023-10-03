@extends('admin.layout.app')

@section('title', 'Gallery')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="text-primary font-weight-bold">
                List Post
            </div>
            <div>
                <a href="create" class="btn btn-warning font-weight-bold">Add New Image</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galleries as $item)
                            <tr>
                                <td>
                                    <img src="/storage/public/galleries/{galleries}" alt="">  </td>
                                <td>
                                    <a href="{{ route('gallery.edit', $item->id) }}" class="btn btn-warning mb-2">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <form action="{{ route('gallery.delete', $item->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <td colspan="4" class="text-center p-5">
                                <i class="far fa-times-circle" style="font-size: 58px"></i>
                                <div class="text-danger mt-3">
                                    Empty.
                                </div>
                                <div class="mt-3">
                                    <a href="create" class="btn btn-warning font-weight-bold">Add New Image</a>
                                </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
