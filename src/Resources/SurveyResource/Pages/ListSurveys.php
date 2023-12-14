<?php

namespace Ketchalegend\FilamentSurvey\Resources\SurveyResource\Pages;

use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Pages\Actions\Action;
use Filament\Resources\Pages\ListRecords;
use Ketchalegend\FilamentSurvey\Jobs\SendExportSurveys;
use Ketchalegend\FilamentSurvey\Resources\SurveyResource;

class ListSurveys extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = SurveyResource::class;


    public function export()
    {
        SendExportSurveys::dispatch(request()->user());

        Notification::make()
            ->title(__('You will receive your export via email'))
            ->success()
            ->send();
    }

    protected function getFooterWidgets(): array
    {
        return [
            //
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\Action::make('create')
                ->url(SurveyResource::getUrl('create')),
            \Filament\Actions\Action::make(__('Export Answers'))
                ->icon('heroicon-s-arrow-down-tray')
                ->action('export'),
            //Actions\LocaleSwitcher::make(),
        ];
    }
}
