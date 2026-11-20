
@extends('layouts.app')

@section('title', 'Daftar Artikel')

@section('content')

{{-- HEADER HALAMAN --}}
<section class="articles-hero">
    <div>
        <span class="articles-eyebrow">CONTENT MANAGEMENT</span>
        <h1>Kelola Artikel</h1>
        <p>
            Jelajahi, baca, dan kelola artikel yang tersedia
            di Portal Berita.
        </p>
    </div>

    <a href="{{ route('articles.create') }}" class="articles-add-btn">
        + Tambah Artikel
    </a>
</section>

{{-- NOTIFIKASI --}}
@if (session('success'))
    <div class="articles-alert">
        <span>✓</span>
        {{ session('success') }}
    </div>
@endif

{{-- DAFTAR ARTIKEL --}}
<section class="articles-section">

    <div class="articles-section-heading">
        <div>
            <h2>Daftar Artikel</h2>
            <p>Artikel yang tersedia dalam sistem.</p>
        </div>

        <span class="articles-count">
            {{ $articles->total() }} Artikel
        </span>
    </div>

    @if ($articles->isNotEmpty())

        <div class="articles-list">

            @foreach ($articles as $article)

                <article class="management-article">

                    <a href="{{ route('articles.show', $article) }}"
                       class="management-image-link">

                        <img
                            src="{{ $article->image_url }}"
                            alt="Gambar {{ $article->title }}"
                            class="management-image"
                            loading="lazy"
                        >

                    </a>

                    <div class="management-content">

                        <div class="management-meta">
                            <span>
                                {{ $article->created_at->format('d M Y') }}
                            </span>

                            <span>•</span>

                            <span>
                                Oleh {{ $article->user->name }}
                            </span>
                        </div>

                        <h3>
                            <a href="{{ route('articles.show', $article) }}">
                                {{ $article->title }}
                            </a>
                        </h3>

                        <p class="management-excerpt">
                            {{ \Illuminate\Support\Str::limit($article->body, 150) }}
                        </p>

                        <div class="management-actions">

                            <a href="{{ route('articles.show', $article) }}"
                               class="management-detail">
                                Baca Artikel &rarr;
                            </a>

                            @if ($article->user_id === auth()->id())

                                <div class="management-owner-actions">

                                    <a href="{{ route('articles.edit', $article) }}"
                                       class="management-edit">
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('articles.destroy', $article) }}"
                                        method="POST"
                                        onsubmit="return confirm('Apakah kamu yakin ingin menghapus artikel ini?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="management-delete">
                                            Hapus
                                        </button>
                                    </form>

                                </div>

                            @endif

                        </div>

                    </div>

                </article>

            @endforeach

        </div>

        {{-- PAGINATION --}}
        <div class="articles-pagination">
            {{ $articles->links('pagination::default') }}
        </div>

    @else

        <div class="articles-empty">
            <div class="empty-icon">▤</div>

            <h3>Belum Ada Artikel</h3>

            <p>
                Saat ini belum ada artikel yang tersedia.
                Mulai buat artikel pertama di Portal Berita.
            </p>

            <a href="{{ route('articles.create') }}"
               class="articles-add-btn">
                + Buat Artikel Pertama
            </a>
        </div>

    @endif

</section>

@endsection
