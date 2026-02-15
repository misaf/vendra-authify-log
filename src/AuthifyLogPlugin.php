<?php

declare(strict_types=1);

namespace Misaf\VendraAuthifyLog;

use Filament\Contracts\Plugin;
use Filament\Panel;

class AuthifyLogPlugin implements Plugin
{
    public function getId(): string
    {
        return 'vendra-authify-log';
    }

    public static function make(): static
    {
        /** @var static $plugin */
        $plugin = app(static::class);

        return $plugin;
    }

    public function register(Panel $panel): void
    {
        $panel
            ->discoverPages(
                in: __DIR__ . '/Filament/Pages',
                for: 'Misaf\\VendraAuthifyLog\\Filament\\Pages',
            )
            ->discoverResources(
                in: __DIR__ . '/Filament/Resources',
                for: 'Misaf\\VendraAuthifyLog\\Filament\\Resources',
            )
            ->discoverWidgets(
                in: __DIR__ . '/Filament/Widgets',
                for: 'Misaf\\VendraAuthifyLog\\Filament\\Widgets',
            );
    }

    public function boot(Panel $panel): void {}
}
