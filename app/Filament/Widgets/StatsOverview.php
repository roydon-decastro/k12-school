<?php

namespace App\Filament\Widgets;

use Illuminate\Support\Facades\DB;
use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $total_students = DB::table('students')->count();
        $total_sections = DB::table('sections')->count();
        return [
            Card::make('Total Students', $total_students),
            Card::make('Sections', $total_sections),
            Card::make('Average time on page', '3:12'),
        ];
    }
}
