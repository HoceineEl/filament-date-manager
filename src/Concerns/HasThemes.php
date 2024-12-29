<?php

namespace HoceineEl\FilamentDateManager\Concerns;

use Carbon\Carbon;
use HoceineEl\FilamentDateManager\Enums\ColumnTheme;

trait HasThemes
{
    protected string $theme = 'gradient-timeline-dots';
    protected string $mainColor = 'primary';

    public function theme(string | ColumnTheme $theme): static
    {
        $this->theme = $theme instanceof ColumnTheme ? $theme->value : $theme;
        return $this;
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

    // Getter methods
    public function getColor(): ?string
    {
        return $this->mainColor;
    }
    public function getTheme(): string
    {
        return $this->theme;
    }
}
