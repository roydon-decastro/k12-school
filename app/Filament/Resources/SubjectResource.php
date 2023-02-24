<?php

namespace App\Filament\Resources;

use Closure;
use Filament\Forms;
use Filament\Tables;
use App\Models\Level;
use App\Models\Section;
use App\Models\Subject;
use App\Models\SchoolYear;
use Filament\Resources\Form;
use Filament\Resources\Table;
use App\Models\SectionSubject;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Filament\Resources\SubjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SubjectResource\RelationManagers;

class SubjectResource extends Resource
{
    protected static ?string $model = Subject::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    protected static ?string $navigationGroup = 'School Admin';



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('short_name')
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_standard')
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('short_name'),
                Tables\Columns\IconColumn::make('is_standard')
                    ->boolean()
                    ->label('Standard Subject'),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                BulkAction::make('Assign Subjects To a Section')
                    ->action(function (Collection $records, array $data): void {
                        // dd($records);
                        dd($data);
                        foreach ($records as $record) {
                            // dd($record);
                            // $record->assigned = 1;
                            // $record->save();
                            $section_subject = new SectionSubject;
                            $section_subject->school_id = 2; // getback
                            $section_subject->schoolyear_id = $data['schoolyear_id'];
                            $section_subject->level_id = $data['level_id'];
                            $section_subject->section_id = $data['section_id'];
                            $section_subject->student_id = $record->id;
                            $section_subject->save();
                        }
                    })
                    ->requiresConfirmation()
                    ->form([
                        Forms\Components\TextInput::make('schoolyear_name')
                            ->label('Academic Year')
                            ->required()
                            ->disabled()
                            ->default(function (callable $get) {
                                $schoolyear = Schoolyear::latest()->first();
                                return $schoolyear->name;
                            }),
                        Forms\Components\Hidden::make('schoolyear_id')->default(Schoolyear::latest()->first()->id),
                        Forms\Components\Select::make('level_id')
                            ->label('Grade Level')
                            ->options(Level::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('section_id', null)),
                        Forms\Components\Select::make('section_id')
                            ->label('Section')
                            ->required()
                            ->options(function (callable $get) {
                                $level = Level::find($get('level_id'));
                                if (!$level) {
                                    return Section::all()->pluck('name', 'id');
                                }
                                return $level->sections->pluck('name', 'id');
                            })
                            ->reactive(),
                        Forms\Components\CheckboxList::make('technologies')
                            // ->options([
                            //     'tailwind' => 'Tailwind CSS',
                            //     'alpine' => 'Alpine.js',
                            //     'laravel' => 'Laravel',
                            //     'livewire' => 'Laravel Livewire',
                            // ])
                            ->options(function (callable $get) {
                                $level = Level::find($get('level_id'));
                                if (!$level) {
                                    return Section::all()->pluck('name', 'id');
                                }
                                return $level->sections->pluck('name', 'id');
                            })
                    ])
                    ->deselectRecordsAfterCompletion()
                    ->color('success')
                    ->icon('heroicon-o-book-open')
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
            'index' => Pages\ListSubjects::route('/'),
            'create' => Pages\CreateSubject::route('/create'),
            'edit' => Pages\EditSubject::route('/{record}/edit'),
        ];
    }
}
