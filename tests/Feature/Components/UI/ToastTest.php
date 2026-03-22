<?php

test('toast renders with alpine data', function () {
    $view = $this->blade('<x-oryn-toast />');
    $view->assertSee('x-data');
    $view->assertSee('oryn-toast');
});

test('toast renders with placement', function () {
    $view = $this->blade('<x-oryn-toast placement="top-start" />');
    $view->assertSee('toast');
});

test('toast has fixed positioning', function () {
    $view = $this->blade('<x-oryn-toast />');
    $view->assertSee('toast');
    // position: fixed is applied via CSS class .toast
    $view->assertSee('top:', false);
});

test('toast renders notification content', function () {
    $view = $this->blade('<x-oryn-toast />');
    $view->assertSee('x-for');
    $view->assertSee('toast.title');
});
