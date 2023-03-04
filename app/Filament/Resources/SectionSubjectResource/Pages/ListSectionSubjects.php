<?php

namespace App\Filament\Resources\SectionSubjectResource\Pages;

use App\Filament\Resources\SectionSubjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListSectionSubjects extends ListRecords
{
    protected static string $resource = SectionSubjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
