<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Participant;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu';

        $featured = Course::where('status', 'open')
            ->orderBy('start_date')
            ->take(3)
            ->get();

        $stats = [
            'Total Kursus' => Course::count(),
            'Kursus Open' => Course::where('status', 'open')->count(),
            'Peserta' => Participant::count(),
            'Pendaftaran' => Enrollment::count(),
        ];

        return view('home', compact('siteName', 'featured', 'stats'));
    }
}
