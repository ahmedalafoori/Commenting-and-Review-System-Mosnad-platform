<?php

namespace App\Filament\Resources\CommentReviewResource\Pages;

use App\Filament\Resources\CommentReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListCommentReviews extends ListRecords
{
    protected static string $resource = CommentReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
