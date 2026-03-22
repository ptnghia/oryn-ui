<?php

test('input renders with default styling', function () {
    $view = $this->blade('<x-oryn-input placeholder="Enter text" />');
    $view->assertSee('input');
    $view->assertSee('placeholder="Enter text"', false);
});

test('input renders disabled', function () {
    $view = $this->blade('<x-oryn-input :disabled="true" />');
    $view->assertSee('input-disabled');
});

test('input renders invalid', function () {
    $view = $this->blade('<x-oryn-input :invalid="true" />');
    $view->assertSee('input-invalid');
});

test('input renders as textarea', function () {
    $view = $this->blade('<x-oryn-input :text-area="true">Content</x-oryn-input>');
    $view->assertSee('input-textarea');
    $view->assertSee('<textarea', false);
});

test('input renders with prefix', function () {
    $view = $this->blade('<x-oryn-input prefix="$" />');
    $view->assertSee('input-wrapper');
    $view->assertSee('input-suffix-start');
});

test('input renders with suffix', function () {
    $view = $this->blade('<x-oryn-input suffix=".00" />');
    $view->assertSee('input-suffix-end');
});

test('input group renders', function () {
    $view = $this->blade('
        <x-oryn-input-group>
            <x-oryn-input-addon>@</x-oryn-input-addon>
            <x-oryn-input placeholder="Username" />
        </x-oryn-input-group>
    ');
    $view->assertSee('input-group');
    $view->assertSee('input-addon');
});
