<?php

namespace App\Filament\Resources\CabinetMemberResource\Pages;

use App\Filament\Resources\CabinetMemberResource\CabinetMemberResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditCabinetMember extends EditRecord
{
    protected static string $resource = CabinetMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
