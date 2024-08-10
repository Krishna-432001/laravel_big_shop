<?php

namespace App\Filament\Resources\ProductTagsResource\Pages;

use App\Filament\Resources\ProductTagsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Tag;

use App\Enums\TagStatus;

class ListProductTags extends ListRecords
{
    protected static string $resource = ProductTagsResource::class;

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
                ->badge(Tag::all()->count()),
            'PUBLISH' => Tab::make()
                ->badge(Tag::query()->where('status', TagStatus::PUBLISH->value)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', TagStatus::PUBLISH->value)),
            'DRAFT' => Tab::make()
                ->badge(Tag::query()->where('status', TagStatus::DRAFT->value)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', TagStatus::DRAFT->value)),
            'PENDING' => Tab::make()
                ->badge(Tag::query()->where('status', TagStatus::PENDING->value)->count())
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', TagStatus::PENDING->value)),
        ];
    }
}
