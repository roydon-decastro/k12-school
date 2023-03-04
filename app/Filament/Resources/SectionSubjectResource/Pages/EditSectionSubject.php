<?php

namespace App\Filament\Resources\SectionSubjectResource\Pages;

use App\Filament\Resources\SectionSubjectResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectionSubject extends EditRecord
{
    protected static string $resource = SectionSubjectResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
