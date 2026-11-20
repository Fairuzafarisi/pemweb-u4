@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<section class="card">
    <h2>Dashboard</h2>
    <p>Selamat datang, <strong>{{ $user->name }}</strong></p>
    <p class="muted">Ini adalah ringkasan singkat aktivitas artikel di aplikasi kamu.</p>
</section>

<section class="stats">
    <div class="card">
        <h3>Total Artikel</h3>
        <p class="angka">{{ $totalArticles }}</p>
        <p class="muted">Jumlah seluruh artikel yang ada di sistem.</p>
    </div>

    <div class="card">
        <h3>Artikel Kamu</h3>
        <p class="angka">{{ $myArticles }}</p>
        <p class="muted">Artikel yang dibuat oleh akun kamu.</p>
    </div>

    <div class="card">
        <h3>Aksi Cepat</h3>
        <ul class="polos">
            <li><a href="{{ route('articles.create') }}">+ Tambah Artikel Baru</a></li>
            <li><a href="{{ route('articles.index') }}">Lihat Semua Artikel</a></li>
            <li><a href="{{ route('home') }}">Lihat Halaman Home</a></li>
        </ul>
    </div>
</section>

<section class="card">
    <h3>Artikel Terbaru</h3>

    @if ($latestArticles->isNotEmpty())
        <div class="article-list">
            @foreach ($latestArticles as $article)
                <article class="article kecil">
                    <img src="{{ $article->image_url }}" alt="Thumbnail {{ $article->title }}">
                    <div class="article-body">
                        <h4>
                            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </h4>
                        <p class="muted">
                            oleh {{ $article->user->name }} &bull; {{ $article->created_at->format('d M Y') }}
                        </p>
                        <p>{{ \Illuminate\Support\Str::limit($article->body, 100) }}</p>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <p class="muted">Belum ada artikel yang bisa ditampilkan.</p>
    @endif
</section>

<section class="card">
    <h3>Info Akun</h3>
    <ul class="polos">
        <li><strong>Nama:</strong> {{ $user->name }}</li>
        <li><strong>Email:</strong> {{ $user->email }}</li>
    </ul>
    <p class="muted" style="margin-top: 0.75rem;">
        Gunakan menu di navbar untuk berpindah antara Home, Artikel, dan Dashboard.
    </p>
</section>
@endsection
