<?php

namespace App\Filament\Resources\ProductLabelsResource\Pages;

use App\Filament\Resources\ProductLabelsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Label;
use App\Enums\LabelStatus;
class ListProductLabels extends ListRecords
{
    protected static string $resource = ProductLabelsResource::class;

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
                ->badge(Label::all()->count()),
            'PUBLISH' => Tab::make()
                ->badge(Label::query()->where('status', LabelStatus::PUBLISH->value)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', LabelStatus::PUBLISH->value)),
            'DRAFT' => Tab::make()
                ->badge(Label::query()->where('status', LabelStatus::DRAFT->value)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', LabelStatus::DRAFT->value)),
            'PENDING' => Tab::make()
                ->badge(Label::query()->where('status', LabelStatus::PENDING->value)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', LabelStatus::PENDING->value)),
        ];
    }
}
