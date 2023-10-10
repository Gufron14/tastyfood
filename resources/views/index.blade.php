@extends('layout.app')

@section('title')
    Beranda
@endsection

@section('content')
    {{-- About Section --}}
    <div class="container-fluid p-5">
        <div class="col-lg-6 col-sm-12 text-center mx-auto p-5 ">
            <h5 class="fw-bold mb-3" data-aos="fade-right">TENTANG KAMI</h5>
            <p data-aos="zoom-in">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa dignissimos earum fugit
                perspiciatis.
                Facere
                odit dolores ipsum ratione accusantium necessitatibus?</p>
            <div class="garis mx-auto bg-dark mt-3" data-aos="fade-left" style="width: 100px; height: 2px;"></div>
        </div>
    </div>
    {{-- End About Section --}}

    {{-- Card Image 1 --}}
    <div class="container-fluid banner-image">
        <div class="p-5">
            <div class="row d-flex justify-content-center gap-3 mt-5" data-aos="fade-up"
                data-aos-anchor-placement="top-center">
                <div class="card card-home position-relative mb-5 mt-5" style="width: 16rem;" id="floating">
                    <div class="bungkus position-relative">
                        <img src="{{ asset('assets/img/img-1.png') }}"
                            class="position-absolute top-0 start-50 translate-middle z-3" alt="..."
                            style="width: 70%;">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-uppercase">Card title</h5>
                        <p class="card-text">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit
                            iure
                            dignissimos molestiae odit corporis et tempora. Id in sint minima?</p>
                    </div>
                </div>
                <div class="card card-home position-relative mt-5 mb-5" style="width: 16rem;">
                    <div class="bungkus position-relative">
                        <img src="{{ asset('assets/img/img-1.png') }}"
                            class="position-absolute top-0 start-50 translate-middle z-3" alt="..."
                            style="width: 70%;">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-uppercase">Card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, cumque
                            aliquam
                            autem natus cupiditate sunt quam vel repudiandae tenetur reprehenderit!</p>
                    </div>
                </div>
                <div class="card card-home position-relative mb-5 mt-5" style="width: 16rem;">
                    <div class="bungkus position-relative">
                        <img src="{{ asset('assets/img/img-1.png') }}"
                            class="position-absolute top-0 start-50 translate-middle z-3" alt="..."
                            style="width: 70%;">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-uppercase">Card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, cumque
                            aliquam
                            autem natus cupiditate sunt quam vel repudiandae tenetur reprehenderit!</p>
                    </div>
                </div>
                <div class="card card-home position-relative mb-5 mt-5" style="width: 16rem;">
                    <div class="bungkus position-relative">
                        <img src="{{ asset('assets/img/img-1.png') }}"
                            class="position-absolute top-0 start-50 translate-middle z-3" alt="..."
                            style="width: 70%;">
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-uppercase">Card title</h5>
                        <p class="card-text mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, cumque
                            aliquam
                            autem natus cupiditate sunt quam vel repudiandae tenetur reprehenderit!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End Card Image 1 --}}

    <div class="bg-light p-5">
        {{-- Card Image 2 --}}
        <div class="container-fluid bg-light p-lg-5">
            <div class="container d-lg-inline-flex gap-5">
                <div class="col-lg-5 mb-3">
                    @foreach ($latests as $latest)
                        <div class="card" data-aos="fade-down-right">
                            <img src="{{ asset('thumbnail/' . $latest->thumbnail) }}" class="card-img-top" alt=""
                                style="height: 400px">
                            <div class="card-body p-lg-5">
                                <h5 class="card-title fw-bold mb-4">{{ $latest->title }}</h5>
                                <small class="card-text">
                                    {{ strip_tags(Str::limit($latest->content, 700)) }}
                                </small>
                            </div>
                            <small class="d-flex justify-content-between align-items-center p-lg-5">
                                <a href="{{ route('viewberita', $latest->id) }}"
                                    class="link-warning text-decoration-none">Baca selengkapnya</a>
                                <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                            </small>
                        </div>
                    @endforeach
                </div>
                
                <div class="row mb-3 gap-3">
                    @foreach ($posts as $post)
                        <div class="card" style="width: 260px">
                            <img src="{{ asset('thumbnail/' . $post->thumbnail) }}" class="card-img-top" alt="">
                            <div class="card-body px-4">
                                <h6 class="card-title">{{ $post->title }}</h6>
                                <small class="card-text">{{ strip_tags(Str::limit($post->content, 100)) }}</small>
                            </div>
                            <small class="d-flex justify-content-between align-items-center px-4 mb-3">
                                <a href="{{ route('viewberita', $post->id) }}" class="link-warning text-decoration-none">Baca selengkapnya</a>
                                <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                            </small>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

        {{-- Gallery --}}
        <div class="container" style="overflow-x: hidden;">
            <div class="row gap-5 mx-auto p-5 mt-5">
                @foreach ($galleries as $image)
                    <div class="image-frame mx-auto" data-aos="zoom-in-down">
                        <img src="{{ asset('image/'. $image->image) }}"
                            class="w-100 h-100 object-fit-cover" alt="">
                    </div>
                @endforeach
            </div>
            <div class="mb-5 mx-auto d-flex justify-content-center p-lg-5" data-aos="zoom-out">
                <button class="button fw-bold w-100">
                    <a href="">LEBIH BANYAK</a>
                </button>
            </div>
        </div>


        {{-- SCRIPT --}}
        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/js/animasi.js') }}"></script>
    @endsection
