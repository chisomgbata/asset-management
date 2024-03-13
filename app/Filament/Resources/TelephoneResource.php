<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TelephoneResource\Pages;
use App\Filament\Resources\TelephoneResource\RelationManagers;
use App\Filament\Resources\TelephoneResource\Widgets\TelephoneExporter;
use App\Models\Telephone;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TelephoneResource extends Resource
{
    protected static ?string $model = Telephone::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('model')
                    ->maxLength(255),
                Forms\Components\TextInput::make('serial_number')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ext')
                    ->maxLength(255),
                Forms\Components\TextInput::make('user')
                    ->maxLength(255),
                Forms\Components\TextInput::make('location')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('model')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('ext')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('user')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListTelephones::route('/'),
            'create' => Pages\CreateTelephone::route('/create'),
            'edit' => Pages\EditTelephone::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            TelephoneExporter::class
        ];
    }
}
