@props([
    'nameStart' => null,
    'nameEnd' => null,
    'placeholder' => 'Select date range',
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'clearable' => true,
    'startDate' => null,
    'endDate' => null,
    'minDate' => null,
    'maxDate' => null,
    'firstDayOfWeek' => 0,
    'separator' => ' ~ ',
])

@php
    $sizeClass = $sizeClass();
    $jsRangeStart = $startDate ? "'{$startDate}'" : 'null';
    $jsRangeEnd = $endDate ? "'{$endDate}'" : 'null';
    $jsViewDate = $startDate ? "new Date('{$startDate}')" : 'new Date()';
    $jsMinDate = $minDate ? "new Date('{$minDate}')" : 'null';
    $jsMaxDate = $maxDate ? "new Date('{$maxDate}')" : 'null';
@endphp

<div
    x-data="{
        open: false,
        rangeStart: {!! $jsRangeStart !!},
        rangeEnd: {!! $jsRangeEnd !!},
        hoverDate: null,
        selecting: 'start',
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
        get monthName() { return this.viewDate.toLocaleString('default', { month: 'long' }); },

        get weekDays() {
            const days = ['Su','Mo','Tu','We','Th','Fr','Sa'];
            const shifted = [];
            for (let i = 0; i < 7; i++) shifted.push(days[(i + this.firstDayOfWeek) % 7]);
            return shifted;
        },

        get calendarDays() {
            const year = this.year, month = this.month;
            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);
            const startOffset = (firstDay.getDay() - this.firstDayOfWeek + 7) % 7;
            const days = [];
            for (let i = startOffset - 1; i >= 0; i--) days.push({ date: new Date(year, month, -i), currentMonth: false });
            for (let i = 1; i <= lastDay.getDate(); i++) days.push({ date: new Date(year, month, i), currentMonth: true });
            const remaining = 42 - days.length;
            for (let i = 1; i <= remaining; i++) days.push({ date: new Date(year, month + 1, i), currentMonth: false });
            return days;
        },

        formatDate(d) {
            if (!d) return '';
            const date = d instanceof Date ? d : new Date(d);
            return date.getFullYear() + '-' + String(date.getMonth()+1).padStart(2,'0') + '-' + String(date.getDate()).padStart(2,'0');
        },

        isToday(d) {
            const t = new Date();
            return d.getDate() === t.getDate() && d.getMonth() === t.getMonth() && d.getFullYear() === t.getFullYear();
        },

        isDisabled(d) {
            if (this.minDate && d < this.minDate) return true;
            if (this.maxDate && d > this.maxDate) return true;
            return false;
        },

        isRangeStart(d) { return this.rangeStart && this.formatDate(d) === this.rangeStart; },
        isRangeEnd(d) { return this.rangeEnd && this.formatDate(d) === this.rangeEnd; },

        isInRange(d) {
            if (!this.rangeStart) return false;
            const s = new Date(this.rangeStart);
            const e = this.rangeEnd ? new Date(this.rangeEnd) : (this.hoverDate ? new Date(this.hoverDate) : null);
            if (!e) return false;
            const start = s < e ? s : e;
            const end = s < e ? e : s;
            return d > start && d < end;
        },

        selectDay(day) {
            if (this.isDisabled(day.date)) return;
            const val = this.formatDate(day.date);
            if (this.selecting === 'start') {
                this.rangeStart = val;
                this.rangeEnd = null;
                this.selecting = 'end';
            } else {
                if (val < this.rangeStart) {
                    this.rangeEnd = this.rangeStart;
                    this.rangeStart = val;
                } else {
                    this.rangeEnd = val;
                }
                this.selecting = 'start';
                this.open = false;
                this.$dispatch('change', { start: this.rangeStart, end: this.rangeEnd });
            }
        },

        get displayText() {
            if (this.rangeStart && this.rangeEnd) return this.rangeStart + '{{ $separator }}' + this.rangeEnd;
            if (this.rangeStart) return this.rangeStart + '{{ $separator }}...';
            return '';
        },

        prevMonth() { this.viewDate = new Date(this.year, this.month - 1, 1); },
        nextMonth() { this.viewDate = new Date(this.year, this.month + 1, 1); },

        clear() {
            this.rangeStart = null;
            this.rangeEnd = null;
            this.selecting = 'start';
            this.$dispatch('change', { start: null, end: null });
        },

        toggle() {
            if ({{ $disabled ? 'true' : 'false' }}) return;
            this.open = !this.open;
        }
    }"
    @click.outside="open = false"
    {{ $attributes->merge(['class' => 'picker relative inline-block']) }}
