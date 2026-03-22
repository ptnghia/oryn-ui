<?php

test('menu renders with alpine data', function () {
    $view = $this->blade('<x-oryn-menu><x-oryn-menu-item eventKey="home">Home</x-oryn-menu-item></x-oryn-menu>');
    $view->assertSee('x-data');
    $view->assertSee('menu');
    $view->assertSee('Home');
});

test('menu renders with variant class', function () {
    $component = new \Oryn\UI\Components\UI\Menu(variant: 'dark');
    expect($component->variantClass())->toContain('menu-dark');
});

test('menu renders default active key', function () {
    $view = $this->blade('<x-oryn-menu defaultActiveKey="home"><x-oryn-menu-item eventKey="home">Home</x-oryn-menu-item></x-oryn-menu>');
    $view->assertSee("activeKey: 'home'", false);
});

test('menu-item renders with event key', function () {
    $view = $this->blade('<x-oryn-menu><x-oryn-menu-item eventKey="about">About</x-oryn-menu-item></x-oryn-menu>');
    $view->assertSee('About');
    $view->assertSee('menu-item');
});

test('menu-item renders as link', function () {
    $view = $this->blade('<x-oryn-menu><x-oryn-menu-item eventKey="about" href="/about">About</x-oryn-menu-item></x-oryn-menu>');
    $view->assertSee('href="/about"', false);
});

test('menu-item renders disabled', function () {
    $view = $this->blade('<x-oryn-menu><x-oryn-menu-item eventKey="x" :disabled="true">Disabled</x-oryn-menu-item></x-oryn-menu>');
    $view->assertSee('menu-item-disabled');
});

test('menu-collapse renders with label', function () {
    $view = $this->blade('
        <x-oryn-menu>
            <x-oryn-menu-collapse eventKey="settings" label="Settings">
                <x-oryn-menu-item eventKey="profile">Profile</x-oryn-menu-item>
            </x-oryn-menu-collapse>
        </x-oryn-menu>
    ');
    $view->assertSee('Settings');
    $view->assertSee('Profile');
    $view->assertSee('x-collapse');
});

test('menu-group renders with label', function () {
    $view = $this->blade('
        <x-oryn-menu>
            <x-oryn-menu-group label="Section">
                <x-oryn-menu-item eventKey="item">Item</x-oryn-menu-item>
            </x-oryn-menu-group>
        </x-oryn-menu>
    ');
    $view->assertSee('menu-title');
    $view->assertSee('Section');
});

// ============================================================
// Route Matching
// ============================================================

test('menu renders routeMatching prop', function () {
    $html = (string) $this->blade('<x-oryn-menu :routeMatching="true"><x-oryn-menu-item eventKey="home" href="/">Home</x-oryn-menu-item></x-oryn-menu>');
    expect($html)->toContain('routeMatching: true');
});

test('menu renders without routeMatching by default', function () {
    $html = (string) $this->blade('<x-oryn-menu><x-oryn-menu-item eventKey="home">Home</x-oryn-menu-item></x-oryn-menu>');
    expect($html)->toContain('routeMatching: false');
});

test('menu-item link has data-event-key attribute', function () {
    $html = (string) $this->blade('<x-oryn-menu><x-oryn-menu-item eventKey="about" href="/about">About</x-oryn-menu-item></x-oryn-menu>');
    expect($html)->toContain('data-event-key="about"');
});

test('menu-collapse has data-collapse-key attribute', function () {
    $html = (string) $this->blade('
        <x-oryn-menu>
            <x-oryn-menu-collapse eventKey="settings" label="Settings">
                <x-oryn-menu-item eventKey="profile">Profile</x-oryn-menu-item>
            </x-oryn-menu-collapse>
        </x-oryn-menu>
    ');
    expect($html)->toContain('data-collapse-key="settings"');
});

test('menu init has route matching logic', function () {
    $html = (string) $this->blade('<x-oryn-menu :routeMatching="true"><x-oryn-menu-item eventKey="home">Home</x-oryn-menu-item></x-oryn-menu>');
    expect($html)->toContain('window.location.pathname');
    expect($html)->toContain('data-event-key');
    expect($html)->toContain('data-collapse-key');
});
