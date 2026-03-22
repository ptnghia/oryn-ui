@props([
    'signInUrl' => '/sign-in',
    'action' => '',
])

{{-- Heading --}}
<div class="mb-6">
    <h3 class="mb-2">Forgot Password</h3>
    <p class="font-semibold heading-text">
        Please enter your email to receive a verification code
    </p>
</div>

{{-- Error alert slot --}}
@isset($alert)
    <div class="mb-4">{{ $alert }}</div>
@endisset

{{-- Forgot Password Form --}}
<form {{ $attributes->merge(['action' => $action, 'method' => 'POST']) }}>
    @csrf

    <x-oryn-form-item label="Email" :invalid="$errors->has('email')" :error-message="$errors->first('email')">
        <x-oryn-input type="email" name="email" placeholder="Email" :value="old('email')" autocomplete="email" />
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
