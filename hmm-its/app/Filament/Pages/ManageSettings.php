<?php

namespace App\Filament\Pages;

use App\Models\SiteSetting;
use BackedEnum;
use Filament\Actions\Action;
use Filament\Forms;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Schemas\Components\Actions;
use Filament\Schemas\Components\EmbeddedSchema;
use Filament\Schemas\Components\Form;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Schema;
use UnitEnum;

class ManageSettings extends Page
{
    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static ?string $navigationLabel = 'Pengaturan Website';
    protected static string|UnitEnum|null $navigationGroup = 'Pengaturan';
    protected static ?int $navigationSort = 1;

    public ?array $data = [];

    public function mount(): void
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $this->form->fill($settings);
    }

    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Settings')
                    ->tabs([

                        Tab::make('Home')
                            ->schema([
                                Forms\Components\TextInput::make('hero_tagline')
                                    ->label('Tagline Hero')
                                    ->helperText('Contoh: Presisi. Karya. Dampak.')
                                    ->required(),

                                Forms\Components\Textarea::make('hero_subtext')
                                    ->label('Sub-tagline Hero')
                                    ->rows(2),

                                Forms\Components\TextInput::make('founding_year')
                                    ->label('Tahun Berdiri')
                                    ->default('1947'),

                                Forms\Components\TextInput::make('member_count')
                                    ->label('Jumlah Anggota')
                                    ->helperText('Contoh: 200+'),

                                Forms\Components\Textarea::make('heritage_desc')
                                    ->label('Deskripsi Heritage / Sejarah')
                                    ->rows(3),

                                Forms\Components\TextInput::make('solidarity_quote')
                                    ->label('Quote Solidarity Forever'),
                            ])->columns(2),

                        Tab::make('Tiga Pilar')
                            ->schema([
                                Forms\Components\TextInput::make('pillar_1_title')->label('Pilar 1 - Judul'),
                                Forms\Components\Textarea::make('pillar_1_desc')->label('Pilar 1 - Deskripsi')->rows(2),
                                Forms\Components\TextInput::make('pillar_2_title')->label('Pilar 2 - Judul'),
                                Forms\Components\Textarea::make('pillar_2_desc')->label('Pilar 2 - Deskripsi')->rows(2),
                                Forms\Components\TextInput::make('pillar_3_title')->label('Pilar 3 - Judul'),
                                Forms\Components\Textarea::make('pillar_3_desc')->label('Pilar 3 - Deskripsi')->rows(2),
                            ])->columns(2),

                        Tab::make('Kabinet')
                            ->schema([
                                Forms\Components\TextInput::make('cabinet_name')
                                    ->label('Nama Kabinet Aktif'),

                                Forms\Components\TextInput::make('cabinet_tagline')
                                    ->label('Tagline Kabinet'),

                                Forms\Components\Textarea::make('cabinet_description')
                                    ->label('Deskripsi Kabinet')
                                    ->rows(3),

                                Forms\Components\Textarea::make('vision')
                                    ->label('Visi Kabinet')
                                    ->rows(3),

                                Forms\Components\Textarea::make('movement_direction')
                                    ->label('Arah Gerak Kabinet')
                                    ->rows(3),
                            ])->columns(2),

                        Tab::make('Kontak')
                            ->schema([
                                Forms\Components\TextInput::make('contact_email')
                                    ->label('Email Kontak')
                                    ->email(),

                                Forms\Components\TextInput::make('instagram_url')
                                    ->label('URL Instagram')
                                    ->url(),

                                Forms\Components\TextInput::make('youtube_url')
                                    ->label('URL YouTube')
                                    ->url(),
                            ])->columns(2),

                    ])->columnSpanFull(),
            ])
            ->statePath('data');
    }

    public function content(Schema $schema): Schema
    {
        return $schema->components([
            Form::make([EmbeddedSchema::make('form')])
                ->id('form')
                ->livewireSubmitHandler('save')
                ->footer([
                    Actions::make($this->getFormActions())
                        ->key('form-actions'),
                ]),
        ]);
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('save')
                ->label('Simpan Pengaturan')
                ->submit('save'),
        ];
    }

    public function save(): void
    {
        $data = $this->form->getState();

        foreach ($data as $key => $value) {
            SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        Notification::make()
            ->title('Pengaturan berhasil disimpan!')
            ->success()
            ->send();
    }
}