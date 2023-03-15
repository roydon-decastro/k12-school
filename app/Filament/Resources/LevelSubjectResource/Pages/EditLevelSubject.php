<?php

namespace App\Filament\Resources\LevelSubjectResource\Pages;

use App\Filament\Resources\LevelSubjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLevelSubject extends EditRecord
{
    protected static string $resource = LevelSubjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
