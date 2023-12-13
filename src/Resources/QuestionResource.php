<?php

namespace Ketchalegend\FilamentSurvey\Resources;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Livewire\Component as Livewire;
use Ketchalegend\FilamentSurvey\Models\Question;
use Ketchalegend\FilamentSurvey\Models\Section;
use Ketchalegend\FilamentSurvey\Resources\QuestionResource\Pages;

class QuestionResource extends Resource
{
    use Translatable;

    protected static ?string $model = Question::class;

    public static function getNavigationIcon(): string
    {
        return config('filament-survey.navigation.question.icon');
    }

    public static function getNavigationSort(): ?int
    {
        return config('3');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('Surveys');
    }

    public static function getLabel(): string
    {
        return __('Question');
    }

    public static function getPluralLabel(): string
    {
        return __('Questions');
    }

    public static function getTranslatableLocales(): array
    {
        return array_keys(config('filament-survey.languages'));
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('section_id')->label('Section')
                    ->relationship('section', 'name->en')
                    ->required()
                    ->helperText('To be available here, a survey should be added first on section.'),
                Forms\Components\Select::make('survey_id')->label('Survey')
                    ->relationship('survey', 'name->en')
                    ->required()
                    ->helperText('To be available here, a survey should be added first on section.'),
                Forms\Components\TextInput::make('content')
                    ->required(),
                Forms\Components\Select::make('type')
                    ->required()
                    ->reactive()
                    ->options(config('filament-survey.question.types')),
                Forms\Components\TextInput::make('order')
                    ->numeric()
                    ->required(),
                Forms\Components\TagsInput::make('options')
                    ->placeholder('New option')
                    ->helperText("Used for radio and multiselect types. Eg: ['Yes', 'No']")
                    ->visible(fn (Get $get) => $get('type') == 'radio' || $get('type') == 'multiselect')
                    ->columnSpanFull(),
                Forms\Components\TagsInput::make('rules')
                    ->placeholder('New rule')
                    ->helperText("Validation rules. Eg: 'numeric', 'min:2', 'required'"),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('survey.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('section.name'),
                Tables\Columns\TextColumn::make('content'),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('order'),
                Tables\Columns\TagsColumn::make('options'),
                Tables\Columns\TagsColumn::make('rules'),
                Tables\Columns\TextColumn::make('created_at')
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
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }
}
