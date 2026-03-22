<?php

test('form container renders vertical layout', function () {
    $view = $this->blade('<x-oryn-form-container>Fields</x-oryn-form-container>');
    $view->assertSee('form-container');
    $view->assertSee('vertical');
});

test('form container renders horizontal layout', function () {
    $view = $this->blade('<x-oryn-form-container layout="horizontal">Fields</x-oryn-form-container>');
    $view->assertSee('horizontal');
});

test('form container renders inline layout', function () {
    $view = $this->blade('<x-oryn-form-container layout="inline">Fields</x-oryn-form-container>');
    $view->assertSee('inline');
});

test('form item renders with label', function () {
    $view = $this->blade('<x-oryn-form-item label="Name"><input /></x-oryn-form-item>');
    $view->assertSee('form-item');
    $view->assertSee('form-label');
    $view->assertSee('Name');
});

test('form item renders with asterisk', function () {
    $view = $this->blade('<x-oryn-form-item label="Email" :asterisk="true"><input /></x-oryn-form-item>');
    $view->assertSee('text-error');
    $view->assertSee('*');
});

test('form item renders invalid with error message', function () {
    $view = $this->blade('<x-oryn-form-item label="Email" :invalid="true" error-message="Required"><input /></x-oryn-form-item>');
    $view->assertSee('form-explain');
    $view->assertSee('Required');
    $view->assertSee('invalid');
});

test('form item renders horizontal layout', function () {
    $view = $this->blade('<x-oryn-form-item label="Name" layout="horizontal"><input /></x-oryn-form-item>');
    $view->assertSee('horizontal');
});
