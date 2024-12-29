<?php

namespace HoceineEl\FilamentDateManager\Columns;

use Carbon\Carbon;
use Filament\Tables\Columns\Column;
use HoceineEl\FilamentDateManager\Concerns\CanBeFormatted;
use HoceineEl\FilamentDateManager\Concerns\HasThemes;

class DateIntervalColumn extends Column
{
    use CanBeFormatted,HasThemes;

    protected string $view = 'filament-date-manager::components.interval-date-column';

    protected function setUp(): void
    {
        parent::setUp();
        $this->name('interval_date');
        $this->label(__('filament-date-manager::translations.date_interval'));
        $this->tooltip(function () {
            if ($this->getIsDateTranslated()) {
                return  __('filament-date-manager::translations.from') . '  ' . $this->getStartDate()->translatedFormat($this->getDateFormat()) . '  ' . __('filament-date-manager::translations.to') . '  ' . $this->getEndDate()->translatedFormat($this->getDateFormat());
            }
            return __('filament-date-manager::translations.from') . '  ' . $this->getStartDate()->format($this->getDateFormat()) . '  ' . __('filament-date-manager::translations.to') . '  ' . $this->getEndDate()->format($this->getDateFormat());
        });
    }

}
