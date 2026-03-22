<?php

test('select renders with default state', function () {
    $view = $this->blade('<x-oryn-select />');
    $view->assertSee('select');
    $view->assertSee('x-data');
    $view->assertSee('Select...');
});

test('select renders with custom placeholder', function () {
    $view = $this->blade('<x-oryn-select placeholder="Choose one" />');
    $view->assertSee('Choose one');
});

test('select renders with size variants', function () {
    $view = $this->blade('<x-oryn-select size="sm" />');
    $view->assertSee('select-sm');

    $view = $this->blade('<x-oryn-select size="lg" />');
    $view->assertSee('select-lg');
});

test('select renders with options', function () {
    $view = $this->blade('<x-oryn-select :options="$options" />', [
        'options' => [
            ['value' => 'a', 'label' => 'Option A'],
            ['value' => 'b', 'label' => 'Option B'],
        ],
    ]);
    $view->assertSee('Option A');
    $view->assertSee('Option B');
});

test('select renders with multiple mode', function () {
    $view = $this->blade('<x-oryn-select :multiple="true" />');
    $view->assertSee('multiple: true', false);
});

test('select renders with searchable mode', function () {
    $view = $this->blade('<x-oryn-select :searchable="true" />');
    $view->assertSee('searchable: true', false);
    $view->assertSee('select-input-container');
});

test('select renders with clearable button', function () {
    $view = $this->blade('<x-oryn-select :clearable="true" />');
    $view->assertSee('select-clear-indicator');
});

test('select renders with disabled state', function () {
    $view = $this->blade('<x-oryn-select :disabled="true" />');
    $view->assertSee('opacity-50');
    $view->assertSee('cursor-not-allowed');
});

test('select renders with invalid state', function () {
    $view = $this->blade('<x-oryn-select :invalid="true" />');
    $view->assertSee('select-control-invalid');
});

test('select renders with name for form submission', function () {
    $view = $this->blade('<x-oryn-select name="color" />');
    $view->assertSee('name="color"', false);
});

test('select has keyboard navigation', function () {
    $view = $this->blade('<x-oryn-select />');
    $view->assertSee('onKeydown');
    $view->assertSee('ArrowDown');
    $view->assertSee('ArrowUp');
});

test('select has ARIA attributes', function () {
    $view = $this->blade('<x-oryn-select />');
    $view->assertSee('role="combobox"', false);
    $view->assertSee('aria-haspopup="listbox"', false);
    $view->assertSee('role="listbox"', false);
});
