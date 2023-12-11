<?php

namespace Ketchalegend\FilamentSurvey\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Ketchalegend\FilamentSurvey\Models\Section;
use Ketchalegend\FilamentSurvey\Resources\SectionResource\Pages;

class SectionResource extends Resource
{
    use Translatable;

    protected static ?string $model = Section::class;

    public static function getNavigationIcon(): string
    {
        return config('filament-survey.navigation.section.icon');
    }

    public static function getNavigationSort(): ?int
    {
        return config('2');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Surveys');
    }

    public static function getLabel(): string
    {
        return __('Section');
    }

    public static function getPluralLabel(): string
    {
        return __('Sections');
    }

    public static function getTranslatableLocales(): array
    {
        return array_keys(config('filament-survey.languages'));
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\Select::make('survey_id')
                    ->relationship('survey', 'name->en'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('survey.name'),
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSections::route('/'),
            'create' => Pages\CreateSection::route('/create'),
            'edit' => Pages\EditSection::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return true;
    }
}
