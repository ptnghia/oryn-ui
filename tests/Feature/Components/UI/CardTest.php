<?php

test('card renders with shadow by default', function () {
    $view = $this->blade('<x-oryn-card>Content</x-oryn-card>');
    $view->assertSee('card');
    $view->assertSee('card-shadow');
    $view->assertSee('card-body');
    $view->assertSee('Content');
});

test('card renders with border', function () {
    $view = $this->blade('<x-oryn-card :bordered="true">Content</x-oryn-card>');
    $view->assertSee('card-border');
});

test('card renders with header', function () {
    $view = $this->blade('
        <x-oryn-card>
            <x-slot:header>Title</x-slot:header>
            Body
        </x-oryn-card>
    ');
    $view->assertSee('card-header');
    $view->assertSee('Title');
});

test('card renders with footer', function () {
    $view = $this->blade('
        <x-oryn-card>
            Body
            <x-slot:footer>Footer</x-slot:footer>
        </x-oryn-card>
    ');
    $view->assertSee('card-footer');
    $view->assertSee('Footer');
});

test('card renders with header border', function () {
    $view = $this->blade('
        <x-oryn-card :header-bordered="true">
            <x-slot:header>Title</x-slot:header>
            Body
        </x-oryn-card>
    ');
    $view->assertSee('card-header-border');
});

test('card renders clickable', function () {
    $view = $this->blade('<x-oryn-card :clickable="true">Click me</x-oryn-card>');
    $view->assertSee('cursor-pointer');
});

test('card renders with custom body class', function () {
    $view = $this->blade('<x-oryn-card body-class="p-0">Content</x-oryn-card>');
    $view->assertSee('p-0');
});
