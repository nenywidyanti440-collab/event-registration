<form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Nama Event -->
    <div class="mb-3">
        <label class="form-label">Nama Event</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <!-- Lokasi -->
    <div class="mb-3">
        <label class="form-label">Lokasi</label>
        <input type="text" name="location" class="form-control" required>
    </div>

    <!-- Tanggal -->
    <div class="mb-3">
        <label class="form-label">Tanggal</label>
        <input type="date" name="date" class="form-control" required>
    </div>

    <!-- Deskripsi -->
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>

    <!-- Upload Gambar -->
    <div class="mb-3">
        <label class="form-label">Gambar Event</label>
        <input type="file" name="image" class="form-control">
    </div>

    <button class="btn btn-warning text-dark">Simpan</button>
</form>
