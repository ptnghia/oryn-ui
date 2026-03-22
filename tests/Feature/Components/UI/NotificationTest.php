<?php

test('notification renders with title', function () {
    $view = $this->blade('<x-oryn-notification title="Hello">Body text</x-oryn-notification>');
    $view->assertSee('notification');
    $view->assertSee('Hello');
    $view->assertSee('Body text');
    $view->assertSee('notification-title');
});

test('notification renders with type icon', function () {
    $view = $this->blade('<x-oryn-notification type="success" title="Done">Completed</x-oryn-notification>');
    $view->assertSee('notification');
    $view->assertSee('Done');
});

test('notification renders closable', function () {
    $view = $this->blade('<x-oryn-notification :closable="true" title="Notice">Content</x-oryn-notification>');
    $view->assertSee('x-data');
    $view->assertSee('notification-close');
});

test('notification renders with custom width', function () {
    $view = $this->blade('<x-oryn-notification :width="500" title="Wide">Content</x-oryn-notification>');
    $view->assertSee('width: 500px');
});

test('notification renders without children', function () {
    $view = $this->blade('<x-oryn-notification title="Title only" />');
    $view->assertSee('no-child');
});
