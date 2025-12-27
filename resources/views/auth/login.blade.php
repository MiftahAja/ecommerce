@extends('layouts.app')

@section('content')
<div class="container min-vh-100 d-flex align-items-center justify-content-center">
    <div class="col-md-5">
        <div class="card border-0 shadow-lg rounded-4">

            {{-- Header --}}
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <h3 class="fw-bold mb-1">Mifzz Store</h3>
                    <p class="text-muted mb-0">Login ke akun kamu</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- Email --}}
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email</label>
                        <input type="email"
                            class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="contoh@email.com"
                            required autofocus>

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

                    {{-- Remember --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label">Remember me</label>
                        </div>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" class="text-decoration-none small">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    {{-- Button Login --}}
                    <div class="d-grid mb-3">
                        <button class="btn btn-primary btn-lg rounded-pill">
                            Login
                        </button>
                    </div>

                    {{-- Divider --}}
                    <div class="text-center text-muted my-3">atau</div>

                    {{-- Google --}}
                    <div class="d-grid mb-4">
                        <a href="{{ route('auth.google') }}"
                           class="btn btn-outline-danger btn-lg rounded-pill d-flex align-items-center justify-content-center gap-2">
                            <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="22">
                            Login dengan Google
                        </a>
                    </div>

                    {{-- Register --}}
                    <p class="text-center mb-0">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="fw-bold text-decoration-none">
                            Daftar sekarang
                        </a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
