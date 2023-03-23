<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Room;
use Filament\Tables;
use App\Models\School;
use App\Models\Building;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RoomResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RoomResource\RelationManagers;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-library';

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
                            ->reactive(),
                        TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Select::make('use')
                            ->options([
                                'classroom' => 'Classroom',
                                'faculty' => 'Faculty',
                                'storage' => 'Storage',
                                'clinic' => 'Clinic',
                                'stage' => 'Stage',
                                'barracks' => 'Barracks',
                                'utility' => 'Utility',
                            ])
                            ->default('classroom')
                            ->required(),
                        TextInput::make('capacity')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(9999)
                            ->required()
                    ])->columns(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('school.name')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('school.id')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('building.name')->sortable()->searchable(),
                // Tables\Columns\TextColumn::make('building.id')->searchable(),
                Tables\Columns\TextColumn::make('name')->sortable(),
                // Tables\Columns\TextColumn::make('id'),
                Tables\Columns\TextColumn::make('capacity'),
                // Tables\Columns\TextColumn::make('use')->enum([
                //     'classroom' => 'Classroom',
                //     'faculty' => 'Faculty',
                //     'storage' => 'Storage',
                //     'clinic' => 'Clinic',
                //     'stage' => 'Stage',
                //     'barracks' => 'Barracks',
                //     'utility' => 'Utility',
                // ])->sortable(),

            ])->defaultSort('school.name')
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

    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }
}
