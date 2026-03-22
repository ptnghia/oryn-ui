<?php

test('dropdown renders with toggle', function () {
    $view = $this->blade('
        <x-oryn-dropdown>
            <x-slot:toggle><button>Menu</button></x-slot:toggle>
            <x-oryn-dropdown-item>Item 1</x-oryn-dropdown-item>
        </x-oryn-dropdown>
    ');
    $view->assertSee('Menu');
    $view->assertSee('Item 1');
    $view->assertSee('x-data');
});

test('dropdown renders with placement class', function () {
    $view = $this->blade('
        <x-oryn-dropdown placement="bottom-end">
            <x-slot:toggle><button>Menu</button></x-slot:toggle>
            <x-oryn-dropdown-item>Item</x-oryn-dropdown-item>
        </x-oryn-dropdown>
    ');
    $view->assertSee('bottom-end');
});

test('dropdown has click outside handler', function () {
    $view = $this->blade('
        <x-oryn-dropdown>
            <x-slot:toggle><button>Menu</button></x-slot:toggle>
            <x-oryn-dropdown-item>Item</x-oryn-dropdown-item>
        </x-oryn-dropdown>
    ');
    $view->assertSee('click.outside');
});

test('dropdown-item renders as link', function () {
    $view = $this->blade('<x-oryn-dropdown-item href="/test">Link</x-oryn-dropdown-item>');
    $view->assertSee('href="/test"', false);
    $view->assertSee('Link');
});

test('dropdown-item renders as divider', function () {
    $view = $this->blade('<x-oryn-dropdown-item variant="divider" />');
    $view->assertSee('menu-item-divider');
});

test('dropdown-item renders as header', function () {
    $view = $this->blade('<x-oryn-dropdown-item variant="header">Header</x-oryn-dropdown-item>');
    $view->assertSee('menu-title');
    $view->assertSee('Header');
});

test('dropdown-item renders disabled', function () {
    $view = $this->blade('<x-oryn-dropdown-item :disabled="true">Disabled</x-oryn-dropdown-item>');
    $view->assertSee('menu-item-disabled');
});

test('dropdown-item renders active state', function () {
    $view = $this->blade('<x-oryn-dropdown-item :active="true">Active</x-oryn-dropdown-item>');
    $view->assertSee('menu-item-active');
});
