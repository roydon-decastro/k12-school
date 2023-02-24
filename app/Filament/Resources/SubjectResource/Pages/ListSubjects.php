<?php

namespace App\Filament\Resources\SubjectResource\Pages;

use Closure;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;
use App\Filament\Resources\SubjectResource;

class ListSubjects extends ListRecords
{
    protected static string $resource = SubjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

}
