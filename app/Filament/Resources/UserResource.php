<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required(),

            Forms\Components\TextInput::make('email')
                ->label('Email')
                ->email()
                ->required(),

            Forms\Components\TextInput::make('password')
                ->label('Password')
                ->password()
                ->required()
                ->minLength(8), // Adjust the minimum length as needed

            Forms\Components\TextInput::make('address')
                ->label('Address'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('name')
                ->label('Name'),

            Tables\Columns\TextColumn::make('email')
                ->label('Email'),

            Tables\Columns\TextColumn::make('address')
                ->label('Address'),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Created At')
                ->dateTime(),

            Tables\Columns\TextColumn::make('updated_at')
                ->label('Updated At')
                ->dateTime(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
