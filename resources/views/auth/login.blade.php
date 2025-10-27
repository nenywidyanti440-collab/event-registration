@extends('layouts.guest')

@section('title', 'Login')

@section('content')
<form method="POST" action="{{ route('login') }}" autocomplete="off">
    @csrf

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
               autofocus
               autocomplete="off">
        @error('email')
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

    <!-- Remember Me -->
    <div class="mb-3 form-check">
        <input type="checkbox" name="remember" id="remember" class="form-check-input">
        <label for="remember" class="form-check-label">Ingat saya</label>
    </div>

    <!-- Submit Button -->
    <div class="d-grid">
        <button type="submit" class="btn btn-warning text-dark fw-semibold py-2">
            Login
        </button>
    </div>

    <!-- Register Link -->
    <div class="text-center mt-3">
        <p class="mb-0">Belum punya akun? 
            <a href="{{ route('register') }}" class="text-warning fw-semibold text-decoration-none">
                Daftar di sini
            </a>
        </p>
    </div>
</form>
@endsection
