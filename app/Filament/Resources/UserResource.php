<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\UserResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\UserResource\RelationManagers;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([

                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        // Forms\Components\DateTimePicker::make('email_verified_at'),
                        // Forms\Components\TextInput::make('password')
                        //     ->password()
                        //     ->required()
                        //     ->maxLength(255),
                        // Forms\Components\Textarea::make('two_factor_secret')
                        //     ->maxLength(65535),
                        // Forms\Components\Textarea::make('two_factor_recovery_codes')
                        //     ->maxLength(65535),
                        // Forms\Components\DateTimePicker::make('two_factor_confirmed_at'),
                    ])->columns(3),

                    Card::make()
                    ->schema([
                        Forms\Components\TextInput::make('profile_photo_path')
                            ->maxLength(2048),
                        Forms\Components\TextInput::make('usertype')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mobile')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('gender')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('image')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('religion')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('id_no')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('dob'),
                        Forms\Components\TextInput::make('role')
                            ->maxLength(255),
                        Forms\Components\DatePicker::make('join_date'),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->getStateUsing(function (User $record): string {
                        return ucwords($record->name);
                    })
                    ->searchable(),
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('email'),
                // Tables\Columns\TextColumn::make('email_verified_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('two_factor_secret'),
                // Tables\Columns\TextColumn::make('two_factor_recovery_codes'),
                // Tables\Columns\TextColumn::make('two_factor_confirmed_at')
                //     ->dateTime(),
                // Tables\Columns\TextColumn::make('profile_photo_path'),
                // Tables\Columns\TextColumn::make('usertype'),
                // Tables\Columns\TextColumn::make('mobile'),
                // Tables\Columns\TextColumn::make('address'),
                // Tables\Columns\TextColumn::make('gender'),
                // Tables\Columns\TextColumn::make('image'),
                // Tables\Columns\TextColumn::make('religion'),
                // Tables\Columns\TextColumn::make('id_no'),
                // Tables\Columns\TextColumn::make('dob')
                //     ->date(),
                // Tables\Columns\TextColumn::make('role'),
                // Tables\Columns\TextColumn::make('join_date')
                //     ->date(),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()->hidden()->sortable(),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime(),
            ])->defaultSort('id', 'desc')
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
