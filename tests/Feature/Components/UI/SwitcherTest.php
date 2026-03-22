<?php

test('switcher renders with default props', function () {
    $view = $this->blade('<x-oryn-switcher />');
    $view->assertSee('switcher');
    $view->assertSee('x-data');
    $view->assertSee('switcher-toggle');
});

test('switcher renders checked', function () {
    $view = $this->blade('<x-oryn-switcher :checked="true" />');
    $view->assertSee("on: true");
});

test('switcher renders disabled', function () {
    $view = $this->blade('<x-oryn-switcher :disabled="true" />');
    $view->assertSee('switcher-disabled');
    $view->assertSee('disabled');
});

test('switcher renders with loading spinner', function () {
    $view = $this->blade('<x-oryn-switcher :is-loading="true" />');
    $view->assertSee('switcher-toggle-loading');
});

test('switcher renders with content labels', function () {
    $view = $this->blade('<x-oryn-switcher checkedContent="On" uncheckedContent="Off" />');
    $view->assertSee('switcher-content');
});

test('switcher renders with name', function () {
    $view = $this->blade('<x-oryn-switcher name="notifications" />');
    $view->assertSee('name="notifications"', false);
});
