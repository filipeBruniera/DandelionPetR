<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VaccinationResource\Pages;
use App\Models\Vaccination;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Tables;

class VaccinationResource extends Resource
{
    protected static ?string $model = Vaccination::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\Select::make('pet_id')
                ->label('Pet')
                ->relationship('pet', 'name')
                ->required(),
            Forms\Components\TextInput::make('vaccine_name')
                ->required()
                ->maxLength(255),
            Forms\Components\DatePicker::make('vaccination_date')
                ->required(),
            Forms\Components\TextInput::make('veterinarian')
                ->maxLength(255),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('vaccine_name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('vaccination_date')->date()->sortable(),
                Tables\Columns\TextColumn::make('veterinarian')->sortable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListVaccinations::route('/'),
            'create' => Pages\CreateVaccination::route('/create'),
            'edit' => Pages\EditVaccination::route('/{record}/edit'),
        ];
    }
}
