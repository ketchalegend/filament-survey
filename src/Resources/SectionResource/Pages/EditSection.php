<?php

namespace Ketchalegend\FilamentSurvey\Resources\SectionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Ketchalegend\FilamentSurvey\Resources\SectionResource;

class EditSection extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = SectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // Actions\LocaleSwitcher::make(),
        ];
    }
}
