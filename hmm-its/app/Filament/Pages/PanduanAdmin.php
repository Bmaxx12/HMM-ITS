<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use UnitEnum;

class PanduanAdmin extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Panduan Penggunaan';
    protected static ?string $title = 'Panduan Admin';
    protected static ?int $navigationSort = 99;

    protected string $view = 'filament.pages.panduan-admin';

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            View::make('filament.pages.panduan-admin'),
        ]);
    }
}
