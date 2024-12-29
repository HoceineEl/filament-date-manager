<?php

namespace HoceineEl\FilamentDateManager\Concerns;

use Carbon\Carbon;
use HoceineEl\FilamentDateManager\Enums\ColumnTheme;

trait CanBeFormatted
{

    protected string $dateFormat = 'M j, Y';
    protected string $timeFormat = 'h:i A';
    protected bool $translated = false;
    protected bool $is_time_interval = false;

    protected string | Carbon $startDateColumnName = 'start_date';
    protected string | Carbon $endDateColumnName = 'end_date';

    protected \Closure | string | Carbon | null $startDateUsing = null;
    protected \Closure | string | Carbon | null $endDateUsing = null;

   

    public function color(string $color): static
    {
        $this->mainColor = $color;
        return $this;
    }

    public function dateFormat(string $dateFormat): static
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    public function timeFormat(string $timeFormat): static
    {
        $this->timeFormat = $timeFormat;
        return $this;
    }

    public function isTimeInterval(bool $is_time_interval = true): static
    {
        $this->is_time_interval = $is_time_interval;
        return $this;
    }

    public function translated(bool | \Closure $translated = true): static
    {
        $this->translated = $this->evaluate($translated);
        return $this;
    }

    public function startDateColumnName(string $startDateColumnName): static
    {
        $this->startDateColumnName = $startDateColumnName;
        return $this;
    }

    public function endDateColumnName(string $endDateColumnName): static
    {
        $this->endDateColumnName = $endDateColumnName;
        return $this;
    }

    public function getStartDateUsing(\Closure | string | Carbon $startDate): static
    {
        $this->startDateUsing = $startDate;
        return $this;
    }

    public function getEndDateUsing(\Closure | string | Carbon $endDate): static
    {
        $this->endDateUsing = $endDate;
        return $this;
    }
    public function getDateFormat(): string
    {
        if ($this->is_time_interval) {
            return $this->timeFormat;
        }
        return $this->dateFormat;
    }

    public function getTimeFormat(): string
    {
        return $this->timeFormat;
    }

    public function getIsDateTranslated(): bool
    {
        return $this->translated;
    }
    public function getStartDate(): Carbon
    {
        if (!isset($this->startDateUsing)) {
            $startDate = $this->getRecord()->{$this->startDateColumnName};
            return $startDate instanceof Carbon ? $startDate : Carbon::parse($startDate);
        }

        return $this->evaluate($this->startDateUsing);
    }

    public function getEndDate(): Carbon
    {
        if (!isset($this->endDateUsing)) {
            $endDate = $this->getRecord()->{$this->endDateColumnName};
            return $endDate instanceof Carbon ? $endDate : Carbon::parse($endDate);
        }

        return $this->evaluate($this->endDateUsing);
    }
 
}
