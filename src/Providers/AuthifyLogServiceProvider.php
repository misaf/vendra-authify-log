<?php

declare(strict_types=1);

namespace Misaf\VendraAuthifyLog\Providers;

use Filament\Panel;
use Illuminate\Foundation\Console\AboutCommand;
use Illuminate\Support\ServiceProvider;
use Misaf\VendraAuthifyLog\AuthifyLogPlugin;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;

final class AuthifyLogServiceProvider extends ServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('vendra-authify-log')
            ->hasTranslations()
            ->hasConfigFile()
            ->hasMigration('create_vendra_authify_logs_table')
            ->hasInstallCommand(function (InstallCommand $command): void {
                $command->askToStarRepoOnGitHub('misaf/vendra-authify-log');
            });
    }

    public function packageRegistered(): void
    {
        Panel::configureUsing(function (Panel $panel): void {
            if ('admin' !== $panel->getId()) {
                return;
            }

            $panel->plugin(AuthifyLogPlugin::make());
        });
    }

    public function packageBooted(): void
    {
        AboutCommand::add('Vendra Authify Log', fn() => ['Version' => 'dev-master']);
    }
}
