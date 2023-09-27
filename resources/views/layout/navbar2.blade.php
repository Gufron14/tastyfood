<div class="banner-image">
    <div class="container p-5">
        <!-- <img src="ASET/img-4.png" alt="" class="z-3 position-absolute start-50" style="width: 400px;"> -->

        <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container" data-aos="fade-down">
                <a class="navbar-brand fw-bold" href="/">TASTY FOOD</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto gap-lg-3">
                        <li class="nav-item {{ Request::path() == '/' ? 'active' : '' }}">
                            <a href="/" class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}"">HOME</a>
                        </li>
                        <li class="nav-item {{ Request::path() == 'about' ? 'active' : '' }}">
                            <a href="/about" class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}"">TENTANG</a>
                        </li>
                        <li class="nav-item {{ Request::path() == 'news' ? 'active' : '' }}">
                            <a href="/news" class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}"">BERITA</a>
                        </li>
                        <li class="nav-item {{ Request::path() == 'galery' ? 'active' : '' }}">
                            <a href="/galery" class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}"">GALERI</a>
                        </li>
                        <li class="nav-item {{ Request::path() == 'contact' ? 'active' : '' }}">
                            <a href="/contact" class="nav-link {{ Request::path() == '/' ? 'text-black' : 'text-white' }}"">KONTAK</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- END NAVBAR -->

        <div class="mt-5">
            <h1 class="fw-bold" data-aos="fade-right">
                @yield('title-page')
            </h1>
        </div>
        
    </div>
</div>

<script>
    // Mengambil elemen navbar
    var navbar = document.querySelector(".navbar");

    // Menambahkan event listener untuk scroll halaman
    window.addEventListener("scroll", function () {
        // Mendapatkan posisi scroll halaman
        var scrollPos = window.scrollY;

        // Jika posisi scroll lebih dari 0, tambahkan kelas navbar-scroll ke navbar
        if (scrollPos > 0) {
            navbar.classList.add("navbar-scroll", "fixed-top", "bg-dark");
        } else {
            // Jika tidak, hapus kelas navbar-scroll dari navbar
            navbar.classList.remove("navbar-scroll", "fixed-top", "bg-dark");
        }
    });
</script>