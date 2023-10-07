@extends('admin.layout.app')

@section('title', 'Create Post')

@section('content')

    {{-- @if (session('success'))
        <div class="alert alert-success">
            <i class="bi bi-check-circle-fill"></i> &nbsp; {{ session('success') }}
        </div>
    @endif --}}



    <div class="card shadow mb-4">
            <div class="p-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item my-auto"><a href="list">Post</a></li>
                        <li class="breadcrumb-item font-weight-bold active" aria-current="page">Create</li>
                    </ol>
                </nav>
            </div>
        <div class="card-body">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-8 form-group">
                        <div class="">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title"
                                class="form-control">
                        </div>
                        @error('title')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <div class="">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" id="thumbnail"
                                class="form-control">
                        </div>
                        @error('thumbnail')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror
                    </div>
                </div>

                {{-- <textarea name="content" id="content" cols="30" rows="10" class="form-control @error('thumbnail') is-invalid @enderror"></textarea> --}}

                <textarea name="content" id="editor" cols="30" rows="20"></textarea>
                @error('content')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror

                <div class="mt-3">
                    <a href="list" class="btn btn-danger">
                        <i class="far fa-times-circle"></i>
                        &nbsp;&nbsp;Cancel
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i>
                        &nbsp;&nbsp;Create
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
