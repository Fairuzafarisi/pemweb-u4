@extends('layouts.app')

@section('title', $article->title)

@section('content')
<section class="card">
    <h2>{{ $article->title }}</h2>
    <p class="muted">
        Dipublikasikan pada {{ $article->created_at->format('d M Y') }}
        oleh {{ $article->user->name }}
    </p>

    <img src="{{ $article->image_url }}" alt="Gambar untuk {{ $article->title }}" class="cover">

    <div class="isi">
        {!! nl2br(e($article->body)) !!}
    </div>

    <p class="tautan">
        <a href="{{ route('home') }}">&larr; Kembali ke Home</a> |
        <a href="{{ route('articles.index') }}">Lihat semua artikel</a>
        @auth
            @if ($article->user_id === auth()->id())
                | <a href="{{ route('articles.edit', $article) }}">Edit</a>
            @endif
        @endauth
    </p>
</section>
@endsection
