<?php

namespace App\Filament\Resources\ProductTagsResource\Pages;

use App\Filament\Resources\ProductTagsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProductTags extends EditRecord
{
    protected static string $resource = ProductTagsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
