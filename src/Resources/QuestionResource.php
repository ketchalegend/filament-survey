<?php

namespace Ketchalegend\FilamentSurvey\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Resources\Resource;
use Livewire\Component as Livewire;
use Illuminate\Database\Eloquent\Model;
use Filament\Resources\Concerns\Translatable;
use Ketchalegend\FilamentSurvey\Models\Section;
use Ketchalegend\FilamentSurvey\Models\Question;
use Ketchalegend\FilamentSurvey\Resources\QuestionResource\Pages;

class QuestionResource extends Resource
{
    use Translatable;

    protected static ?string $model = Question::class;

    public static function getNavigationIcon(): string
    {
        return 'heroicon-o-question-mark-circle';
    }

    public static function getNavigationSort(): ?int
    {
        return 3;
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
                Forms\Components\Section::make('Question')
                    ->schema([
                        Forms\Components\Select::make('section_id')->label('Section')
                        ->relationship('section', 'name->en')
                        ->searchable(['name->en'])
                        ->preload()
                        ->required()
                        ->live(onBlur: true)
                        ->lazy()
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('survey_id', Section::find($state)->survey_id))
                        ->columns(1)
                        ->helperText('To be available here, a survey should be added first on section.'),
                    Forms\Components\Select::make('survey_id')->label('Survey')
                        ->relationship('survey', 'name->en')
                        ->disabled()
                        ->required()
                        ->columns(1)
                        ->helperText('This is your survey name.'),
                    Forms\Components\TextInput::make('content')
                    ->label('Question')
                    
                    ->columnSpanFull()
                        ->required(),
                    Forms\Components\Select::make('type')
                        ->required()
                        ->reactive()
                        ->options([
                            'text' => 'Text',
                            'number' => 'Number',
                            'radio' => 'Radio',
                            'multiselect' => 'Multiselect',
                        ]),
                    Forms\Components\TextInput::make('order')
                        ->numeric()
                        ->required(),
                    Forms\Components\TagsInput::make('options')
                        ->placeholder('New option')
                        ->helperText("Used for radio and multiselect types. Eg: option1, option2, option3")
                        ->visible(fn (Get $get) => $get('type') == 'radio' || $get('type') == 'multiselect')
                        ->columns(2),
                   
                        
                            Forms\Components\CheckboxList::make('rules')
                            ->options([
                                'required' => 'Required'
                            ])
                        ->columns(2),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('survey.name')
                    ->label('Survey'),
                Tables\Columns\TextColumn::make('section.name')
                    ->label('Section'),
                Tables\Columns\TextColumn::make('content')
                    ->label(__('Question'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'text' => 'gray',
                        'multiselect' => 'warning',
                        'radio' => 'success',
                        'number' => 'danger',
                    }),
                Tables\Columns\TextColumn::make('options')
                    ->label('Options')
                    ->searchable()
                    ->badge()
                    ->separator(','),
                Tables\Columns\TextColumn::make('rules')
                    ->badge()
                    ->separator(','),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                ->icon('heroicon-o-pencil'),
            ])
            ->filters([
                //
            ]);
    }

    public static function getRelations(): array
    {
        return [
            QuestionResource\RelationManagers\AnswersRelationManager::class,
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
