@extends('layouts.app')

@section('title', 'Laporan Enrollment')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3 mb-0">Laporan Enrollment KursusKu</h1>
    <a href="{{ route('enrollments.create') }}" class="btn btn-primary">Tambah Enrollment</a>
</div>

<div class="card">
    <div class="table-responsive">
        <table class="table table-striped mb-0">
            <thead>
                <tr>
                    <th>Participant</th>
                    <th>Course</th>
                    <th>Start Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->participant->name }}</td>
                        <td>{{ $enrollment->course->name }}</td>
                        <td>{{ $enrollment->course->start_date?->format('d/m/Y') }}</td>
                        <td>{{ $enrollment->status }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted py-4">Belum ada enrollment.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
