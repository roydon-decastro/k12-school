<?php

namespace App\Filament\Resources\SectionStudentResource\Pages;

use App\Filament\Resources\SectionStudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectionStudents extends ListRecords
{
    protected static string $resource = SectionStudentResource::class;

    protected function getTableRecordsPerPageSelectOptions(): array
    {
        return [25, 50, 100];
    }

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
