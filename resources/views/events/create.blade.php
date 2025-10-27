@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Form Card -->
            <div class="card border-0 shadow rounded-4">
                <!-- Header -->
                <div class="card-header bg-warning text-dark rounded-top-4 py-3">
                    <h4 class="mb-0 fw-semibold">Buat Event Baru</h4>
                </div>

                <div class="card-body p-4">

                    <!-- Alert -->
                    @if($errors->any())
                        <div class="alert alert-danger rounded-3">
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Judul -->
                        <div class="mb-4">
                            <div class="form-section-title fw-bold text-secondary mb-2">Informasi Dasar</div>
                            <label class="form-label fw-semibold">Judul Event</label>
                            <input type="text" name="title" class="form-control" placeholder="Masukkan judul event" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Deskripsi</label>
                            <textarea name="description" rows="4" class="form-control" placeholder="Tuliskan deskripsi event..." required></textarea>
                        </div>

                        <!-- Tanggal & Lokasi -->
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Tanggal</label>
                                <input type="date" name="date" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Lokasi</label>
                                <input type="text" name="location" class="form-control" placeholder="Contoh: Balai Kota" required>
                            </div>
                        </div>

                        <!-- Gambar -->
                        <div class="mt-4">
                            <div class="form-section-title fw-bold text-secondary mb-2">Media</div>
                            <label class="form-label fw-semibold">Gambar Event</label>
                            <input type="file" name="image" class="form-control" accept="image/*" onchange="previewFile(event)">
                            <small class="text-muted">Format: JPG, PNG (Maks 2MB)</small>
                            <div class="mt-3">
                                <img id="imagePreview" class="preview-image d-none rounded shadow-sm" style="max-height:200px;" alt="Preview">
                            </div>
                        </div>

                        <!-- Tombol -->
                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('events.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                            <button type="submit" class="btn btn-warning text-dark fw-semibold">
                                Simpan Event
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</div>

<script>
    function previewFile(e) {
        const input = e.target;
        const preview = document.getElementById('imagePreview');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (ev) {
                preview.src = ev.target.result;
                preview.classList.remove('d-none');
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
