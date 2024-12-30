@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Daftar Berita</h1>

    <!-- Tampilkan tombol untuk membuat berita baru -->
    <a href="{{ route('news.create') }}" class="btn btn-primary mb-3">Buat Berita Baru</a>

    <!-- Tampilkan daftar berita -->
    @if ($news->isEmpty())
        <p>Belum ada berita yang dibuat.</p>
    @else
        <ul class="list-group">
            @foreach ($news as $item)
                <li class="list-group-item">
                    <h5>{{ $item->title }}</h5>
                    <p>{{ $item->content }}</p>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
