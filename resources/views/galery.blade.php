@extends('layout.app')

@section('title')
    Gallery
@endsection

@section('title-page')
    GALERI KAMI
@endsection

@section('content')
    <!-- CAROUSEL -->
    <div class="container p-5">
        <div class="slider">
            <div class="list">
                @foreach ($sliders as $slider)
                    @if ($slider->status == 1)    
                        <div class="item">
                            <img src="{{ asset('slider/' . $slider->image) }}" alt="{{ $slider->image }}">
                        </div>
                    @endif
                @endforeach
                {{-- <div class="item">
                    <img src="{{ asset('assets/img/anh-nguyen-kcA-c3f_3FE-unsplash.jpg') }}" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('assets/img/anna-pelzer-IGfIGP5ONV0-unsplash.jpg') }}" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('assets/img/luisa-brimble-HvXEbkcXjSk-unsplash.jpg') }}" alt="">
                </div>
                <div class="item">
                    <img src="{{ asset('assets/img/michele-blackwell-rAyCBQTH7ws-unsplash.jpg') }}" alt="">
                </div> --}}
            </div>
            <div class="buttons">
                <button id="prev">
                    < 
                </button>
                        <button id="next"> > </button>
            </div>
            <ul class="dots">
                <li class="active"></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
    </div>

    <!-- GALERI -->
    <div class="container p-5">
        <div class="row d-flex justify-content-center align-items-center mb-3" data-aos="fade-right">
            @foreach ($galleries as $image)
                <div class="image-galery mb-3">
                    <img src="{{ asset('image/' . $image->image) }}" class="w-100 h-100 object-fit-cover" alt="">
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('assets/js/app.js') }}"></script>
@endsection
