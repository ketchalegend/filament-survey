<?php

namespace Ketchalegend\FilamentSurvey\Resources\SectionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Ketchalegend\FilamentSurvey\Resources\SectionResource;

class CreateSection extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = SectionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\LocaleSwitcher::make(),
        ];
    }
}
