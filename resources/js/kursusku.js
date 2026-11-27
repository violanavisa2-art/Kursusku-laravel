import 'bootstrap';
import $ from 'jquery';

window.$ = window.jQuery = $;

/* ------------------------------------------------------------------
 * Pertemuan 9: cek sisa kursi dengan jQuery Ajax (halaman pendaftaran)
 * ------------------------------------------------------------------ */
$(document).on('change', '#course_id', function () {
    const id = this.value;
    const $box = $('#availability');

    if (!$box.length) {
        return;
    }

    if (!id) {
        $box
            .removeClass('alert-success alert-danger')
            .addClass('alert-secondary')
            .text('Pilih kursus untuk melihat sisa kursi.');
        return;
    }

    $box
        .removeClass('alert-success alert-danger')
        .addClass('alert-secondary')
        .text('Memuat ketersediaan...');

    $.ajax({
        url: `/courses/${id}/availability`,
        method: 'GET',
        dataType: 'json',
        success(data) {
            $box
                .removeClass('alert-secondary alert-danger')
                .addClass('alert-success')
                .text(`${data.remaining} kursi tersisa untuk ${data.course}.`);
        },
        error() {
            $box
                .removeClass('alert-secondary alert-success')
                .addClass('alert-danger')
                .text('Gagal memuat ketersediaan kursus.');
        },
    });
});

/* ------------------------------------------------------------------
 * Pertemuan 13 (opsional): live search + filter + pagination via Ajax.
 * Form GET tetap menjadi fallback jika JavaScript mati.
 * ------------------------------------------------------------------ */
let searchTimer;

function loadCourses(url, params) {
    $.get(url, params)
        .done(function (html) {
            $('#course-results').replaceWith(html);
        })
        .fail(function () {
            console.error('Gagal memuat hasil course.');
        });
}

function currentFilters() {
    return {
        q: $('#live-search').val(),
        status: $('#status-filter').val(),
        partial: 1,
    };
}

// Debounce 300 ms: request dikirim setelah pengguna berhenti mengetik.
$(document).on('input', '#live-search', function () {
    clearTimeout(searchTimer);
    searchTimer = setTimeout(function () {
        loadCourses($('#course-filter').attr('action'), currentFilters());
    }, 300);
});

$(document).on('change', '#status-filter', function () {
    loadCourses($('#course-filter').attr('action'), currentFilters());
});

// Klik pagination: ambil hanya hasilnya, tanpa reload halaman.
$(document).on('click', '#course-results .pagination a', function (e) {
    e.preventDefault();
    loadCourses($(this).attr('href'), { partial: 1 });
});
