<?php

namespace App\Filament\Resources\CabinetUnitResource\Pages;

use App\Filament\Resources\CabinetUnitResource\CabinetUnitResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCabinetUnit extends EditRecord
{
    protected static string $resource = CabinetUnitResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
