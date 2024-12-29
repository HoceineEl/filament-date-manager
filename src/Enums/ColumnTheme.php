<?php

namespace HoceineEl\FilamentDateManager\Enums;

use Filament\Support\Contracts\HasLabel;

enum ColumnTheme: string 
{
    case ModernGradient = 'modern-gradient';
    case CompactArrow = 'compact-arrow';
    case CardStyle = 'card-style';
    case TimelineDots = 'timeline-dots';
    case GradientTimelineDots = 'gradient-timeline-dots';
    case MinimalistBorder = 'minimalist-border';
    case SimpleStack = 'simple-stack';
    case InlinePill = 'inline-pill';
    case MinimalDash = 'minimal-dash';
    case CleanSeparator = 'clean-separator';
}
