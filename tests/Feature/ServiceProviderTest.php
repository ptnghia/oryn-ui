<?php

use Oryn\UI\OrynUIServiceProvider;

test('service provider is registered', function () {
    $this->assertInstanceOf(
        OrynUIServiceProvider::class,
        $this->app->getProvider(OrynUIServiceProvider::class)
    );
});

test('config is loaded', function () {
    $this->assertNotNull(config('oryn-ui'));
    $this->assertEquals('md', config('oryn-ui.control_size'));
    $this->assertEquals('ltr', config('oryn-ui.direction'));
});

test('views are registered', function () {
    $this->assertTrue(
        $this->app['view']->exists('oryn-ui::components.ui.alert')
    );
    $this->assertTrue(
        $this->app['view']->exists('oryn-ui::components.ui.button')
    );
});