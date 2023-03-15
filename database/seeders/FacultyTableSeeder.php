<?php

namespace Database\Seeders;

use App\Models\Faculty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculties = [

            [
                'name' => 'consolacion salvio',
                'user_id' => 60,
                'active' => 1,
            ],
        ];

        foreach ($faculties as $key => $value) {
            Faculty::create($value);
        }
    }
}
