@props([
    'action' => '',
    'otpLength' => 6,
])

{{-- Heading --}}
<div class="mb-8">
    <h3 class="mb-2">OTP Verification</h3>
    <p class="font-semibold heading-text">
        We have sent you One Time Password to your email.
    </p>
</div>

{{-- Alert slots --}}
@isset($alert)
    <div class="mb-4">{{ $alert }}</div>
@endisset

{{-- OTP Form --}}
<form {{ $attributes->merge(['action' => $action, 'method' => 'POST']) }}>
    @csrf

    <x-oryn-form-item :invalid="$errors->has('otp')" :error-message="$errors->first('otp')">
        <x-oryn-otp-input name="otp" :length="$otpLength" input-class="h-[58px]" />
    </x-oryn-form-item>

    <x-oryn-button block variant="solid" type="submit">
        Verify OTP
    </x-oryn-button>
</form>

{{-- Resend OTP --}}
<div class="mt-4 text-center">
    <span class="font-semibold">Didn't receive OTP? </span>
    @isset($resendAction)
        {{ $resendAction }}
    @else
        <button type="button" class="heading-text font-bold underline">Resend OTP</button>
    @endisset
</div>
