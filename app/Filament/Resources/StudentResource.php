<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use App\Models\Student;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Collection;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\StudentResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\StudentResource\RelationManagers;
use App\Models\Level;
use App\Models\SchoolYear;
use App\Models\Section;
use App\Models\SectionStudent;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'Student Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->required(),
                Forms\Components\TextInput::make('level_id')
                    ->required(),
                Forms\Components\DatePicker::make('join_date'),
                Forms\Components\TextInput::make('guardian1')
                    ->maxLength(255),
                Forms\Components\Toggle::make('assigned')
                    ->required(),
                Forms\Components\Toggle::make('active')
                    ->required(),
                Forms\Components\TextInput::make('guardian1_relationship')
                    ->maxLength(255),
                Forms\Components\TextInput::make('guardian2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email1')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact1')
                    ->maxLength(255),
                Forms\Components\TextInput::make('guardian2_relationship')
                    ->maxLength(255),
                Forms\Components\TextInput::make('email2')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact2')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lrn')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->getStateUsing(function (Student $record): string {
                        return ucwords($record->name);
                    })
                    ->label('Student'),
                Tables\Columns\TextColumn::make('level.name'),
                Tables\Columns\IconColumn::make('active')
                    ->boolean(),
                Tables\Columns\IconColumn::make('assigned')
                    ->label('Section Assigned')
                    ->boolean(),
                Tables\Columns\TextColumn::make('lrn')->label('LRN'),

                // Tables\Columns\TextColumn::make('join_date')
                //     ->date(),
                // Tables\Columns\TextColumn::make('guardian1'),
                // Tables\Columns\TextColumn::make('guardian1_relationship'),
                // Tables\Columns\TextColumn::make('guardian2'),
                // Tables\Columns\TextColumn::make('email1'),
                // Tables\Columns\TextColumn::make('contact1'),
                // Tables\Columns\TextColumn::make('guardian2_relationship'),
                // Tables\Columns\TextColumn::make('email2'),
                // Tables\Columns\TextColumn::make('contact2'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
            ])
            ->filters([
                SelectFilter::make('level_id')->relationship('level', 'name')
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                BulkAction::make('Assign To a Section')
                    ->action(function (Collection $records, array $data): void {
                        // dd($data);
                        foreach ($records as $record) {
                            // dd($record);
                            if ($record->assigned != 1) {
                                // dd($incomingLevel);
                                // $record->level_id = $data['level_id'];
                                $section_student = new SectionStudent;
                                $section_student->school_id = 2; // getback
                                $section_student->schoolyear_id = $data['schoolyear_id'];
                                $section_student->level_id = $data['level_id'];
                                $section_student->section_id = $data['section_id'];
                                $section_student->student_id = $record->id;
                                $record->assigned = 1;
                                $record->save();
                                $section_student->save();
                            }
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
                                // dd($schoolyear);
                                // return $schoolyear->pluck('name', 'id');
                                return $schoolyear->name;

                                // if (!$country) {
                                //     return State::all()->pluck('name', 'id');
                                // }
                                // return $country->states->pluck('name', 'id');
                            }),
                        Forms\Components\Hidden::make('schoolyear_id')->default(Schoolyear::latest()->first()->id),
                        // Forms\Components\Select::make('schoolyear_id')
                        // ->relationship('schoolyear', 'name'),

                        // Forms\Components\TextInput::make('schoolyear_id')
                        //     ->required()
                        //     ->default()
                        //     ->disabled(),
                        Forms\Components\Select::make('level_id')
                            ->label('Grade Level')
                            ->options(Level::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('section_id', null)),
                        // Forms\Components\Select::make('section_id')
                        //     ->label('Section')
                        //     ->options(Section::query()->pluck('name', 'id'))
                        //     ->required(),
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
                            ->reactive()
                    ])
                    ->deselectRecordsAfterCompletion()
                    ->color('success')
                    ->icon('heroicon-o-user-group')
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
