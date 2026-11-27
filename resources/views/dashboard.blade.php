@extends('layouts.app')

@section('title', 'Profil Saya')

@section('content')
<div class="card shadow-sm">
    <div class="card-header bg-warning fw-bold">Profil Saya</div>
    <div class="card-body">
        <p>Selamat datang, <strong>{{ Auth::user()->name }}</strong>.</p>

        <table class="table table-borderless w-auto mb-4">
            <tr>
                <td>Nama</td>
                <td>: {{ Auth::user()->name }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>: {{ Auth::user()->email }}</td>
            </tr>
            <tr>
                <td>Role</td>
                <td>: <span class="badge bg-warning text-dark">{{ Auth::user()->role ?? 'user' }}</span></td>
            </tr>
        </table>

        <a href="{{ route('courses.index') }}" class="btn btn-warning fw-bold">Lihat Kursus</a>
        <a href="{{ route('enrollments.create') }}" class="btn btn-outline-secondary">Pendaftaran</a>
    </div>
</div>
@endsection