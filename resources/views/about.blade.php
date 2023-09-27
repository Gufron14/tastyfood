@extends('layout.app')
@section('title')
    Tentang
@endsection

@section('title-page')
   TENTANG KAMI
@endsection

@section('content')

    <!-- ROW 1 -->
    <div class="container-fluid bg-light p-lg-5">
        <div class="container d-lg-flex align-items-center justify-content-between">
            <div class="col-lg-6 col-sm-12 mb-5 mt-5 p-3">
                <h3 class="fw-bold mb-3" data-aos="fade-right">TASTY FOOD</h3>
                <p class="fw-bold" data-aos="fade-right">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam est magnam aliquam
                    neque hic minima eligendi sapiente facilis, architecto doloremque accusamus vitae. Quos vitae
                    incidunt perferendis magni ratione suscipit ullam.</p>
                <p data-aos="fade-right">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa est nemo natus quibusdam incidunt odit vitae blanditiis consectetur vero debitis doloribus dolores quisquam molestiae esse obcaecati fuga, tenetur suscipit neque illo ducimus architecto voluptates? Eaque repellat labore quis sunt quisquam.</p>
            </div>
            <div class="col-lg-5 col-sm-12 d-lg-flex gap-3 p-3">
                <div class="image-frame2 mb-3" data-aos="fade-left">
                    <img src="{{ asset('assets/img/brooke-lark-oaz0raysASk-unsplash.jpg')}}"
                    class="w-100 h-100 object-fit-cover"
                    alt="">
                </div>
                <div class="image-frame2 mb-3" data-aos="fade-left" data-aos-duration="1100">
                    <img src="{{ asset('assets/img/sebastian-coman-photography-eBmyH7oO5wY-unsplash.jpg')}}"
                    class="w-100 h-100 object-fit-cover"
                    alt="">
                </div>
                
            </div>
        </div>
    </div>

    <div class="container-fluid p-lg-5">
        <!-- VISI -->
        <div class="container-fluid mt-5">
            <div class="container d-lg-flex justify-content-between">
                <div class="col-6 d-lg-flex gap-3 align-items-center mb-5">
                    <div class="image-frame3 mb-3" data-aos="fade-right" data-aos-duration="1100">
                        <img src="{{ asset('assets/img/fathul-abrar-T-qI_MI2EMA-unsplash.jpg')}}"
                            class="w-100 h-100 rounded object-fit-cover"
                            alt="">
                    </div>
                    <div class="image-frame3 mb-3" data-aos="fade-right">
                        <img src="{{ asset('assets/img/michele-blackwell-rAyCBQTH7ws-unsplash.jpg')}}"
                            class="w-100 h-100 rounded object-fit-cover"
                            alt="">
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12 my-auto" data-aos="fade-left">
                    <h3 class="fw-bold mb-3 text-center">VISI</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Hic eum, placeat voluptates obcaecati explicabo
                        necessitatibus iusto error, ipsa dignissimos recusandae aut ad officiis voluptate sequi, dolor
                        architecto nemo magni quia?</p>
                </div>
            </div>
        </div>
    
        <hr class="mx-auto mt-5 mb-5" style="width: 70%;">
    
        <!-- ROW 3 -->
        <div class="container-fluid mb-5">
            <div class="container d-lg-flex align-items-center gap-5">
                <div class="col-lg-6 col-sm-2 mb-5" data-aos="fade-right">
                    <h3 class="fw-bold mb-3 text-center">MISI</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iusto in qui ex. Fuga aperiam illo ad iure facilis vitae non rerum quod reiciendis exercitationem? Itaque veniam consequuntur, possimus veritatis quis iusto debitis ab earum ratione dolores pariatur praesentium, porro ex.</p>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="image-frame4" data-aos="fade-left" data-aos-anchor-placement="top-bottom">
                        <img src="{{ asset('assets/img/sanket-shah-SVA7TyHxojY-unsplash.jpg')}}"
                            class="w-100 h-100 rounded object-fit-cover"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection