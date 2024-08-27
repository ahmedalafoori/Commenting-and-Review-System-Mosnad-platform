<?php

namespace App\Filament\Resources\CommentReviewResource\Pages;

use App\Filament\Resources\CommentReviewResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCommentReview extends EditRecord
{
    protected static string $resource = CommentReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
