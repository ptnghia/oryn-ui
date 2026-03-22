<?php

use Oryn\UI\Components\UI\Alert;

test('alert renders with default type', function () {
    $view = $this->blade('<x-oryn-alert>Test message</x-oryn-alert>');
    $view->assertSee('Test message');
    $view->assertSee('alert');
    $view->assertSee('bg-warning-subtle');
});

test('alert renders success type', function () {
    $view = $this->blade('<x-oryn-alert type="success">Success!</x-oryn-alert>');
    $view->assertSee('bg-success-subtle');
    $view->assertSee('text-success');
});

test('alert renders danger type', function () {
    $view = $this->blade('<x-oryn-alert type="danger">Error!</x-oryn-alert>');
    $view->assertSee('bg-error-subtle');
    $view->assertSee('text-error');
});

test('alert renders info type', function () {
    $view = $this->blade('<x-oryn-alert type="info">Info!</x-oryn-alert>');
    $view->assertSee('bg-info-subtle');
    $view->assertSee('text-info');
});

test('alert renders with title', function () {
    $view = $this->blade('<x-oryn-alert title="Alert Title">Body</x-oryn-alert>');
    $view->assertSee('Alert Title');
    $view->assertSee('Body');
    $view->assertSee('font-semibold text-lg mb-1');
});

test('alert renders closable', function () {
    $view = $this->blade('<x-oryn-alert :closable="true">Closable</x-oryn-alert>');
    $view->assertSee('x-data');
    $view->assertSee('x-show');
    $view->assertSee('justify-between');
});

test('alert renders with icon', function () {
    $view = $this->blade('<x-oryn-alert :show-icon="true" type="success">With icon</x-oryn-alert>');
    $view->assertSee('With icon');
});

test('alert component class returns correct type config', function () {
    $alert = new Alert(type: 'success');
    $config = $alert->typeConfig();
    expect($config['bg'])->toBe('bg-success-subtle');
    expect($config['text'])->toBe('text-success');
});
