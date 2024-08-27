<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LikeDislikeResource\Pages;
use App\Filament\Resources\LikeDislikeResource\RelationManagers;
use App\Models\LikeDislike;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LikeDislikeResource extends Resource
{
    protected static ?string $model = LikeDislike::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\Select::make('user_id')
                ->label('User')
                ->relationship('user', 'name') // Assuming 'name' is a column in the User model
                ->required(),

            Forms\Components\Select::make('comment_review_id')
                ->label('Comment Review')
                ->relationship('commentReview', 'comment_text') // Assuming 'comment_text' is a column in the CommentReview model
                ->required(),

            Forms\Components\Toggle::make('is_like')
                ->label('Like')
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('user.name')
                ->label('User'),

            Tables\Columns\TextColumn::make('commentReview.comment_text')
                ->label('Comment Review'),

            Tables\Columns\BooleanColumn::make('is_like')
                ->label('Like'),
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
            'index' => Pages\ListLikeDislikes::route('/'),
            'create' => Pages\CreateLikeDislike::route('/create'),
            'edit' => Pages\EditLikeDislike::route('/{record}/edit'),
        ];
    }
}
