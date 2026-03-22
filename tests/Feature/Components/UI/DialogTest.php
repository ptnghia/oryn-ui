<?php

test('dialog renders with trigger', function () {
    $view = $this->blade('
        <x-oryn-dialog>
            <x-slot:trigger><button>Open</button></x-slot:trigger>
            Dialog content
        </x-oryn-dialog>
    ');
    $view->assertSee('Open');
    $view->assertSee('Dialog content');
    $view->assertSee('x-data');
});

test('dialog renders with header and footer', function () {
    $view = $this->blade('
        <x-oryn-dialog>
            <x-slot:header>Title</x-slot:header>
            Body
            <x-slot:footer>Actions</x-slot:footer>
        </x-oryn-dialog>
    ');
    $view->assertSee('dialog-header');
    $view->assertSee('Title');
    $view->assertSee('dialog-footer');
    $view->assertSee('Actions');
});

test('dialog renders closable button', function () {
    $view = $this->blade('<x-oryn-dialog>Content</x-oryn-dialog>');
    $view->assertSee('close-button');
});

test('dialog renders without close button', function () {
    $view = $this->blade('<x-oryn-dialog :closable="false">Content</x-oryn-dialog>');
    $view->assertDontSee('close-button');
});

test('dialog has teleport to body', function () {
    $view = $this->blade('<x-oryn-dialog>Content</x-oryn-dialog>');
    $view->assertSee('x-teleport="body"', false);
});

test('dialog has overlay', function () {
    $view = $this->blade('<x-oryn-dialog>Content</x-oryn-dialog>');
    $view->assertSee('dialog-overlay');
});

test('dialog handles escape key', function () {
    $view = $this->blade('<x-oryn-dialog>Content</x-oryn-dialog>');
    $view->assertSee('keydown.escape');
});

test('dialog renders custom width', function () {
    $view = $this->blade('<x-oryn-dialog :width="800">Content</x-oryn-dialog>');
    $view->assertSee('max-width: 800px');
});
