<?php

test('date-picker renders with default state', function () {
    $view = $this->blade('<x-oryn-date-picker />');
    $view->assertSee('picker');
    $view->assertSee('x-data');
    $view->assertSee('Select date');
});

test('date-picker renders with custom placeholder', function () {
    $view = $this->blade('<x-oryn-date-picker placeholder="Pick a date" />');
    $view->assertSee('Pick a date');
});

test('date-picker renders with size variants', function () {
    $view = $this->blade('<x-oryn-date-picker size="sm" />');
    $view->assertSee('input-sm');

    $view = $this->blade('<x-oryn-date-picker size="lg" />');
    $view->assertSee('input-lg');
});

test('date-picker renders with disabled state', function () {
    $view = $this->blade('<x-oryn-date-picker :disabled="true" />');
    $view->assertSee('disabled');
});

test('date-picker renders with invalid state', function () {
    $view = $this->blade('<x-oryn-date-picker :invalid="true" />');
    $view->assertSee('input-invalid');
});

test('date-picker renders calendar panel', function () {
    $view = $this->blade('<x-oryn-date-picker />');
    $view->assertSee('picker-panel');
    $view->assertSee('picker-table');
    $view->assertSee('day-picker');
});

test('date-picker renders with name for form submission', function () {
    $view = $this->blade('<x-oryn-date-picker name="birthday" />');
    $view->assertSee('name="birthday"', false);
});

test('date-picker renders clearable footer', function () {
    $view = $this->blade('<x-oryn-date-picker :clearable="true" />');
    $view->assertSee('Clear');
    $view->assertSee('Today');
});

test('date-picker renders inline mode', function () {
    $view = $this->blade('<x-oryn-date-picker :inline="true" />');
    $view->assertSee('picker-panel');
    $view->assertDontSee('cursor-pointer');
});

test('date-picker has month/year navigation', function () {
    $view = $this->blade('<x-oryn-date-picker />');
    $view->assertSee('prevMonth');
    $view->assertSee('nextMonth');
    $view->assertSee('picker-direction-button');
});

test('date-picker has month and year views', function () {
    $view = $this->blade('<x-oryn-date-picker />');
    $view->assertSee('month-table');
    $view->assertSee('year-table');
});

test('date-picker renders calendar icon', function () {
    $view = $this->blade('<x-oryn-date-picker />');
    $view->assertSee('<svg', false);
});