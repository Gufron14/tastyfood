@extends('layout.app')

@section('title')
    Kontak
@endsection

@section('title-page')
    KONTAK KAMI
@endsection

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- KONTEN -->
    <div class="container p-5">
        <h4 class="fw-bold mb-5" data-aos="fade-right">KONTAK KAMI</h4>
        <form action="{{ route('message.send') }}" method="POST">
            @csrf
            <div class="row d-lg-flex mb-5">
                <div class="col-lg-6 col-sm-12" data-aos="fade-right">
                    <input class="form-control form-control-lg mb-3" name="subject" id="subject" type="text" placeholder="subject" aria-label=".form-control-lg mb-3 example">
                    <input class="form-control form-control-lg mb-3" name="name" id="name" type="text" placeholder="name" aria-label=".form-control-lg mb-3 example">
                    <input class="form-control form-control-lg mb-3" name="email" id="email" type="email" placeholder="email" aria-label=".form-control-lg mb-3 example">
                </div>
                <div class="col-lg-6 col-sm-12" data-aos="fade-right" data-aos-duration="1100">
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="7" name="message" id="message"
                    placeholder="message"></textarea>
                </div>
            </div>
            <div data-aos="zoom-in">
                <button type="submit" class="button btn-dark fw-bold w-100">
                    KIRIM
                </button>
            </div>
        </form>
    </div>

    <div class="container">
        <div class="p-5 d-lg-flex justify-content-between ">

            <div class="col-lg-4 mx-auto mb-5">
                <a href="">
                    <div class="icon mx-auto mb-3 text-white" data-aos="fade-right">
                            <i class="fas fa-envelope d-flex justify-content-center align-items-center"></i>
                    </div>
                    <div class="text-center text-dark" data-aos="fade-right" data-aos-duration="1100">
                        <h5 class="fw-bold">EMAIL</h5>
                        <p>tastyfood@gmail.com</p>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 mx-auto mb-5">
                <div class="icon mx-auto  mb-3" data-aos="zoom-in">
                    <a href="">
                        <i class="fas fa-phone-alt d-flex justify-content-center align-items-center"></i> <br>
                    </a>
                </div>
                <div class="text-center" data-aos="zoom-in" data-aos-duration="1100">
                    <h5 class="fw-bold">PHONE</h5>
                    <p>+62 812 3456 8790</p>
                </div>
            </div>

            <div class="col-lg-4 mx-auto">
                <div class="icon mx-auto mb-3" data-aos="fade-left" >
                    <a href="">
                        <i class="fas fa-map-marker-alt d-flex justify-content-center align-items-center"></i> <br>
                    </a>
                </div>
                <div class="text-center" data-aos="fade-left" data-aos="fade-left" data-aos-duration="1100">
                    <h5 class="fw-bold">LOCATION</h5>
                    <p>Kota Bandung, Jawa Barat</p>
                </div>
            </div>
        </div>
        
    </div>

    <div class="container-fluid bg-light p-5">
        <div class="d-flex justify-content-center mb-3" data-aos="fade-up">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126749.00028237079!2d107.45306464335938!3d-6.90181329999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e62c7a980813%3A0xcc6d665d9eb75f7f!2sInternational%20Women%20University!5e0!3m2!1sen!2sid!4v1693679023690!5m2!1sen!2sid" width="1200" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
@endsection