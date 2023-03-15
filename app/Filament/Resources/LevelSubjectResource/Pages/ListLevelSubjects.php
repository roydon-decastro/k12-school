<?php

namespace App\Filament\Resources\LevelSubjectResource\Pages;

use App\Filament\Resources\LevelSubjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLevelSubjects extends ListRecords
{
    protected static string $resource = LevelSubjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
