<?php

namespace Edfx\EdfxFullCalendar;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Css;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FullCalendarServiceProvider extends PackageServiceProvider
{
    public static string $name = 'edfx-fullcalendar';

    public static string $viewNamespace = 'edfx-fullcalendar';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasViews();
    }

    public function packageBooted(): void
    {
        FilamentAsset::register(
            $this->getAssets(),
            $this->getAssetPackageName(),
        );
    }

    protected function getAssetPackageName(): ?string
    {
        return 'edfx/edfx-fullcalendar';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            AlpineComponent::make('edfx-fullcalendar', __DIR__ . '/../dist/fullcalendar.js'),
            Css::make('edfx-fullcalendar-styles', __DIR__ . '/../dist/fullcalendar.css'),
        ];
    }
}
