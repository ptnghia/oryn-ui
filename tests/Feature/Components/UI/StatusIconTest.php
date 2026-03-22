<?php

use Oryn\UI\Components\UI\StatusIcon;

test('status icon renders success type', function () {
    $view = $this->blade('<x-oryn-status-icon type="success" />');
    $view->assertSee('text-success');
});

test('status icon renders danger type', function () {
    $view = $this->blade('<x-oryn-status-icon type="danger" />');
    $view->assertSee('text-error');
});

test('status icon renders info type by default', function () {
    $view = $this->blade('<x-oryn-status-icon />');
    $view->assertSee('text-info');
});

test('status icon renders warning type', function () {
    $view = $this->blade('<x-oryn-status-icon type="warning" />');
    $view->assertSee('text-warning');
});

test('status icon respects custom icon color', function () {
    $icon = new StatusIcon(type: 'success', iconColor: 'text-purple-500');
    expect($icon->iconColorClass())->toBe('text-purple-500');
});

test('status icon renders custom slot content', function () {
    $view = $this->blade('<x-oryn-status-icon type="success"><svg class="custom-icon"></svg></x-oryn-status-icon>');
    $view->assertSee('custom-icon');
});
