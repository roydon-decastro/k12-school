<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // fyi Create admin filament account
        /*
        \App\Models\User::factory()->create([
            'name' => 'Admin Roy',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);
        */

        // fyi Seeders
        $this->call(FacultyTableSeeder::class);
        /*
        $this->call(LevelsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(UsersTableSeeder::class); // error DONT RUN THIS NONCHALANTLY
        */

        // fyi Factories
        /*
        \App\Models\User::factory(50)->create();
        \App\Models\School::factory(5)->create();
        \App\Models\Building::factory(18)->create();
        \App\Models\Room::factory(18)->create();
        */

        // DB::table('users')->insert([
        //     'name' => Str::random(10),
        //     'email' => Str::random(10).'@gmail.com',
        //     'password' => Hash::make('password'),
        // ]);
        // fyi terminal commands
        /*
         php artisan migrate:fresh
         php artisan db:seed

         php artisan make:filament-user
         php artisan make:factory BuildingFactory
         php artisan make:seeder LevelsTableSeeder
        */
    }


}
