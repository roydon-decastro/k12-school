<?php

namespace App\Filament\Resources;

use Closure;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Tables;
use App\Models\School;
use App\Models\SchoolYear;
use Illuminate\Support\Str;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SchoolYearResource\Pages;
use App\Filament\Resources\SchoolYearResource\RelationManagers;

class SchoolYearResource extends Resource
{
    protected static ?string $model = SchoolYear::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar';

    protected static ?string $navigationGroup = 'School Admin';

    protected static ?string $navigationLabel = 'Academic Years';

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
                            ->reactive(),
                        // Forms\Components\TextInput::make('school_id')
                        //     ->required(),
                        Forms\Components\TextInput::make('name')
                            ->disabled(),
                        Forms\Components\DatePicker::make('start_date')
                            ->reactive()
                            ->afterStateUpdated(function (Closure $set, $get, $state) {
                                $set('end_date', null);
                            })->required(),

                        Forms\Components\DatePicker::make('end_date')
                            ->reactive()
                            ->afterStateUpdated(function (Closure $set, $get, $state) {
                                $startDate = Carbon::parse($get('start_date'));
                                $endDate = Carbon::parse($state);
                                $yearStart = $startDate->year;
                                $yearEnd = $endDate->year;
                                $name = $yearStart . ' - ' . $yearEnd;
                                $set('name', $name);
                            })->required(),


                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('school.name'),
                Tables\Columns\TextColumn::make('name')->label('Academic Year'),
                Tables\Columns\TextColumn::make('start_date')
                    ->date(),
                Tables\Columns\TextColumn::make('end_date')
                    ->date(),
                Tables\Columns\TextColumn::make('status'),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
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
            'index' => Pages\ListSchoolYears::route('/'),
            'create' => Pages\CreateSchoolYear::route('/create'),
            'edit' => Pages\EditSchoolYear::route('/{record}/edit'),
        ];
    }
}
