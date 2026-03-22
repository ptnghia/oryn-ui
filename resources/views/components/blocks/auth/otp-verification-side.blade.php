@props([
    'action' => '',
    'otpLength' => 6,
    'sideImage' => '/img/others/auth-side-bg.png',
])

<x-oryn-block::auth-layout layout="side" :side-image="$sideImage" {{ $attributes }}>
    <x-oryn-block::otp-verification-form :action="$action" :otp-length="$otpLength" />
</x-oryn-block::auth-layout>
