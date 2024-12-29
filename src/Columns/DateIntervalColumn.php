<?php

namespace HoceineEl\FilamentDateManager\Columns;

use Carbon\Carbon;
use Filament\Tables\Columns\Column;

class DateIntervalColumn extends Column
{
    protected string $view = 'filament-date-manager::components.interval-date-column';
    public Carbon | string $startDate;
    public Carbon | string $endDate;
    public Carbon | string $startDateColumnName = 'start_date';
    public Carbon | string $endDateColumnName = 'end_date';
    public string $dateFormat = 'M j, y';
    public bool $translated = false;
    public \Closure | string | Carbon | null $startDateUsing = null;
    public \Closure | string | Carbon | null $endDateUsing = null;

    protected string $theme = 'gradient-timeline-dots';
    protected string  $mainColor = 'primary';

    protected function setUp(): void
    {
        parent::setUp();
        $this->name('interval_date');
    }

    public function theme(string $theme): static
    {
        $this->theme = $theme;
        return $this;
    }
    /**
     * Set the color for the interval date column.
     * 
     * @param string $color The color to use. Can be any of the Filament color names like 'primary', 'success', 'danger', etc.
     * @return static
     */
    public function color(string $color): static
    {
        $this->mainColor = $color;
        return $this;
    }

    public function getColor(): ?string
    {
        return $this->mainColor;
    }



    public function dateFormat(string $dateFormat): static
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    public function translated(): static
    {
        $this->translated = true;
        return $this;
    }

    public function getIsDateTranslated(): bool
    {
        return $this->translated;
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

    public function getStartDateColumnName(): string
    {
        return $this->startDateColumnName;
    }

    public function getEndDateColumnName(): string
    {
        return $this->endDateColumnName;
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

    public function getStartDate(): Carbon
    {
        if (! isset($this->startDateUsing)) {
            $this->startDate = $this->record->{$this->getStartDateColumnName()};
            return $this->startDate;
        }

        return $this->evaluate($this->startDateUsing);
    }

    public function getEndDate(): Carbon
    {
        if (! isset($this->endDateUsing)) {
            $this->endDate = $this->record->{$this->getEndDateColumnName()};
            return $this->endDate;
        }

        return $this->evaluate($this->endDateUsing);
    }

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

    public function basicLabel(): static
    {
        return $this->theme('basic-label');
    }

    public function getTheme(): string
    {
        return $this->theme;
    }
}
