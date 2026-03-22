<?php

use Oryn\UI\Components\UI\Spinner;

test('spinner renders with default settings', function () {
    $view = $this->blade('<x-oryn-spinner />');
    $view->assertSee('animate-spin');
    $view->assertSee('text-primary');
});

test('spinner renders with custom size', function () {
    $view = $this->blade('<x-oryn-spinner :size="40" />');
    $view->assertSee('width: 40px');
    $view->assertSee('height: 40px');
});

test('spinner renders without spinning', function () {
    $view = $this->blade('<x-oryn-spinner :is-spinning="false" />');
    $view->assertDontSee('animate-spin');
});

test('spinner renders with custom color', function () {
    $spinner = new Spinner(customColorClass: 'text-red-500');
    expect($spinner->spinnerColor())->toBe('text-red-500');
});
