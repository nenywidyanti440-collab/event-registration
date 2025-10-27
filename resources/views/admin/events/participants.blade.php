@extends('layouts.app')

@section('title', 'Peserta Event')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <!-- Card -->
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center rounded-top-4">
                    <h5 class="mb-0 fw-semibold">
                        Peserta: {{ $event->title }}
                    </h5>
                    <span class="badge bg-warning text-dark">Total: {{ $participants->count() }}</span>
                </div>

                <div class="card-body">

                    <!-- Tombol Aksi -->
                    <div class="mb-4 d-flex flex-wrap gap-2">
                        <a href="{{ route('admin.events.index') }}" class="btn btn-sm btn-outline-secondary">
                            ← Kembali ke Event
                        </a>
                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-outline-secondary">
                            Lihat Detail Event
                        </a>
                        <a href="{{ route('participants.create', $event->id) }}" class="btn btn-sm btn-warning text-dark fw-semibold">
                            + Tambah Peserta
                        </a>
                    </div>

                    <!-- Flash Message -->
                    @if(session('success'))
                        <div class="alert alert-success rounded-3 py-2 px-3">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger rounded-3 py-2 px-3">{{ session('error') }}</div>
                    @endif

                    <!-- Tabel Peserta -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th style="width:40px;">#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th style="width:120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($participants as $index => $participant)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $participant->name }}</td>
                                        <td>{{ $participant->email }}</td>
                                        <td>
                                            <form action="{{ route('admin.events.participants.destroy', [$event->id, $participant->id]) }}" 
                                                  method="POST" 
                                                  onsubmit="return confirm('Yakin ingin menghapus peserta ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4 text-muted">
                                            Belum ada peserta terdaftar.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>
</div>
@endsection
