@props([
    'action' => '',
    'otpLength' => 6,
    'splitImage' => '/img/others/auth-split-img.png',
    'splitHeading' => 'The easiest way to build your admin app',
    'splitDescription' => 'Experience seamless project management. Simplify your workflow, and achieve your goals efficiently with our powerful and intuitive tools.',
])

<x-oryn-block::auth-layout layout="split" :split-image="$splitImage" :split-heading="$splitHeading" :split-description="$splitDescription" {{ $attributes }}>
    <x-oryn-block::otp-verification-form :action="$action" :otp-length="$otpLength" />
</x-oryn-block::auth-layout>
