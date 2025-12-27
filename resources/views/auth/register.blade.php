@extends('layouts.app')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-body p-4">

                {{-- Header --}}
                <div class="text-center mb-4">
                    <h3 class="fw-bold mb-1">Mifzz Store</h3>
                    <p class="text-muted mb-0">Buat akun baru</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- Name --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Lengkap</label>
                        <input type="text"
                            class="form-control form-control-lg @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Nama lengkap kamu"
                            required autofocus>

                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                            required>

                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password"
                            class="form-control form-control-lg @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="••••••••"
                            required>

                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Konfirmasi Password</label>
                        <input type="password"
                            class="form-control form-control-lg"
                            name="password_confirmation"
                            placeholder="Ulangi password"
                            required>
                    </div>

                    {{-- Button Register --}}
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-lg rounded-pill">
                            Daftar
                        </button>
                    </div>

                    {{-- Divider --}}
                    <div class="text-center text-muted my-3">atau</div>

                    {{-- Google --}}
                    <div class="d-grid mb-4">
                        <a href="{{ route('auth.google') }}"
                           class="btn btn-outline-danger btn-lg rounded-pill d-flex align-items-center justify-content-center gap-2">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="22">
                            Daftar dengan Google
                        </a>
                    </div>

                    {{-- Login --}}
                    <p class="text-center mb-0">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="fw-bold text-decoration-none">
                            Login sekarang
                        </a>
                    </p>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
