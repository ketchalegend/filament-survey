<?php

namespace Ketchalegend\FilamentSurvey;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentSurveyServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-survey';

    public function configurePackage(Package $package): void
    {
        $package->name('filament-survey')
            ->hasConfigFile('filament-survey')
            ->hasViews('filament-survey')
            ->hasMigrations('create_filament_survey_table')
            ->hasTranslations();
    }

    public function packageBooted(): void
    {
        parent::packageBooted();

        //
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}
