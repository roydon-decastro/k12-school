<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Room;
use Filament\Tables;
use App\Models\School;
use App\Models\Section;
use App\Models\Building;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\SectionResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SectionResource\RelationManagers;
use App\Models\Level;

class SectionResource extends Resource
{
    protected static ?string $model = Section::class;

    protected static ?string $navigationIcon = 'heroicon-o-beaker';

    protected static ?string $navigationGroup = 'School Admin';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        Select::make('school_id')
                            ->label('School')
                            ->options(School::all()->pluck('name', 'id')->toArray())
                            ->required()
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('building_id', null)),
                        Select::make('building_id')
                            ->label('Building')
                            ->required()
                            ->options(function (callable $get) {
                                $school = School::find($get('school_id'));
                                if (!$school) {
                                    return Building::all()->pluck('name', 'id');
                                }
                                return $school->buildings->pluck('name', 'id');
                            })
                            ->reactive()
                            ->afterStateUpdated(fn (callable $set) => $set('room_id', null)),
                        Select::make('room_id')
                            ->label('Room')
                            ->required()
                            ->options(function (callable $get) {
                                $building = Building::find($get('building_id'));
                                if (!$building) {
                                    return Room::all()->pluck('name', 'id');
                                }
                                return $building->rooms->pluck('name', 'id');
                            })
                            ->reactive(),
                        Select::make('level_id')
                            ->label('Grade Level')
                            ->options(Level::all()->pluck('name', 'id')->toArray())
                            ->required(),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Select::make('shift')
                            ->options([
                                'morning' => 'Morning',
                                'afternoon' => 'Afternoon',
                                'evening' => 'Evening',
                            ])
                            ->default('morning')
                            ->required(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('school.name')->searchable(),
                TextColumn::make('building.name'),
                TextColumn::make('room.name'),
                TextColumn::make('level.name')->sortable(),
                TextColumn::make('name')->searchable(),
                TextColumn::make('shift')->enum([
                    'morning' => 'Morning',
                    'afternoon' => 'Afternoon',
                    'evening' => 'Evening',
                ])->sortable(),
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
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }
}
