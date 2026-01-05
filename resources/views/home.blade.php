{{-- ================================================
FILE: resources/views/home.blade.php
FUNGSI: Halaman utama website
================================================ --}}

@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<style>
    .hero-industrial {
        background: linear-gradient(135deg, #0d6efd, #0a58ca);
        position: relative;
        overflow: hidden;
    }

    .hero-industrial::after {
        content: '';
        position: absolute;
        top: -50%;
        right: -30%;
        width: 500px;
        height: 500px;
        background: rgba(255,255,255,0.08);
        border-radius: 50%;
    }

    .section-title {
        font-weight: 700;
        letter-spacing: .5px;
    }

    .card-industrial {
        border: none;
        transition: all .3s ease;
    }

    .card-industrial:hover {
        transform: translateY(-6px);
        box-shadow: 0 15px 35px rgba(0,0,0,.1);
    }

    .img-zoom {
        overflow: hidden;
    }

    .img-zoom img {
        transition: transform .4s ease;
    }

    .img-zoom:hover img {
        transform: scale(1.08);
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
                <a href="{{ route('catalog.index') }}" class="btn btn-light btn-lg px-4">
                    Mulai Belanja <i class="bi bi-arrow-right ms-2"></i>
                </a>
            </div>

            <div class="col-lg-6 d-none d-lg-block text-center" data-aos="zoom-in">
                <img src="{{ asset('images/hero-shopping.svg') }}"
                     class="img-fluid"
                     style="max-height: 420px;">
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
                            <div class="img-zoom mb-3">
                                <img src="{{ $category->image_url }}"
                                     class="rounded-circle"
                                     width="80" height="80"
                                     style="object-fit: cover;">
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
            <a href="{{ route('catalog.index') }}" class="btn btn-outline-primary" data-aos="fade-left">
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
                <div class="card card-industrial bg-warning border-0 h-100">
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
                <div class="card card-industrial bg-info text-white border-0 h-100">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h3 class="fw-bold">Member Baru?</h3>
                        <p>Voucher Rp50.000 untuk pembelian pertama</p>
                        <a href="{{ route('register') }}" class="btn btn-light w-fit">
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