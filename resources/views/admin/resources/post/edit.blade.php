@extends('admin.layout.app')

@section('title', 'Edit Post')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp;{{ session('success') }} 
        </div>
    @endif --}}

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('posts') }}">Post</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </nav>

    <div class="card shadow">
        <div class="card-header">
            <div class="text-primary font-weight-bold">
                Edit Post
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('posts.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control"
                                value="{{ old('title', $posts->title) }}">
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="image-admin">
                            <img src="{{ asset('thumbnail/'. $posts->thumbnail) }}" alt="{{ $posts->thumbnail }}" class="border border-secondary border-2 rounded w-100 h-100 object-fit-cover">
                        </div>
                    </div>
                </div>

                <textarea name="content" id="editor" cols="30" rows="10">
                    {{ old('content', $posts->content) }}
                </textarea>

                <div class="mt-3">
                    <a href="{{ route('posts') }}" class="btn btn-danger">
                        <i class="far fa-times-circle"></i>
                        &nbsp;Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        &nbsp;Update
                    </button>
                </div>

            </form>
        </div>
    </div>



    {{-- <-----------------------------------------------------------------> --}}
    <script>
        CKEDITOR.replace( 'editor' );
    </script>

    {{-- <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant"))
        });
    </script> --}}
@endsection
