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
        'primary' => 'bg-primary-500 dark:bg-primary-400',
        'success' => 'bg-success-500 dark:bg-success-400',
        'info' => 'bg-info-500 dark:bg-info-400', 
        'warning' => 'bg-warning-500 dark:bg-warning-400',
        'danger' => 'bg-danger-500 dark:bg-danger-400',
        'secondary' => 'bg-secondary-500 dark:bg-secondary-400',
        default => 'bg-'.$color.'-500 dark:bg-'.$color.'-400'
    };

    $textColor = match($color) {
        'primary' => 'text-primary-500 dark:text-primary-400',
        'success' => 'text-success-500 dark:text-success-400',
        'info' => 'text-info-500 dark:text-info-400',
        'warning' => 'text-warning-500 dark:text-warning-400', 
        'danger' => 'text-danger-500 dark:text-danger-400',
        'secondary' => 'text-secondary-500 dark:text-secondary-400',
        default => 'text-'.$color.'-500 dark:text-'.$color.'-400'
    };

    $borderColor = match($color) {
        'primary' => 'border-primary-500 dark:border-primary-400',
        'success' => 'border-success-500 dark:border-success-400',
        'info' => 'border-info-500 dark:border-info-400',
        'warning' => 'border-warning-500 dark:border-warning-400',
        'danger' => 'border-danger-500 dark:border-danger-400', 
        'secondary' => 'border-secondary-500 dark:border-secondary-400',
        default => 'border-'.$color.'-500 dark:border-'.$color.'-400'
    };
    $gradientFrom = match($color) {
        'primary' => 'from-primary-600 dark:from-primary-700',
        'success' => 'from-success-600 dark:from-success-700',
        'info' => 'from-info-600 dark:from-info-700', 
        'warning' => 'from-warning-600 dark:from-warning-700',
        'danger' => 'from-danger-600 dark:from-danger-700',
        'secondary' => 'from-secondary-600 dark:from-secondary-700',
        default => 'from-'.$color.'-600 dark:from-'.$color.'-700'
    };

    $gradientTo = match($color) {
        'primary' => 'to-primary-200 dark:to-primary-300',
        'success' => 'to-success-200 dark:to-success-300',
        'info' => 'to-info-200 dark:to-info-300',
        'warning' => 'to-warning-200 dark:to-warning-300', 
        'danger' => 'to-danger-200 dark:to-danger-300',
        'secondary' => 'to-secondary-200 dark:to-secondary-300',
        default => 'to-'.$color.'-200 dark:to-'.$color.'-300'
    };
@endphp

