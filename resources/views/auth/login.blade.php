
@extends('layouts.app')

@section('title', 'Login')

@section('content')
<section class="auth-page">

    <div class="auth-card">

        <div class="auth-brand">
            <div class="auth-brand-icon">PB</div>
            <span>PORTAL BERITA</span>
        </div>

        <div class="auth-heading">
            <h1>Selamat Datang!</h1>
            <p>Masuk ke akunmu untuk mengelola dan membagikan artikel.</p>
        </div>

        @if ($errors->any())
            <div class="auth-error">
                <strong>Login gagal.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/login') }}" class="auth-form">
            @csrf

            <div class="auth-form-group">
                <label for="email">Alamat Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    autocomplete="email"
                    autofocus
                    required
                >
            </div>

            <div class="auth-form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    autocomplete="current-password"
                    required
                >
            </div>

            <label class="auth-remember">
                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                    {{ old('remember') ? 'checked' : '' }}
                >
                <span>Ingat saya</span>
            </label>

            <button type="submit" class="auth-submit-btn">
                Masuk ke Akun →
            </button>
        </form>

        <div class="auth-register-link">
            Belum memiliki akun?
            <a href="{{ route('register') }}">Daftar sekarang</a>
        </div>

        <div class="auth-bottom-note">
            Portal Berita — Informasi dan wawasan untuk semua.
        </div>

    </div>

</section>
@endsection
