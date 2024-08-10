<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductLabelsResource\Pages;
use App\Filament\Resources\ProductLabelsResource\RelationManagers;
use App\Models\Label;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Enums\LabelStatus;

class ProductLabelsResource extends Resource
{
    protected static ?string $model = Label::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\select::make('status')
                ->options(LabelStatus::class)
                    
                ->default(LabelStatus::PUBLISH),
                Forms\Components\ColorPicker::make('color')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                    Tables\Columns\TextColumn::make('status')
                    ->searchable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        LabelStatus::PUBLISH->value => 'success',
                        LabelStatus::DRAFT->value => 'warning',                        
                        LabelStatus::PENDING->value => 'danger',
                    }),
                Tables\Columns\ColorColumn::make('color')
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
            'index' => Pages\ListProductLabels::route('/'),
            'create' => Pages\CreateProductLabels::route('/create'),
            'edit' => Pages\EditProductLabels::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
