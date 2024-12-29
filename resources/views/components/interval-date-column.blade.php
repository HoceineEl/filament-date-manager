@php
   if ($getIsDateTranslated()) {
    $start = $getStartDate()->translatedFormat($getDateFormat());
    $end = $getEndDate()->translatedFormat($getDateFormat());
   } else {
    $start = $getStartDate()->format($getDateFormat());
    $end = $getEndDate()->format($getDateFormat());
   }
   
    $color = $getColor() ?? 'primary';

    $bgColor = match($color) {
        'success' => 'bg-success-500',
        'info' => 'bg-info-500',
        'warning' => 'bg-warning-500',
        'danger' => 'bg-danger-500',
        'secondary' => 'bg-secondary-500',
        default => 'bg-'.$color.'-500'
    };

    $textColor =  match($color) {
        'success' => 'text-success-500',
        'info' => 'text-info-500',
        'warning' => 'text-warning-500',
        'danger' => 'text-danger-500',
        'secondary' => 'text-secondary-500',
        default => 'text-'.$color.'-500'
    };
@endphp

@switch($column->getTheme())
    @case('modern-gradient')
        <div class="flex items-center gap-2 ">
            <div class="{{ $bgColor }} w-1 h-14 rounded-full"></div>
            <div class="flex flex-col">
                <span class="text-sm font-medium">{{ $start }}</span>
                <span class="text-xs text-gray-500">{{ __('filament-date-manager::translations.to') }}</span>
                <span class="text-sm font-medium">{{ $end }}</span>
            </div>
        </div>
        @break

    @case('compact-arrow')
        <div class="text-sm px-3 py-2">
            <span class="font-medium">{{ $start }}</span>
            <x-icon name="heroicon-m-arrow-right" class="w-4 h-4 text-{{ $textColor }}-500 mx-2 inline rtl:rotate-180" />
            <span class="font-medium">{{ $end }}</span>
        </div>
        @break

    @case('card-style')
        <div class="p-2">
            <div class="flex flex-col gap-1 text-center">
                <span class="text-sm font-medium">{{ $start }}</span>
                <div class="h-px {{ $bgColor }} w-full"></div>
                <span class="text-sm font-medium">{{ $end }}</span>
            </div>
        </div>
        @break

    @case('timeline-dots')
        <div class="flex items-center gap-2 p-2">
            <div class="flex flex-col items-center gap-1">
                <div class="w-2 h-2 rounded-full {{ $bgColor }}"></div>
                <div class="w-0.5 h-8 {{ $bgColor }}"></div>
                <div class="w-2 h-2 rounded-full {{ $bgColor }}"></div>
            </div>
            <div class="flex flex-col justify-between h-full">
                <span class="text-sm">{{ $start }}</span>
                <span class="text-sm">{{ $end }}</span>
            </div>
        </div>
        @break
    @case('gradient-timeline-dots')
        <div class="flex items-center gap-2 p-2">
            <div class="flex flex-col items-center gap-1">
                <div class="w-2 h-2 rounded-full {{ $bgColor }}"></div>
                <div class="w-0.5 h-8 {{ $bgColor }}"></div>
                <div class="w-2 h-2 rounded-full {{ $bgColor }}"></div>
            </div>
            <div class="flex flex-col justify-between h-full">
                <span class="text-sm">{{ $start }}</span>
                <span class="text-sm">{{ $end }}</span>
            </div>
        </div>
        @break

    @case('minimalist-border')
        <div class="border-r-2 {{ $bgColor }} pr-2 py-1">
            <div class="flex flex-col">
                <span class="text-sm">{{ $start }}</span>
                <span class="text-sm">{{ $end }}</span>
            </div>
        </div>
        @break

    @case('simple-stack')
        <div class="flex flex-col p-2 rounded">
            <span class="text-sm font-medium">{{ $start }}</span>
            <span class="text-xs text-gray-500">{{ __('filament-date-manager::translations.to') }}</span>
            <span class="text-sm font-medium">{{ $end }}</span>
        </div>
        @break

    @case('inline-pill')
        <div class="inline-flex items-center px-3 py-1 bg-gray-100 rounded-full">
            <span class="text-sm font-medium">{{ $start }}</span>
            <span class="mx-2 {{ $textColor }}">•</span>
            <span class="text-sm font-medium">{{ $end }}</span>
        </div>
        @break

    @case('minimal-dash')
        <div class="inline-flex items-center gap-2">
            <span class="text-sm font-medium">{{ $start }}</span>
            <span class="{{ $textColor }}">—</span>
            <span class="text-sm font-medium">{{ $end }}</span>
        </div>
        @break

    @case('clean-separator')
        <div class="flex items-center gap-2 px-3 py-1.5 rounded">
            <span class="text-sm font-medium">{{ $start }}</span>
            <div class="h-4 w-px {{ $bgColor }}"></div>
            <span class="text-sm font-medium">{{ $end }}</span>
        </div>
        @break

    @case('basic-label')
        <div class="inline-flex flex-col">
            <div class="text-sm">
                <span class="font-medium">{{ $start }}</span>
                <span class="text-{{ $colorClass }}-500 mx-1">{{ __('filament-date-manager::translations.to') }}</span>
                <span class="font-medium">{{ $end }}</span>
            </div>
        </div>
        @break

    @default
        <div class="inline-flex items-center gap-2 px-3 py-1.5 text-sm">
            <span class="font-medium">{{ $start }}</span>
            <svg class="w-4 h-4 text-{{ $colorClass }}-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7"></path>
            </svg>
            <span class="font-medium">{{ $end }}</span>
        </div>
@endswitch
