<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        $siteName = 'KursusKu';
        $featured = [
            ['code' => 'WEB-01', 'name' => 'Web Lanjutan', 'description' => 'Belajar HTML dan CSS.'],
            ['code' => 'PHP-01', 'name' => 'PHP Dasar', 'description' => 'Belajar PHP.'],
            ['code' => 'UI-01', 'name' => 'UI Web Dasar', 'description' => 'Belajar prinsip tampilan web yang rapi.'],
        ];

        return view('home', compact('siteName', 'featured'));
    }
}