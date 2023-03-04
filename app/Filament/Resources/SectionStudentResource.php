<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Student;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\SectionStudent;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SectionStudentResource\Pages;
use App\Filament\Resources\SectionStudentResource\RelationManagers;

class SectionStudentResource extends Resource
{
    protected static ?string $model = SectionStudent::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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
                TextColumn::make('school.name'),
                TextColumn::make('schoolyear.name')->label('Academic Year'),
                TextColumn::make('level.name')->searchable(),
                TextColumn::make('section.name')->sortable()->searchable(),
                TextColumn::make('student.name')
                    ->getStateUsing(function (SectionStudent $record): string {
                        return ucwords($record->student->name);
                    })
                    ->label('Students')
                    ->searchable(),
            ])
            ->filters([
                SelectFilter::make('school_id')->relationship('school', 'name')->label('School'),
                SelectFilter::make('schoolyear_id')->relationship('schoolyear', 'name')->label('School Year'),
                SelectFilter::make('level_id')->relationship('level', 'name')->label('Level'),
                SelectFilter::make('section_id')->relationship('section', 'name')->label('Section'),
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
            'index' => Pages\ListSectionStudents::route('/'),
            'create' => Pages\CreateSectionStudent::route('/create'),
            'edit' => Pages\EditSectionStudent::route('/{record}/edit'),
        ];
    }
}
