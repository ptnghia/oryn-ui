<?php

use function Pest\Laravel\blade;

// ============================================================
// LayoutBase
// ============================================================

test('layout-base renders with default type', function () {
    $view = $this->blade('<x-oryn-layout-base>Content</x-oryn-layout-base>');
    $view->assertSee('Content');
    $view->assertSee('app-layout-collapsibleSide', false);
});

test('layout-base renders with custom type', function () {
    $view = $this->blade('<x-oryn-layout-base type="blank">Content</x-oryn-layout-base>');
    $view->assertSee('app-layout-blank', false);
});

test('layout-base supports attribute forwarding', function () {
    $view = $this->blade('<x-oryn-layout-base class="custom-class">Content</x-oryn-layout-base>');
    $view->assertSee('custom-class', false);
});

// ============================================================
// LayoutCollapsibleSide
// ============================================================

test('layout-collapsible-side renders', function () {
    $view = $this->blade('<x-oryn-layout-collapsible-side>Content</x-oryn-layout-collapsible-side>');
    $view->assertSee('Content');
    $view->assertSee('app-layout-collapsibleSide', false);
});

test('layout-collapsible-side has side-nav and header slots', function () {
    $view = $this->blade('
        <x-oryn-layout-collapsible-side>
            <x-slot:sideNav>SideNavContent</x-slot:sideNav>
            <x-slot:header>HeaderContent</x-slot:header>
            MainContent
        </x-oryn-layout-collapsible-side>
    ');
    $view->assertSee('SideNavContent');
    $view->assertSee('HeaderContent');
    $view->assertSee('MainContent');
});

// ============================================================
// LayoutStackedSide
// ============================================================

test('layout-stacked-side renders', function () {
    $view = $this->blade('<x-oryn-layout-stacked-side>Content</x-oryn-layout-stacked-side>');
    $view->assertSee('Content');
    $view->assertSee('app-layout-stackedSide', false);
});

// ============================================================
// LayoutTopBarClassic
// ============================================================

test('layout-top-bar-classic renders', function () {
    $view = $this->blade('<x-oryn-layout-top-bar-classic>Content</x-oryn-layout-top-bar-classic>');
    $view->assertSee('Content');
    $view->assertSee('app-layout-topBarClassic', false);
});

// ============================================================
// LayoutFramelessSide
// ============================================================

test('layout-frameless-side renders with dark background', function () {
    $view = $this->blade('<x-oryn-layout-frameless-side>Content</x-oryn-layout-frameless-side>');
    $view->assertSee('Content');
    $view->assertSee('bg-gray-950', false);
    $view->assertSee('rounded-2xl', false);
});

// ============================================================
// LayoutContentOverlay
// ============================================================

test('layout-content-overlay renders', function () {
    $view = $this->blade('<x-oryn-layout-content-overlay>Content</x-oryn-layout-content-overlay>');
    $view->assertSee('Content');
    $view->assertSee('app-layout-contentOverlay', false);
});

// ============================================================
// LayoutBlank
// ============================================================

test('layout-blank renders with no chrome', function () {
    $view = $this->blade('<x-oryn-layout-blank>Content</x-oryn-layout-blank>');
    $view->assertSee('Content');
    $view->assertSee('app-layout-blank', false);
    $view->assertSee('h-[100vh]', false);
});
