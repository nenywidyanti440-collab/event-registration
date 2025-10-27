@extends('layouts.app')

@section('title', 'Daftar Event')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Daftar Event</h2>
        <div class="d-flex gap-2">
            @auth
                <a href="{{ route('events.create') }}" class="btn btn-warning text-dark">
                    + Buat Event Baru
                </a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-secondary">
                    Daftar Event
                </a>
            @endauth
        </div>
    </div>
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <form action="{{ route('events.index') }}" method="GET" class="d-flex" style="max-width:420px; width:100%">
            <input type="text" name="q" class="form-control me-2" placeholder="Cari nama atau lokasi..." value="{{ request('q') }}">
            <button class="btn btn-outline-secondary">Cari</button>
            @if(strlen(trim((string)request('q'))) > 0)
                <a href="{{ route('events.index') }}" class="btn btn-outline-secondary ms-2">Reset</a>
            @endif
        </form>
    </div>

    <div class="row">
        @forelse($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/placeholder-event.jpg') }}"
                         class="card-img-top event-card-img"
                         alt="{{ $event->title }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title mb-1">{{ $event->title }}</h5>
                        <div class="event-meta mb-3">
                            <span>{{ $event->location ?? '-' }}</span> •
                            <span>{{ $event->date ? \Carbon\Carbon::parse($event->date)->translatedFormat('d M Y') : '-' }}</span>
                        </div>

                        <div class="mt-auto d-flex gap-2">
                            {{-- Detail Event --}}
                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-outline-warning btn-sm">
                                Detail
                            </a>

                            @auth
                                {{-- Daftar sebagai Peserta --}}
                                <a href="{{ route('participants.create', $event->id) }}" class="btn btn-outline-warning btn-sm">
                                    Daftar
                                </a>
                                
                                {{-- Edit Event (hanya untuk pembuat event atau admin) --}}
                                @if(auth()->id() == $event->user_id || auth()->user()->isAdmin())
                                    <a href="{{ route('events.edit', $event->id) }}" class="btn btn-outline-secondary btn-sm">
                                        Edit
                                    </a>
                                @endif
                            @else
                                {{-- Login untuk Daftar --}}
                                <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-sm">
                                    Daftar Peserta
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center">Belum ada event tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
