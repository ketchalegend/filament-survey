<?php

namespace Ketchalegend\FilamentSurvey\Resources\QuestionResource\RelationManagers;

use App\Models\EventTickets;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\HtmlString;

class AnswersRelationManager extends RelationManager
{
    protected static string $relationship = 'answers';

    public function form(Form $form): Form
    {
        return $form

            ->schema([
                    //
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('value')
                ->label('Answers'),
            ])
            ->paginated([10, 25, 50, 100, 'all'])
            ->defaultSort('created_at', 'desc')
            ->actions([
                //,
            ]);
    }
}
