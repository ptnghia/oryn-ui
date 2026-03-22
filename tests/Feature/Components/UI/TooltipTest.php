<?php

test('tooltip renders with title', function () {
    $view = $this->blade('<x-oryn-tooltip title="Hello"><button>Hover me</button></x-oryn-tooltip>');
    $view->assertSee('tooltip-wrapper');
    $view->assertSee('Hello');
    $view->assertSee('Hover me');
    $view->assertSee('role="tooltip"', false);
});

test('tooltip renders with placement top', function () {
    $view = $this->blade('<x-oryn-tooltip title="Tip" placement="top"><span>T</span></x-oryn-tooltip>');
    $view->assertSee('bottom-full');
    $view->assertSee('mb-2');
});

test('tooltip renders with placement bottom', function () {
    $view = $this->blade('<x-oryn-tooltip title="Tip" placement="bottom"><span>T</span></x-oryn-tooltip>');
    $view->assertSee('top-full');
    $view->assertSee('mt-2');
});

test('tooltip renders with placement left', function () {
    $view = $this->blade('<x-oryn-tooltip title="Tip" placement="left"><span>T</span></x-oryn-tooltip>');
    $view->assertSee('right-full');
});

test('tooltip renders with placement right', function () {
    $view = $this->blade('<x-oryn-tooltip title="Tip" placement="right"><span>T</span></x-oryn-tooltip>');
    $view->assertSee('left-full');
});

test('tooltip renders disabled state', function () {
    $view = $this->blade('<x-oryn-tooltip title="Tip" :disabled="true"><span>T</span></x-oryn-tooltip>');
    $view->assertDontSee('@mouseenter');
});

test('tooltip has alpine transitions', function () {
    $view = $this->blade('<x-oryn-tooltip title="Tip"><span>T</span></x-oryn-tooltip>');
    $view->assertSee('x-show="show"', false);
    $view->assertSee('x-cloak');
});
