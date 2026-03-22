@props([
    'name' => null,
    'placeholder' => 'Select date',
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'clearable' => true,
    'value' => null,
    'minDate' => null,
    'maxDate' => null,
    'format' => 'Y-m-d',
    'firstDayOfWeek' => 0,
    'closeOnSelect' => true,
    'inline' => false,
])

@php
    $sizeClass = $sizeClass();
    $jsSelected = $value ? "'{$value}'" : 'null';
    $jsViewDate = $value ? "new Date('{$value}')" : 'new Date()';
    $jsMinDate = $minDate ? "new Date('{$minDate}')" : 'null';
    $jsMaxDate = $maxDate ? "new Date('{$maxDate}')" : 'null';
@endphp

<div
    x-data="{
        open: {{ $inline ? 'true' : 'false' }},
        inline: {{ $inline ? 'true' : 'false' }},
        selected: {!! $jsSelected !!},
        viewDate: {!! $jsViewDate !!},
        viewMode: 'days',
        firstDayOfWeek: {{ $firstDayOfWeek }},
        minDate: {!! $jsMinDate !!},
        maxDate: {!! $jsMaxDate !!},

        init() {
            if (isNaN(this.viewDate.getTime())) this.viewDate = new Date();
        },

        get year() { return this.viewDate.getFullYear(); },
        get month() { return this.viewDate.getMonth(); },

        get monthName() {
            return this.viewDate.toLocaleString('default', { month: 'long' });
        },

        get weekDays() {
            const days = ['Su','Mo','Tu','We','Th','Fr','Sa'];
            const shifted = [];
            for (let i = 0; i < 7; i++) shifted.push(days[(i + this.firstDayOfWeek) % 7]);
            return shifted;
        },

        get calendarDays() {
            const year = this.year;
            const month = this.month;
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const startOffset = (firstDay.getDay() - this.firstDayOfWeek + 7) % 7;
            const days = [];

            for (let i = startOffset - 1; i >= 0; i--) {
                const d = new Date(year, month, -i);
                days.push({ date: d, currentMonth: false });
            }
            for (let i = 1; i <= lastDay.getDate(); i++) {
                days.push({ date: new Date(year, month, i), currentMonth: true });
            }
            const remaining = 42 - days.length;
            for (let i = 1; i <= remaining; i++) {
                days.push({ date: new Date(year, month + 1, i), currentMonth: false });
            }
            return days;
        },

        get months() {
            return Array.from({length: 12}, (_, i) => new Date(this.year, i, 1).toLocaleString('default', { month: 'short' }));
        },

        get years() {
            const base = Math.floor(this.year / 12) * 12;
            return Array.from({length: 12}, (_, i) => base + i);
        },

        formatDate(d) {
            if (!d) return '';
            const date = d instanceof Date ? d : new Date(d);
            const y = date.getFullYear();
            const m = String(date.getMonth() + 1).padStart(2, '0');
            const day = String(date.getDate()).padStart(2, '0');
            return y + '-' + m + '-' + day;
        },

        isToday(d) {
            const today = new Date();
            return d.getDate() === today.getDate() && d.getMonth() === today.getMonth() && d.getFullYear() === today.getFullYear();
        },

        isSelected(d) {
            return this.selected && this.formatDate(d) === this.selected;
        },

        isDisabled(d) {
            if (this.minDate && d < this.minDate) return true;
            if (this.maxDate && d > this.maxDate) return true;
            return false;
        },

        selectDay(day) {
            if (this.isDisabled(day.date)) return;
            this.selected = this.formatDate(day.date);
            this.viewDate = new Date(day.date);
            this.$dispatch('change', { value: this.selected });
            if ({{ $closeOnSelect ? 'true' : 'false' }} && !this.inline) this.open = false;
        },

        selectMonth(m) {
            this.viewDate = new Date(this.year, m, 1);
            this.viewMode = 'days';
        },

        selectYear(y) {
            this.viewDate = new Date(y, this.month, 1);
            this.viewMode = 'months';
        },

        prevMonth() { this.viewDate = new Date(this.year, this.month - 1, 1); },
        nextMonth() { this.viewDate = new Date(this.year, this.month + 1, 1); },
        prevYear() { this.viewDate = new Date(this.year - 1, this.month, 1); },
        nextYear() { this.viewDate = new Date(this.year + 1, this.month, 1); },
        prevDecade() { this.viewDate = new Date(this.year - 12, this.month, 1); },
        nextDecade() { this.viewDate = new Date(this.year + 12, this.month, 1); },

        clear() {
            this.selected = null;
            this.$dispatch('change', { value: null });
        },

        toggle() {
            if ({{ $disabled ? 'true' : 'false' }} || this.inline) return;
            this.open = !this.open;
            if (this.open) this.viewMode = 'days';
        }
    }"
    @click.outside="if (!inline) { open = false; }"
    {{ $attributes->merge(['class' => 'picker relative' . ($inline ? '' : ' inline-block')]) }}
