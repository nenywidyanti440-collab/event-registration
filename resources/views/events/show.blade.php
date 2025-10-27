@extends('layouts.app')

@section('title', 'Detail Event')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                {{-- Gambar Event --}}
                <img src="{{ $event->image 
                    ? asset('storage/' . $event->image) 
                    : 'https://via.placeholder.com/800x300?text=No+Image' }}" 
                    class="card-img-top event-detail-img" 
                    alt="{{ $event->title }}">

                {{-- Body --}}
                <div class="card-body">
                    <h3 class="fw-bold text-dark mb-3">{{ $event->title }}</h3>

                    <p class="text-muted mb-3">
                        <i class="bi bi-geo-alt-fill text-secondary"></i> {{ $event->location ?? '-' }} <br>
                        <i class="bi bi-calendar-event text-secondary"></i> 
                        {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
                    </p>

                    <p class="mb-4 text-dark">
                        {{ $event->description ?? 'Belum ada deskripsi untuk event ini.' }}
                    </p>

                    {{-- Tombol --}}
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('events.index') }}" 
                           class="btn btn-light border px-4 rounded-pill">
                            <i class="bi bi-arrow-left"></i> Kembali
                        </a>
                        
                        @auth
                            <a href="{{ route('participants.create', $event->id) }}" 
                               class="btn btn-warning text-dark fw-semibold px-4 rounded-pill shadow-sm">
                                <i class="bi bi-person-plus-fill"></i> Daftar Peserta
                            </a>
                        @else
                            <a href="{{ route('login') }}" 
                               class="btn btn-outline-secondary fw-semibold px-4 rounded-pill">
                                <i class="bi bi-person-plus-fill"></i> Daftar Peserta
                            </a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .event-detail-img {
        height: 300px;
        object-fit: cover;
        border-top-left-radius: .5rem;
        border-top-right-radius: .5rem;
    }
</style>
@endsection
