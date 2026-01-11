{{-- ================================================
FILE: resources/views/home.blade.php
FUNGSI: Halaman utama website
================================================ --}}

@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
/* HERO – tema hejo sarua login/register */
.hero-industrial {
    background: linear-gradient(
        120deg,
        #0f3d2e,
        #1f7a5c,
        #5fbf9b,
        #1f7a5c
    );
    background-size: 300% 300%;
    animation: greenGradientMove 10s ease infinite;
    position: relative;
    overflow: hidden;
}

/* Animasi gradasi */
@keyframes greenGradientMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* efek bubble halus */
.hero-industrial::after {
    content: '';
    position: absolute;
    top: -40%;
    right: -25%;
    width: 520px;
    height: 520px;
    background: rgba(255,255,255,0.08);
    border-radius: 50%;
}

/* judul section */
.section-title {
    font-weight: 700;
    letter-spacing: .5px;
}

/* card konsisten */
.card-industrial {
    border: none;
    border-radius: 18px;
    transition: all .3s ease;
}

.card-industrial:hover {
    transform: translateY(-6px);
    box-shadow: 0 15px 35px rgba(31,122,92,.25);
}

/* gambar zoom */
.img-zoom {
    overflow: hidden;
}

.img-zoom img {
    transition: transform .4s ease;
}

.img-zoom:hover img {
    transform: scale(1.08);
}
.btn-outline-success {
    border-color: #1f7a5c;
    color: #1f7a5c;
}

.btn-outline-success:hover {
    background: #1f7a5c;
    color: #fff;
}
.category-image {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    overflow: hidden;

    display: flex;
    align-items: center;
    justify-content: center;

    background-color: #e9f7ef; /* soft green */
}

.category-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}
.img-center {
    display: flex;
    align-items: center;
    justify-content: center;
}
.hero-visual {
    width: 360px;
    height: 280px;
    position: relative;
}

.bg-hejo-card {
    position: absolute;
    inset: 0;
    background: #1f7a5c;
    border-radius: 28px;
    box-shadow: 0 8px 20px rgba(15, 177, 75, 0.651);
    z-index: 1;
}
.hero-img {
    position: relative;
    z-index: 2;
    max-height: 260px;
    margin: auto;
    display: block;
}   
</style>
{{-- Hero Section --}}
<section class="hero-industrial text-white py-5">
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="display-5 fw-bold mb-3">
                    Belanja Online<br> Mudah & Terpercaya
                </h1>
                <p class="lead mb-4 text-white-75">
                    Produk berkualitas, harga kompetitif, dan pengiriman cepat.
                </p>
               <a href="{{ route('catalog.index') }}" class="btn btn-primary btn-lg px-4 rounded-pill">
                    Mulai Belanja <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>
        <div class="col-lg-6 d-none d-lg-flex align-items-center justify-content-center" data-aos="zoom-in">
            <div class="hero-visual position-relative">
                <div class="bg-hejo-card"></div>
                <img src="{{ asset('assets/images/sepeda-lipat.png') }}"
                    class="img-fluid hero-img">
                </div>
            </div>
        </div>
    </div>
</section>


{{-- Kategori --}}
<section class="py-5">
    <div class="container">
        <h2 class="section-title text-center mb-5" data-aos="fade-up">
            Kategori Populer
        </h2>

        <div class="row g-4 justify-content-center">
            @foreach($categories as $category)
            <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <a href="{{ route('catalog.index', ['category' => $category->slug]) }}" class="text-decoration-none">
                    <div class="card card-industrial text-center h-100">
                        <div class="card-body">
                           <div class="img-zoom img-center mb-3">
                                <div class="category-image">
                                    <img src="{{ $category->image_url }}" alt="{{ $category->name }}">
                                </div>
                            </div>
                            <h6 class="mb-1 text-dark">{{ $category->name }}</h6>
                            <small class="text-muted">{{ $category->products_count }} produk</small>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>


{{-- Produk Unggulan --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0" data-aos="fade-right">
                Produk Unggulan
            </h2>
            <a href="{{ route('catalog.index') }}" class="btn btn-outline-success rounded-pill" data-aos="fade-left">
                Lihat Semua
            </a>

        </div>

        <div class="row g-4">
            @foreach($featuredProducts as $product)
            <div class="col-6 col-md-4 col-lg-3" data-aos="zoom-in">
                @include('profile.partials.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- Promo Banner --}}
<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="card card-industrial bg-success text-white border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h3 class="fw-bold">Flash Sale</h3>
                        <p>Diskon hingga 50% produk pilihan</p>
                        <a href="#" class="btn btn-dark w-fit">
                            Lihat Promo
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-md-6" data-aos="fade-left">
                <div class="card card-industrial bg-secondary text-white border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h3 class="fw-bold">Member Baru?</h3>
                        <p>Voucher Rp50.000 untuk pembelian pertama</p>
                        <a href="{{ route('register') }}" class="btn btn-primary rounded-pill w-fit">
                            Daftar Sekarang
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Produk Terbaru --}}
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-4">Produk Terbaru</h2>
        <div class="row g-4">
            @foreach($latestProducts as $product)
            <div class="col-6 col-md-4 col-lg-3">
                @include('profile.partials.product-card', ['product' => $product])
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection