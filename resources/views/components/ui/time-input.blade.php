@props([
    'name' => null,
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'showSeconds' => true,
    'use12Hours' => false,
    'value' => null,
])

@php
    $sizeClass = $sizeClass();
@endphp

<div
    x-data="{
        hours: 0,
        minutes: 0,
        seconds: 0,
        ampm: 'AM',
        use12Hours: {{ $use12Hours ? 'true' : 'false' }},
        showSeconds: {{ $showSeconds ? 'true' : 'false' }},

        init() {
            @if($value)
                const parts = '{{ $value }}'.split(':');
                this.hours = parseInt(parts[0] || 0);
                this.minutes = parseInt(parts[1] || 0);
                this.seconds = parseInt(parts[2] || 0);
                if (this.use12Hours) {
                    this.ampm = this.hours >= 12 ? 'PM' : 'AM';
                    this.hours = this.hours % 12 || 12;
                }
            @endif
        },

        get fullValue() {
            let h = this.hours;
            if (this.use12Hours) {
                if (this.ampm === 'PM' && h !== 12) h += 12;
                if (this.ampm === 'AM' && h === 12) h = 0;
            }
            let time = String(h).padStart(2,'0') + ':' + String(this.minutes).padStart(2,'0');
            if (this.showSeconds) time += ':' + String(this.seconds).padStart(2,'0');
            return time;
        },

        pad(v) { return String(v).padStart(2, '0'); },

        onFieldInput(field, e) {
            const val = e.target.value.replace(/\D/g, '');
            let num = parseInt(val) || 0;
            const maxH = this.use12Hours ? 12 : 23;
            const minH = this.use12Hours ? 1 : 0;

            if (field === 'hours') {
                num = Math.max(minH, Math.min(maxH, num));
                this.hours = num;
            } else if (field === 'minutes') {
                num = Math.max(0, Math.min(59, num));
                this.minutes = num;
            } else {
                num = Math.max(0, Math.min(59, num));
                this.seconds = num;
            }
            e.target.value = this.pad(num);
            this.$dispatch('change', { value: this.fullValue });

            if (val.length >= 2) {
                if (field === 'hours') this.$refs.minuteInput?.focus();
                else if (field === 'minutes' && this.showSeconds) this.$refs.secondInput?.focus();
            }
        },

        onFieldKeydown(field, e) {
            if (e.key === 'ArrowUp') {
                e.preventDefault();
                if (field === 'hours') { const max = this.use12Hours ? 12 : 23; const min = this.use12Hours ? 1 : 0; this.hours = this.hours >= max ? min : this.hours + 1; }
                else if (field === 'minutes') { this.minutes = this.minutes >= 59 ? 0 : this.minutes + 1; }
                else { this.seconds = this.seconds >= 59 ? 0 : this.seconds + 1; }
                e.target.value = this.pad(this[field === 'hours' ? 'hours' : field === 'minutes' ? 'minutes' : 'seconds']);
                this.$dispatch('change', { value: this.fullValue });
            } else if (e.key === 'ArrowDown') {
                e.preventDefault();
                if (field === 'hours') { const max = this.use12Hours ? 12 : 23; const min = this.use12Hours ? 1 : 0; this.hours = this.hours <= min ? max : this.hours - 1; }
                else if (field === 'minutes') { this.minutes = this.minutes <= 0 ? 59 : this.minutes - 1; }
                else { this.seconds = this.seconds <= 0 ? 59 : this.seconds - 1; }
                e.target.value = this.pad(this[field === 'hours' ? 'hours' : field === 'minutes' ? 'minutes' : 'seconds']);
                this.$dispatch('change', { value: this.fullValue });
            } else if (e.key === 'Backspace' && !e.target.value) {
                if (field === 'seconds') this.$refs.minuteInput?.focus();
                else if (field === 'minutes') this.$refs.hourInput?.focus();
            }
        },

        toggleAmPm() {
            this.ampm = this.ampm === 'AM' ? 'PM' : 'AM';
            this.$dispatch('change', { value: this.fullValue });
        }
    }"
    {{ $attributes->merge(['class' => 'time-input input ' . $sizeClass . ($invalid ? ' input-invalid' : '') . ($disabled ? ' opacity-50 cursor-not-allowed' : '')]) }}
>
    @if($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="fullValue" />
    @endif

    <div class="time-input-wrapper">
        <input
            type="text"
            x-ref="hourInput"
            class="time-input-field"
            :value="pad(hours)"
            @input="onFieldInput('hours', $event)"
            @keydown="onFieldKeydown('hours', $event)"
            @focus="$event.target.select()"
            maxlength="2"
            inputmode="numeric"
            {{ $disabled ? 'disabled' : '' }}
            aria-label="Hours"
        />
        <span class="time-input-separator">:</span>
        <input
            type="text"
            x-ref="minuteInput"
            class="time-input-field"
            :value="pad(minutes)"
            @input="onFieldInput('minutes', $event)"
            @keydown="onFieldKeydown('minutes', $event)"
            @focus="$event.target.select()"
            maxlength="2"
            inputmode="numeric"
            {{ $disabled ? 'disabled' : '' }}
            aria-label="Minutes"
        />
        @if($showSeconds)
        <span class="time-input-separator">:</span>
        <input
            type="text"
            x-ref="secondInput"
            class="time-input-field"
            :value="pad(seconds)"
            @input="onFieldInput('seconds', $event)"
            @keydown="onFieldKeydown('seconds', $event)"
            @focus="$event.target.select()"
            maxlength="2"
            inputmode="numeric"
            {{ $disabled ? 'disabled' : '' }}
            aria-label="Seconds"
        />
        @endif
        @if($use12Hours)
        <button
            type="button"
            class="ml-2 px-2 py-0.5 text-xs font-medium rounded bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600"
            @click="toggleAmPm()"
            x-text="ampm"
            {{ $disabled ? 'disabled' : '' }}
        ></button>
        @endif
    </div>
</div>
