<?php

namespace Ketchalegend\FilamentSurvey\Resources\QuestionResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Ketchalegend\FilamentSurvey\Resources\QuestionResource;

class ListQuestions extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = QuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //Actions\LocaleSwitcher::make(),
            Actions\CreateAction::make(),
        ];
    }
}
