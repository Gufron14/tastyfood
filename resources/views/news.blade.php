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
                <div class="col-lg-6 mb-5">
                    <div class="image-frame4" data-aos="fade-right">
                        <img src="{{ asset('thumbnail/'. $post->thumbnail) }}" class="w-100 h-100 rounded object-fit-cover" alt="ini gambar">
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12">
                    <h3 class="fw-bold mb-3" data-aos="fade-left">{{ $post->title }}</h3>
                    <p data-aos="fade-left" id="konten">{{  strip_tags($post->content) }}</p>
                    <div data-aos="fade-left">
                        <button class="button mt-5 fw-bold">
                            <a href="{{ route('viewberita', $post->id) }}">BACA SELENGKAPNYA</a>
                        </button>
                    </div>
                </div>
            </div>
        @endforeach



        <div class="container p-5">
            <h4 class="fw-bold mb-5" data-aos="fade-right">BERITA LAINNYA</h4>

            <div class="d-lg-flex gap-3" data-aos="fade-up-left">
                @foreach ($posts as $post)    
                <div class="card news-card mb-3" style="width: 18rem;">
                    <img src="{{ asset('thumbnail/' . $post->thumbnail) }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-uppercase">{{ $post->title }}</h5>
                        <p class="card-text">{{ strip_tags($post->content) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('viewberita', $post->id) }}" class="link-warning text-decoration-none">Baca selengkapnya</a>
                            <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            {{-- <div class="d-lg-flex gap-3" data-aos="fade-up-right">
                <div class="card news-card mb-3" style="width: 18rem;">
                    <img src="{{ asset('assets/img/luisa-brimble-HvXEbkcXjSk-unsplash.jpg') }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-uppercase">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                            <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                        </div>
                    </div>
                </div>
                <div class="card news-card mb-3" style="width: 18rem;">
                    <img src="{{ asset('assets/img/sanket-shah-SVA7TyHxojY-unsplash.jpg') }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-uppercase">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                            <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                        </div>
                    </div>
                </div>
                <div class="card news-card mb-3" style="width: 18rem;">
                    <img src="{{ asset('assets/img/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg') }}"
                        class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-uppercase">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                            <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                        </div>
                    </div>
                </div>
                <div class="card news-card mb-3" style="width: 18rem;">
                    <img src="{{ asset('assets/img/jimmy-dean-Jvw3pxgeiZw-unsplash.jpg') }}" class="card-img-top"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-uppercase">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                            <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>

    {{-- <script>
        var text = document.getElementById("konten").innerHTML;
        var limit = 400;
        var newText = text.substring(0, limit);
        document.getElementById("konten").innerHTML = newText;
    </script> --}}
@endsection
