<?php

use Oryn\UI\Components\UI\Button;

test('button renders with default variant', function () {
    $view = $this->blade('<x-oryn-button>Click</x-oryn-button>');
    $view->assertSee('button');
    $view->assertSee('Click');
    $view->assertSee('border-gray-200');
});

test('button renders solid variant', function () {
    $view = $this->blade('<x-oryn-button variant="solid">Solid</x-oryn-button>');
    $view->assertSee('bg-primary');
    $view->assertSee('text-white');
});

test('button renders plain variant', function () {
    $view = $this->blade('<x-oryn-button variant="plain">Plain</x-oryn-button>');
    $view->assertSee('text-primary');
});

test('button renders different sizes', function () {
    $button = new Button(size: 'lg');
    expect($button->sizeClasses())->toContain('h-14');

    $button = new Button(size: 'sm');
    expect($button->sizeClasses())->toContain('h-9');

    $button = new Button(size: 'xs');
    expect($button->sizeClasses())->toContain('h-7');
});

test('button renders different shapes', function () {
    $button = new Button(shape: 'circle');
    expect($button->shapeClass())->toBe('rounded-full');

    $button = new Button(shape: 'none');
    expect($button->shapeClass())->toBe('rounded-none');

    $button = new Button(shape: 'round');
    expect($button->shapeClass())->toBe('rounded-xl');
});

test('button renders disabled state', function () {
    $view = $this->blade('<x-oryn-button :disabled="true">Disabled</x-oryn-button>');
    $view->assertSee('opacity-50');
    $view->assertSee('cursor-not-allowed');
});

test('button renders loading state', function () {
    $view = $this->blade('<x-oryn-button :loading="true">Loading</x-oryn-button>');
    $view->assertSee('opacity-50');
    $view->assertSee('animate-spin');
});

test('button renders block width', function () {
    $view = $this->blade('<x-oryn-button :block="true">Full</x-oryn-button>');
    $view->assertSee('w-full');
});

test('button renders as link', function () {
    $view = $this->blade('<x-oryn-button href="https://example.com">Link</x-oryn-button>');
    $view->assertSee('<a', false);
    $view->assertSee('href="https://example.com"', false);
});
