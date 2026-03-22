<?php

test('auto-complete renders with default state', function () {
    $view = $this->blade('<x-oryn-auto-complete />');
    $view->assertSee('autocomplete');
    $view->assertSee('x-data');
    $view->assertSee('Type to search...');
});

test('auto-complete renders with custom placeholder', function () {
    $view = $this->blade('<x-oryn-auto-complete placeholder="Search users..." />');
    $view->assertSee('Search users...');
});

test('auto-complete renders with options', function () {
    $view = $this->blade('<x-oryn-auto-complete :options="$options" />', [
        'options' => [
            ['value' => 'us', 'label' => 'United States'],
            ['value' => 'uk', 'label' => 'United Kingdom'],
        ],
    ]);
    $view->assertSee('United States');
    $view->assertSee('United Kingdom');
});

test('auto-complete renders with sizes', function () {
    $view = $this->blade('<x-oryn-auto-complete size="sm" />');
    $view->assertSee('input-sm');

    $view = $this->blade('<x-oryn-auto-complete size="lg" />');
    $view->assertSee('input-lg');
});

test('auto-complete renders with clearable button', function () {
    $view = $this->blade('<x-oryn-auto-complete :clearable="true" />');
    $view->assertSee('clear()');
});

test('auto-complete renders with disabled state', function () {
    $view = $this->blade('<x-oryn-auto-complete :disabled="true" />');
    $view->assertSee('disabled');
});

test('auto-complete renders with invalid state', function () {
    $view = $this->blade('<x-oryn-auto-complete :invalid="true" />');
    $view->assertSee('input-invalid');
});

test('auto-complete renders with name for form submission', function () {
    $view = $this->blade('<x-oryn-auto-complete name="city" />');
    $view->assertSee('name="city"', false);
});

test('auto-complete has ARIA attributes', function () {
    $view = $this->blade('<x-oryn-auto-complete />');
    $view->assertSee('role="combobox"', false);
    $view->assertSee('aria-haspopup="listbox"', false);
});
