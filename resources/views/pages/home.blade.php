
@extends('layouts.app')

@section('title', 'Home')

@section('content')

{{-- HERO SECTION --}}
<section class="home-hero">
    <div class="hero-content">
        <span class="hero-eyebrow">PORTAL BERITA DIGITAL</span>

        <h1>
            Temukan Informasi,
            <span>Perluas Wawasan.</span>
        </h1>

        <p>
            Selamat datang di Portal Berita. Temukan berbagai artikel,
            informasi, dan wawasan menarik yang dikemas untuk menemani
            perkembangan pengetahuanmu di era digital.
        </p>

        <div class="hero-actions">
            <a href="{{ route('articles.index') }}" class="btn btn-primary">
                Jelajahi Artikel
            </a>

            @guest
                <a href="{{ route('register') }}" class="btn btn-outline">
                    Bergabung Sekarang
                </a>
            @endguest

            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-outline">
                    Dashboard
                </a>
            @endauth
        </div>
    </div>
</section>

{{-- INFORMASI PENGGUNA --}}
@guest
    <section class="welcome-message">
        <div>
            <h3>Selamat datang, pembaca!</h3>
            <p>
                Login atau daftar untuk mulai mengelola dan menerbitkan
                artikel di Portal Berita.
            </p>
        </div>

        <a href="{{ route('login') }}" class="text-link">
            Login sekarang &rarr;
        </a>
    </section>
@endguest

@auth
    <section class="welcome-message">
        <div>
            <h3>Halo, {{ auth()->user()->name }}!</h3>
            <p>
                Senang melihatmu kembali. Mulai bagikan informasi
                dan pengetahuan melalui artikel baru.
            </p>
        </div>

        <a href="{{ route('articles.create') }}" class="text-link">
            Tulis Artikel &rarr;
        </a>
    </section>
@endauth

{{-- ARTIKEL TERBARU --}}
<section class="latest-section">

    <div class="section-heading">
        <div>
            <span class="section-eyebrow">JELAJAHI INFORMASI</span>
            <h2>Artikel Terbaru</h2>
            <p>Temukan informasi dan bacaan terbaru dari kami.</p>
        </div>

        <a href="{{ route('articles.index') }}" class="text-link">
            Lihat Semua Artikel &rarr;
        </a>
    </div>

    @if ($articles->isNotEmpty())

        <div class="article-grid">

            @foreach ($articles as $article)

                <article class="article-card">

                    <a href="{{ route('articles.show', $article) }}"
                       class="article-image-link">

                        <img
                            src="{{ $article->image_url }}"
                            alt="Gambar {{ $article->title }}"
                            class="article-image"
                            loading="lazy"
                        >

                    </a>

                    <div class="article-content">

                        <div class="article-meta">
                            <span>
                                {{ $article->created_at->format('d M Y') }}
                            </span>

                            <span class="meta-dot">•</span>

                            <span>
                                {{ $article->user->name }}
                            </span>
                        </div>

                        <h3 class="article-title">
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="article-excerpt">
                            {{ \Illuminate\Support\Str::limit($article->body, 140) }}
                        </p>

                        <a href="{{ route('articles.show', $article) }}"
                           class="article-read-more">
                            Baca selengkapnya
                            <span>&rarr;</span>
                        </a>

                    </div>
                </article>

            @endforeach

        </div>

    @else

        <div class="empty-state">
            <h3>Belum Ada Artikel</h3>

            <p>
                Saat ini belum tersedia artikel untuk ditampilkan.
            </p>

            @auth
                <a href="{{ route('articles.create') }}" class="btn btn-primary">
                    Buat Artikel Pertama
                </a>
            @endauth
        </div>

    @endif

</section>

@endsection
