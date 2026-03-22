@props([
    'name' => null,
    'min' => 0,
    'max' => 100,
    'step' => 1,
    'value' => 0,
    'range' => false,
    'disabled' => false,
    'tooltip' => true,
    'marks' => [],
])

@php
    $initialValue = $range
        ? (is_array($value) ? json_encode($value) : '[0, ' . $max . ']')
        : (is_numeric($value) ? $value : 0);
    $marksJson = json_encode($marks);
@endphp

<div
    x-data="{
        min: {{ $min }},
        max: {{ $max }},
        step: {{ $step }},
        isRange: {{ $range ? 'true' : 'false' }},
        disabled: {{ $disabled ? 'true' : 'false' }},
        showTooltip: {{ $tooltip ? 'true' : 'false' }},
        marks: {{ $marksJson }},
        val: {{ $range ? $initialValue : "[$initialValue]" }},
        dragging: null,
        tooltipVisible: false,

        get value() { return this.isRange ? this.val : this.val[0]; },
        get percent0() { return ((this.val[0] - this.min) / (this.max - this.min)) * 100; },
        get percent1() { return this.isRange ? ((this.val[1] - this.min) / (this.max - this.min)) * 100 : this.percent0; },
        get barLeft() { return this.isRange ? Math.min(this.percent0, this.percent1) + '%' : '0%'; },
        get barWidth() { return this.isRange ? Math.abs(this.percent1 - this.percent0) + '%' : this.percent0 + '%'; },

        snapToStep(v) {
            const snapped = Math.round((v - this.min) / this.step) * this.step + this.min;
            return Math.max(this.min, Math.min(this.max, snapped));
        },

        getValueFromEvent(e) {
            const track = this.$refs.track;
            const rect = track.getBoundingClientRect();
            let fraction = (e.clientX - rect.left) / rect.width;
            fraction = Math.max(0, Math.min(1, fraction));
            return this.snapToStep(this.min + fraction * (this.max - this.min));
        },

        startDrag(index, e) {
            if (this.disabled) return;
            this.dragging = index;
            this.tooltipVisible = true;

            const onMove = (ev) => {
                const v = this.getValueFromEvent(ev.touches ? ev.touches[0] : ev);
                this.val[this.dragging] = v;
                this.val = [...this.val];
                this.$dispatch('input', { value: this.value });
            };
            const onEnd = () => {
                this.dragging = null;
                this.tooltipVisible = false;
                document.removeEventListener('mousemove', onMove);
                document.removeEventListener('mouseup', onEnd);
                document.removeEventListener('touchmove', onMove);
                document.removeEventListener('touchend', onEnd);
                this.$dispatch('change', { value: this.value });
            };

            document.addEventListener('mousemove', onMove);
            document.addEventListener('mouseup', onEnd);
            document.addEventListener('touchmove', onMove, { passive: true });
            document.addEventListener('touchend', onEnd);
        },

        onTrackClick(e) {
            if (this.disabled) return;
            const v = this.getValueFromEvent(e);
            if (this.isRange) {
                const d0 = Math.abs(v - this.val[0]);
                const d1 = Math.abs(v - this.val[1]);
                if (d0 <= d1) this.val[0] = v; else this.val[1] = v;
                this.val = [...this.val];
            } else {
                this.val[0] = v;
                this.val = [...this.val];
            }
            this.$dispatch('change', { value: this.value });
        },

        markPercent(v) { return ((v - this.min) / (this.max - this.min)) * 100; },
        isMarkFilled(v) {
            if (this.isRange) return v >= Math.min(this.val[0], this.val[1]) && v <= Math.max(this.val[0], this.val[1]);
            return v <= this.val[0];
        }
    }"
    {{ $attributes->merge(['class' => 'slider relative py-4' . ($disabled ? ' opacity-50 cursor-not-allowed' : '')]) }}
>
    @if($name)
        @if($range)
            <input type="hidden" name="{{ $name }}[0]" :value="val[0]" />
            <input type="hidden" name="{{ $name }}[1]" :value="val[1]" />
        @else
            <input type="hidden" name="{{ $name }}" :value="val[0]" />
        @endif
    @endif

    {{-- Track --}}
    <div class="slider-track-wrapper" x-ref="track" @click="onTrackClick($event)">
        <div class="slider-track">
            {{-- Filled bar --}}
            <div
                class="slider-bar"
                :class="disabled ? 'disabled' : ''"
                :style="'left:' + barLeft + ';width:' + barWidth"
            ></div>

            {{-- Marks --}}
            @if(!empty($marks))
            <template x-for="mark in marks" :key="mark.value ?? mark">
                <div
                    class="slider-mark-wrapper"
                    :style="'left:' + markPercent(mark.value ?? mark) + '%'"
                >
                    <span
                        class="slider-mark"
                        :class="isMarkFilled(mark.value ?? mark) ? 'slider-mark-filled' : ''"
                    ></span>
                    <span class="slider-mark-label text-xs text-gray-500" x-text="mark.label ?? mark"></span>
                </div>
            </template>
            @endif
        </div>
    </div>

    {{-- Thumb 0 --}}
    <div class="slider-thumb-wrapper" :style="'left:' + percent0 + '%'">
        <div
            class="slider-thumb"
            :class="disabled ? 'disabled' : ''"
            @mousedown.prevent="startDrag(0, $event)"
            @touchstart.prevent="startDrag(0, $event)"
            tabindex="0"
            role="slider"
            :aria-valuenow="val[0]"
            :aria-valuemin="min"
            :aria-valuemax="max"
        ></div>
        @if($tooltip)
        <div
            class="slider-tooltip"
            x-show="tooltipVisible && dragging === 0"
            x-cloak
            x-text="val[0]"
        ></div>
        @endif
    </div>

    {{-- Thumb 1 (range only) --}}
    @if($range)
    <div class="slider-thumb-wrapper" :style="'left:' + percent1 + '%'">
        <div
            class="slider-thumb"
            :class="disabled ? 'disabled' : ''"
            @mousedown.prevent="startDrag(1, $event)"
            @touchstart.prevent="startDrag(1, $event)"
            tabindex="0"
            role="slider"
            :aria-valuenow="val[1]"
            :aria-valuemin="min"
            :aria-valuemax="max"
        ></div>
        @if($tooltip)
        <div
            class="slider-tooltip"
            x-show="tooltipVisible && dragging === 1"
            x-cloak
            x-text="val[1]"
        ></div>
        @endif
    </div>
    @endif
</div>
