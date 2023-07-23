<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LevelFeeResource\Pages;
use App\Filament\Resources\LevelFeeResource\RelationManagers;
use App\Models\LevelFee;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LevelFeeResource extends Resource
{
    protected static ?string $model = LevelFee::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'School Fees';
    protected static ?string $navigationLabel = 'View School Fees';

    protected ?string $maxContentWidth = 'full';

    protected static ?int $navigationSort = 1;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('school.name'),
                Tables\Columns\TextColumn::make('school_year.name'),
                Tables\Columns\TextColumn::make('fee.name'),
                Tables\Columns\TextColumn::make('level.name'),
                Tables\Columns\TextColumn::make('fee_amount'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLevelFees::route('/'),
            'create' => Pages\CreateLevelFee::route('/create'),
            'edit' => Pages\EditLevelFee::route('/{record}/edit'),
        ];
    }

}
