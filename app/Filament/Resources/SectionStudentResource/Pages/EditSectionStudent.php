<?php

namespace App\Filament\Resources\SectionStudentResource\Pages;

use App\Filament\Resources\SectionStudentResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSectionStudent extends EditRecord
{
    protected static string $resource = SectionStudentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
