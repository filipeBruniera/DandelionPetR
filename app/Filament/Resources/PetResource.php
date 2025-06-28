<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PetResource\Pages;
use App\Models\Pet;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;

class PetResource extends Resource
{
    protected static ?string $model = Pet::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('species')->required(),
            Forms\Components\TextInput::make('breed'),
            Forms\Components\DatePicker::make('birth_date')->required(),
            Forms\Components\FileUpload::make('photo')
                ->directory('pets')
                ->image()
                ->imagePreviewHeight('100'),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('species')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('breed')->sortable(),
                Tables\Columns\TextColumn::make('birth_date')->date()->sortable(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),  // << ESTE é o botão de visualizar
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPets::route('/'),
            'create' => Pages\CreatePet::route('/create'),
            'edit' => Pages\EditPet::route('/{record}/edit'),
            'view' => Pages\ViewPet::route('/{record}'),
        ];
    }
}