<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $levels = [
            // [
            //     'name' => 'Grade 1'
            // ],
            // [
            //     'name' => 'Grade 2'
            // ],
            // [
            //     'name' => 'Grade 3'
            // ],
            // [
            //     'name' => 'Grade 4'
            // ],
            // [
            //     'name' => 'Grade 5'
            // ],
            // [
            //     'name' => 'Grade 6'
            // ],
            // [
            //     'name' => 'Grade 7'
            // ],
            // [
            //     'name' => 'Grade 8'
            // ],
            // [
            //     'name' => 'Grade 9'
            // ],
            // [
            //     'name' => 'Grade 10'
            // ],
            // [
            //     'name' => 'Grade 11'
            // ],
            // [
            //     'name' => 'Grade 12'
            // ],
            // [
            //     'name' => 'Nursery'
            // ],
            // [
            //     'name' => 'Kinder'
            // ],
            [
                'name' => 'Incoming Grade 1'
            ],
            [
                'name' => 'Incoming Grade 2'
            ],
            [
                'name' => 'Incoming Grade 3'
            ],
            [
                'name' => 'Incoming Grade 4'
            ],
            [
                'name' => 'Incoming Grade 5'
            ],
            [
                'name' => 'Incoming Grade 6'
            ],
            [
                'name' => 'Incoming Grade 7'
            ],
            [
                'name' => 'Incoming Grade 8'
            ],
            [
                'name' => 'Incoming Grade 9'
            ],
            [
                'name' => 'Incoming Grade 10'
            ],
            [
                'name' => 'Incoming Grade 11'
            ],
            [
                'name' => 'Incoming Grade 12'
            ],
            [
                'name' => 'Incoming Nursery'
            ],
            [
                'name' => 'Incoming Kinder'
            ],
        ];

        foreach($levels as $key => $value) {
            Level::create($value);
        }
    }
}
