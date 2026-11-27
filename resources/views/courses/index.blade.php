@extends('layouts.app')

@section('title', 'Daftar Kursus')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <h1 class="h3 mb-1">Daftar Kursus</h1>
        <p class="text-muted mb-0">Data diambil dari MySQL melalui Eloquent.</p>
    </div>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">+ Tambah Kursus</a>
</div>

{{-- Form GET: tetap bekerja walaupun JavaScript dimatikan --}}
<form id="course-filter" method="GET" action="{{ route('courses.index') }}" class="row g-2 mb-3">
    <div class="col-md-6">
        <input type="search" id="live-search" name="q" value="{{ $search }}"
               class="form-control" placeholder="Cari kode atau nama kursus">
    </div>
    <div class="col-md-3">
        <select id="status-filter" name="status" class="form-select">
            <option value="">Semua status</option>
            <option value="open" @selected($status === 'open')>Open</option>
            <option value="closed" @selected($status === 'closed')>Closed</option>
            <option value="draft" @selected($status === 'draft')>Draft</option>
        </select>
    </div>
    <div class="col-md-3 d-flex gap-2">
        <button class="btn btn-primary">Cari</button>
        <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary">Reset</a>
    </div>
</form>

@include('courses._results')
@endsection
