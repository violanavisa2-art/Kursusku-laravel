@extends('layouts.app')

@section('title', 'Beranda - ' . $siteName)

@section('content')
<section class="py-4">
    <span class="badge text-bg-success mb-3">Kursus teknologi untuk mahasiswa</span>
    <h1 class="display-5 fw-bold">Belajar lebih terarah bersama {{ $siteName }}</h1>
    <p class="lead text-secondary">
        Pilih kursus, cek ketersediaan kursi, lalu isi formulir pendaftaran.
    </p>
    <a href="{{ route('enrollments.create') }}" class="btn btn-success">Daftar Kursus</a>
    <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">Lihat Semua Kursus</a>
</section>

<section class="row g-3 mb-4">
    @foreach ($stats as $label => $value)
        <div class="col-6 col-md-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <div class="display-6 fw-bold">{{ $value }}</div>
                    <div class="text-muted small">{{ $label }}</div>
                </div>
            </div>
        </div>
    @endforeach
</section>

<section>
    <h2 class="h4 mb-3">Kursus Pilihan</h2>
    <div class="row g-3">
        @forelse ($featured as $course)
            <div class="col-md-4">
                <article class="card shadow-sm h-100">
                    <div class="card-body">
                        <small class="text-muted">{{ $course->code }}</small>
                        <h3 class="h5">{{ $course->name }}</h3>
                        <p class="text-secondary mb-2">{{ $course->description ?: '-' }}</p>
                        <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-outline-primary">Detail</a>
                    </div>
                </article>
            </div>
        @empty
            <p class="text-muted">Belum ada kursus yang dibuka.</p>
        @endforelse
    </div>
</section>
@endsection
