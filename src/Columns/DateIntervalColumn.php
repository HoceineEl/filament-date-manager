<?php

namespace HoceineEl\FilamentDateManager\Columns;

use Carbon\Carbon;
use Filament\Tables\Columns\Column;

/**
 * A custom Filament column for displaying date intervals with various visual themes.
 *
 * This column displays a start and end date with customizable formatting and visual styles.
 * It supports multiple themes, date translations, and flexible date input handling.
 */
class DateIntervalColumn extends Column
{
    /**
     * The view component used to render the date interval.
     *
     * @var string
     */
    protected string $view = 'filament-date-manager::components.interval-date-column';

    /**
     * The start date of the interval.
     *
     * @var Carbon|string
     */
    public Carbon | string $startDate;

    /**
     * The end date of the interval.
     *
     * @var Carbon|string
     */
    public Carbon | string $endDate;

    /**
     * The name of the column containing the start date.
     *
     * @var Carbon|string
     */
    public Carbon | string $startDateColumnName = 'start_date';

    /**
     * The name of the column containing the end date.
     *
     * @var Carbon|string
     */
    public Carbon | string $endDateColumnName = 'end_date';

    /**
     * The format used to display dates.
     *
     * @var string
     */
    public string $dateFormat = 'M j, y';

    /**
     * Whether dates should be translated.
     *
     * @var bool
     */
    public bool $translated = false;

    /**
     * Custom callback or value for retrieving the start date.
     *
     * @var \Closure|string|Carbon|null
     */
    public \Closure | string | Carbon | null $startDateUsing = null;

    /**
     * Custom callback or value for retrieving the end date.
     *
     * @var \Closure|string|Carbon|null
     */
    public \Closure | string | Carbon | null $endDateUsing = null;

    /**
     * The visual theme for displaying the date interval.
     *
     * @var string
     */
    protected string $theme = 'gradient-timeline-dots';

    /**
     * The main color used in the visual theme.
     *
     * @var string
     */
    protected string  $mainColor = 'primary';

    /**
     * Set up the column configuration.
     */
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

    /**
     * Set the visual theme for the date interval.
     * 
     * Available themes:
     * - modern-gradient: Shows dates with a gradient bar on the left
     * - compact-arrow: Displays dates inline with an arrow between them
     * - card-style: Shows dates in a card format with a dividing line
     * - timeline-dots: Displays dates vertically with connecting dots
     * - gradient-timeline-dots: Similar to timeline-dots with gradient styling
     * - minimalist-border: Shows dates with a minimal border decoration
     * - simple-stack: Stacks dates vertically with simple styling
     * - inline-pill: Shows dates in a pill container inline
     * - minimal-dash: Displays dates with a minimal dash separator
     * - clean-separator: Shows dates with a clean vertical separator
     * - basic-label: Basic inline display with translated separator
     *
     * @param string $theme The theme name to use
     * @return static
     */
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

    /**
     * Get the main color used in the visual theme.
     *
     * @return string|null
     */
    public function getColor(): ?string
    {
        return $this->mainColor;
    }

    /**
     * Set the date format string.
     *
     * @param string $dateFormat The date format to use
     * @return static
     */
    public function dateFormat(string $dateFormat): static
    {
        $this->dateFormat = $dateFormat;
        return $this;
    }

    /**
     * Get the current date format string.
     *
     * @return string
     */
    public function getDateFormat(): string
    {
        return $this->dateFormat;
    }

    /**
     * Enable date translation.
     *
     * @return static
     */
    public function translated(): static
    {
        $this->translated = true;
        return $this;
    }

    /**
     * Check if date translation is enabled.
     *
     * @return bool
     */
    public function getIsDateTranslated(): bool
    {
        return $this->translated;
    }

    /**
     * Set the column name for the start date.
     *
     * @param string $startDateColumnName The column name
     * @return static
     */
    public function startDateColumnName(string $startDateColumnName): static
    {
        $this->startDateColumnName = $startDateColumnName;
        return $this;
    }

    /**
     * Set the column name for the end date.
     *
     * @param string $endDateColumnName The column name
     * @return static
     */
    public function endDateColumnName(string $endDateColumnName): static
    {
        $this->endDateColumnName = $endDateColumnName;
        return $this;
    }

    /**
     * Get the column name for the start date.
     *
     * @return string
     */
    public function getStartDateColumnName(): string
    {
        return $this->startDateColumnName;
    }

    /**
     * Get the column name for the end date.
     *
     * @return string
     */
    public function getEndDateColumnName(): string
    {
        return $this->endDateColumnName;
    }

    /**
     * Set a custom callback or value for retrieving the start date.
     *
     * @param \Closure|string|Carbon $startDate The callback or value
     * @return static
     */
    public function getStartDateUsing(\Closure | string | Carbon $startDate): static
    {
        $this->startDateUsing = $startDate;
        return $this;
    }

    /**
     * Set a custom callback or value for retrieving the end date.
     *
     * @param \Closure|string|Carbon $endDate The callback or value
     * @return static
     */
    public function getEndDateUsing(\Closure | string | Carbon $endDate): static
    {
        $this->endDateUsing = $endDate;
        return $this;
    }

    /**
     * Get the start date as a Carbon instance.
     *
     * @return Carbon
     */
    public function getStartDate(): Carbon
    {
        if (! isset($this->startDateUsing)) {
            $this->startDate = $this->record->{$this->getStartDateColumnName()};
            return $this->startDate;
        }

        return $this->evaluate($this->startDateUsing);
    }

    /**
     * Get the end date as a Carbon instance.
     *
     * @return Carbon
     */
    public function getEndDate(): Carbon
    {
        if (! isset($this->endDateUsing)) {
            $this->endDate = $this->record->{$this->getEndDateColumnName()};
            return $this->endDate;
        }

        return $this->evaluate($this->endDateUsing);
    }

    /**
     * Set the theme to modern gradient style.
     *
     * @return static
     */
    public function modernGradient(): static
    {
        return $this->theme('modern-gradient');
    }

    /**
     * Set the theme to compact arrow style.
     *
     * @return static
     */
    public function compactArrow(): static
    {
        return $this->theme('compact-arrow');
    }

    /**
     * Set the theme to card style.
     *
     * @return static
     */
    public function cardStyle(): static
    {
        return $this->theme('card-style');
    }

    /**
     * Set the theme to timeline dots style.
     *
     * @return static
     */
    public function timelineDots(): static
    {
        return $this->theme('timeline-dots');
    }

    /**
     * Set the theme to gradient timeline dots style.
     *
     * @return static
     */
    public function gradientTimelineDots(): static
    {
        return $this->theme('gradient-timeline-dots');
    }

    /**
     * Set the theme to minimalist border style.
     *
     * @return static
     */
    public function minimalistBorder(): static
    {
        return $this->theme('minimalist-border');
    }

    /**
     * Set the theme to simple stack style.
     *
     * @return static
     */
    public function simpleStack(): static
    {
        return $this->theme('simple-stack');
    }

    /**
     * Set the theme to inline pill style.
     *
     * @return static
     */
    public function inlinePill(): static
    {
        return $this->theme('inline-pill');
    }

    /**
     * Set the theme to minimal dash style.
     *
     * @return static
     */
    public function minimalDash(): static
    {
        return $this->theme('minimal-dash');
    }

    /**
     * Set the theme to clean separator style.
     *
     * @return static
     */
    public function cleanSeparator(): static
    {
        return $this->theme('clean-separator');
    }


    /**
     * Get the current theme name.
     *
     * @return string
     */
    public function getTheme(): string
    {
        return $this->theme;
    }
}
