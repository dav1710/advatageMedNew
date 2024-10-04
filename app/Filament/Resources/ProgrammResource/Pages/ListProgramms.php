<?php

namespace App\Filament\Resources\ProgrammResource\Pages;

use App\Filament\Resources\ProgrammResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramms extends ListRecords
{
    protected static string $resource = ProgrammResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
