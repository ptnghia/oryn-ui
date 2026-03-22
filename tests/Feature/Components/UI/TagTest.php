<?php

test('tag renders with default styling', function () {
    $view = $this->blade('<x-oryn-tag>Label</x-oryn-tag>');
    $view->assertSee('tag');
    $view->assertSee('Label');
    $view->assertSee('bg-gray-100');
});

test('tag renders with boolean prefix', function () {
    $view = $this->blade('<x-oryn-tag :prefix="true">Tagged</x-oryn-tag>');
    $view->assertSee('tag-affix tag-prefix');
    $view->assertSee('Tagged');
});

test('tag renders with boolean suffix', function () {
    $view = $this->blade('<x-oryn-tag :suffix="true">Tagged</x-oryn-tag>');
    $view->assertSee('tag-affix tag-suffix');
});

test('tag renders custom classes', function () {
    $view = $this->blade('<x-oryn-tag class="bg-primary text-white">Custom</x-oryn-tag>');
    $view->assertSee('bg-primary');
    $view->assertSee('Custom');
});
