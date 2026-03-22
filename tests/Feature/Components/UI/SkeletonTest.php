<?php

test('skeleton renders block variant by default', function () {
    $view = $this->blade('<x-oryn-skeleton />');
    $view->assertSee('skeleton');
    $view->assertSee('skeleton-block');
    $view->assertSee('animate-pulse');
});

test('skeleton renders circle variant', function () {
    $view = $this->blade('<x-oryn-skeleton variant="circle" />');
    $view->assertSee('skeleton-circle');
});

test('skeleton renders without animation', function () {
    $view = $this->blade('<x-oryn-skeleton :animation="false" />');
    $view->assertDontSee('animate-pulse');
});

test('skeleton renders with custom dimensions', function () {
    $view = $this->blade('<x-oryn-skeleton :width="200" :height="20" />');
    $view->assertSee('width: 200px');
    $view->assertSee('height: 20px');
});

test('skeleton renders with string dimensions', function () {
    $view = $this->blade('<x-oryn-skeleton width="100%" height="1rem" />');
    $view->assertSee('width: 100%');
    $view->assertSee('height: 1rem');
});
