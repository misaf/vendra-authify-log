<?php

declare(strict_types=1);

namespace Misaf\VendraAuthifyLog\Providers;

use Filament\Panel;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Misaf\VendraAuthifyLog\AuthifyLogPlugin;

final class AuthifyLogServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/authify-log.php', 'vendra-authify-log');

        Panel::configureUsing(function (Panel $panel): void {
            if ('admin' !== $panel->getId()) {
                return;
            }

            $panel->plugin(AuthifyLogPlugin::make());
        });
    }

    public function boot(): void
    {
        AboutCommand::add('Vendra Authify Log', fn() => ['Model' => Config::get('vendra-authify-log.model'), 'Version' => '1.0.0']);

        $this->loadTranslationsFrom(__DIR__ . '/../../lang', 'vendra-authify-log');

        $this->publishes([
            __DIR__ . '/../../config/authify-log.php' => config_path('vendra-authify-log.php'),
        ], 'vendra-authify-log-config');

        $this->publishes([
            __DIR__ . '/../../lang' => lang_path('vendor/vendra-authify-log'),
        ], 'vendra-authify-log-lang');

        $this->publishesMigrations([
            __DIR__ . '/../../database/migrations/' => database_path('migrations')
        ], 'vendra-authify-log-migrations');
    }
}
