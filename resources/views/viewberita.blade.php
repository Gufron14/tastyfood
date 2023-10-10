@section('title')
    {{ $posts->title }}
@endsection
@include('layout.header')


<nav class="navbar navbar-expand-lg bg-body-tertiary px-5">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="/">TASTY FOOD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-lg-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('index') }}">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">TENTANG</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('news') }}">BERITA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('galery') }}">GALERI</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">KONTAK</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="d-flex justify-content-center mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb text-center">
            <li class="breadcrumb-item"><a href="{{ route('news') }}" style="color: #4c00ff">Berita</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $posts->title }}</li>
        </ol>
    </nav>
</div>

<div class="row justify-content-center gap-2 mb-5 mt-5">
    <div class="col-3" style="height: 600px">
        <h6 class="mb-3">Berita Lainnya</h6>
        @foreach ($thumbnails as $thumbnail)
            <div class="mb-4">
                <a href="{{ route('viewberita', $thumbnail->id) }}">
                    <div class="view-thumbnail mb-3">
                        <img src="{{ asset('thumbnail/' . $thumbnail->thumbnail) }}" alt=""
                            class="w-100 h-100 object-fit-cover rounded">
                    </div>
                    <small>
                        {{ $thumbnail->title }}
                    </small>
                </a>
            </div>
        @endforeach
    </div>
    <div class="col-5">
        <div class=" mb-5" style="width: 500px">
            <div class="d-flex justify-content-center">
                <div class="news-thumbnail mb-5 shadow rounded">
                    <img src="{{ asset('thumbnail/' . $posts->thumbnail) }}" alt="{{ $posts->thumbnail }}"
                        class="w-100 h-100 rounded object-fit-cover">
                </div>
            </div>

            <div class="mb-4">
                <h2 class="fw-bold">{{ $posts->title }}</h2>
                <small class="text-secondary" data-aos="fade-left">
                    <i class="fas fa-calendar-alt me-2"></i> {{ $posts->created_at->format('l, d-m-Y') }}
                </small>
            </div>

            <p class="text-justify">
                {{ strip_tags($posts->content) }}
            </p>
        </div>
    </div>
    <div class="col-3" style="height: 600px">
        <h6 class="mb-3">Gallery</h6>
        @foreach ($galleries as $gallery)
            <div class="gallery mb-3">
                <img src="{{ asset('image/' . $gallery->image) }}" alt=""
                    class="w-100 h-100 object-fit-cover rounded">
            </div>
        @endforeach
    </div>
</div>


@include('layout.footer')
@include('layout.script')
