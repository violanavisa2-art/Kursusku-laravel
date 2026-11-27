@extends('layouts.app')

@section('title', 'Pendaftaran Kursus')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm">
            <div class="card-body p-4">
                <h1 class="h3 mb-3">Tambah Enrollment</h1>
                <p class="text-secondary">
                    Pilih peserta dan kursus. Jumlah kursi dicek tanpa reload halaman.
                </p>

                <form method="POST" action="{{ route('enrollments.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="participant_id" class="form-label">Participant</label>
                        <select name="participant_id" id="participant_id"
                                class="form-select @error('participant_id') is-invalid @enderror">
                            <option value="">-- Pilih Participant --</option>
                            @foreach ($participants as $participant)
                                <option value="{{ $participant->id }}"
                                    @selected(old('participant_id') == $participant->id)>
                                    {{ $participant->name }} - {{ $participant->email }}
                                </option>
                            @endforeach
                        </select>
                        @error('participant_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Course</label>
                        <select name="course_id" id="course_id"
                                class="form-select @error('course_id') is-invalid @enderror">
                            <option value="">-- Pilih Course --</option>
                            @foreach ($courses as $course)
                                <option value="{{ $course->id }}"
                                    @selected(old('course_id') == $course->id)>
                                    {{ $course->code }} - {{ $course->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('course_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div id="availability" class="alert alert-secondary">
                        Pilih kursus untuk melihat sisa kursi.
                    </div>

                    <button type="submit" class="btn btn-success">Simpan Enrollment</button>
                    <a href="{{ route('enrollments.index') }}" class="btn btn-outline-secondary">Lihat Laporan</a>
                </form>
            </div>
              </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
$(document).on('change', '#course_id', function () {
    const id = this.value;
    const $box = $('#availability');
    if (!id) {
        $box.attr('class', 'alert alert-secondary').text('Pilih kursus untuk melihat sisa kursi.');
        return;
    }
    $.getJSON(`/courses/${id}/availability`)
        .done(data => $box.attr('class', 'alert alert-success')
            .text(`${data.remaining} kursi tersisa untuk ${data.course}.`))
        .fail(() => $box.attr('class', 'alert alert-danger')
            .text('Gagal memuat ketersediaan kursus.'));
});
</script>
@endsection
