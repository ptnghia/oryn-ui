<?php

test('otp-input renders with default length', function () {
    $view = $this->blade('<x-oryn-otp-input />');
    $view->assertSee('otp-input');
    $view->assertSee('x-data');
    $view->assertSee('inputmode="numeric"', false);
});

test('otp-input renders correct number of fields', function () {
    $view = $this->blade('<x-oryn-otp-input :length="4" />');
    $html = (string) $view;
    expect(substr_count($html, 'inputmode="numeric"'))->toBe(4);
});

test('otp-input renders with 6 fields by default', function () {
    $view = $this->blade('<x-oryn-otp-input />');
    $html = (string) $view;
    expect(substr_count($html, 'inputmode="numeric"'))->toBe(6);
});

test('otp-input renders with disabled state', function () {
    $view = $this->blade('<x-oryn-otp-input :disabled="true" />');
    $view->assertSee('disabled');
});

test('otp-input renders with invalid state', function () {
    $view = $this->blade('<x-oryn-otp-input :invalid="true" />');
    $view->assertSee('input-invalid');
});

test('otp-input renders with name for form submission', function () {
    $view = $this->blade('<x-oryn-otp-input name="otp_code" />');
    $view->assertSee('name="otp_code"', false);
});

test('otp-input supports paste', function () {
    $view = $this->blade('<x-oryn-otp-input />');
    $view->assertSee('onPaste');
    $view->assertSee('clipboardData');
});

test('otp-input has auto-complete attribute', function () {
    $view = $this->blade('<x-oryn-otp-input />');
    $view->assertSee('autocomplete="one-time-code"', false);
});
