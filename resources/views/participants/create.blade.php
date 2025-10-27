@extends('layouts.app')

@section('title', 'Form Registrasi Peserta')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0 rounded-3">
                <!-- Header -->
                <div class="card-header bg-warning text-dark text-center py-3 rounded-top">
                    <h4 class="mb-0 fw-bold">Registrasi Peserta</h4>
                    <small class="d-block text-muted">Event: <strong>{{ $event->title }}</strong></small>
                </div>

                <!-- Body -->
                <div class="card-body p-4">
                    <form action="{{ route('participants.store', $event->id) }}" method="POST">
                        @csrf

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="name" id="name" 
                                   class="form-control" 
                                   placeholder="Masukkan nama lengkap Anda" 
                                   value="{{ auth()->user()->name }}"
                                   required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="email" 
                                   class="form-control" 
                                   placeholder="contoh: email@gmail.com" 
                                   value="{{ auth()->user()->email }}"
                                   required>
                        </div>

                        <!-- No HP -->
                        <div class="mb-4">
                            <label for="phone" class="form-label fw-semibold">No. HP</label>
                            <input type="text" name="phone" id="phone" 
                                   class="form-control" 
                                   placeholder="contoh: 08123456789" 
                                   value="{{ auth()->user()->phone }}"
                                   required>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('events.index') }}" 
                               class="btn btn-light border px-4 rounded-pill">
                                ← Kembali
                            </a>
                            <button type="submit" 
                                    class="btn btn-warning text-dark fw-semibold px-4 rounded-pill shadow-sm">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
