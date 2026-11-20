
@extends('layouts.app')

@section('title', 'Tambah Artikel')

@section('content')
<section class="create-article-page">

    <div class="create-article-header">
        <div>
            <span class="create-article-eyebrow">PORTAL BERITA</span>
            <h1>Buat Artikel Baru</h1>
            <p>
                Bagikan informasi, berita, dan wawasan terbaru kepada pembaca.
            </p>
        </div>

        <a href="{{ route('articles.index') }}" class="create-back-link">
            ← Kembali ke Artikel
        </a>
    </div>

    <div class="create-article-card">

        <div class="create-card-heading">
            <div>
                <h2>Informasi Artikel</h2>
                <p>Lengkapi seluruh informasi berikut sebelum menerbitkan artikel.</p>
            </div>
            <span class="create-required-note">* Wajib diisi</span>
        </div>

        @if ($errors->any())
            <div class="create-error">
                <strong>Artikel belum dapat disimpan.</strong>
                <p>Periksa kembali bagian berikut:</p>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('articles.store') }}" method="POST"
              class="create-article-form">
            @csrf

            <div class="create-form-group">
                <label for="title">
                    Judul Artikel <span>*</span>
                </label>

                <input
                    type="text"
                    id="title"
                    name="title"
                    value="{{ old('title') }}"
                    required
                    maxlength="255"
                    class="@error('title') is-invalid @enderror"
                    placeholder="Contoh: Perkembangan Teknologi Digital di Indonesia"
                >

                @error('title')
                    <small class="create-field-error">{{ $message }}</small>
                @enderror

                <small class="create-field-help">
                    Gunakan judul yang jelas, singkat, dan menggambarkan isi artikel.
                </small>
            </div>

            <div class="create-form-group">
                <label for="image">URL Gambar <small>(Opsional)</small></label>

                <input
                    type="url"
                    id="image"
                    name="image"
                    value="{{ old('image') }}"
                    class="@error('image') is-invalid @enderror"
                    placeholder="https://example.com/gambar.jpg"
                >

                @error('image')
                    <small class="create-field-error">{{ $message }}</small>
                @enderror

                <small class="create-field-help">
                    Masukkan alamat URL gambar yang valid. Jika dikosongkan,
                    sistem akan menggunakan gambar placeholder.
                </small>
            </div>

            <div class="create-form-group">
                <label for="body">
                    Isi Artikel <span>*</span>
                </label>

                <textarea
                    id="body"
                    name="body"
                    rows="12"
                    required
                    class="@error('body') is-invalid @enderror"
                    placeholder="Mulai tulis artikel atau berita di sini..."
                >{{ old('body') }}</textarea>

                @error('body')
                    <small class="create-field-error">{{ $message }}</small>
                @enderror

                <small class="create-field-help">
                    Tuliskan informasi secara lengkap, runtut, dan mudah dipahami.
                </small>
            </div>

            <div class="create-form-footer">
                <a href="{{ route('articles.index') }}" class="create-cancel-btn">
                    Batal
                </a>

                <button type="submit" class="create-submit-btn">
                    Simpan Artikel →
                </button>
            </div>
        </form>
    </div>

    <p class="create-footer-note">
        Pastikan informasi yang kamu tulis sudah benar sebelum menyimpan artikel.
    </p>

</section>
@endsection
