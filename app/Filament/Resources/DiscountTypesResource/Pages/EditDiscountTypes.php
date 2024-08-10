<?php

namespace App\Filament\Resources\DiscountTypesResource\Pages;

use App\Filament\Resources\DiscountTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditDiscountTypes extends EditRecord
{
    protected static string $resource = DiscountTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
