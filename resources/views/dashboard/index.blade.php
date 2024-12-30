@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 class="text-center mb-4">Berita Terbaru</h1>

    @if (!empty($error))
        <div class="alert alert-danger">{{ $error }}</div>
    @endif

    @if (!empty($articles))
        <div class="row">
            @foreach ($articles as $item)
                <div class="col-12 col-md-6 col-lg-4 mb-4">
                    <div class="card h-100">
                        @if (!empty($item['urlToImage']))
                            <img src="{{ $item['urlToImage'] }}" class="card-img-top" alt="Gambar Berita">
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $item['title'] }}</h5>
                            <p class="card-text">{{ $item['description'] }}</p>
                            <a href="{{ $item['url'] }}" target="_blank" class="btn btn-primary mt-auto">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">Tidak ada berita untuk ditampilkan saat ini.</p>
    @endif
</div>
@endsection
