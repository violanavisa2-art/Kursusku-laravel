<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('q'));
        $status = trim((string) $request->query('status'));
        $allowedStatuses = ['open', 'closed', 'draft'];

        $courses = Course::query()
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('code', 'like', "%{$search}%")
                        ->orWhere('name', 'like', "%{$search}%");
                });
            })
            ->when(in_array($status, $allowedStatuses, true), function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->orderBy('name')
            ->paginate(10)
            ->withQueryString();

        // Request Ajax meminta partial=1. Parameter itu tidak boleh ikut
        // ke link pagination, supaya link tetap membuka halaman penuh.
        if ($request->boolean('partial')) {
            $courses->appends('partial', null);

            return view('courses._results', compact('courses'));
        }

        return view('courses.index', compact('courses', 'search', 'status'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(StoreCourseRequest $request)
    {
        Course::create($request->validated());

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil ditambahkan.');
    }

    public function show(Course $course)
    {
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    public function update(UpdateCourseRequest $request, Course $course)
    {
        $course->update($request->validated());

        return to_route('courses.show', $course)
            ->with('success', 'Kursus berhasil diperbarui.');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return to_route('courses.index')
            ->with('success', 'Kursus berhasil dihapus.');
    }

    /**
     * Endpoint JSON untuk Ajax cek kursi (Pertemuan 9).
     * Sejak Pertemuan 12, sisa kursi dihitung dari jumlah enrollment.
     */
   public function availability(Course $course)
{
    $terisi = $course->enrollments()
        ->where('status', '!=', 'cancelled')
        ->count();

    return response()->json([
        'remaining' => max(0, $course->quota - $terisi),
        'course'    => $course->name,
    ]);
}
}
