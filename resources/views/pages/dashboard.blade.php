
@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

{{-- DASHBOARD HEADER --}}
<section class="dashboard-hero">
    <div>
        <span class="dashboard-eyebrow">PERSONAL DASHBOARD</span>

        <h1>Selamat datang, {{ $user->name }}!</h1>

        <p>
            Kelola artikel, pantau aktivitas, dan terus bagikan
            informasi menarik melalui Portal Berita.
        </p>
    </div>

    <a href="{{ route('articles.create') }}" class="dashboard-create-btn">
        + Tulis Artikel
    </a>
</section>

{{-- STATISTIK --}}
<section class="dashboard-stats">

    <div class="stat-card">
        <div class="stat-icon stat-icon-blue">▤</div>

        <div>
            <p class="stat-label">Total Artikel</p>
            <h2>{{ $totalArticles }}</h2>
            <span class="stat-description">
                Seluruh artikel dalam sistem
            </span>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-purple">✎</div>

        <div>
            <p class="stat-label">Artikel Saya</p>
            <h2>{{ $myArticles }}</h2>
            <span class="stat-description">
                Artikel yang telah kamu buat
            </span>
        </div>
    </div>

    <div class="stat-card">
        <div class="stat-icon stat-icon-green">↗</div>

        <div>
            <p class="stat-label">Kontribusi</p>
            <h2>
                {{ $totalArticles > 0
                    ? round(($myArticles / $totalArticles) * 100)
                    : 0 }}%
            </h2>
            <span class="stat-description">
                Persentase artikel milikmu
            </span>
        </div>
    </div>

</section>

{{-- KONTEN DASHBOARD --}}
<div class="dashboard-layout">

    {{-- ARTIKEL TERBARU --}}
    <section class="dashboard-panel">

        <div class="panel-heading">
            <div>
                <span class="panel-eyebrow">AKTIVITAS</span>
                <h2>Artikel Terbaru</h2>
                <p>Artikel yang baru diterbitkan di portal.</p>
            </div>

            <a href="{{ route('articles.index') }}" class="panel-link">
                Lihat Semua &rarr;
            </a>
        </div>

        @if ($latestArticles->isNotEmpty())

            <div class="dashboard-article-list">

                @foreach ($latestArticles as $article)

                    <article class="dashboard-article">

                        <a href="{{ route('articles.show', $article) }}"
                           class="dashboard-article-image-link">

                            <img
                                src="{{ $article->image_url }}"
                                alt="Thumbnail {{ $article->title }}"
                                class="dashboard-article-image"
                                loading="lazy"
                            >

                        </a>

                        <div class="dashboard-article-content">

                            <h3>
                                <a href="{{ route('articles.show', $article) }}">
                                    {{ $article->title }}
                                </a>
                            </h3>

                            <div class="dashboard-article-meta">
                                <span>{{ $article->user->name }}</span>
                                <span>•</span>
                                <span>
                                    {{ $article->created_at->format('d M Y') }}
                                </span>
                            </div>

                            <p>
                                {{ \Illuminate\Support\Str::limit($article->body, 100) }}
                            </p>

                        </div>

                    </article>

                @endforeach

            </div>

        @else

            <div class="dashboard-empty">
                <h3>Belum Ada Artikel</h3>
                <p>Mulai buat artikel pertamamu sekarang.</p>

                <a href="{{ route('articles.create') }}"
                   class="dashboard-create-btn">
                    + Buat Artikel
                </a>
            </div>

        @endif

    </section>

    {{-- SIDEBAR --}}
    <aside class="dashboard-sidebar">

        {{-- AKSI CEPAT --}}
        <section class="dashboard-panel quick-panel">

            <div class="panel-heading">
                <div>
                    <span class="panel-eyebrow">NAVIGASI</span>
                    <h2>Aksi Cepat</h2>
                </div>
            </div>

            <div class="quick-actions">

                <a href="{{ route('articles.create') }}" class="quick-action">
                    <span class="quick-action-icon">+</span>
                    <span>
                        <strong>Tambah Artikel</strong>
                        <small>Buat artikel baru</small>
                    </span>
                    <span class="quick-arrow">&rarr;</span>
                </a>

                <a href="{{ route('articles.index') }}" class="quick-action">
                    <span class="quick-action-icon">▤</span>
                    <span>
                        <strong>Kelola Artikel</strong>
                        <small>Lihat dan edit artikel</small>
                    </span>
                    <span class="quick-arrow">&rarr;</span>
                </a>

                <a href="{{ route('home') }}" class="quick-action">
                    <span class="quick-action-icon">⌂</span>
                    <span>
                        <strong>Halaman Home</strong>
                        <small>Kunjungi halaman utama</small>
                    </span>
                    <span class="quick-arrow">&rarr;</span>
                </a>

            </div>

        </section>

        {{-- INFORMASI AKUN --}}
        <section class="dashboard-panel account-panel">

            <div class="panel-heading">
                <div>
                    <span class="panel-eyebrow">PROFIL</span>
                    <h2>Informasi Akun</h2>
                </div>
            </div>

            <div class="account-avatar">
                {{ strtoupper(substr($user->name, 0, 1)) }}
            </div>

            <h3 class="account-name">{{ $user->name }}</h3>

            <p class="account-email">{{ $user->email }}</p>

            <div class="account-divider"></div>

            <p class="account-note">
                Akun ini digunakan untuk mengelola dan menerbitkan
                artikel di Portal Berita.
            </p>

        </section>

    </aside>

</div>

@endsection
