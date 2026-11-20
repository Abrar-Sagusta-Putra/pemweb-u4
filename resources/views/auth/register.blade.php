
@extends('layouts.app')

@section('title', 'Register')

@section('content')
<section class="auth-page">

    <div class="auth-card">

        <div class="auth-brand">
            <div class="auth-brand-icon">PB</div>
            <span>PORTAL BERITA</span>
        </div>

        <div class="auth-heading">
            <h1>Buat Akun Baru</h1>
            <p>Bergabunglah bersama kami dan mulai bagikan informasi serta artikel menarik.</p>
        </div>

        @if ($errors->any())
            <div class="auth-error">
                <strong>Pendaftaran belum berhasil.</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ url('/register') }}" class="auth-form">
            @csrf

            <div class="auth-form-group">
                <label for="name">Nama Lengkap</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    placeholder="Masukkan nama lengkap"
                    autocomplete="name"
                    autofocus
                    required
                >
            </div>

            <div class="auth-form-group">
                <label for="email">Alamat Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="nama@email.com"
                    autocomplete="email"
                    required
                >
            </div>

            <div class="auth-form-group">
                <label for="password">Password</label>
                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Buat password"
                    autocomplete="new-password"
                    required
                >
                <small class="auth-field-help">
                    Gunakan password yang kuat sesuai ketentuan aplikasi.
                </small>
            </div>

            <div class="auth-form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input
                    type="password"
                    id="password_confirmation"
                    name="password_confirmation"
                    placeholder="Masukkan kembali password"
                    autocomplete="new-password"
                    required
                >
            </div>

            <button type="submit" class="auth-submit-btn">
                Buat Akun →
            </button>
        </form>

        <div class="auth-register-link">
            Sudah memiliki akun?
            <a href="{{ route('login') }}">Login sekarang</a>
        </div>

        <div class="auth-bottom-note">
            Portal Berita — Informasi dan wawasan untuk semua.
        </div>

    </div>

</section>
@endsection
