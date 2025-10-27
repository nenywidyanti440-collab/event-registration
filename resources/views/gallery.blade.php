

@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<section id="gallery" class="py-5">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">Event Gallery</h2>
        
        <div class="row row-cols-1 row-cols-md-3 g-4 text-center">
            <!-- Gambar 1 -->
            <div class="col">
                <div class="gallery-item shadow-sm">
                    <img src="{{ asset('images/gallery1.jpg') }}" alt="Gallery 1">
                </div>
                <p class="mt-2 fw-semibold">Panorama Ngarai Sianok</p>
            </div>

            <!-- Gambar 2 -->
            <div class="col">
                <div class="gallery-item shadow-sm">
                    <img src="{{ asset('images/gallery2.jpg') }}" alt="Gallery 2">
                </div>
                <p class="mt-2 fw-semibold">Festival Tari Tradisional</p>
            </div>

            <!-- Gambar 3 -->
            <div class="col">
                <div class="gallery-item shadow-sm">
                    <img src="{{ asset('images/gallery3.jpg') }}" alt="Gallery 3">
                </div>
                <p class="mt-2 fw-semibold">Bukittinggi Running Event 2025</p>
            </div>
        </div>
    </div>
</section>
@endsection
