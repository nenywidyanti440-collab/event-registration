@extends('layouts.app')

@section('content')
    <h2>Registrasi Peserta untuk {{ $event->name }}</h2>

    <form action="{{ route('registrations.store', $event) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@endsection
