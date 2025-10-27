@extends('layouts.app')

@section('title', 'Admin - Kelola Event')

@section('content')
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Kelola Event</h2>
        <a href="{{ route('admin.events.create') }}" 
           class="btn btn-warning text-dark fw-semibold shadow-sm">
            + Tambah Event
        </a>
    </div>

    {{-- Flash message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Pencarian --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <form action="{{ route('events.index') }}" method="GET" class="d-flex">
                <input type="text" name="q" class="form-control me-2" 
                       placeholder="Cari nama atau lokasi event..." value="{{ request('q') }}">
                <button class="btn btn-outline-secondary shadow-sm">Cari</button>
                @if(strlen(trim((string)request('q'))) > 0)
                    <a href="{{ route('events.index') }}" class="btn btn-outline-secondary ms-2 shadow-sm">Reset</a>
                @endif
            </form>
        </div>
    </div>

    <div class="table-responsive shadow-sm rounded">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width:140px;">Gambar</th>
                    <th>Nama</th>
                    <th style="width:160px;">Tanggal</th>
                    <th style="width:200px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($events as $event)
                    <tr>
                        {{-- Gambar --}}
                        <td>
                            <img src="{{ $event->image ? asset('storage/' . $event->image) : asset('images/placeholder-event.jpg') }}"
                                 alt="Event image"
                                 class="img-fluid rounded"
                                 style="width:120px; height:80px; object-fit:cover;">
                        </td>

                        {{-- Nama --}}
                        <td>
                            <strong>{{ $event->title }}</strong><br>
                            <small class="text-muted">{{ \Illuminate\Support\Str::limit($event->location ?? '-', 60) }}</small>
                        </td>

                        {{-- Tanggal --}}
                        <td>
                            @if($event->date)
                                {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d M Y') }}
                            @else
                                -
                            @endif
                        </td>

                        {{-- Aksi --}}
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('admin.events.participants', $event->id) }}" 
                                   class="btn btn-outline-secondary btn-sm shadow-sm">
                                    <i class="bi bi-people"></i> Peserta
                                </a>

                                <a href="{{ route('admin.events.edit', $event->id) }}" 
                                   class="btn btn-outline-secondary btn-sm shadow-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>

                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST" 
                                      onsubmit="return confirm('Yakin ingin menghapus event ini?');"
                                      class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm shadow-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">Belum ada event.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4">
        @if(method_exists($events, 'links'))
            {{ $events->links() }}
        @endif
    </div>
</div>
@endsection

{{-- Custom style untuk tombol agar lebih halus --}}
@push('styles')
<style>
    .btn-outline-secondary {
        border-radius: 6px;
        font-weight: 500;
        transition: 0.2s;
    }
    .btn-outline-secondary:hover {
        background-color: #e9ecef; /* abu lembut */
        color: #000;
    }
</style>
@endpush
