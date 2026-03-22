<?php

test('time-input renders with default state', function () {
    $view = $this->blade('<x-oryn-time-input />');
    $view->assertSee('time-input');
    $view->assertSee('x-data');
    $view->assertSee('time-input-wrapper');
});

test('time-input renders hour, minute, second fields', function () {
    $view = $this->blade('<x-oryn-time-input />');
    $view->assertSee('aria-label="Hours"', false);
    $view->assertSee('aria-label="Minutes"', false);
    $view->assertSee('aria-label="Seconds"', false);
});

test('time-input hides seconds when showSeconds is false', function () {
    $view = $this->blade('<x-oryn-time-input :showSeconds="false" />');
    $view->assertDontSee('aria-label="Seconds"');
});

test('time-input renders with sizes', function () {
    $view = $this->blade('<x-oryn-time-input size="sm" />');
    $view->assertSee('input-sm');

    $view = $this->blade('<x-oryn-time-input size="lg" />');
    $view->assertSee('input-lg');
});

test('time-input renders with disabled state', function () {
    $view = $this->blade('<x-oryn-time-input :disabled="true" />');
    $view->assertSee('disabled');
    $view->assertSee('opacity-50');
});

test('time-input renders with invalid state', function () {
    $view = $this->blade('<x-oryn-time-input :invalid="true" />');
    $view->assertSee('input-invalid');
});

test('time-input renders with name for form submission', function () {
    $view = $this->blade('<x-oryn-time-input name="start_time" />');
    $view->assertSee('name="start_time"', false);
});

test('time-input renders 12-hour mode', function () {
    $view = $this->blade('<x-oryn-time-input :use12Hours="true" />');
    $view->assertSee('use12Hours: true', false);
    $view->assertSee('toggleAmPm');
});

test('time-input has keyboard navigation', function () {
    $view = $this->blade('<x-oryn-time-input />');
    $view->assertSee('ArrowUp');
    $view->assertSee('ArrowDown');
});

test('time-input separators render', function () {
    $view = $this->blade('<x-oryn-time-input />');
    $view->assertSee('time-input-separator');
});
