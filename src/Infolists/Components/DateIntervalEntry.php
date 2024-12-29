<?php

namespace HoceineEl\FilamentDateManager\Infolists\Components;

use Carbon\Carbon;
use Filament\Infolists\Components\Entry;
use HoceineEl\FilamentDateManager\Enums\ColumnTheme;

class DateIntervalEntry extends Entry
{
    protected string $view = 'filament-date-manager::components.interval-date-column';

    protected string $theme = 'gradient-timeline-dots';
    protected string $mainColor = 'primary';
    protected string $dateFormat = 'M j, Y';
    protected string $timeFormat = 'h:i A';
    protected bool $translated = false;
    protected bool $is_time_interval = false;

    protected string | Carbon $startDateColumnName = 'start_date';
    protected string | Carbon $endDateColumnName = 'end_date';

    protected \Closure | string | Carbon | null $startDateUsing = null;
    protected \Closure | string | Carbon | null $endDateUsing = null;

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

    public function theme(string | ColumnTheme $theme): static
    {
        $this->theme = $theme instanceof ColumnTheme ? $theme->value : $theme;
        return $this;
    }

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

    public function translated(): static
    {
        $this->translated = true;
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

    // Theme helper methods
    public function modernGradient(): static
    {
        return $this->theme('modern-gradient');
    }

    public function compactArrow(): static
    {
        return $this->theme('compact-arrow');
    }

    public function cardStyle(): static
    {
        return $this->theme('card-style');
    }

    public function timelineDots(): static
    {
        return $this->theme('timeline-dots');
    }

    public function gradientTimelineDots(): static
    {
        return $this->theme('gradient-timeline-dots');
    }

    public function minimalistBorder(): static
    {
        return $this->theme('minimalist-border');
    }

    public function simpleStack(): static
    {
        return $this->theme('simple-stack');
    }

    public function inlinePill(): static
    {
        return $this->theme('inline-pill');
    }

    public function minimalDash(): static
    {
        return $this->theme('minimal-dash');
    }

    public function cleanSeparator(): static
    {
        return $this->theme('clean-separator');
    }

    // Getter methods
    public function getColor(): ?string
    {
        return $this->mainColor;
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

    public function getTheme(): string
    {
        return $this->theme;
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
