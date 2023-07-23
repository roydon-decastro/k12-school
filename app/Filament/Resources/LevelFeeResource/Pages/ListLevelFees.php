<?php

namespace App\Filament\Resources\LevelFeeResource\Pages;

use App\Filament\Resources\LevelFeeResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLevelFees extends ListRecords
{
    protected static string $resource = LevelFeeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
