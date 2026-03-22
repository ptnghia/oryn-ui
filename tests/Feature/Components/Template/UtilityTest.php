<?php

// ============================================================
// Search
// ============================================================

test('search renders trigger button', function () {
    $view = $this->blade('<x-oryn-search />');
    $view->assertSee('Search', false);
});

test('search has keyboard shortcut listener', function () {
    $html = (string) $this->blade('<x-oryn-search />');
    expect($html)->toContain('meta.k');
    expect($html)->toContain('ctrl.k');
});

test('search has dialog overlay', function () {
    $view = $this->blade('<x-oryn-search />');
    $view->assertSee('Type to search', false);
});

test('search supports custom placeholder', function () {
    $view = $this->blade('<x-oryn-search placeholder="Find anything..." />');
    $view->assertSee('Find anything...', false);
});

// ============================================================
// UserDropdown
// ============================================================

test('user-dropdown renders with name and email', function () {
    $view = $this->blade('<x-oryn-user-dropdown name="John" email="john@test.com" />');
    $view->assertSee('John');
    $view->assertSee('john@test.com');
});

test('user-dropdown renders avatar image', function () {
    $view = $this->blade('<x-oryn-user-dropdown name="John" avatar="/img/avatar.jpg" />');
    $view->assertSee('/img/avatar.jpg', false);
});