>
    @unless($inline)
    {{-- Input trigger --}}
    <div class="relative">
        @if($name)
            <input type="hidden" name="{{ $name }}" x-bind:value="selected ?? ''" />
        @endif
        <input
            type="text"
            class="input {{ $sizeClass }}{{ $invalid ? ' input-invalid' : '' }} w-full cursor-pointer"
            :value="selected ?? ''"
            placeholder="{{ $placeholder }}"
            readonly
            @click="toggle()"
            {{ $disabled ? 'disabled' : '' }}
        />
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
        </div>
    </div>
    @endunless

    {{-- Calendar panel --}}
    <div
        x-show="open"
        x-cloak
        x-transition
        class="picker-panel"
        :class="inline ? '' : 'absolute mt-1 left-0'"
    >
        <div class="picker-view">
            <div class="w-full">
                {{-- Header --}}
                <div class="flex items-center justify-between mb-2">
                    <template x-if="viewMode === 'days'">
                        <div class="flex items-center justify-between w-full">
                            <button type="button" class="picker-direction-button" @click="prevMonth()">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </button>
                            <div class="flex gap-1">
                                <button type="button" class="picker-header-label" @click="viewMode = 'months'" x-text="monthName"></button>
                                <button type="button" class="picker-header-label" @click="viewMode = 'years'" x-text="year"></button>
                            </div>
                            <button type="button" class="picker-direction-button" @click="nextMonth()">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            </button>
                        </div>
                    </template>
                    <template x-if="viewMode === 'months'">
                        <div class="flex items-center justify-between w-full">
                            <button type="button" class="picker-direction-button" @click="prevYear()">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </button>
                            <button type="button" class="picker-header-label" @click="viewMode = 'years'" x-text="year"></button>
                            <button type="button" class="picker-direction-button" @click="nextYear()">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            </button>
                        </div>
                    </template>
                    <template x-if="viewMode === 'years'">
                        <div class="flex items-center justify-between w-full">
                            <button type="button" class="picker-direction-button" @click="prevDecade()">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                            </button>
                            <span class="picker-header-label" x-text="years[0] + ' - ' + years[years.length - 1]"></span>
                            <button type="button" class="picker-direction-button" @click="nextDecade()">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                            </button>
                        </div>
                    </template>
                </div>

                {{-- Days view --}}
                <div x-show="viewMode === 'days'" class="day-picker">
                    <table class="picker-table">
                        <thead>
                            <tr>
                                <template x-for="day in weekDays" :key="day">
                                    <th class="week-day-cell">
                                        <span class="week-day-cell-content text-gray-500 dark:text-gray-400" x-text="day"></span>
                                    </th>
                                </template>
                            </tr>
                        </thead>
                        <tbody>
                            <template x-for="(week, wi) in Array.from({length: 6}, (_, i) => calendarDays.slice(i * 7, i * 7 + 7))" :key="wi">
                                <tr>
                                    <template x-for="(day, di) in week" :key="di">
                                        <td class="date-picker-cell"
                                            :class="{
                                                'date-picker-cell-current-month date-picker-cell-hoverable': day.currentMonth && !isDisabled(day.date),
                                                'date-picker-other-month': !day.currentMonth,
                                                'date-picker-cell-disabled': isDisabled(day.date),
                                            }">
                                            <button
                                                type="button"
                                                class="date-picker-cell-content rounded-full flex items-center justify-center text-sm"
                                                :class="{
                                                    'bg-primary text-white date-picker-cell-selected': isSelected(day.date),
                                                    'border-primary date-picker-today': isToday(day.date) && !isSelected(day.date),
                                                }"
                                                @click="selectDay(day)"
                                                :disabled="isDisabled(day.date)"
                                                x-text="day.date.getDate()"
                                            ></button>
                                        </td>
                                    </template>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>

                {{-- Months view --}}
                <div x-show="viewMode === 'months'" class="month-table">
                    <template x-for="(m, i) in months" :key="i">
                        <button
                            type="button"
                            class="month-picker-cell"
                            :class="{ 'bg-primary month-picker-cell-active': i === month }"
                            @click="selectMonth(i)"
                            x-text="m"
                        ></button>
                    </template>
                </div>

                {{-- Years view --}}
                <div x-show="viewMode === 'years'" class="year-table">
                    <template x-for="y in years" :key="y">
                        <button
                            type="button"
                            class="year-picker-cell"
                            :class="{ 'bg-primary year-picker-cell-active': y === year }"
                            @click="selectYear(y)"
                            x-text="y"
                        ></button>
                    </template>
                </div>

                {{-- Footer --}}
                @if($clearable)
                <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-200 dark:border-gray-600">
                    <button type="button" class="text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" @click="clear()">Clear</button>
                    <button type="button" class="text-sm text-primary font-medium" @click="selected = formatDate(new Date()); viewDate = new Date(); $dispatch('change', { value: selected }); {{ $closeOnSelect ? 'if (!inline) open = false;' : '' }}">Today</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
