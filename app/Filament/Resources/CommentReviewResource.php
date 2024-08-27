<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CommentReviewResource\Pages;
use App\Filament\Resources\CommentReviewResource\RelationManagers;
use App\Models\CommentReview;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CommentReviewResource extends Resource
{
    protected static ?string $model = CommentReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->label('User')
                ->relationship('user', 'name')
                ->required(),

            Forms\Components\Select::make('content_id')
                ->label('Content')
                ->relationship('content', 'title')
                ->required(),

            Forms\Components\Textarea::make('comment_text')
                ->label('Comment')
                ->required(),

            Forms\Components\Select::make('rating')
                ->label('Rating')
                ->options([
                    1 => '1 Star',
                    2 => '2 Stars',
                    3 => '3 Stars',
                    4 => '4 Stars',
                    5 => '5 Stars',
                ])
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.name')
                ->label('User'),

            Tables\Columns\TextColumn::make('content.title')
                ->label('Content'),

            Tables\Columns\TextColumn::make('comment_text')
                ->limit(50)
                ->label('Comment'),

            Tables\Columns\TextColumn::make('rating')
                ->label('Rating'),
        ])
        ->filters([
            // Add filters here if needed
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
            'index' => Pages\ListCommentReviews::route('/'),
            'create' => Pages\CreateCommentReview::route('/create'),
            'edit' => Pages\EditCommentReview::route('/{record}/edit'),
        ];
    }
}