>
    {{-- Hidden inputs --}}
    @if($nameStart)
        <input type="hidden" name="{{ $nameStart }}" x-bind:value="rangeStart ?? ''" />
    @endif
    @if($nameEnd)
        <input type="hidden" name="{{ $nameEnd }}" x-bind:value="rangeEnd ?? ''" />
    @endif

    {{-- Input --}}
    <div class="relative">
        <input
            type="text"
            class="input {{ $sizeClass }}{{ $invalid ? ' input-invalid' : '' }} w-full cursor-pointer"
            :value="displayText"
            placeholder="{{ $placeholder }}"
            readonly
            @click="toggle()"
            {{ $disabled ? 'disabled' : '' }}
        />
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
        </div>
    </div>

    {{-- Panel --}}
    <div x-show="open" x-cloak x-transition class="picker-panel absolute mt-1 left-0">
        <div class="picker-view">
            <div class="w-full">
                <div class="flex items-center justify-between mb-2">
                    <button type="button" class="picker-direction-button" @click="prevMonth()">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </button>
                    <span class="picker-header-label" x-text="monthName + ' ' + year"></span>
                    <button type="button" class="picker-direction-button" @click="nextMonth()">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                    </button>
                </div>

                <table class="picker-table">
                    <thead>
                        <tr>
                            <template x-for="day in weekDays" :key="day">
                                <th class="week-day-cell"><span class="week-day-cell-content text-gray-500 dark:text-gray-400" x-text="day"></span></th>
                            </template>
                        </tr>
                    </thead>
                    <tbody>
                        <template x-for="(week, wi) in Array.from({length: 6}, (_, i) => calendarDays.slice(i*7, i*7+7))" :key="wi">
                            <tr>
                                <template x-for="(day, di) in week" :key="di">
                                    <td class="date-picker-cell"
                                        :class="{
                                            'date-picker-cell-current-month date-picker-cell-hoverable': day.currentMonth && !isDisabled(day.date),
                                            'date-picker-other-month': !day.currentMonth,
                                            'date-picker-cell-disabled': isDisabled(day.date),
                                            'date-picker-cell-selected-start': isRangeStart(day.date),
                                            'date-picker-cell-selected-end': isRangeEnd(day.date),
                                            'date-picker-cell-inrange-today': isInRange(day.date),
                                        }"
                                    >
                                        <button
                                            type="button"
                                            class="date-picker-cell-content rounded-full flex items-center justify-center text-sm"
                                            :class="{
                                                'bg-primary text-white': isRangeStart(day.date) || isRangeEnd(day.date),
                                                'border-primary date-picker-today': isToday(day.date) && !isRangeStart(day.date) && !isRangeEnd(day.date),
                                            }"
                                            @click="selectDay(day)"
                                            @mouseenter="hoverDate = formatDate(day.date)"
                                            :disabled="isDisabled(day.date)"
                                            x-text="day.date.getDate()"
                                        ></button>
                                    </td>
                                </template>
                            </tr>
                        </template>
                    </tbody>
                </table>

                @if($clearable)
                <div class="flex items-center justify-end mt-3 pt-3 border-t border-gray-200 dark:border-gray-600">
                    <button type="button" class="text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" @click="clear()">Clear</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
