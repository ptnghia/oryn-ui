@props([
    'signUpUrl' => '/sign-up',
    'forgotPasswordUrl' => '/forgot-password',
    'logoUrl' => '',
    'action' => '',
    'showOauth' => true,
    'oauthGoogleUrl' => '#',
    'oauthGithubUrl' => '#',
])

{{-- Logo --}}
<div class="mb-8">
    @if($logoUrl)
        <img src="{{ $logoUrl }}" alt="Logo" class="h-[60px] w-[60px]">
    @else
        <x-oryn-logo type="streamline" :width="60" :height="60" />
    @endif
</div>

{{-- Heading --}}
<div class="mb-10">
    <h2 class="mb-2">Welcome back!</h2>
    <p class="font-semibold heading-text">
        Please enter your credentials to sign in!
    </p>
</div>

{{-- Error alert slot --}}
@isset($alert)
    <div class="mb-4">{{ $alert }}</div>
@endisset

{{-- Sign In Form --}}
<form {{ $attributes->merge(['action' => $action, 'method' => 'POST']) }}>
    @csrf

    <x-oryn-form-item label="Email" :invalid="$errors->has('email')" :error-message="$errors->first('email')">
        <x-oryn-input type="email" name="email" placeholder="Email" :value="old('email')" autocomplete="email" />
    </x-oryn-form-item>

    <x-oryn-form-item label="Password" :invalid="$errors->has('password')" :error-message="$errors->first('password')" class="mb-0">
        <x-oryn-input type="password" name="password" placeholder="Password" autocomplete="current-password" />
    </x-oryn-form-item>

    <div class="mb-7 mt-2">
        <a href="{{ $forgotPasswordUrl }}" class="font-semibold heading-text underline">
            Forgot password
        </a>
    </div>

    <x-oryn-button block variant="solid" type="submit">
        Sign In
    </x-oryn-button>
</form>

{{-- OAuth --}}
@if($showOauth)
    <div class="mt-8">
        <div class="flex items-center gap-2 mb-6">
            <div class="border-t border-gray-200 dark:border-gray-800 flex-1 mt-[1px]"></div>
            <p class="font-semibold heading-text">or continue with</p>
            <div class="border-t border-gray-200 dark:border-gray-800 flex-1 mt-[1px]"></div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ $oauthGoogleUrl }}" class="flex-1">
                <x-oryn-button block type="button">
                    <span class="flex items-center justify-center gap-2">
                        <img class="h-[25px] w-[25px]" src="/img/others/google.png" alt="Google">
                        <span>Google</span>
                    </span>
                </x-oryn-button>
            </a>
            <a href="{{ $oauthGithubUrl }}" class="flex-1">
                <x-oryn-button block type="button">
                    <span class="flex items-center justify-center gap-2">
                        <img class="h-[25px] w-[25px]" src="/img/others/github.png" alt="GitHub">
                        <span>Github</span>
                    </span>
                </x-oryn-button>
            </a>
        </div>
    </div>
@endif

{{-- Footer link --}}
<div class="mt-6 text-center">
    <span>Don't have an account yet? </span>
    <a href="{{ $signUpUrl }}" class="heading-text font-bold hover:underline">Sign up</a>
</div>
