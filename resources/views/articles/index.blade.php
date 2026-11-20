@extends('layouts.app')

@section('title', 'Articles')

@section('content')
<section class="card">
    <div class="page-header">
        <h2>Daftar Artikel</h2>
        <a href="{{ route('articles.create') }}" class="btn">+ Artikel Baru</a>
    </div>

    @if (session('success'))
        <div class="flash">{{ session('success') }}</div>
    @endif

    @if ($articles->isNotEmpty())
        <ul class="daftar">
            @foreach ($articles as $article)
                <li>
                    <div class="judul">
                        <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                        <small>oleh {{ $article->user->name }}</small>
                    </div>

                    @if ($article->user_id === auth()->id())
                        <div class="aksi">
                            <a href="{{ route('articles.edit', $article) }}" class="btn btn-light">Edit</a>

                            <form action="{{ route('articles.destroy', $article) }}" method="POST" class="inline"
                                  onsubmit="return confirm('Hapus artikel ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Hapus</button>
                            </form>
                        </div>
                    @endif
                </li>
            @endforeach
        </ul>

        {{-- Pagination sederhana (tanpa Tailwind) --}}
        @if ($articles->hasPages())
            <div class="pagination">
                @if ($articles->onFirstPage())
                    <span class="nonaktif">&laquo; Sebelumnya</span>
                @else
                    <a href="{{ $articles->previousPageUrl() }}">&laquo; Sebelumnya</a>
                @endif

                <span>Halaman {{ $articles->currentPage() }} dari {{ $articles->lastPage() }}</span>

                @if ($articles->hasMorePages())
                    <a href="{{ $articles->nextPageUrl() }}">Berikutnya &raquo;</a>
                @else
                    <span class="nonaktif">Berikutnya &raquo;</span>
                @endif
            </div>
        @endif
    @else
        <p class="muted">Belum ada artikel.</p>
    @endif
</section>
@endsection
