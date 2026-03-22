<?php

// ============================================================
// Header
// ============================================================

test('header renders with CSS class', function () {
    $view = $this->blade('<x-oryn-header />');
    $view->assertSee('header', false);
    $view->assertSee('header-wrapper', false);
});

test('header renders start and end slots', function () {
    $view = $this->blade('
        <x-oryn-header>
            <x-slot:headerStart>StartContent</x-slot:headerStart>
            <x-slot:headerEnd>EndContent</x-slot:headerEnd>
        </x-oryn-header>
    ');
    $view->assertSee('StartContent');
    $view->assertSee('EndContent');
    $view->assertSee('header-action-start', false);
    $view->assertSee('header-action-end', false);
});

test('header renders middle slot', function () {
    $view = $this->blade('
        <x-oryn-header>
            <x-slot:headerMiddle>MiddleContent</x-slot:headerMiddle>
        </x-oryn-header>
    ');
    $view->assertSee('MiddleContent');
    $view->assertSee('header-action-middle', false);
});

test('header supports container mode', function () {
    $view = $this->blade('<x-oryn-header :container="true" />');
    $view->assertSee('container mx-auto', false);
});

test('header has correct height', function () {
    $view = $this->blade('<x-oryn-header />');
    $view->assertSee('height: 64px', false);
});

test('header forwards attributes', function () {
    $view = $this->blade('<x-oryn-header class="shadow-sm" />');
    $view->assertSee('shadow-sm', false);
});

// ============================================================
// SideNav
// ============================================================

test('side-nav renders with CSS classes', function () {
    $view = $this->blade('<x-oryn-side-nav>Nav content</x-oryn-side-nav>');
    $view->assertSee('side-nav', false);
    $view->assertSee('Nav content');
});

test('side-nav has background class by default', function () {
    $view = $this->blade('<x-oryn-side-nav>Nav</x-oryn-side-nav>');
    $view->assertSee('side-nav-bg', false);
});

test('side-nav supports logo slot', function () {
    $view = $this->blade('
        <x-oryn-side-nav>
            <x-slot:logo>LogoHere</x-slot:logo>
            Navigation
        </x-oryn-side-nav>
    ');
    $view->assertSee('LogoHere');
    $view->assertSee('side-nav-header', false);
});

test('side-nav supports dark mode', function () {
    $view = $this->blade('<x-oryn-side-nav mode="dark">Nav</x-oryn-side-nav>');
    $view->assertSee('contrast-dark', false);
});

test('side-nav hidden on mobile', function () {
    $view = $this->blade('<x-oryn-side-nav>Nav</x-oryn-side-nav>');
    $view->assertSee('hidden lg:block', false);
});

// ============================================================
// MobileNav
// ============================================================

test('mobile-nav renders with toggle', function () {
    $view = $this->blade('<x-oryn-mobile-nav>Nav items</x-oryn-mobile-nav>');
    $view->assertSee('Nav items');
    $view->assertSee('block lg:hidden', false);
});

test('mobile-nav has drawer panel', function () {
    $view = $this->blade('<x-oryn-mobile-nav>Nav</x-oryn-mobile-nav>');
    $view->assertSee('Navigation', false);
});

test('mobile-nav supports custom width', function () {
    $view = $this->blade('<x-oryn-mobile-nav :width="400">Nav</x-oryn-mobile-nav>');
    $view->assertSee('width: 400px', false);
});

test('mobile-nav supports custom title', function () {
    $view = $this->blade('<x-oryn-mobile-nav title="Menu">Nav</x-oryn-mobile-nav>');
    $view->assertSee('Menu');
});

// ============================================================
// Footer
// ============================================================

test('footer renders with class', function () {
    $view = $this->blade('<x-oryn-footer />');
    $view->assertSee('footer', false);
});

test('footer renders default copyright', function () {
    $view = $this->blade('<x-oryn-footer />');
    $view->assertSee('Copyright', false);
    $view->assertSee(date('Y'), false);
});

test('footer renders custom copyright', function () {
    $view = $this->blade('<x-oryn-footer copyright="My Corp" />');
    $view->assertSee('My Corp');
});

test('footer supports end slot', function () {
    $view = $this->blade('
        <x-oryn-footer>
            <x-slot:end>Footer Links</x-slot:end>
        </x-oryn-footer>
    ');
    $view->assertSee('Footer Links');
});

test('footer supports contained mode', function () {
    $view = $this->blade('<x-oryn-footer pageContainerType="contained" />');
    $view->assertSee('container mx-auto', false);
});

// ============================================================
// PageContainer
// ============================================================

test('page-container renders content', function () {
    $view = $this->blade('<x-oryn-page-container>Page content</x-oryn-page-container>');
    $view->assertSee('Page content');
    $view->assertSee('page-container', false);
});

test('page-container has gutter classes by default', function () {
    $view = $this->blade('<x-oryn-page-container>Content</x-oryn-page-container>');
    $view->assertSee('px-4', false);
});

test('page-container gutterless removes padding', function () {
    $html = (string) $this->blade('<x-oryn-page-container pageContainerType="gutterless">Content</x-oryn-page-container>');
    // Gutterless should NOT have the gutter class on the page-container div
    expect($html)->toContain('page-container');
});

test('page-container supports header slot', function () {
    $view = $this->blade('
        <x-oryn-page-container>
            <x-slot:header>Page Title</x-slot:header>
            Content
        </x-oryn-page-container>
    ');
    $view->assertSee('Page Title');
});

// ============================================================
// SideNavToggle
// ============================================================

test('side-nav-toggle renders button', function () {
    $view = $this->blade('<x-oryn-side-nav-toggle />');
    $view->assertSee('Toggle sidebar', false);
    $view->assertSee('hidden lg:block', false);
});

// ============================================================
// Logo
// ============================================================

test('logo renders with light src', function () {
    $view = $this->blade('<x-oryn-logo lightSrc="/img/logo.png" />');
    $view->assertSee('/img/logo.png', false);
    $view->assertSee('logo', false);
});

test('logo renders slot when no src', function () {
    $view = $this->blade('<x-oryn-logo>My App</x-oryn-logo>');
    $view->assertSee('My App');
});

test('logo supports dark variant', function () {
    $view = $this->blade('<x-oryn-logo lightSrc="/img/logo-light.png" darkSrc="/img/logo-dark.png" />');
    $view->assertSee('dark:hidden', false);
    $view->assertSee('hidden dark:block', false);
});
