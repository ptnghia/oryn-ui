<?php

test('date-time-picker renders with default state', function () {
    $view = $this->blade('<x-oryn-date-time-picker />');
    $view->assertSee('picker');
    $view->assertSee('x-data');
    $view->assertSee('Select date &amp; time', false);
});

test('date-time-picker renders with custom placeholder', function () {
    $view = $this->blade('<x-oryn-date-time-picker placeholder="Select datetime" />');
    $view->assertSee('Select datetime');
});

test('date-time-picker renders calendar and time sections', function () {
    $view = $this->blade('<x-oryn-date-time-picker />');
    $view->assertSee('picker-panel');
    $view->assertSee('picker-table');
    $view->assertSee('time-input-wrapper');
});

test('date-time-picker renders time controls', function () {
    $view = $this->blade('<x-oryn-date-time-picker />');
    $view->assertSee('incrementHour');
    $view->assertSee('decrementHour');
    $view->assertSee('incrementMinute');
    $view->assertSee('decrementMinute');
});

test('date-time-picker renders with name for form submission', function () {
    $view = $this->blade('<x-oryn-date-time-picker name="event_at" />');
    $view->assertSee('name="event_at"', false);
});

test('date-time-picker renders with disabled state', function () {
    $view = $this->blade('<x-oryn-date-time-picker :disabled="true" />');
    $view->assertSee('disabled');
});

test('date-time-picker renders clearable footer', function () {
    $view = $this->blade('<x-oryn-date-time-picker :clearable="true" />');
    $view->assertSee('Clear');
    $view->assertSee('OK');
});

test('date-time-picker renders 12-hour mode', function () {
    $view = $this->blade('<x-oryn-date-time-picker :use12Hours="true" />');
    $view->assertSee('use12Hours: true', false);
    $view->assertSee('toggleAmPm');
});
