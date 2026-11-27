<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    public function run(): void
    {
        $statuses = ['open', 'closed', 'draft'];

        for ($i = 1; $i <= 30; $i++) {
            Course::firstOrCreate(
                ['code' => 'DMY-' . str_pad($i, 2, '0', STR_PAD_LEFT)],
                [
                    'name'        => 'Kursus Dummy ' . $i,
                    'description' => 'Data latihan KursusKu',
                    'fee'         => (250 + ($i * 10)) * 1000,
                    'quota'       => 20,
                    'start_date'  => now()->addDays($i)->toDateString(),
                    'status'      => $statuses[$i % 3],
                ]
            );
        }
    }
}