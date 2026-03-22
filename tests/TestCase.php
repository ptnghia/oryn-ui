<?php

namespace Oryn\UI\Tests;

use Oryn\UI\OrynUIServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

/**
 * @mixin \Illuminate\Foundation\Testing\Concerns\InteractsWithViews
 */
abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            OrynUIServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        $app['config']->set('oryn-ui.mode', 'light');
        $app['config']->set('oryn-ui.direction', 'ltr');
    }
}
