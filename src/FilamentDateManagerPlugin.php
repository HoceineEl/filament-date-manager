<?php

namespace HoceineEl\Fab;

use Filament\Panel;
use Filament\Contracts\Plugin;
use Filament\View\PanelsRenderHook;
use HoceineEl\Fab\Concerns\HasRenderHooksScopes;
use Illuminate\Support\Facades\Blade;


class FilamentDateManagerPlugin implements Plugin
{
    public static function make()
    {
        return app(static::class);
    }
    public function getId(): string
    {
        return 'filament-date-manager';
    }
    public function register(Panel $panel): void {}
    public function boot(Panel $panel): void {}
}
