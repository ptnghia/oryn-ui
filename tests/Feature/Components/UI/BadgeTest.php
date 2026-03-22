<?php

use Oryn\UI\Components\UI\Badge;

test('badge renders as dot without content', function () {
    $view = $this->blade('<x-oryn-badge />');
    $view->assertSee('badge-dot');
});

test('badge renders with numeric content', function () {
    $view = $this->blade('<x-oryn-badge :content="5" />');
    $view->assertSee('5');
    $view->assertSee('bg-error');
});

test('badge renders with max count overflow', function () {
    $badge = new Badge(content: 150, maxCount: 99);
    expect($badge->displayContent())->toBe('99+');
});

test('badge renders with string content', function () {
    $view = $this->blade('<x-oryn-badge content="NEW" />');
    $view->assertSee('NEW');
});

test('badge wraps children', function () {
    $view = $this->blade('<x-oryn-badge :content="3"><span>Child</span></x-oryn-badge>');
    $view->assertSee('badge-wrapper');
    $view->assertSee('badge-inner');
    $view->assertSee('Child');
});

test('badge isDot returns true when no content', function () {
    $badge = new Badge();
    expect($badge->isDot())->toBeTrue();
});
