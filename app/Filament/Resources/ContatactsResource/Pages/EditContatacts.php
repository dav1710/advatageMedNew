<?php

namespace App\Filament\Resources\ContatactsResource\Pages;

use App\Filament\Resources\ContatactsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditContatacts extends EditRecord
{
    protected static string $resource = ContatactsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
