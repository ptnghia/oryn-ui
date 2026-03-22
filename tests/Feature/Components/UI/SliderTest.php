<?php

test('slider renders with default state', function () {
    $view = $this->blade('<x-oryn-slider />');
    $view->assertSee('slider');
    $view->assertSee('x-data');
    $view->assertSee('slider-track');
    $view->assertSee('slider-thumb');
});

test('slider renders with custom min/max/step', function () {
    $view = $this->blade('<x-oryn-slider :min="10" :max="200" :step="5" />');
    $view->assertSee('min: 10', false);
    $view->assertSee('max: 200', false);
    $view->assertSee('step: 5', false);
});

test('slider renders with initial value', function () {
    $view = $this->blade('<x-oryn-slider :value="50" />');
    $view->assertSee('[50]');
});

test('slider renders range mode', function () {
    $view = $this->blade('<x-oryn-slider :range="true" :value="[20, 80]" />');
    $view->assertSee('isRange: true', false);
    $html = (string) $view;
    // Range mode has two thumb wrappers
    expect(substr_count($html, 'slider-thumb-wrapper'))->toBe(2);
});

test('slider renders with disabled state', function () {
    $view = $this->blade('<x-oryn-slider :disabled="true" />');
    $view->assertSee('opacity-50');
    $view->assertSee('cursor-not-allowed');
});

test('slider renders tooltip', function () {
    $view = $this->blade('<x-oryn-slider :tooltip="true" />');
    $view->assertSee('slider-tooltip');
});

test('slider renders without tooltip', function () {
    $view = $this->blade('<x-oryn-slider :tooltip="false" />');
    $view->assertDontSee('slider-tooltip');
});

test('slider renders with name for form submission', function () {
    $view = $this->blade('<x-oryn-slider name="volume" />');
    $view->assertSee('name="volume"', false);
});

test('slider has ARIA attributes', function () {
    $view = $this->blade('<x-oryn-slider />');
    $view->assertSee('role="slider"', false);
    $view->assertSee('aria-valuenow');
    $view->assertSee('aria-valuemin');
    $view->assertSee('aria-valuemax');
});

test('slider has drag handlers', function () {
    $view = $this->blade('<x-oryn-slider />');
    $view->assertSee('mousedown');
    $view->assertSee('touchstart');
});
