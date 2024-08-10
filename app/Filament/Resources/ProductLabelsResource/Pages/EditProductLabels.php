<?php

namespace App\Filament\Resources\ProductLabelsResource\Pages;

use App\Filament\Resources\ProductLabelsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductLabels extends EditRecord
{
    protected static string $resource = ProductLabelsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
