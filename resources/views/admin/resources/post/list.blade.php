@extends('admin.layout.app')

@section('title', 'List Post')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
        </div>
    @endif --}}

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <div class="text-primary font-weight-bold">
                List Post
            </div>
            <div>
                <a href="create" class="btn btn-primary font-weight-bold">Create New Post</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Thumbnail</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ strip_tags(Str::limit($post->content, 200)) }}</td>
                                <td>
                                    <img src="{{ asset('thumbnail/'. $post->thumbnail) }}" alt="{{ $post->thumbnail }}" class="image-admin rounded object-fit-cover border">
                                </td>
                                <td class="">
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning mb-2">
                                        <i class="fas fa-pen-square"></i>
                                    </a>
                                    <form action="{{ route('posts.delete', $post->id) }}" method="POST" enctype="multipart/form-data">
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
                                    Post Empty.
                                </div>
                                <div class="mt-3">
                                    <a href="create" class="btn btn-primary font-weight-bold">Add New Post</a>
                                </div>
                            </td>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection