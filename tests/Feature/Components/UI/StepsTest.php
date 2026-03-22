<?php

use Oryn\UI\Components\UI\StepItem;

test('steps renders horizontal by default', function () {
    $view = $this->blade('<x-oryn-steps>items</x-oryn-steps>');
    $view->assertSee('steps');
    $view->assertDontSee('steps-vertical');
});

test('steps renders vertical', function () {
    $view = $this->blade('<x-oryn-steps :vertical="true">items</x-oryn-steps>');
    $view->assertSee('steps-vertical');
});

test('step item renders pending status', function () {
    $view = $this->blade('<x-oryn-step-item :step-number="1" title="Step 1" />');
    $view->assertSee('step-item');
    $view->assertSee('step-item-icon-pending');
    $view->assertSee('Step 1');
    $view->assertSee('1');
});

test('step item renders complete status', function () {
    $view = $this->blade('<x-oryn-step-item status="complete" :step-number="1" title="Done" />');
    $view->assertSee('bg-primary text-white');
});

test('step item renders in-progress status', function () {
    $view = $this->blade('<x-oryn-step-item status="in-progress" :step-number="2" title="Current" />');
    $view->assertSee('step-item-icon-current');
    $view->assertSee('border-primary');
});

test('step item renders error status', function () {
    $view = $this->blade('<x-oryn-step-item status="error" :step-number="3" title="Failed" />');
    $view->assertSee('step-item-icon-error');
    $view->assertSee('step-item-title-error');
});

test('step item renders last without connector', function () {
    $view = $this->blade('<x-oryn-step-item :is-last="true" :step-number="3" title="Last" />');
    $view->assertDontSee('step-connect');
});

test('step item connect class includes correct status', function () {
    $item = new StepItem(status: 'complete');
    expect($item->connectClass())->toContain('bg-primary');

    $item = new StepItem(status: 'pending');
    expect($item->connectClass())->toContain('inactive');
});

test('step item renders with description', function () {
    $view = $this->blade('<x-oryn-step-item :step-number="1" title="Step" description="Details here" />');
    $view->assertSee('Details here');
});
