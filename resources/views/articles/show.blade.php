
@extends('layouts.app')

@section('title', $article->title)

@section('content')
<article class="article-detail-page">

    <div class="article-detail-navigation">
        <a href="{{ route('articles.index') }}">← Semua Artikel</a>
        <span>/</span>
        <span>Detail Artikel</span>
    </div>

    <header class="article-detail-header">
        <span class="article-detail-category">ARTIKEL & BERITA</span>

        <h1>{{ $article->title }}</h1>

        <div class="article-detail-meta">
            <div class="article-author-avatar">
                {{ strtoupper(substr($article->user->name, 0, 1)) }}
            </div>

            <div class="article-author-info">
                <strong>{{ $article->user->name }}</strong>
                <span>Penulis</span>
            </div>

            <span class="article-meta-divider"></span>

            <div class="article-date-info">
                <span>Dipublikasikan</span>
                <strong>{{ $article->created_at->format('d M Y') }}</strong>
            </div>
        </div>
    </header>

    <div class="article-detail-image">
        <img
            src="{{ $article->image_url }}"
            alt="Gambar untuk {{ $article->title }}"
        >
    </div>

    <div class="article-detail-content">
        <div class="article-content-label">ISI ARTIKEL</div>

        <div class="article-body">
            {!! nl2br(e($article->body)) !!}
        </div>
    </div>

    <footer class="article-detail-footer">
        <a href="{{ route('home') }}" class="article-footer-link">
            ← Kembali ke Home
        </a>

        <div class="article-footer-actions">
            @auth
                @if ($article->user_id === auth()->id())
                    <a
                        href="{{ route('articles.edit', $article) }}"
                        class="article-edit-btn"
                    >
                        ✎ Edit Artikel
                    </a>
                @endif
            @endauth

            <a
                href="{{ route('articles.index') }}"
                class="article-list-btn"
            >
                Lihat Semua Artikel
            </a>
        </div>
    </footer>

</article>
@endsection
