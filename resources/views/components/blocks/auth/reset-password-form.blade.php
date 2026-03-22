@props([
    'signInUrl' => '/sign-in',
    'action' => '',
])

{{-- Heading --}}
<div class="mb-6">
    <h3 class="mb-1">Set new password</h3>
    <p class="font-semibold heading-text">
        Your new password must be different to previous password
    </p>
</div>

{{-- Error alert slot --}}
@isset($alert)
    <div class="mb-4">{{ $alert }}</div>
@endisset

{{-- Reset Password Form --}}
<form {{ $attributes->merge(['action' => $action, 'method' => 'POST']) }}>
    @csrf

    <x-oryn-form-item label="Password" :invalid="$errors->has('password')" :error-message="$errors->first('password')">
        <x-oryn-input type="password" name="password" placeholder="••••••••••••" autocomplete="new-password" />
    </x-oryn-form-item>

    <x-oryn-form-item label="Confirm Password" :invalid="$errors->has('password_confirmation')" :error-message="$errors->first('password_confirmation')">
        <x-oryn-input type="password" name="password_confirmation" placeholder="Confirm Password" autocomplete="new-password" />
    </x-oryn-form-item>

    <x-oryn-button block variant="solid" type="submit">
        Submit
    </x-oryn-button>
</form>

{{-- Back to sign in --}}
<div class="mt-4 text-center">
    <span>Back to </span>
    <a href="{{ $signInUrl }}" class="heading-text font-bold hover:underline">Sign in</a>
</div>
