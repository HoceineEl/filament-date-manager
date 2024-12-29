<?php

namespace HoceineEl\FilamentDateManager;


use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;

class FilamentDateManagerServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('filament-date-manager')
            ->hasTranslations()
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->askToStarRepoOnGitHub('hoceineel/filament-date-manager');
            })
            ->hasViews();
    }

    public function packageBooted()
    {
        FilamentAsset::register([
            Css::make('filament-date-manager', __DIR__ . '/../resources/dist/filament-date-manager.css'),
        ], package: 'hoceineel/filament-date-manager');

    }
}
