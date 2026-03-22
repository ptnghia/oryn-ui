@props([
    'signInUrl' => '/sign-in',
    'action' => '',
])

<x-oryn-block::auth-layout layout="simple" {{ $attributes }}>
    <x-oryn-block::reset-password-form :sign-in-url="$signInUrl" :action="$action" />
</x-oryn-block::auth-layout>
