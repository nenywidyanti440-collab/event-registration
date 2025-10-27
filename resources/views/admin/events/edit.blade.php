@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card shadow-sm border-0 rounded">
                <div class="card-header bg-warning text-dark fw-semibold">
                    <h4 class="mb-0">
                        <i class="bi bi-pencil-square"></i> Edit Event
                    </h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.events.update', $event->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Judul Event --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Judul Event</label>
                            <input type="text" name="title" 
                                   value="{{ old('title', $event->title) }}" 
                                   class="form-control @error('title') is-invalid @enderror" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="description" rows="4" 
                                      class="form-control @error('description') is-invalid @enderror" required>{{ old('description', $event->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tanggal & Lokasi --}}
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Tanggal</label>
                                <input type="date" name="date" 
                                       value="{{ old('date', $event->date) }}" 
                                       class="form-control @error('date') is-invalid @enderror" required>
                                @error('date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-semibold">Lokasi</label>
                                <input type="text" name="location" 
                                       value="{{ old('location', $event->location) }}" 
                                       class="form-control @error('location') is-invalid @enderror" required>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Preview Gambar Lama --}}
                        @if($event->image)
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Gambar Saat Ini</label><br>
                                <img src="{{ asset('storage/' . $event->image) }}" 
                                     class="img-thumbnail rounded mb-2" style="max-width: 300px;">
                            </div>
                        @endif

                        {{-- Upload Gambar Baru --}}
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Ganti Gambar</label>
                            <input type="file" name="image" 
                                   class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Tombol Aksi --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('events.index') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-left"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-warning text-dark fw-semibold">
                                <i class="bi bi-check-circle"></i> Update Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
