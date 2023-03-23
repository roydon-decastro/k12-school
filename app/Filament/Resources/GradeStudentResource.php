<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GradeStudentResource\Pages;
use App\Filament\Resources\GradeStudentResource\RelationManagers;
use App\Models\GradeStudent;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GradeStudentResource extends Resource
{
    protected static ?string $model = GradeStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('section_student_id')
                    ->required(),
                Forms\Components\TextInput::make('q1'),
                // Forms\Components\TextInput::make('q2'),
                // Forms\Components\TextInput::make('q3'),
                // Forms\Components\TextInput::make('q4'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('section_student_id'),
                // Tables\Columns\TextColumn::make('q1'),
                // Tables\Columns\TextColumn::make('q2'),
                // Tables\Columns\TextColumn::make('q3'),
                // Tables\Columns\TextColumn::make('q4'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListGradeStudents::route('/'),
            'create' => Pages\CreateGradeStudent::route('/create'),
            'edit' => Pages\EditGradeStudent::route('/{record}/edit'),
        ];
    }
}
