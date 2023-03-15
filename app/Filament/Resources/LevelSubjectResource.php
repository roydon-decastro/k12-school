<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\LevelSubject;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LevelSubjectResource\Pages;
use App\Filament\Resources\LevelSubjectResource\RelationManagers;

class LevelSubjectResource extends Resource
{
    protected static ?string $model = LevelSubject::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'School Admin';

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
                TextColumn::make('school.name'),
                TextColumn::make('schoolyear.name')->label('Academic Year'),
                TextColumn::make('level.name')->searchable(),
                TextColumn::make('subject.name')
                    ->getStateUsing(function (LevelSubject $record): string {
                        return ucwords($record->subject->name);
                    })
                    ->label('Subjects')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('school_id')->relationship('school', 'name')->label('School'),
                SelectFilter::make('schoolyear_id')->relationship('schoolyear', 'name')->label('School Year'),
                SelectFilter::make('level_id')->relationship('level', 'name')->label('Level'),
                SelectFilter::make('subject_id')->relationship('subject', 'name')->label('Subject'),
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
            'index' => Pages\ListLevelSubjects::route('/'),
            'create' => Pages\CreateLevelSubject::route('/create'),
            'edit' => Pages\EditLevelSubject::route('/{record}/edit'),
        ];
    }
}
