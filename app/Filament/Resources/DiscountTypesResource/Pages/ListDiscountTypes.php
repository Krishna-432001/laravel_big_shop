<?php

namespace App\Filament\Resources\DiscountTypesResource\Pages;

use App\Filament\Resources\DiscountTypesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;


use App\Models\DiscountTypes;
use App\Enums\DiscountType;

class ListDiscountTypes extends ListRecords
{
    protected static string $resource = DiscountTypesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'all' => Tab::make()
                ->badge(DiscountTypes::all()->count()),
            'COUPON_CODE' => Tab::make()
                ->badge(DiscountTypes::query()->where('status', DiscountType::COUPON_CODE->value)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', DiscountType::COUPON_CODE->value)),
            'PROMOTION' => Tab::make()
                ->badge(DiscountTypes::query()->where('status', DiscountType::PROMOTION->value)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', DiscountType::PROMOTION->value)),
        ];
    }
}
