<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness;

use GavG\WordpressPhpUnitHarness\Hooks\HookTestStart;
use PHPUnit\Runner\Extension\Extension;
use PHPUnit\Runner\Extension\Facade;
use PHPUnit\Runner\Extension\ParameterCollection;
use PHPUnit\TextUI\Configuration\Configuration;

abstract class AbstractWpBoot implements Extension
{
    /**
     * Path to the root of the WordPress installation
     *
     * @return string
     */
    protected function wpRoot(): string
    {
        return '/var/www/html';
    }

    /**
     * Plugin paths to activate before tests start
     *
     * @return string[]
     */
    protected function pluginPaths(): array
    {
        return [];
    }

    /**
     * Callbacks to run before tests start
     * E.G. seeding test pages
     *
     * @return callable[]
     */
    protected function beforeTests(): array
    {
        return [];
    }

    public function bootstrap(
        Configuration $configuration,
        Facade $facade,
        ParameterCollection $parameters
    ): void {
        $facade->registerSubscriber(
            new HookTestStart(
                wpRoot: $this->wpRoot(),
                pluginPaths: $this->pluginPaths(),
                callbacks: $this->beforeTests(),
            )
        );
    }
}
