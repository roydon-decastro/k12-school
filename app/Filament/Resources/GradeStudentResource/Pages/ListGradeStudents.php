<?php

namespace App\Filament\Resources\GradeStudentResource\Pages;

use App\Filament\Resources\GradeStudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGradeStudents extends ListRecords
{
    protected static string $resource = GradeStudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
