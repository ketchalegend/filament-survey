<?php

namespace Ketchalegend\FilamentSurvey\Resources\AnswerResource\Pages;

use Filament\Resources\Pages\ListRecords;
use Ketchalegend\FilamentSurvey\Resources\AnswerResource;

class ListAnswers extends ListRecords
{
    protected static string $resource = AnswerResource::class;

    protected function getActions(): array
    {
        return [
            //
        ];
    }
}
