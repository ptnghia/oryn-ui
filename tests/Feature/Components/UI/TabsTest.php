<?php

test('tabs renders with default value', function () {
    $view = $this->blade('
        <x-oryn-tabs defaultValue="tab1">
            <x-oryn-tab-list>
                <x-oryn-tab-nav value="tab1">Tab 1</x-oryn-tab-nav>
                <x-oryn-tab-nav value="tab2">Tab 2</x-oryn-tab-nav>
            </x-oryn-tab-list>
            <x-oryn-tab-content value="tab1">Content 1</x-oryn-tab-content>
            <x-oryn-tab-content value="tab2">Content 2</x-oryn-tab-content>
        </x-oryn-tabs>
    ');
    $view->assertSee("activeTab: 'tab1'", false);
    $view->assertSee('Tab 1');
    $view->assertSee('Tab 2');
    $view->assertSee('Content 1');
    $view->assertSee('Content 2');
});

test('tabs renders underline variant', function () {
    $view = $this->blade('
        <x-oryn-tabs defaultValue="a" variant="underline">
            <x-oryn-tab-list><x-oryn-tab-nav value="a">A</x-oryn-tab-nav></x-oryn-tab-list>
        </x-oryn-tabs>
    ');
    $view->assertSee("variant: 'underline'", false);
});

test('tabs renders pill variant', function () {
    $view = $this->blade('
        <x-oryn-tabs defaultValue="a" variant="pill">
            <x-oryn-tab-list><x-oryn-tab-nav value="a">A</x-oryn-tab-nav></x-oryn-tab-list>
        </x-oryn-tabs>
    ');
    $view->assertSee("variant: 'pill'", false);
});

test('tab-list renders with wrapper class', function () {
    $view = $this->blade('
        <x-oryn-tabs defaultValue="a">
            <x-oryn-tab-list><x-oryn-tab-nav value="a">A</x-oryn-tab-nav></x-oryn-tab-list>
        </x-oryn-tabs>
    ');
    $view->assertSee('tab-list');
});

test('tab-nav renders clickable', function () {
    $view = $this->blade('
        <x-oryn-tabs defaultValue="a">
            <x-oryn-tab-list><x-oryn-tab-nav value="a">A</x-oryn-tab-nav></x-oryn-tab-list>
        </x-oryn-tabs>
    ');
    $view->assertSee("activeTab = 'a'", false);
});

test('tab-nav renders disabled', function () {
    $view = $this->blade('
        <x-oryn-tabs defaultValue="a">
            <x-oryn-tab-list><x-oryn-tab-nav value="b" :disabled="true">B</x-oryn-tab-nav></x-oryn-tab-list>
        </x-oryn-tabs>
    ');
    $view->assertSee('tab-nav-disabled');
});

test('tab-content renders with x-show', function () {
    $view = $this->blade('
        <x-oryn-tabs defaultValue="a">
            <x-oryn-tab-content value="a">Content A</x-oryn-tab-content>
        </x-oryn-tabs>
    ');
    $view->assertSee("x-show=\"activeTab === 'a'\"", false);
    $view->assertSee('Content A');
});
