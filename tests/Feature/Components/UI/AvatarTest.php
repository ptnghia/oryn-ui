<?php

use Oryn\UI\Components\UI\Avatar;

test('avatar renders with image', function () {
    $view = $this->blade('<x-oryn-avatar src="/img/avatar.jpg" alt="User" />');
    $view->assertSee('avatar');
    $view->assertSee('avatar-img');
    $view->assertSee('src="/img/avatar.jpg"', false);
});

test('avatar renders with text', function () {
    $view = $this->blade('<x-oryn-avatar>AB</x-oryn-avatar>');
    $view->assertSee('avatar-string');
    $view->assertSee('AB');
});

test('avatar renders different sizes', function () {
    $view = $this->blade('<x-oryn-avatar size="lg">A</x-oryn-avatar>');
    $view->assertSee('avatar-lg');

    $view = $this->blade('<x-oryn-avatar size="sm">A</x-oryn-avatar>');
    $view->assertSee('avatar-sm');
});

test('avatar renders different shapes', function () {
    $view = $this->blade('<x-oryn-avatar shape="round">A</x-oryn-avatar>');
    $view->assertSee('avatar-round');

    $view = $this->blade('<x-oryn-avatar shape="square">A</x-oryn-avatar>');
    $view->assertSee('avatar-square');
});

test('avatar renders circle by default', function () {
    $view = $this->blade('<x-oryn-avatar>A</x-oryn-avatar>');
    $view->assertSee('avatar-circle');
});

test('avatar size style returns null for string size', function () {
    $avatar = new Avatar(size: 'md');
    expect($avatar->sizeStyle())->toBeNull();
});

test('avatar group renders', function () {
    $view = $this->blade('
        <x-oryn-avatar-group>
            <x-oryn-avatar>A</x-oryn-avatar>
            <x-oryn-avatar>B</x-oryn-avatar>
        </x-oryn-avatar-group>
    ');
    $view->assertSee('avatar-group');
    $view->assertSee('avatar-group-chained');
});
