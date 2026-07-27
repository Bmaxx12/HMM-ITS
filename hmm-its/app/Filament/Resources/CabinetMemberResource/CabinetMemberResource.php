<?php

namespace App\Filament\Resources\CabinetMemberResource;

use App\Filament\Resources\CabinetMemberResource\Pages;
use App\Models\CabinetMember;
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

class CabinetMemberResource extends Resource
{
    protected static ?string $model = CabinetMember::class;
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationLabel = 'Anggota Kabinet';
    protected static string|UnitEnum|null $navigationGroup = 'Kabinet';
    protected static ?int $navigationSort = 2;

    public static function form(Schema $schema): Schema
    {
        return $schema->components([
            \Filament\Schemas\Components\Section::make('Informasi Anggota')
                ->schema([
                    Forms\Components\Select::make('cabinet_unit_id')
                        ->label('Unit / Divisi')
                        ->relationship('unit', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

                    Forms\Components\TextInput::make('name')
                        ->label('Nama Lengkap')
                        ->required()
                        ->maxLength(150),

                    Forms\Components\TextInput::make('position')
                        ->label('Jabatan')
                        ->required()
                        ->maxLength(150)
                        ->helperText('Contoh: Ketua Umum, Kepala Bureau, Staff Desain, dll.'),

                    Forms\Components\TextInput::make('group_name')
                        ->label('Kelompok Foto / Sub-Kelompok')
                        ->placeholder('Contoh: Sub 1, Sub 2, atau Kelompok A')
                        ->maxLength(100)
                        ->helperText('Isi dengan nama kelompok yang sama (misal: "Sub 1") untuk menyatukan orang-orang ke dalam 1 foto kelompok yang sama!'),

                    Forms\Components\FileUpload::make('photo')
                        ->label('Foto Anggota / Foto Kelompok')
                        ->image()
                        ->disk('public')
                        ->directory('cabinet/members')
                        ->imageEditor()
                        ->maxSize(2048)
                        ->nullable()
                        ->helperText('Foto yang diupload pada salah satu anggota di kelompok ini akan otomatis dipakai untuk seluruh anggota kelompok.'),

                    Forms\Components\TextInput::make('order_number')
                        ->label('Urutan Tampil dalam Foto')
                        ->numeric()
                        ->default(0)
                        ->helperText('Menentukan urutan nama orang saat foto kelompok diklik (misal: 1 = paling kiri).'),
                ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
                    ->label('Foto')
                    ->getStateUsing(function (CabinetMember $record) {
                        if (!$record->photo) return null;
                        if (str_starts_with($record->photo, 'images/')) {
                            return asset($record->photo);
                        }
                        return asset('storage/' . $record->photo);
                    })
                    ->circular()
                    ->defaultImageUrl(asset('images/logo_hmm.png')),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->searchable()
                    ->description(fn (CabinetMember $record) => $record->position),

                Tables\Columns\TextColumn::make('unit.name')
                    ->label('Unit')
                    ->searchable()
                    ->badge()
                    ->color('gray'),

                Tables\Columns\TextColumn::make('unit.tier')
                    ->label('Tier')
                    ->formatStateUsing(fn ($state) => match($state) {
                        'leadership_core' => 'Leadership Core',
                        'directing'       => 'Directing',
                        'executing'       => 'Executing',
                        'advisory'        => 'Advisory',
                        default           => $state,
                    })
                    ->badge()
                    ->color(fn ($state) => match($state) {
                        'leadership_core' => 'danger',
                        'directing'       => 'warning',
                        'executing'       => 'success',
                        default           => 'gray',
                    }),

                Tables\Columns\TextColumn::make('order_number')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->defaultSort('order_number')
            ->reorderable('order_number')
            ->defaultGroup('unit.name')
            ->groups([
                Tables\Grouping\Group::make('unit.name')
                    ->label('Unit / Divisi'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('cabinet_unit_id')
                    ->label('Filter Unit')
                    ->relationship('unit', 'name'),
            ])
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
            'index'  => Pages\ListCabinetMembers::route('/'),
            'create' => Pages\CreateCabinetMember::route('/create'),
            'edit'   => Pages\EditCabinetMember::route('/{record}/edit'),
        ];
    }
}