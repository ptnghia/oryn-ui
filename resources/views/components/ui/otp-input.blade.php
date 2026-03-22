@props([
    'length' => 6,
    'name' => null,
    'disabled' => false,
    'invalid' => false,
    'placeholder' => '',
    'value' => null,
])

@php
    $initialDigits = $value ? str_split(str_pad($value, $length, ' '), 1) : array_fill(0, $length, '');
    $initialDigits = array_map('trim', $initialDigits);
@endphp

<div
    x-data="{
        length: {{ $length }},
        digits: {{ json_encode(array_values($initialDigits)) }},

        get otp() { return this.digits.join(''); },

        onInput(index, e) {
            const val = e.target.value;
            if (val && !/^\d$/.test(val)) { e.target.value = this.digits[index]; return; }
            this.digits[index] = val;
            this.digits = [...this.digits];
            if (val && index < this.length - 1) this.focusAt(index + 1);
            this.$dispatch('change', { value: this.otp });
            if (this.otp.length === this.length && !this.otp.includes('')) this.$dispatch('complete', { value: this.otp });
        },
        onKeydown(index, e) {
            if (e.key === 'Backspace') {
                if (!this.digits[index] && index > 0) {
                    this.digits[index - 1] = '';
                    this.digits = [...this.digits];
                    this.focusAt(index - 1);
                    e.preventDefault();
                }
            } else if (e.key === 'ArrowLeft' && index > 0) {
                this.focusAt(index - 1);
                e.preventDefault();
            } else if (e.key === 'ArrowRight' && index < this.length - 1) {
                this.focusAt(index + 1);
                e.preventDefault();
            }
        },
        onPaste(e) {
            e.preventDefault();
            const pasted = (e.clipboardData.getData('text') || '').replace(/\D/g, '').slice(0, this.length);
            for (let i = 0; i < this.length; i++) {
                this.digits[i] = pasted[i] || '';
            }
            this.digits = [...this.digits];
            const nextEmpty = this.digits.findIndex(d => !d);
            this.focusAt(nextEmpty >= 0 ? nextEmpty : this.length - 1);
            this.$dispatch('change', { value: this.otp });
            if (pasted.length === this.length) this.$dispatch('complete', { value: this.otp });
        },
        focusAt(index) {
            this.$nextTick(() => {
                const el = this.$refs['input' + index];
                if (el) { el.focus(); el.select(); }
            });
        }
    }"
    {{ $attributes->merge(['class' => 'otp-input flex gap-2']) }}
>
    @if($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="otp" />
    @endif

    @for($i = 0; $i < $length; $i++)
        <input
            type="text"
            inputmode="numeric"
            maxlength="1"
            x-ref="input{{ $i }}"
            :value="digits[{{ $i }}]"
            @input="onInput({{ $i }}, $event)"
            @keydown="onKeydown({{ $i }}, $event)"
            @paste="onPaste($event)"
            @focus="$event.target.select()"
            class="input text-center w-10 h-10 sm:w-12 sm:h-12 text-lg font-semibold{{ $invalid ? ' input-invalid' : '' }}"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            autocomplete="one-time-code"
        />
    @endfor
</div>
