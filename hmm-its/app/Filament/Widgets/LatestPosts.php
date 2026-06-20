<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\PostResource\PostResource;
use App\Models\Post;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestPosts extends BaseWidget
{
    protected static ?int $sort = 2;
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                PostResource::getEloquentQuery()
                    ->latest()
                    ->limit(5)
            )
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul'),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'warning',
                        'published' => 'success',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Dibuat Pada')
                    ->dateTime('d M Y H:i'),
            ])
            ->actions([
                \Filament\Actions\Action::make('edit')
                    ->label('Edit')
                    ->icon('heroicon-m-pencil-square')
                    ->url(fn (Post $record): string => PostResource::getUrl('edit', ['record' => $record])),
            ]);
    }
}
