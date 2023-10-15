@extends('layout.app')
@section('title', 'Berita')

@section('title-page')
    BERITA KAMI
@endsection

@section('content')
    <!-- KONTEN -->
    <div class="container-fluid">

        @foreach ($posts as $post)
            <div class="container p-5 mt-5 gap-5 d-lg-flex justify-content-between">
                <div class="col-lg-6">
                    <div class="image-frame4 border shadow" data-aos="fade-right">
                        <img src="{{ asset('thumbnail/'. $post->thumbnail) }}" class="w-100 h-100 rounded object-fit-cover" alt="ini gambar">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <h3 class="fw-bold text-justify" data-aos="fade-left">{{ $post->title }}</h3>
                    <small class="text-secondary" data-aos="fade-left">
                        <i class="fas fa-calendar-alt me-2"></i> {{ $post->created_at->format('l, d-m-Y') }}
                    </small>
                    <p data-aos="fade-left" id="konten" class="mt-3 text-justify">{{  strip_tags(Str::limit($post->content, 500)) }}</p>
                    <div data-aos="fade-left">
                        <button class="button mt-2 fw-bold">
                            <a href="{{ route('viewberita', $post->id) }}">BACA SELENGKAPNYA</a>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach

        <div class="container p-5">
            <h4 class="fw-bold mb-5" data-aos="fade-right">BERITA LAINNYA</h4>

            <div class="row row-cols-1 row-cols-md-4 g-4" data-aos="fade-up-left">
                @foreach ($postsCard as $postCard)
                <div class="col">
                    <div class="card mb-3" style="width: 15rem;">
                        <img src="{{ asset('thumbnail/' . $postCard->thumbnail) }}" class="card-img-top object-fit-cover"
                            alt="..." style="height: 200px">
                        <div class="card-body mt-3">
                            <h6 class="card-title fw-bold text-uppercase">{{ $postCard->title }}</h6>
                            <div class="card-text text-justify mt-3">
                                <small>{{ strip_tags(Str::limit($postCard->content, 160)) }}</small>
                            </div>
                        </div>
                        <small class="d-flex justify-content-between px-3 mb-4">
                            <a href="{{ route('viewberita', $postCard->id) }}" class="link-warning text-decoration-none">Baca selengkapnya</a>
                            <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                        </small>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
