@props([
    'signInUrl' => '/sign-in',
    'logoUrl' => '',
    'action' => '',
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
<div class="mb-8">
    <h3 class="mb-1">Sign Up</h3>
    <p class="font-semibold heading-text">
        And lets get started with your free trial
    </p>
</div>

{{-- Error alert slot --}}
@isset($alert)
    <div class="mb-4">{{ $alert }}</div>
@endisset

{{-- Sign Up Form --}}
<form {{ $attributes->merge(['action' => $action, 'method' => 'POST']) }}>
    @csrf

    <x-oryn-form-item label="User name" :invalid="$errors->has('name')" :error-message="$errors->first('name')">
        <x-oryn-input type="text" name="name" placeholder="User Name" :value="old('name')" autocomplete="name" />
    </x-oryn-form-item>

    <x-oryn-form-item label="Email" :invalid="$errors->has('email')" :error-message="$errors->first('email')">
        <x-oryn-input type="email" name="email" placeholder="Email" :value="old('email')" autocomplete="email" />
    </x-oryn-form-item>

    <x-oryn-form-item label="Password" :invalid="$errors->has('password')" :error-message="$errors->first('password')">
        <x-oryn-input type="password" name="password" placeholder="Password" autocomplete="new-password" />
    </x-oryn-form-item>

    <x-oryn-form-item label="Confirm Password" :invalid="$errors->has('password_confirmation')" :error-message="$errors->first('password_confirmation')">
        <x-oryn-input type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" />
    </x-oryn-form-item>

    <x-oryn-button block variant="solid" type="submit">
        Sign Up
    </x-oryn-button>
</form>

{{-- Footer link --}}
<div class="mt-6 text-center">
    <span>Already have an account? </span>
    <a href="{{ $signInUrl }}" class="heading-text font-bold hover:underline">Sign in</a>
</div>
