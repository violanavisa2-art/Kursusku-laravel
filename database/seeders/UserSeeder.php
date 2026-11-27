<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@kursusku.test'],
            ['name' => 'Admin KursusKu', 'password' => 'password123']
        );
    }
}