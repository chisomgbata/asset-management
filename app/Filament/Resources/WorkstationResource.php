<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkstationResource\Pages;
use App\Filament\Resources\WorkstationResource\RelationManagers;
use App\Filament\Resources\WorkstationResource\Widgets\WorkstationExporter;
use App\Models\Workstation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class WorkstationResource extends Resource
{
    protected static ?string $model = Workstation::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('location')
                    ->maxLength(255),
                Forms\Components\TextInput::make('network_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('proponent')
                    ->maxLength(255),
                Forms\Components\TextInput::make('division')
                    ->maxLength(255),
                Forms\Components\TextInput::make('used_by')
                    ->maxLength(255),
                Forms\Components\TextInput::make('status')
                    ->maxLength(255),
                Forms\Components\TextInput::make('sa_physical_id')
                    ->maxLength(255),
                Forms\Components\TextInput::make('serial_no')
                    ->maxLength(255),

                Forms\Components\TextInput::make('model')
                    ->maxLength(255),
                Forms\Components\TextInput::make('ip_address')
                    ->maxLength(255),
                Forms\Components\TextInput::make('mac_address')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('location')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('network_id')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('proponent')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('division')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('used_by')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('sa_physical_id')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('serial_no')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('model')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('ip_address')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('mac_address')
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
            'index' => Pages\ListWorkstations::route('/'),
            'create' => Pages\CreateWorkstation::route('/create'),
            'edit' => Pages\EditWorkstation::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            WorkstationExporter::class
        ];
    }
}
