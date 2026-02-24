<?php

namespace App\Filament\Resources\Books\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class BookForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Toggle::make('active')
                    ->required(),
                TextInput::make('title')
                    ->required(),
                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->required(),
                TextInput::make('year')
                    ->numeric(),
                Select::make('genre_id')
                    ->relationship('genre', 'name')
                    ->required(),
                Select::make('language_id')
                    ->relationship('language', 'name')
                    ->required(),
            ]);
    }
}
