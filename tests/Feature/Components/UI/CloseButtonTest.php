<?php

test('close button renders with default class', function () {
    $view = $this->blade('<x-oryn-close-button />');
    $view->assertSee('close-button');
    $view->assertSee('button-press-feedback');
    $view->assertSee('type="button"', false);
});

test('close button renders with absolute positioning', function () {
    $view = $this->blade('<x-oryn-close-button :absolute="true" />');
    $view->assertSee('absolute');
    $view->assertSee('z-10');
});

test('close button renders without default class', function () {
    $view = $this->blade('<x-oryn-close-button :reset-default-class="true" />');
    $view->assertDontSee('close-button');
});

test('close button renders custom slot', function () {
    $view = $this->blade('<x-oryn-close-button><span>X</span></x-oryn-close-button>');
    $view->assertSee('<span>X</span>', false);
});
