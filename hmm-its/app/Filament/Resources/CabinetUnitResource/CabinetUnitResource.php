<?php

namespace App\Filament\Resources\CabinetUnitResource;

use App\Filament\Resources\CabinetUnitResource\Pages;
use App\Models\CabinetUnit;
use BackedEnum;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\EditAction;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;

class CabinetUnitResource extends Resource
{
    protected static ?string $model = CabinetUnit::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-building-office';
    protected static ?string $navigationLabel = 'Unit / Divisi';
    protected static string|UnitEnum|null $navigationGroup = 'Kabinet';
    protected static ?int $navigationSort = 1;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            Forms\Components\TextInput::make('name')
                ->label('Nama Unit')
                ->required()
                ->maxLength(150),

            Forms\Components\Select::make('tier')
                ->label('Tier')
                ->options([
                    'leadership_core' => 'Leadership Core (Tier 1)',
                    'directing'       => 'Directing (Tier 2)',
                    'executing'       => 'Executing (Tier 3)',
                    'advisory'        => 'Advisory',
                ])
                ->required(),

            Forms\Components\Select::make('parent_unit_id')
                ->label('Unit Induk')
                ->helperText('Opsional. Isi jika unit ini adalah sub-unit dari unit lain.')
                ->relationship('parent', 'name')
                ->searchable()
                ->preload()
                ->nullable(),

            Forms\Components\TextInput::make('order_number')
                ->label('Urutan Tampil')
                ->numeric()
                ->default(0)
                ->minValue(0),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Unit')
                    ->searchable(),

                Tables\Columns\TextColumn::make('tier')
                    ->label('Tier')
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        'leadership_core' => 'danger',
                        'directing'       => 'warning',
                        'executing'       => 'success',
                        default           => 'gray',
                    })
                    ->formatStateUsing(fn ($state) => match($state) {
                        'leadership_core' => 'Leadership Core',
                        'directing'       => 'Directing',
                        'executing'       => 'Executing',
                        'advisory'        => 'Advisory',
                        default           => $state,
                    }),

                Tables\Columns\TextColumn::make('parent.name')
                    ->label('Unit Induk')
                    ->placeholder('—'),

                Tables\Columns\TextColumn::make('members_count')
                    ->label('Anggota')
                    ->counts('members')
                    ->badge(),

                Tables\Columns\TextColumn::make('order_number')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('order_number')
            ->reorderable('order_number')
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCabinetUnits::route('/'),
            'create' => Pages\CreateCabinetUnit::route('/create'),
            'edit'   => Pages\EditCabinetUnit::route('/{record}/edit'),
        ];
    }
}