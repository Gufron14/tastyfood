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
                    <div class="card" data-aos="fade-down-right">
                        <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}" class="card-img-top"
                            alt="" style="height: 400px">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">Card Title</h5>
                            <p class="card-text">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Consectetur dolor molestias
                                pariatur
                                illum at hic asperiores aperiam neque magnam cupiditate. Minus facere et dicta aperiam
                                officiis
                                totam quisquam voluptate, omnis cumque atque iusto aliquid nihil sequi necessitatibus magni
                                accusantium quasi fuga quos quia a molestias amet dolorum asperiores maiores. Perferendis,
                                quidem magnam excepturi at repudiandae beatae necessitatibus saepe dolor sit obcaecati hic
                                quae
                                tenetur tempore eius, debitis expedita numquam minus dolorem ab nam ullam voluptatem in
                                quisquam. Repellat, hic molestias.
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                                <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-lg-block-flex" data-aos="fade-down-left">
                    <div class="row mb-3">
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                                    class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of the card's content.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                                        <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card">
                                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                                    class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of the card's content.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                                        <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-6 col-sm-12 mb-3">
                            <div class="card">
                                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                                    class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk
                                        of the card's content.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                                        <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card">
                                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                                    class="card-img-top" alt="">
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">Card title</h5>
                                    <p class="card-text">Some quick example text to build on the card title and make up the
                                        bulk of the card's content.</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="#" class="link-warning text-decoration-none">Baca selengkapnya</a>
                                        <a href="#" class="link-dark text-decoration-none fw-bold">•••</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Card Image 2 --}}
    </div>

    {{-- Gallery --}}
    <div class="container mt-5 p-5">
        <div class="row d-lg-flex">
            <div class="image-frame mx-auto mb-3" data-aos="zoom-in-down">
                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                    class="w-100 h-100 object-fit-cover" alt="">
            </div>
            <div class="image-frame mx-auto mb-3" data-aos="zoom-in-down">
                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                    class="w-100 h-100 object-fit-cover" alt="">
            </div>
            <div class="image-frame mx-auto mb-3" data-aos="zoom-in-down">
                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                    class="w-100 h-100 object-fit-cover" alt="">
            </div>
            <div class="image-frame mx-auto mb-3" data-aos="zoom-in-down">
                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                    class="w-100 h-100 object-fit-cover" alt="">
            </div>
            <div class="image-frame mx-auto mb-3" data-aos="zoom-in-down">
                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                    class="w-100 h-100 object-fit-cover" alt="">
            </div>
            <div class="image-frame mx-auto mb-3" data-aos="zoom-in-down">
                <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}"
                    class="w-100 h-100 object-fit-cover" alt="">
            </div>
        </div>
        <div class="mt-5 mb-5" data-aos="zoom-out">
            <button class="button fw-bold w-100">
                <a href="">LEBIH BANYAK</a>
            </button>
        </div>
    </div>
    {{-- End Gallery --}}


    {{-- SCRIPT --}}
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/animasi.js') }}"></script>
@endsection
