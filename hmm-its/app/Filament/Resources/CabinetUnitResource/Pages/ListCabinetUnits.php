<?php

namespace App\Filament\Resources\CabinetUnitResource\Pages;

use App\Filament\Resources\CabinetUnitResource\CabinetUnitResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCabinetUnits extends ListRecords
{
    protected static string $resource = CabinetUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
