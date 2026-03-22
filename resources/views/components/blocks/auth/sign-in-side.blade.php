@props([
    'signUpUrl' => '/sign-up',
    'forgotPasswordUrl' => '/forgot-password',
    'action' => '',
    'showOauth' => true,
    'oauthGoogleUrl' => '#',
    'oauthGithubUrl' => '#',
    'sideImage' => '/img/others/auth-side-bg.png',
])

<x-oryn-block::auth-layout layout="side" :side-image="$sideImage" {{ $attributes }}>
    <x-oryn-block::sign-in-form
        :sign-up-url="$signUpUrl"
        :forgot-password-url="$forgotPasswordUrl"
        :action="$action"
        :show-oauth="$showOauth"
        :oauth-google-url="$oauthGoogleUrl"
        :oauth-github-url="$oauthGithubUrl"
    />
</x-oryn-block::auth-layout>
