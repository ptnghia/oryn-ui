<?php

test('segment renders with default props', function () {
    $view = $this->blade('<x-oryn-segment><x-oryn-segment-item value="a">A</x-oryn-segment-item></x-oryn-segment>');
    $view->assertSee('segment');
    $view->assertSee('x-data');
    $view->assertSee('bg-gray-100');
});

test('segment renders with initial value', function () {
    $view = $this->blade('<x-oryn-segment value="b"><x-oryn-segment-item value="b">B</x-oryn-segment-item></x-oryn-segment>');
    $view->assertSee("active: 'b'", false);
});

test('segment-item renders with correct value', function () {
    $view = $this->blade('<x-oryn-segment><x-oryn-segment-item value="tab1">Tab 1</x-oryn-segment-item></x-oryn-segment>');
    $view->assertSee('Tab 1');
    $view->assertSee("select('tab1')", false);
});

test('segment-item renders disabled', function () {
    $view = $this->blade('<x-oryn-segment><x-oryn-segment-item value="x" :disabled="true">X</x-oryn-segment-item></x-oryn-segment>');
    $view->assertSee('segment-item-disabled');
});

test('segment-item renders with size classes', function () {
    $component = new \Oryn\UI\Components\UI\SegmentItem(value: 'a', size: 'lg');
    expect($component->sizeClass())->toContain('h-12');
});
