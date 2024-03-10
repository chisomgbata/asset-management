<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HardwareResource\Pages;
use App\Filament\Resources\HardwareResource\RelationManagers;
use App\Filament\Resources\HardwareResource\Widgets\HardwareExporter;
use App\Models\Hardware;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class HardwareResource extends Resource
{
    protected static ?string $model = Hardware::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('serial_number')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('brand')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('purpose')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('oem_support_end_date')
                    ->required(),
                Forms\Components\TextInput::make('estimated_renewal_cost')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('eol_date')
                    ->required(),
                Forms\Components\TextInput::make('oem_renewal')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('model')
                    ->searchable(),
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('purpose')
                    ->searchable(),
                Tables\Columns\TextColumn::make('oem_support_end_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estimated_renewal_cost')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('eol_date')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('oem_renewal')
                    ->searchable(),
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
            'index' => Pages\ListHardware::route('/'),
            'create' => Pages\CreateHardware::route('/create'),
            'edit' => Pages\EditHardware::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            HardwareExporter::class
        ];
    }


}
