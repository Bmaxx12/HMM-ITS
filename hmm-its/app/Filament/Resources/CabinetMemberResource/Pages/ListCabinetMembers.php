<?php

namespace App\Filament\Resources\CabinetMemberResource\Pages;

use App\Filament\Resources\CabinetMemberResource\CabinetMemberResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListCabinetMembers extends ListRecords
{
    protected static string $resource = CabinetMemberResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
