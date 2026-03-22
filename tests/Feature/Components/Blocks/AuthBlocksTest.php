<?php

use Illuminate\Support\MessageBag;
use Illuminate\Support\ViewErrorBag;

beforeEach(function () {
    $this->app['view']->share('errors', new ViewErrorBag());
});

// Auth blocks tests

test('auth layout renders simple mode', function () {
    $view = $this->blade('<x-oryn-block::auth-layout layout="simple">Content</x-oryn-block::auth-layout>');
    $view->assertSee('Content');
    $view->assertSee('min-w-[320px]');
});

test('auth layout renders side mode', function () {
    $view = $this->blade('<x-oryn-block::auth-layout layout="side">Content</x-oryn-block::auth-layout>');
    $view->assertSee('Content');
});

test('auth layout renders split mode', function () {
    $view = $this->blade('<x-oryn-block::auth-layout layout="split">Content</x-oryn-block::auth-layout>');
    $view->assertSee('Content');
    $view->assertSee('lg:grid-cols-2');
});

test('sign in form renders', function () {
    $view = $this->blade('<x-oryn-block::sign-in-form />');
    $view->assertSee('Welcome back');
    $view->assertSee('email');
    $view->assertSee('password');
    $view->assertSee('Sign In');
});

test('sign in form renders with oauth', function () {
    $view = $this->blade('<x-oryn-block::sign-in-form :showOauth="true" />');
    $view->assertSee('Google');
    $view->assertSee('GitHub');
});

test('sign up form renders', function () {
    $view = $this->blade('<x-oryn-block::sign-up-form />');
    $view->assertSee('Sign Up');
    $view->assertSee('name');
    $view->assertSee('email');
    $view->assertSee('password');
});

test('forgot password form renders', function () {
    $view = $this->blade('<x-oryn-block::forgot-password-form />');
    $view->assertSee('Forgot Password');
    $view->assertSee('email');
});

test('reset password form renders', function () {
    $view = $this->blade('<x-oryn-block::reset-password-form />');
    $view->assertSee('Set new password');
    $view->assertSee('password');
});

test('otp verification form renders', function () {
    $view = $this->blade('<x-oryn-block::otp-verification-form />');
    $view->assertSee('OTP Verification');
});

test('sign in simple renders', function () {
    $view = $this->blade('<x-oryn-block::sign-in-simple />');
    $view->assertSee('Welcome back');
});

test('sign in side renders', function () {
    $view = $this->blade('<x-oryn-block::sign-in-side />');
    $view->assertSee('Welcome back');
});

test('sign in split renders', function () {
    $view = $this->blade('<x-oryn-block::sign-in-split />');
    $view->assertSee('Welcome back');
});

test('sign up simple renders', function () {
    $view = $this->blade('<x-oryn-block::sign-up-simple />');
    $view->assertSee('Sign Up');
});

test('forgot password simple renders', function () {
    $view = $this->blade('<x-oryn-block::forgot-password-simple />');
    $view->assertSee('Forgot Password');
});

test('reset password simple renders', function () {
    $view = $this->blade('<x-oryn-block::reset-password-simple />');
    $view->assertSee('Set new password');
});

test('otp verification simple renders', function () {
    $view = $this->blade('<x-oryn-block::otp-verification-simple />');
    $view->assertSee('OTP Verification');
});
