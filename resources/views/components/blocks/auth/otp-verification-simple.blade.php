@props([
    'action' => '',
    'otpLength' => 6,
])

<x-oryn-block::auth-layout layout="simple" {{ $attributes }}>
    <x-oryn-block::otp-verification-form :action="$action" :otp-length="$otpLength" />
</x-oryn-block::auth-layout>
