<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use App\Enums\StockStatus;
use App\Enums\Status;
use App\Enums\TaxeStatus;
// use App\Enums\AttributeStatus;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->default(null)
                    ->prefix('$'),
                Forms\Components\CheckboxList::make('category_id')
                    // ->multiple()
                    // ->preload()
                    ->relationship('category', 'name')
                    ->required(),
                Forms\Components\Select::make('product_companies_id')
                    ->relationship('productCompany', 'name')
                    ->required(),
                Forms\Components\Select::make('brand_id')
                    ->relationship('brand', 'name')
                    ->required(),
                Forms\Components\CheckboxList::make('product_label_id')
                    // ->multiple()
                    // ->preload()
                    ->relationship('productLabel', 'name')
                    ->required(),
                Forms\Components\Select::make('product_tag_id')
                    ->multiple()
                    ->preload()                
                    ->relationship('productTag', 'name')
                    ->required(),
                Forms\Components\CheckboxList::make('product_collection_id')
                    // ->multiple()
                    // ->preload()                
                    ->relationship('productCollection', 'name')
                    ->required(),                
                Forms\Components\RichEditor::make('description')
                    ->default(null),
                Forms\Components\TextInput::make('qty')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('alert_stock')
                    ->required()
                    ->numeric()
                    ->default(0),

                Forms\Components\TextInput::make('min_order_qty')
                    ->numeric()
                    ->default(null),
                Forms\Components\TextInput::make('max_order_qty')
                    ->numeric()
                    ->default(null),

                Forms\Components\Toggle::make('is_featured')
                    ->label('is featured?')
                    ->default(false),

                Forms\Components\Radio::make('stock_status')
                    ->options(StockStatus::class)
                    ->default(StockStatus::InStock),

                Forms\Components\Select::make('status')
                    ->options(Status::class)
                    ->default(Status::PUBLISH),
                    // Forms\Components\Select::make('attribute_status')
                    // ->options(AttributeStatus::class)
                    // ->default(AttributeStatus::PUBLISH),
                Forms\Components\Select::make('Taxes')
                    ->options(TaxeStatus::class)
                    ->default(TaxeStatus::NONE_ZERO_PERCENT),

                Forms\Components\FileUpload::make('image_path')
                    ->multiple()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextInputColumn::make('price')
                    // ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\ImageColumn::make('image_path'),
                Tables\Columns\TextColumn::make('qty')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('alert_stock')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
