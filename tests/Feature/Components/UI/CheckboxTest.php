<?php

test('checkbox renders with default props', function () {
    $view = $this->blade('<x-oryn-checkbox />');
    $view->assertSee('checkbox-label');
    $view->assertSee('type="checkbox"', false);
    $view->assertSee('checkbox peer');
});

test('checkbox renders with label', function () {
    $view = $this->blade('<x-oryn-checkbox label="Accept terms" />');
    $view->assertSee('Accept terms');
});

test('checkbox renders with slot content', function () {
    $view = $this->blade('<x-oryn-checkbox>Custom label</x-oryn-checkbox>');
    $view->assertSee('Custom label');
});

test('checkbox renders checked', function () {
    $view = $this->blade('<x-oryn-checkbox :checked="true" />');
    $view->assertSee('checked');
});

test('checkbox renders disabled', function () {
    $view = $this->blade('<x-oryn-checkbox :disabled="true" label="Disabled" />');
    $view->assertSee('disabled');
    $view->assertSee('opacity-50');
});

test('checkbox renders indeterminate SVG', function () {
    $view = $this->blade('<x-oryn-checkbox :indeterminate="true" />');
    $view->assertDontSee('fill-rule="evenodd" d="M16.707');
});

test('checkbox renders with name and value', function () {
    $view = $this->blade('<x-oryn-checkbox name="colors" value="red" />');
    $view->assertSee('name="colors"', false);
    $view->assertSee('value="red"', false);
});

test('checkbox renders custom class', function () {
    $view = $this->blade('<x-oryn-checkbox checkboxClass="text-success" />');
    $view->assertSee('text-success');
});

test('checkbox-group renders', function () {
    $view = $this->blade('<x-oryn-checkbox-group><x-oryn-checkbox label="A" /><x-oryn-checkbox label="B" /></x-oryn-checkbox-group>');
    $view->assertSee('inline-flex');
    $view->assertSee('gap-4');
    $view->assertSee('A');
    $view->assertSee('B');
});

test('checkbox-group renders vertical', function () {
    $view = $this->blade('<x-oryn-checkbox-group :vertical="true"><x-oryn-checkbox label="A" /></x-oryn-checkbox-group>');
    $view->assertSee('flex-col');
});
