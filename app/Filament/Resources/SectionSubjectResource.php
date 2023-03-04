<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SectionSubjectResource\Pages;
use App\Filament\Resources\SectionSubjectResource\RelationManagers;
use App\Models\SectionSubject;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SectionSubjectResource extends Resource
{
    protected static ?string $model = SectionSubject::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'Student Admin';

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
                //
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
            'index' => Pages\ListSectionSubjects::route('/'),
            'create' => Pages\CreateSectionSubject::route('/create'),
            'edit' => Pages\EditSectionSubject::route('/{record}/edit'),
        ];
    }
}
