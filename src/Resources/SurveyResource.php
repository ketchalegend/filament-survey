<?php

namespace Ketchalegend\FilamentSurvey\Resources;

use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Enums\ActionsPosition;
use Filament\Tables\Table;
use Ketchalegend\FilamentSurvey\Models\Survey;
use Ketchalegend\FilamentSurvey\Resources\QuestionResource\Pages as QuestionPages;
use Ketchalegend\FilamentSurvey\Resources\SurveyResource\Pages;
use Ketchalegend\FilamentSurvey\Resources\SurveyResource\Widgets\Questions;

class SurveyResource extends Resource
{
    use Translatable;

    protected static ?string $model = Survey::class;

    public static function getNavigationIcon(): string
    {
        return config('filament-survey.navigation.survey.icon');
    }

    public static function getNavigationSort(): ?int
    {
        return 1;
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Surveys');
    }

    public static function getLabel(): string
    {
        return __('Survey');
    }

    public static function getPluralLabel(): string
    {
        return __('Surveys');
    }

    public static function getTranslatableLocales(): array
    {
        return array_keys(config('filament-survey.languages'));
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Survey')
                    ->schema([
                    Forms\Components\TextInput::make('name')
                        ->required()
                        ->columnSpanFull(),
                    Forms\Components\RichEditor::make('description')
                        ->required()
                        ->columnSpanFull(),
                    ]),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->translateLabel(),
               // Tables\Columns\TextColumn::make('name')
                //->description(fn (Survey $record): string => route('survey.create', ['uuid' => $record->uuid]), position: 'below'),
                Tables\Columns\TextColumn::make('link')
                ->label(__('Survey Link'))
                ->color('primary')
                ->default(function ($record) {
                    $baseUrl = config('app.url');

                    return $baseUrl . '/survey/' . $record->uuid ;
                })
                ->copyable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->actions([
                Action::make('edit')
                    ->label(__('Edit'))
                    ->icon('heroicon-o-pencil')
                    ->url(fn (Survey $record) => static::getUrl('edit', ['record' => $record])),
                Action::make('create-question')
                    ->label(__('Create Question'))
                    ->icon('heroicon-o-plus-circle')
                    ->url(fn (Survey $record) => QuestionPages\CreateQuestion::getUrl(['survey_id' => $record->id])),
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
            'index' => Pages\ListSurveys::route('/'),
            'create' => Pages\CreateSurvey::route('/create'),
            'create-question' => QuestionPages\CreateQuestion::route('/{survey_id}/create'),
            'edit' => Pages\EditSurvey::route('/{record}/edit'),
        ];
    }

    public static function getWidgets(): array
    {
        return [
            Questions::class,
        ];
    }
}
