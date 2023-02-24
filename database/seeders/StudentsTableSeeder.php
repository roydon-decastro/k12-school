<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = [

            [
                'name' => 'abe baraquel',
                'user_id' => 2,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789002'
            ],
            [
                'name' => 'adjemar rosete',
                'user_id' => 3,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789003'
            ],
            [
                'name' => 'adrian rico',
                'user_id' => 4,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789004'
            ],

            [
                'name' => 'adrienne mishka dy',
                'user_id' => 5,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789005'
            ],
            [
                'name' => 'aggie luque',
                'user_id' => 6,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789006'
            ],
            [
                'name' => 'aida coronel dela luna',
                'user_id' => 7,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789007'
            ],
            [
                'name' => 'aida totanes ungay',
                'user_id' => 8,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789008'
            ],
            [
                'name' => 'airene chavez regudo',
                'user_id' => 9,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789009'
            ],
            [
                'name' => 'ako si ynod',
                'user_id' => 10,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789010'
            ],
            [
                'name' => 'aleynn coden',
                'user_id' => 11,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789011'
            ],
            [
                'name' => 'aliw balderas orillo',
                'user_id' => 12,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789012'
            ],
            [
                'name' => 'aljim garcia',
                'user_id' => 13,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789013'
            ],
            [
                'name' => 'allen berja',
                'user_id' => 14,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789014'
            ],
            [
                'name' => 'althea dhimple baraquel',
                'user_id' => 15,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789015'
            ],
            [
                'name' => 'alvin manalo',
                'user_id' => 16,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789016'
            ],
            [
                'name' => 'amy austria dempsey',
                'user_id' => 17,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789017'
            ],
            [
                'name' => 'anarizza guinhawa',
                'user_id' => 18,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789018'
            ],
            [
                'name' => 'andoi cortuna valbuena',
                'user_id' => 19,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789019'
            ],
            [
                'name' => 'angelo esguerra lacuesta',
                'user_id' => 20,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789020'
            ],
            [
                'name' => 'ann gapasin',
                'user_id' => 21,
                'level_id' => 7,
                'active' => 1,
                'assigned' => 0,
                'lrn' => '123456789021'
            ],

        ];

        foreach ($students as $key => $value) {
            Student::create($value);
        }
    }
}
