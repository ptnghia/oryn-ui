@props([
    'signInUrl' => '/sign-in',
    'action' => '',
    'sideImage' => '/img/others/auth-side-bg.png',
])

<x-oryn-block::auth-layout layout="side" :side-image="$sideImage" {{ $attributes }}>
    <x-oryn-block::forgot-password-form :sign-in-url="$signInUrl" :action="$action" />
</x-oryn-block::auth-layout>
