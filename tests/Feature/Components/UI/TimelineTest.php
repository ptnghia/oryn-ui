<?php

test('timeline renders', function () {
    $view = $this->blade('<x-oryn-timeline>items</x-oryn-timeline>');
    $view->assertSee('timeline');
    $view->assertSee('<ul', false);
});

test('timeline item renders with default media', function () {
    $view = $this->blade('<x-oryn-timeline-item>Event happened</x-oryn-timeline-item>');
    $view->assertSee('timeline-item');
    $view->assertSee('timeline-item-media-default');
    $view->assertSee('timeline-connect');
    $view->assertSee('Event happened');
});

test('timeline item renders as last without connector', function () {
    $view = $this->blade('<x-oryn-timeline-item :is-last="true">Last event</x-oryn-timeline-item>');
    $view->assertSee('timeline-item-last');
    $view->assertSee('timeline-item-content-last');
    $view->assertDontSee('timeline-connect');
});

test('timeline item renders custom media', function () {
    $view = $this->blade('
        <x-oryn-timeline-item>
            <x-slot:media><span class="custom-dot"></span></x-slot:media>
            Event
        </x-oryn-timeline-item>
    ');
    $view->assertSee('custom-dot');
    $view->assertDontSee('timeline-item-media-default');
});

test('full timeline renders correctly', function () {
    $view = $this->blade('
        <x-oryn-timeline>
            <x-oryn-timeline-item>First</x-oryn-timeline-item>
            <x-oryn-timeline-item :is-last="true">Last</x-oryn-timeline-item>
        </x-oryn-timeline>
    ');
    $view->assertSee('First');
    $view->assertSee('Last');
});
