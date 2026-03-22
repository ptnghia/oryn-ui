<?php

test('date-picker-range renders with default state', function () {
    $view = $this->blade('<x-oryn-date-picker-range />');
    $view->assertSee('picker');
    $view->assertSee('x-data');
    $view->assertSee('Select date range');
});

test('date-picker-range renders with custom placeholder', function () {
    $view = $this->blade('<x-oryn-date-picker-range placeholder="Pick range" />');
    $view->assertSee('Pick range');
});

test('date-picker-range renders with size variants', function () {
    $view = $this->blade('<x-oryn-date-picker-range size="sm" />');
    $view->assertSee('input-sm');

    $view = $this->blade('<x-oryn-date-picker-range size="lg" />');
    $view->assertSee('input-lg');
});

test('date-picker-range renders with disabled state', function () {
    $view = $this->blade('<x-oryn-date-picker-range :disabled="true" />');
    $view->assertSee('disabled');
});

test('date-picker-range renders with name inputs', function () {
    $view = $this->blade('<x-oryn-date-picker-range name-start="from" name-end="to" />');
    $view->assertSee('name="from"', false);
    $view->assertSee('name="to"', false);
});

test('date-picker-range has range selection logic', function () {
    $view = $this->blade('<x-oryn-date-picker-range />');
    $view->assertSee('rangeStart');
    $view->assertSee('rangeEnd');
    $view->assertSee('selecting');
});

test('date-picker-range renders clearable', function () {
    $view = $this->blade('<x-oryn-date-picker-range :clearable="true" />');
    $view->assertSee('Clear');
});

test('date-picker-range has hover preview', function () {
    $view = $this->blade('<x-oryn-date-picker-range />');
    $view->assertSee('hoverDate');
    $view->assertSee('mouseenter');
});