@switch($getTheme())
    @case('modern-gradient')
        <div class="flex items-center gap-2">
            <div class="bg-gradient-to-b {{ $gradientFrom }} {{ $gradientTo }} w-1 h-14 rounded-full"></div>
            <div class="flex flex-col">
                <span class="text-sm font-medium dark:text-gray-100">{{ $start }}</span>
                <span class="text-xs text-gray-500 dark:text-gray-400">{{ __('filament-date-manager::translations.to') }}</span>
                <span class="text-sm font-medium dark:text-gray-100">{{ $end }}</span>
            </div>
        </div>
        @break

    @case('compact-arrow')
        <div class="text-sm px-3 py-2">
            <span class="font-medium dark:text-gray-100">{{ $start }}</span>
            <x-icon name="heroicon-m-arrow-right" class="w-4 h-4 {{ $textColor }} mx-2 inline rtl:rotate-180" />
            <span class="font-medium dark:text-gray-100">{{ $end }}</span>
        </div>
        @break

    @case('card-style')
        <div class="p-2">
            <div class="flex flex-col gap-1 text-center">
                <span class="text-sm font-medium dark:text-gray-100">{{ $start }}</span>
                <div class="h-px bg-gradient-to-r {{ $gradientFrom }} {{ $gradientTo }} w-full"></div>
                <span class="text-sm font-medium dark:text-gray-100">{{ $end }}</span>
            </div>
        </div>
        @break

    @case('timeline-dots')
        <div class="flex items-center gap-2 p-2">
            <div class="flex flex-col items-center gap-1">
                <div class="w-2 h-2 rounded-full {{ $bgColor }}"></div>
                <div class="w-0.5 h-8 bg-gradient-to-b {{ $bgColor }}"></div>
                <div class="w-2 h-2 rounded-full {{ $bgColor }}"></div>
            </div>
            <div class="flex flex-col justify-between h-full">
                <span class="text-sm dark:text-gray-100">{{ $start }}</span>
                <span class="text-sm dark:text-gray-100">{{ $end }}</span>
            </div>
        </div>
        @break
    @case('gradient-timeline-dots')
        <div class="flex items-center gap-2 p-2">
            <div class="flex flex-col items-center gap-1 ">
                <div class="w-3 h-3 rounded-full {{ $bgColor }} "></div>
                <div class="w-0.5 h-8 bg-gradient-to-b {{ $gradientFrom }} {{ $gradientTo }} "></div>
                <div class="w-2 h-2 rounded-full bg-transparent"></div>
            </div>
            <div class="flex flex-col justify-between h-full">
                <span class="text-sm dark:text-gray-100">{{ $start }}</span>
                <span class="text-sm dark:text-gray-100">{{ $end }}</span>
            </div>
        </div>
        
        @break

    @case('minimalist-border')
        <div class="border-r-2 {{ $borderColor }} pr-2 py-1">
            <div class="flex flex-col">
                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $start }}</span>
                <span class="text-sm text-gray-900 dark:text-gray-100">{{ $end }}</span>
            </div>
        </div>
        @break

    @case('simple-stack')
        <div class="flex flex-col p-2 rounded">
            <span class="text-sm font-medium dark:text-gray-100">{{ $start }}</span>
            <span class="text-xs text-gray-500 dark:text-gray-400">{{ __('filament-date-manager::translations.to') }}</span>
            <span class="text-sm font-medium dark:text-gray-100">{{ $end }}</span>
        </div>
        @break

    @case('inline-pill')
        <div class="inline-flex items-center px-3 py-1 bg-gray-100 dark:bg-gray-800 rounded-full">
            <span class="text-sm font-medium dark:text-gray-100">{{ $start }}</span>
            <span class="mx-2 {{ $textColor }}">•</span>
            <span class="text-sm font-medium dark:text-gray-100">{{ $end }}</span>
        </div>
        @break

    @case('minimal-dash')
        <div class="inline-flex items-center gap-2">
            <span class="text-sm font-medium dark:text-gray-100">{{ $start }}</span>
            <span class="{{ $textColor }}">—</span>
            <span class="text-sm font-medium dark:text-gray-100">{{ $end }}</span>
        </div>
        @break

    @case('clean-separator')
        <div class="flex items-center gap-2 px-3 py-1.5 rounded">
            <span class="text-sm font-medium dark:text-gray-100">{{ $start }}</span>
            <div class="h-4 w-px bg-gradient-to-b {{ $gradientFrom }} {{ $gradientTo }}"></div>
            <span class="text-sm font-medium dark:text-gray-100">{{ $end }}</span>
        </div>
        @break

    @case('basic-label')
        <div class="inline-flex flex-col">
            <div class="text-sm">
                <span class="font-medium dark:text-gray-100">{{ $start }}</span>
                <span class="{{ $textColor }} mx-1">{{ __('filament-date-manager::translations.to') }}</span>
                <span class="font-medium dark:text-gray-100">{{ $end }}</span>
            </div>
        </div>
        @break

    @default
        <div class="inline-flex items-center gap-2 px-3 py-1.5 text-sm">
            <span class="font-medium dark:text-gray-100">{{ $start }}</span>
            <svg class="w-4 h-4 {{ $textColor }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5l7 7-7 7"></path>
            </svg>
            <span class="font-medium dark:text-gray-100">{{ $end }}</span>
        </div>
@endswitch
