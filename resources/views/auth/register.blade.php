@extends('layouts.guest')

@section('title', 'Daftar Akun')

@section('content')
<form method="POST" action="{{ route('register') }}" autocomplete="off">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
        <input type="text" 
               name="name" 
               id="name" 
               class="form-control @error('name') is-invalid @enderror" 
               placeholder="Masukkan nama lengkap Anda" 
               value="{{ old('name') }}" 
               required 
               autofocus
               autocomplete="off">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Email Address -->
    <div class="mb-3">
        <label for="email" class="form-label fw-semibold">Email</label>
        <input type="email" 
               name="email" 
               id="email" 
               class="form-control @error('email') is-invalid @enderror" 
               placeholder="Masukkan email Anda" 
               value="{{ old('email') }}" 
               required
               autocomplete="off">
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Phone -->
    <div class="mb-3">
        <label for="phone" class="form-label fw-semibold">Nomor HP</label>
        <input type="text" 
               name="phone" 
               id="phone" 
               class="form-control @error('phone') is-invalid @enderror" 
               placeholder="Contoh: 08123456789" 
               value="{{ old('phone') }}"
               autocomplete="off">
        @error('phone')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label fw-semibold">Password</label>
        <input type="password" 
               name="password" 
               id="password" 
               class="form-control @error('password') is-invalid @enderror" 
               placeholder="Masukkan password Anda" 
               required
               autocomplete="new-password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
        <input type="password" 
               name="password_confirmation" 
               id="password_confirmation" 
               class="form-control" 
               placeholder="Ulangi password Anda" 
               required
               autocomplete="new-password">
    </div>

    <!-- Submit Button -->
    <div class="d-grid">
        <button type="submit" class="btn btn-warning text-dark fw-semibold py-2">
            Daftar
        </button>
    </div>

    <!-- Login Link -->
    <div class="text-center mt-3">
        <p class="mb-0">Sudah punya akun? 
            <a href="{{ route('login') }}" class="text-warning fw-semibold text-decoration-none">
                Login di sini
            </a>
        </p>
    </div>
</form>
@endsection
