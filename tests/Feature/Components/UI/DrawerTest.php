<?php

test('drawer renders with default placement', function () {
    $view = $this->blade('
        <x-oryn-drawer>
            <x-slot:trigger><button>Open</button></x-slot:trigger>
            Drawer content
        </x-oryn-drawer>
    ');
    $view->assertSee('Drawer content');
    $view->assertSee('x-data');
    $view->assertSee('x-teleport="body"', false);
});

test('drawer renders with title', function () {
    $view = $this->blade('<x-oryn-drawer title="Settings">Content</x-oryn-drawer>');
    $view->assertSee('Settings');
    $view->assertSee('drawer-header');
});

test('drawer renders closable button', function () {
    $view = $this->blade('<x-oryn-drawer>Content</x-oryn-drawer>');
    $view->assertSee('close-button');
});

test('drawer renders without close button', function () {
    $view = $this->blade('<x-oryn-drawer :closable="false">Content</x-oryn-drawer>');
    $view->assertDontSee('close-button');
});

test('drawer renders with footer', function () {
    $view = $this->blade('
        <x-oryn-drawer>
            Content
            <x-slot:footer>Footer actions</x-slot:footer>
        </x-oryn-drawer>
    ');
    $view->assertSee('drawer-footer');
    $view->assertSee('Footer actions');
});

test('drawer handles escape key', function () {
    $view = $this->blade('<x-oryn-drawer>Content</x-oryn-drawer>');
    $view->assertSee('keydown.escape');
});
