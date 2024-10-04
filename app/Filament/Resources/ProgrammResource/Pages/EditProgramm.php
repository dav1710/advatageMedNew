<?php

namespace App\Filament\Resources\ProgrammResource\Pages;

use App\Filament\Resources\ProgrammResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramm extends EditRecord
{
    protected static string $resource = ProgrammResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
