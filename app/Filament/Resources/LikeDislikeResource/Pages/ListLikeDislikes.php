<?php

namespace App\Filament\Resources\LikeDislikeResource\Pages;

use App\Filament\Resources\LikeDislikeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLikeDislikes extends ListRecords
{
    protected static string $resource = LikeDislikeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
