<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use App\Models\Classes;
use App\Models\Section;
use App\Models\Student;
use Filament\Tables\Table;
use App\Exports\StudentsExport;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Widgets\TableWidget as BaseWidget;

class LatestStudents extends BaseWidget
{
    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = 'full';

    protected function getTableQuery(): Builder
    {
        return Student::query()
            ->latest()
            ->take(5);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->sortable()
                ->searchable(),
            TextColumn::make('email')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('phone_number')
                ->sortable()
                ->searchable()
                ->toggleable(),
            TextColumn::make('address')
                ->sortable()
                ->searchable()
                ->toggleable()
                ->wrap(),

            TextColumn::make('class.name')
                ->sortable()
                ->searchable(),

            TextColumn::make('section.name')
                ->sortable()
                ->searchable()
        ];
    }

    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }
}
