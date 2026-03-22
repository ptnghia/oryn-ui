<?php

// Utility page blocks tests

test('access denied page renders', function () {
    $view = $this->blade('<x-oryn-block-page::access-denied />');
    $view->assertSee('Access Denied');
    $view->assertSee('no permission');
    $view->assertSee('Back to Home');
});

test('access denied page renders with custom content', function () {
    $view = $this->blade('<x-oryn-block-page::access-denied title="Forbidden!" message="You cannot access this resource." homeUrl="/dashboard" />');
    $view->assertSee('Forbidden!');
    $view->assertSee('cannot access');
    $view->assertSee('/dashboard');
});

test('access denied page renders with custom illustration', function () {
    $view = $this->blade('
        <x-oryn-block-page::access-denied>
            <x-slot:illustration><img src="/img/403.svg" alt="403" /></x-slot:illustration>
        </x-oryn-block-page::access-denied>
    ');
    $view->assertSee('403.svg');
});

test('not found page renders', function () {
    $view = $this->blade('<x-oryn-block-page::not-found />');
    $view->assertSee('Page not found');
    $view->assertSee('Back to Home');
});

test('not found page renders with custom props', function () {
    $view = $this->blade('<x-oryn-block-page::not-found title="Lost!" homeUrl="/home" homeLabel="Go Home" />');
    $view->assertSee('Lost!');
    $view->assertSee('/home');
    $view->assertSee('Go Home');
});

test('internal error page renders', function () {
    $view = $this->blade('<x-oryn-block-page::internal-error />');
    $view->assertSee('Internal Server Error');
    $view->assertSee('Something went wrong');
    $view->assertSee('Back to Home');
});

test('maintenance page renders', function () {
    $view = $this->blade('<x-oryn-block-page::maintenance />');
    $view->assertSee('Under Maintenance');
    $view->assertSee('scheduled maintenance');
    $view->assertSee('Back to Home');
});

test('maintenance page hides home link when empty', function () {
    $view = $this->blade('<x-oryn-block-page::maintenance homeUrl="" />');
    $view->assertDontSee('Back to Home');
});
