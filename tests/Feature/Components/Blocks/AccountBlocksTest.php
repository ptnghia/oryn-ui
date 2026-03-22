<?php

// Account blocks tests

test('settings renders with menu and content', function () {
    $view = $this->blade('
        <x-oryn-block-account::settings>
            <x-slot:menu>Menu items</x-slot:menu>
            Settings content
        </x-oryn-block-account::settings>
    ');
    $view->assertSee('Menu items');
    $view->assertSee('Settings content');
});

test('settings renders with mobile menu', function () {
    $view = $this->blade('
        <x-oryn-block-account::settings>
            <x-slot:mobileMenu>Mobile menu</x-slot:mobileMenu>
            Content
        </x-oryn-block-account::settings>
    ');
    $view->assertSee('Mobile menu');
    $view->assertSee('lg:hidden');
});

test('activity log renders', function () {
    $view = $this->blade('
        <x-oryn-block-account::activity-log>
            <p>Timeline entries</p>
        </x-oryn-block-account::activity-log>
    ');
    $view->assertSee('Activity log');
    $view->assertSee('Timeline entries');
});

test('activity log renders with actions', function () {
    $view = $this->blade('
        <x-oryn-block-account::activity-log>
            <x-slot:actions>Filter dropdown</x-slot:actions>
            Timeline
        </x-oryn-block-account::activity-log>
    ');
    $view->assertSee('Filter dropdown');
});

test('pricing renders with plans', function () {
    $view = $this->blade('
        <x-oryn-block-account::pricing>
            <div>Plan 1</div>
            <div>Plan 2</div>
            <div>Plan 3</div>
        </x-oryn-block-account::pricing>
    ');
    $view->assertSee('Pricing');
    $view->assertSee('Plan 1');
    $view->assertSee('xl:grid-cols-3');
});

test('pricing renders with faq', function () {
    $view = $this->blade('
        <x-oryn-block-account::pricing>
            Plans
            <x-slot:faq>FAQ content</x-slot:faq>
        </x-oryn-block-account::pricing>
    ');
    $view->assertSee('FAQ content');
});

test('roles permissions renders', function () {
    $view = $this->blade('
        <x-oryn-block-account::roles-permissions>
            <x-slot:groups>Role groups</x-slot:groups>
            Users table
        </x-oryn-block-account::roles-permissions>
    ');
    $view->assertSee('Roles & Permissions');
    $view->assertSee('Role groups');
    $view->assertSee('Users table');
});
