<?php

namespace App\Providers;

use Filament\Facades\Filament;
use Illuminate\Support\ServiceProvider;
// use Filament\Facades\Filament;
// use Filament\Navigation\NavigationBuilder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Filament::navigation(function (NavigationBuilder $builder): NavigationBuilder {
        //     return $builder;
        // });
        Filament::registerNavigationGroups([
            'School Fees',
            'Student Grades',
            'Student Attendance',
            'Student Admin',
            'School Admin',
        ]);
    }



}
