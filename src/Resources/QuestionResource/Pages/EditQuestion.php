<?php

namespace Ketchalegend\FilamentSurvey\Resources\QuestionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Ketchalegend\FilamentSurvey\Resources\QuestionResource;

class EditQuestion extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = QuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\LocaleSwitcher::make(),
        ];
    }
}