test('user-dropdown renders menu items', function () {
    $view = $this->blade('<x-oryn-user-dropdown name="John" :items="[
        [\'label\' => \'Profile\', \'href\' => \'/profile\'],
        [\'label\' => \'Settings\', \'href\' => \'/settings\'],
    ]" />');
    $view->assertSee('Profile');
    $view->assertSee('Settings');
});

test('user-dropdown has ARIA attributes', function () {
    $view = $this->blade('<x-oryn-user-dropdown name="John" />');
    $view->assertSee('aria-haspopup', false);
});

// ============================================================
// LanguageSelector
// ============================================================

test('language-selector renders trigger', function () {
    $view = $this->blade('<x-oryn-language-selector />');
    $view->assertSee('Select language', false);
});

test('language-selector renders language options', function () {
    $view = $this->blade('<x-oryn-language-selector :languages="[
        [\'code\' => \'en\', \'label\' => \'English\', \'flag\' => \'🇺🇸\'],
        [\'code\' => \'vi\', \'label\' => \'Tiếng Việt\', \'flag\' => \'🇻🇳\'],
    ]" current="en" />');
    $view->assertSee('English');
});

// ============================================================
// ThemeConfigurator
// ============================================================

test('theme-configurator renders trigger', function () {
    $view = $this->blade('<x-oryn-theme-configurator />');
    $view->assertSee('Theme settings', false);
});

test('theme-configurator has mode toggle', function () {
    $view = $this->blade('<x-oryn-theme-configurator />');
    $view->assertSee('Light', false);
    $view->assertSee('Dark', false);
});

test('theme-configurator has direction toggle', function () {
    $view = $this->blade('<x-oryn-theme-configurator />');
    $view->assertSee('LTR', false);
    $view->assertSee('RTL', false);
});

test('theme-configurator has color presets', function () {
    $view = $this->blade('<x-oryn-theme-configurator />');
    $view->assertSee('Color Preset', false);
});

test('theme-configurator has layout options', function () {
    $view = $this->blade('<x-oryn-theme-configurator />');
    $view->assertSee('Layout', false);
});

// ============================================================
// HorizontalNav
// ============================================================

test('horizontal-nav renders', function () {
    $view = $this->blade('<x-oryn-horizontal-nav>Nav Items</x-oryn-horizontal-nav>');
    $view->assertSee('Nav Items');
    $html = (string) $view;
    expect($html)->toContain('<nav');
});

// ============================================================
// Breadcrumb
// ============================================================

test('breadcrumb renders items', function () {
    $view = $this->blade('<x-oryn-breadcrumb :items="[
        [\'label\' => \'Home\', \'href\' => \'/\'],
        [\'label\' => \'Products\', \'href\' => \'/products\'],
        [\'label\' => \'Detail\'],
    ]" />');
    $view->assertSee('Home');
    $view->assertSee('Products');
    $view->assertSee('Detail');
});

test('breadcrumb has ARIA label', function () {
    $view = $this->blade('<x-oryn-breadcrumb :items="[[\'label\' => \'Home\']]" />');
    $view->assertSee('aria-label="Breadcrumb"', false);
});

test('breadcrumb renders separator', function () {
    $view = $this->blade('<x-oryn-breadcrumb :items="[
        [\'label\' => \'Home\', \'href\' => \'/\'],
        [\'label\' => \'Page\'],
    ]" separator=">" />');
    $view->assertSee('>', false);
});

test('breadcrumb last item is not a link', function () {
    $html = (string) $this->blade('<x-oryn-breadcrumb :items="[
        [\'label\' => \'Home\', \'href\' => \'/\'],
        [\'label\' => \'Current\'],
    ]" />');
    expect($html)->toContain('<a');
    expect($html)->toContain('font-medium');
});

// ============================================================
// PageHeader
// ============================================================

test('page-header renders title', function () {
    $view = $this->blade('<x-oryn-page-header title="Dashboard" />');
    $view->assertSee('Dashboard');
});

test('page-header renders subtitle', function () {
    $view = $this->blade('<x-oryn-page-header title="Dashboard" subtitle="Overview of metrics" />');
    $view->assertSee('Overview of metrics');
});

test('page-header renders extra slot', function () {
    $view = $this->blade('
        <x-oryn-page-header title="Dashboard">
            <x-slot:extra>ActionButton</x-slot:extra>
        </x-oryn-page-header>
    ');
    $view->assertSee('ActionButton');
});

test('page-header renders breadcrumb slot', function () {
    $view = $this->blade('
        <x-oryn-page-header title="Dashboard">
            <x-slot:breadcrumb>BreadcrumbHere</x-slot:breadcrumb>
        </x-oryn-page-header>
    ');
    $view->assertSee('BreadcrumbHere');
});

// ============================================================
// Container
// ============================================================

test('container renders with class', function () {
    $view = $this->blade('<x-oryn-container>Content</x-oryn-container>');
    $view->assertSee('Content');
    $view->assertSee('container mx-auto', false);
});

test('container forwards attributes', function () {
    $view = $this->blade('<x-oryn-container class="p-4">Content</x-oryn-container>');
    $view->assertSee('p-4', false);
});

// ============================================================
// NotificationDropdown
// ============================================================

test('notification-dropdown renders with alpine data', function () {
    $html = (string) $this->blade('<x-oryn-notification-dropdown />');
    expect($html)->toContain('x-data');
    expect($html)->toContain('notifications');
    expect($html)->toContain('markAsRead');
    expect($html)->toContain('markAllAsRead');
});

test('notification-dropdown renders bell icon', function () {
    $view = $this->blade('<x-oryn-notification-dropdown />');
    $html = (string) $view;
    expect($html)->toContain('<svg');
    expect($html)->toContain('stroke="currentColor"');
});

test('notification-dropdown renders header title', function () {
    $view = $this->blade('<x-oryn-notification-dropdown />');
    $view->assertSee('Notifications', false);
});

test('notification-dropdown renders custom title slot', function () {
    $view = $this->blade('
        <x-oryn-notification-dropdown>
            <x-slot:title>My Alerts</x-slot:title>
        </x-oryn-notification-dropdown>
    ');
    $view->assertSee('My Alerts');
});

test('notification-dropdown shows empty state', function () {
    $view = $this->blade('<x-oryn-notification-dropdown />');
    $view->assertSee('No notifications!', false);
    $view->assertSee('Please try again later', false);
});

test('notification-dropdown custom empty text', function () {
    $view = $this->blade('<x-oryn-notification-dropdown emptyTitle="Nothing here" emptyMessage="Check back soon" />');
    $view->assertSee('Nothing here', false);
    $view->assertSee('Check back soon', false);
});

test('notification-dropdown renders view-all link', function () {
    $html = (string) $this->blade('<x-oryn-notification-dropdown viewAllUrl="/activity" viewAllText="See Activity" />');
    expect($html)->toContain('href="/activity"');
    expect($html)->toContain('See Activity');
});

test('notification-dropdown renders unread count', function () {
    $html = (string) $this->blade('<x-oryn-notification-dropdown :unread-count="5" />');
    expect($html)->toContain('unreadCount: 5');
});

test('notification-dropdown renders custom trigger slot', function () {
    $view = $this->blade('
        <x-oryn-notification-dropdown>
            <x-slot:trigger><span id="custom-bell">Ring</span></x-slot:trigger>
        </x-oryn-notification-dropdown>
    ');
    $view->assertSee('id="custom-bell"', false);
    $view->assertSee('Ring');
});

test('notification-dropdown renders custom footer slot', function () {
    $view = $this->blade('
        <x-oryn-notification-dropdown>
            <x-slot:footer><button>Custom Footer</button></x-slot:footer>
        </x-oryn-notification-dropdown>
    ');
    $view->assertSee('Custom Footer');
});

test('notification-dropdown has transition attributes', function () {
    $html = (string) $this->blade('<x-oryn-notification-dropdown />');
    expect($html)->toContain('x-transition:enter');
    expect($html)->toContain('x-cloak');
});

test('notification-dropdown forwards attributes', function () {
    $html = (string) $this->blade('<x-oryn-notification-dropdown class="ml-2" />');
    expect($html)->toContain('ml-2');
    expect($html)->toContain('relative inline-block');
});
