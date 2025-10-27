@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Peserta - {{ $event->name }}</h2>

    <!-- Notif sukses / error -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($participants->count() > 0)
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($participants as $i => $participant)
                <tr>
                    <td>{{ $i+1 }}</td>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>{{ $participant->phone ?? '-' }}</td>
                    <td>
                        <form action="{{ route('participants.destroy', [$event, $participant]) }}" method="POST" onsubmit="return confirm('Yakin hapus peserta ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-info">Belum ada peserta yang mendaftar.</div>
    @endif

    <a href="{{ route('events.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
