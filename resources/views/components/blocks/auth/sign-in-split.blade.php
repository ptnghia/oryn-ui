@props([
    'signUpUrl' => '/sign-up',
    'forgotPasswordUrl' => '/forgot-password',
    'action' => '',
    'showOauth' => true,
    'oauthGoogleUrl' => '#',
    'oauthGithubUrl' => '#',
    'splitImage' => '/img/others/auth-split-img.png',
    'splitHeading' => 'The easiest way to build your admin app',
    'splitDescription' => 'Experience seamless project management. Simplify your workflow, and achieve your goals efficiently with our powerful and intuitive tools.',
])

<x-oryn-block::auth-layout layout="split" :split-image="$splitImage" :split-heading="$splitHeading" :split-description="$splitDescription" {{ $attributes }}>
    <x-oryn-block::sign-in-form
        :sign-up-url="$signUpUrl"
        :forgot-password-url="$forgotPasswordUrl"
        :action="$action"
        :show-oauth="$showOauth"
        :oauth-google-url="$oauthGoogleUrl"
        :oauth-github-url="$oauthGithubUrl"
    />
</x-oryn-block::auth-layout>
