<?php

namespace PaulHennell\ActionableMessages;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use PaulHennell\ActionableMessages\Commands\ActionableMessagesCommand;

class ActionableMessagesServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         */
        $package
            ->name('actionable-messages-for-laravel')
            ->hasConfigFile()
            ->hasCommand(ActionableMessagesCommand::class);
    }
}
