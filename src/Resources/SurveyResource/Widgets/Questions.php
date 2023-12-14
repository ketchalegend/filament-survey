<?php

namespace Ketchalegend\FilamentSurvey\Resources\SurveyResource\Widgets;

use Filament\Tables;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use MattDaneshvar\Survey\Models\Question;

class Questions extends BaseWidget
{
    public ?Model $record = null;

    protected int|string|array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Question::query()
            ->where('survey_id', $this->record->id)
            ->orderBy('order');
    }

    public function reorderTable(array $order): void
    {
        Question::setNewOrder($order);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('section.name')
                ->toggleable(),
            Tables\Columns\TextColumn::make('content')
                ->label(__('Question')),
            Tables\Columns\TextColumn::make('type')
                ->toggleable()
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'text' => 'gray',
                    'multiselect' => 'warning',
                    'radio' => 'success',
                    'number' => 'danger',
                }),
            Tables\Columns\TextColumn::make('order')
                ->toggleable()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->toggleable()
                ->dateTime(),
        ];
    }

    protected function getTableReorderColumn(): ?string
    {
        return 'order';
    }
}
