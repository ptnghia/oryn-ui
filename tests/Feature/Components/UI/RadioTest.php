<?php

test('radio renders with default props', function () {
    $view = $this->blade('<x-oryn-radio />');
    $view->assertSee('radio-label');
    $view->assertSee('type="radio"', false);
    $view->assertSee('radio peer');
});

test('radio renders with label', function () {
    $view = $this->blade('<x-oryn-radio label="Option A" />');
    $view->assertSee('Option A');
});

test('radio renders checked', function () {
    $view = $this->blade('<x-oryn-radio :checked="true" />');
    $view->assertSee('checked');
});

test('radio renders disabled', function () {
    $view = $this->blade('<x-oryn-radio :disabled="true" label="Disabled" />');
    $view->assertSee('disabled');
    $view->assertSee('opacity-50');
});

test('radio renders with name and value', function () {
    $view = $this->blade('<x-oryn-radio name="color" value="red" />');
    $view->assertSee('name="color"', false);
    $view->assertSee('value="red"', false);
});

test('radio renders with slot content', function () {
    $view = $this->blade('<x-oryn-radio>Custom radio</x-oryn-radio>');
    $view->assertSee('Custom radio');
});

test('radio-group renders', function () {
    $view = $this->blade('<x-oryn-radio-group><x-oryn-radio label="A" /><x-oryn-radio label="B" /></x-oryn-radio-group>');
    $view->assertSee('radio-group');
    $view->assertSee('A');
    $view->assertSee('B');
});

test('radio-group renders vertical', function () {
    $view = $this->blade('<x-oryn-radio-group :vertical="true"><x-oryn-radio label="A" /></x-oryn-radio-group>');
    $view->assertSee('vertical');
});
