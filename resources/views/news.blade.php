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
                    <h3 class="fw-bold" data-aos="fade-left">{{ $post->title }}</h3>
                    <small class="text-secondary" data-aos="fade-left">
                        <i class="fas fa-calendar-alt me-2"></i> {{ $post->created_at->format('l, d-m-Y') }}
                    </small>
                    <p data-aos="fade-left" id="konten" class="mt-3">{{  strip_tags(Str::limit($post->content, 500)) }}</p>
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

            <div class="row gap-3" data-aos="fade-up-left">
                @foreach ($postsCard as $postCard)    
                <div class="card news-card mb-3" style="width: 18rem;">
                    <img src="{{ asset('thumbnail/' . $postCard->thumbnail) }}" class="card-img-top"
                        alt="...">
                    <div class="card-body p-4">
                        <h6 class="card-title fw-bold text-uppercase">{{ $postCard->title }}</h6>
                        <small class="card-text">{{ strip_tags(Str::limit($postCard->content, 200)) }}</small>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <small><a href="{{ route('viewberita', $postCard->id) }}" class="link-warning text-decoration-none">Baca selengkapnya</a>
                                </small>
                            <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
