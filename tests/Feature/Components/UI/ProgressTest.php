<?php

use Oryn\UI\Components\UI\Progress;

test('progress renders line variant by default', function () {
    $view = $this->blade('<x-oryn-progress :percent="50" />');
    $view->assertSee('progress');
    $view->assertSee('progress-wrapper');
    $view->assertSee('progress-bg');
    $view->assertSee('50%');
});

test('progress renders correct percentage', function () {
    $view = $this->blade('<x-oryn-progress :percent="75" />');
    $view->assertSee('width: 75%');
    $view->assertSee('75%');
});

test('progress renders without info', function () {
    $view = $this->blade('<x-oryn-progress :percent="50" :show-info="false" />');
    $view->assertDontSee('progress-info');
});

test('progress renders circle variant', function () {
    $view = $this->blade('<x-oryn-progress :percent="75" variant="circle" />');
    $view->assertSee('circle');
    $view->assertSee('svg');
    $view->assertSee('progress-circle-stroke');
});

test('progress renders custom color', function () {
    $progress = new Progress(percent: 50, customColorClass: 'bg-green-500');
    expect($progress->barColor())->toBe('bg-green-500');
});

test('progress renders custom info', function () {
    $view = $this->blade('<x-oryn-progress :percent="50" custom-info="Half" />');
    $view->assertSee('Half');
});
