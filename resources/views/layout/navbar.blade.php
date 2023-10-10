<div class="header bg-light pt-5" style="overflow-x: hidden;">
    <nav class="navbar navbar-expand-lg">
        <div class="container" data-aos="fade-down">
            <a class="navbar-brand fw-bold" href="/">TASTY FOOD</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars" style="color: #000000;"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-lg-5 gap-lg-3">
                    <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
                        <a href="/"
                            class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}">HOME</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'about' ? 'active' : '' }}">
                        <a href="/about"
                            class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}">TENTANG</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'news' ? 'active' : '' }}">
                        <a href="/news"
                            class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}">BERITA</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'galery' ? 'active' : '' }}">
                        <a href="/galery"
                            class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}">GALERI</a>
                    </li>
                    <li class="nav-item {{ Request::path() == 'contact' ? 'active' : '' }}">
                        <a href="/contact"
                            class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}">KONTAK</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-lg-flex mt-3">
        <div class="col-lg-6 col-sm-12 mt-3">
            <div class="garis bg-dark mb-5" data-aos="fade-right" style="width: 80px; height: 2px;"></div>
            <div class="col-lg-12 col-sm-12">
                <h1 class="mb-3" data-aos="fade-right">HEALTHY <br>
                    <b>TASTYFOOD</b>
                </h1>
                <p data-aos="fade-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam, ut architecto
                    consequatur at
                    quibusdam
                    quam odit ratione saepe culpa corrupti sit recusandae sed eius temporibus numquam
                    necessitatibus id
                    reiciendis a magni explicabo amet cupiditate.</p>
            </div>
            <div data-aos="fade-right">
                <button class="button mt-5 mb-5 fw-bold">
                    <a href="">TENTANG KAMI</a>
                </button>
            </div>
        </div>
        <div class="gambar" data-aos="fade-down-left" style="height: 500px">
            <img src="{{ asset('assets/img/img-4-2000x2000.png') }}" width="800px"
            style="position: relative; top: -350px; left: 120px;" class="d-none d-lg-block"
                 alt="navbar">
        </div>
    </div>
</div>


{{-- Script --}}

<script>
    // Get the navbar element
    var navbar = document.querySelector('.navbar');

    // Get the initial position of the navbar
    var navbarPosition = navbar.offsetTop;

    // Function to add a "fixed" class to the navbar when scrolling down
    function fixNavbar() {
        if (window.pageYOffset >= navbarPosition) {
            navbar.classList.add('fixed-top'); // Add a class to make the navbar fixed
        } else {
            navbar.classList.remove('fixed-top'); // Remove the class when scrolling back up
        }
    }

    // Attach the fixNavbar function to the window's scroll event
    window.addEventListener('scroll', fixNavbar);
</script>
