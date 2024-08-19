<?php

declare(strict_types=1);

namespace GavG\WordpressPhpUnitHarness\Hooks;

use GavG\WordpressPhpUnitHarness\Hooks\Traits\InstallsPlugins;
use GavG\WordpressPhpUnitHarness\Hooks\Traits\InstallsWordpress;
use PHPUnit\Event\TestRunner\ExecutionStarted;
use PHPUnit\Event\TestRunner\ExecutionStartedSubscriber;

class HookTestStart implements ExecutionStartedSubscriber
{
    use InstallsPlugins;
    use InstallsWordpress;

    public function __construct(
        protected string $wpRoot,
        protected array $pluginPaths,
        protected array $callbacks,
    ) {}

    public function notify(ExecutionStarted $event): void
    {
        $this->installWordpress($this->wpRoot);
        $this->installPlugins(...$this->pluginPaths);

        foreach ($this->callbacks as $callback) {
            $callback();
        }
    }
}
