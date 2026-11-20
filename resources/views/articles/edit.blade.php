
@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<section class="edit-article-page">

    <div class="edit-article-header">
        <div>
            <span class="edit-article-eyebrow">PORTAL BERITA</span>
            <h1>Edit Artikel</h1>
            <p>Perbarui informasi artikel agar tetap akurat dan relevan.</p>
        </div>

        <a href="{{ route('articles.index') }}" class="edit-back-link">
            ← Kembali ke Artikel
        </a>
    </div>

    <div class="edit-article-card">

        <div class="edit-card-heading">
            <div>
                <h2>Perbarui Informasi Artikel</h2>
                <p>Ubah bagian yang ingin kamu perbarui.</p>
            </div>

            <span class="edit-required-note">* Wajib diisi</span>
        </div>

        @if ($errors->any())
            <div class="edit-error">
                <strong>Artikel belum dapat diperbarui.</strong>
                <p>Periksa kembali bagian berikut:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('articles.update', $article) }}"
            method="POST"
            class="edit-article-form"
        >
            @csrf
            @method('PUT')

            <div class="edit-form-group">
                <label for="title">
                    Judul Artikel <span>*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title', $article->title) }}"
                    required
                    maxlength="255"
                    class="@error('title') is-invalid @enderror"
                    placeholder="Masukkan judul artikel"
                >

                @error('title')
                    <small class="edit-field-error">{{ $message }}</small>
                @enderror

                <small class="edit-field-help">
                    Gunakan judul yang jelas dan menggambarkan isi artikel.
                </small>
            </div>

            <div class="edit-form-group">
                <label for="image">
                    URL Gambar <small>(Opsional)</small>
                </label>

                <input
                    type="url"
                    id="image"
                    name="image"
                    value="{{ old('image', $article->image) }}"
                    class="@error('image') is-invalid @enderror"
                    placeholder="https://example.com/gambar.jpg"
                >

                @error('image')
                    <small class="edit-field-error">{{ $message }}</small>
                @enderror

                <small class="edit-field-help">
                    Masukkan URL gambar baru atau kosongkan untuk menggunakan
                    gambar placeholder.
                </small>
            </div>

            <div class="edit-image-preview">
                <label>Pratinjau Gambar Saat Ini</label>

                <img
                    src="{{ $article->image_url }}"
                    alt="Pratinjau gambar {{ $article->title }}"
                >

                <small>
                    Gambar ini merupakan gambar yang tersimpan pada artikel saat ini.
                </small>
            </div>

            <div class="edit-form-group">
                <label for="body">
                    Isi Artikel <span>*</span>
                </label>

                <textarea
                    id="body"
                    name="body"
                    rows="12"
                    required
                    class="@error('body') is-invalid @enderror"
                    placeholder="Tulis isi artikel di sini..."
                >{{ old('body', $article->body) }}</textarea>

                @error('body')
                    <small class="edit-field-error">{{ $message }}</small>
                @enderror

                <small class="edit-field-help">
                    Pastikan isi artikel sudah diperbarui dan mudah dipahami.
                </small>
            </div>

            <div class="edit-form-footer">
                <a
                    href="{{ route('articles.index') }}"
                    class="edit-cancel-btn"
                >
                    Batal
                </a>

                <button type="submit" class="edit-submit-btn">
                    Simpan Perubahan →
                </button>
            </div>

        </form>
    </div>

    <p class="edit-footer-note">
        Perubahan artikel akan langsung diterapkan setelah berhasil disimpan.
    </p>

</section>
@endsection
