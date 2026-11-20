@extends('layouts.app')

@section('title', 'Home')

@section('content')
<section class="card">
    <h2>Portal Berita Sederhana</h2>
    <p>
        Selamat datang di portal berita sederhana berbasis Laravel.
        Berita di bawah ini diambil dari tabel <code>articles</code>.
    </p>

    @guest
        <p class="muted">
            Kamu belum login. Untuk mengelola berita, silakan
            <a href="{{ route('login') }}">Login</a> atau
            <a href="{{ route('register') }}">Register</a>.
        </p>
    @endguest

    @auth
        <p class="muted">
            Kamu login sebagai <strong>{{ auth()->user()->name }}</strong>.
            Kamu dapat menambah berita di menu <a href="{{ route('articles.index') }}">Artikel</a>.
        </p>
    @endauth
</section>

<section class="card">
    <h3>Berita Terbaru</h3>

    @if ($articles->isNotEmpty())
        <div class="article-list">
            @foreach ($articles as $article)
                <article class="article">
                    <img src="{{ $article->image_url }}" alt="Gambar {{ $article->title }}">
                    <div class="article-body">
                        <h4>
                            <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        </h4>
                        <p class="muted">
                            Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
                            oleh {{ $article->user->name }}
                        </p>
                        <p>{{ \Illuminate\Support\Str::limit($article->body, 140) }}</p>
                        <a href="{{ route('articles.show', $article) }}">Baca selengkapnya &rarr;</a>
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <p class="muted">
            Belum ada berita yang tersedia.
            @auth
                Silakan buat berita baru di menu <a href="{{ route('articles.create') }}">Tambah Artikel</a>.
            @endauth
        </p>
    @endif
</section>
@endsection
