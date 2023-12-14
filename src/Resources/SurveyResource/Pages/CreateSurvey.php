<?php

namespace Ketchalegend\FilamentSurvey\Resources\SurveyResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Ketchalegend\FilamentSurvey\Resources\SurveyResource;

class CreateSurvey extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = SurveyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\LocaleSwitcher::make(),
        ];
    }
}
