<?php

namespace HoceineEl\FilamentDateManager\Columns;

use Carbon\Carbon;
use Filament\Tables\Columns\Column;
use HoceineEl\FilamentDateManager\Concerns\CanBeFormatted;
use HoceineEl\FilamentDateManager\Concerns\HasThemes;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Lang;

class DateIntervalColumn extends Column
{
    use CanBeFormatted, HasThemes;

    protected string $view = 'filament-date-manager::components.interval-date-column';

    protected function setUp(): void
    {
        parent::setUp();
        $this->name('interval_date');
        $this->label(Lang::get('filament-date-manager::translations.date_interval'));

        // Make column searchable on both start and end dates
        $this->searchable(query: function (Builder $query, string $search): Builder {
            return $query->where(function ($query) use ($search) {
                return $query
                    ->where($this->startDateColumnName, 'like', "%{$search}%")
                    ->orWhere($this->endDateColumnName, 'like', "%{$search}%");
            });
        });

        // Make column sortable by start date (primary) and end date (secondary)
        $this->sortable(query: function (Builder $query, string $direction) {
            return $query->orderBy($this->startDateColumnName, $direction)->orderBy($this->endDateColumnName, $direction);
        });

        $this->tooltip(function () {
            $startDate = $this->getStartDate();
            $endDate = $this->getEndDate();

            $startText = $startDate
                ? ($this->getIsDateTranslated()
                    ? $startDate->translatedFormat($this->getDateFormat())
                    : $startDate->format($this->getDateFormat()))
                : Lang::get('filament-date-manager::translations.not_defined');

            $endText = $endDate
                ? ($this->getIsDateTranslated()
                    ? $endDate->translatedFormat($this->getDateFormat())
                    : $endDate->format($this->getDateFormat()))
                : Lang::get('filament-date-manager::translations.open_ended');

            return Lang::get('filament-date-manager::translations.from') . '  ' . $startText . '  ' .
                Lang::get('filament-date-manager::translations.to') . '  ' . $endText;
        });
    }
}
