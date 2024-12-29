<?php

namespace HoceineEl\FilamentDateManager;

use Filament\Panel;
use Filament\Contracts\Plugin;



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
