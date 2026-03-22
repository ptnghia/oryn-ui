<?php

test('carousel renders with default props', function () {
    $view = $this->blade('
        <x-oryn-carousel>
            <div class="w-full shrink-0">Slide 1</div>
            <div class="w-full shrink-0">Slide 2</div>
        </x-oryn-carousel>
    ');
    $view->assertSee('Slide 1');
    $view->assertSee('Slide 2');
    $view->assertSee('x-data');
    $view->assertSee('overflow-hidden');
});

test('carousel renders navigation arrows', function () {
    $view = $this->blade('
        <x-oryn-carousel>
            <div>S1</div><div>S2</div>
        </x-oryn-carousel>
    ');
    $view->assertSee('prev()');
    $view->assertSee('next()');
});

test('carousel hides arrows when disabled', function () {
    $view = $this->blade('
        <x-oryn-carousel :showArrow="false">
            <div>S1</div><div>S2</div>
        </x-oryn-carousel>
    ');
    // No arrow buttons rendered (methods still exist in x-data but buttons are hidden)
    $view->assertDontSee('left-2 top-1/2');
});

test('carousel renders indicators', function () {
    $view = $this->blade('
        <x-oryn-carousel>
            <div>S1</div><div>S2</div>
        </x-oryn-carousel>
    ');
    $view->assertSee('goTo(i)');
    $view->assertSee('bg-primary');
});

test('carousel hides indicators when disabled', function () {
    $view = $this->blade('
        <x-oryn-carousel :showIndicators="false">
            <div>S1</div><div>S2</div>
        </x-oryn-carousel>
    ');
    $view->assertDontSee('goTo(i)');
});

test('carousel renders with auto play', function () {
    $view = $this->blade('
        <x-oryn-carousel :autoPlay="true" :autoPlayInterval="5000">
            <div>S1</div><div>S2</div>
        </x-oryn-carousel>
    ');
    $view->assertSee('autoPlay: true');
    $view->assertSee('interval: 5000');
});

test('carousel renders with loop', function () {
    $view = $this->blade('
        <x-oryn-carousel :loop="true">
            <div>S1</div><div>S2</div>
        </x-oryn-carousel>
    ');
    $view->assertSee('loop: true');
});