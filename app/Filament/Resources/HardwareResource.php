<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HardwareResource\Pages;
use App\Filament\Resources\HardwareResource\RelationManagers;
use App\Filament\Resources\HardwareResource\Widgets\HardwareExporter;
use App\Models\Hardware;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\Alignment;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class HardwareResource extends Resource
{
    protected static ?string $model = Hardware::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?int $navigationSort = -2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('owner')->options([
                    'CCG' => 'CCG',
                    'IPG' => 'IPG',
                ]),
                Forms\Components\TextInput::make('brand')
                    ->maxLength(255),
                Forms\Components\TextInput::make('model')
                    ->maxLength(255),
                Forms\Components\TextInput::make('serial_number')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('purpose')
                    ->maxLength(255),
                Forms\Components\DatePicker::make('oem_support_end_date'),
                Forms\Components\DatePicker::make('eol_date'),
                Forms\Components\TextInput::make('oem_renewal')
                    ->maxLength(255),
                Forms\Components\TextInput::make('support_level'),
                Forms\Components\TextInput::make('estimated_renewal_cost')
                    ->numeric(),
                Forms\Components\TextInput::make('status')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('owner')->placeholder('N/A'),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('model')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('serial_number')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('description')
                    ->searchable()->placeholder('N/A'),

                Tables\Columns\TextColumn::make('purpose')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('oem_support_end_date')
                    ->date()
                    ->sortable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('eol_date')
                    ->date()
                    ->sortable()->label('Vendor Hardware Support')->placeholder('N/A'),
                Tables\Columns\TextColumn::make('oem_renewal')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('support_level')
                    ->searchable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('estimated_renewal_cost')
                    ->money('USD')
                    ->alignment(Alignment::End)
                    ->sortable()->placeholder('N/A'),
                Tables\Columns\TextColumn::make('status')
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
                Filter::make('expired')
                    ->query(fn(Builder $query): Builder => $query->where('eol_date', '<', now())),
                Filter::make('expire_in_30')
                    ->query(fn(Builder $query): Builder => $query->where('eol_date', '>', now())->where('eol_date', '<', now()->addDays(30))),
                Filter::make('expire_in_60')
                    ->query(fn(Builder $query): Builder => $query->where('eol_date', '>', now())->where('eol_date', '<', now()->addDays(60))),
                SelectFilter::make('owner')
                    ->options([
                        'CCG' => 'CCG',
                        'IPG' => 'IPG',
                    ])

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
