<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\RegistrationController;

// Include auth routes
require __DIR__.'/auth.php';

// ==============================
// Halaman depan (tidak perlu login)
// ==============================
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery');

// ==============================
// Event publik - hanya lihat (tidak perlu login)
// ==============================
Route::get('/events', [EventController::class, 'index'])->name('events.index');

// ==============================
// Fitur yang memerlukan login
// ==============================
Route::middleware('auth')->group(function () {
    // Membuat event baru (hanya user yang login)
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    
    // Edit event sendiri (hanya user yang login)
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    
    // Daftar sebagai peserta (hanya user yang login)
    Route::get('/events/{event}/register', [ParticipantController::class, 'create'])->name('participants.create');
    Route::post('/events/{event}/register', [ParticipantController::class, 'store'])->name('participants.store');
    
    // Registrasi menggunakan RegistrationController
    Route::get('/events/{event}/registration', [RegistrationController::class, 'create'])->name('registrations.create');
    Route::post('/events/{event}/registration', [RegistrationController::class, 'store'])->name('registrations.store');
});

// ==============================
// Event detail (letakkan di akhir agar tidak konflik dengan route lain)
// ==============================
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');

// ==============================
// Khusus Admin (menggunakan auth + admin middleware)
// ==============================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Events (Admin)
    Route::get('/events', [EventController::class, 'index'])->name('events.index');
    Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/events', [EventController::class, 'store'])->name('events.store');
    Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    // Participants (Admin)
    Route::get('/events/{event}/participants', [ParticipantController::class, 'index'])->name('events.participants');
    Route::delete('/events/{event}/participants/{participant}', [ParticipantController::class, 'destroy'])->name('events.participants.destroy');
});

// ==============================
// Dashboard redirect
// ==============================
Route::get('/dashboard', function () {
    return redirect()->route('events.index');
})->name('dashboard');

