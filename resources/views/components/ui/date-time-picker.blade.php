@props([
    'name' => null,
    'placeholder' => 'Select date & time',
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'clearable' => true,
    'value' => null,
    'minDate' => null,
    'maxDate' => null,
    'firstDayOfWeek' => 0,
    'use12Hours' => false,
])

@php
    $sizeClass = $sizeClass();
    $jsMinDate = $minDate ? "new Date('{$minDate}')" : 'null';
    $jsMaxDate = $maxDate ? "new Date('{$maxDate}')" : 'null';
@endphp

<div
    x-data="{
        open: false,
        selectedDate: null,
        hours: 0,
        minutes: 0,
        seconds: 0,
        ampm: 'AM',
        use12Hours: {{ $use12Hours ? 'true' : 'false' }},
        viewDate: new Date(),
        viewMode: 'days',
        firstDayOfWeek: {{ $firstDayOfWeek }},
        minDate: {!! $jsMinDate !!},
        maxDate: {!! $jsMaxDate !!},

        init() {
            @if($value)
                const d = new Date('{{ $value }}');
                if (!isNaN(d.getTime())) {
                    this.selectedDate = d.getFullYear() + '-' + String(d.getMonth()+1).padStart(2,'0') + '-' + String(d.getDate()).padStart(2,'0');
                    this.hours = d.getHours();
                    this.minutes = d.getMinutes();
                    this.seconds = d.getSeconds();
                    this.viewDate = new Date(d);
                    if (this.use12Hours) {
                        this.ampm = this.hours >= 12 ? 'PM' : 'AM';
                        this.hours = this.hours % 12 || 12;
                    }
                }
            @endif
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
        isSelected(d) { return this.selectedDate && this.formatDate(d) === this.selectedDate; },
        isDisabled(d) {
            if (this.minDate && d < this.minDate) return true;
            if (this.maxDate && d > this.maxDate) return true;
            return false;
        },

        selectDay(day) {
            if (this.isDisabled(day.date)) return;
            this.selectedDate = this.formatDate(day.date);
            this.viewDate = new Date(day.date);
            this.emitChange();
        },

        get displayValue() {
            if (!this.selectedDate) return '';
            const h = String(this.hours).padStart(2, '0');
            const m = String(this.minutes).padStart(2, '0');
            const s = String(this.seconds).padStart(2, '0');
            let time = h + ':' + m + ':' + s;
            if (this.use12Hours) time += ' ' + this.ampm;
            return this.selectedDate + ' ' + time;
        },

        get fullValue() {
            if (!this.selectedDate) return '';
            let h = this.hours;
            if (this.use12Hours) {
                if (this.ampm === 'PM' && h !== 12) h += 12;
                if (this.ampm === 'AM' && h === 12) h = 0;
            }
            return this.selectedDate + ' ' + String(h).padStart(2,'0') + ':' + String(this.minutes).padStart(2,'0') + ':' + String(this.seconds).padStart(2,'0');
        },

        emitChange() {
            this.$dispatch('change', { value: this.fullValue });
        },

        padTime(v) { return String(v).padStart(2, '0'); },

        incrementHour() { 
            const max = this.use12Hours ? 12 : 23;
            const min = this.use12Hours ? 1 : 0;
            this.hours = this.hours >= max ? min : this.hours + 1;
            this.emitChange();
        },
        decrementHour() {
            const max = this.use12Hours ? 12 : 23;
            const min = this.use12Hours ? 1 : 0;
            this.hours = this.hours <= min ? max : this.hours - 1;
            this.emitChange();
        },
        incrementMinute() { this.minutes = this.minutes >= 59 ? 0 : this.minutes + 1; this.emitChange(); },
        decrementMinute() { this.minutes = this.minutes <= 0 ? 59 : this.minutes - 1; this.emitChange(); },
        incrementSecond() { this.seconds = this.seconds >= 59 ? 0 : this.seconds + 1; this.emitChange(); },
        decrementSecond() { this.seconds = this.seconds <= 0 ? 59 : this.seconds - 1; this.emitChange(); },
        toggleAmPm() { this.ampm = this.ampm === 'AM' ? 'PM' : 'AM'; this.emitChange(); },

        prevMonth() { this.viewDate = new Date(this.year, this.month - 1, 1); },
        nextMonth() { this.viewDate = new Date(this.year, this.month + 1, 1); },

        clear() { this.selectedDate = null; this.hours = 0; this.minutes = 0; this.seconds = 0; this.ampm = 'AM'; this.$dispatch('change', { value: '' }); },
        toggle() { if ({{ $disabled ? 'true' : 'false' }}) return; this.open = !this.open; },
    }"
    @click.outside="open = false"
    {{ $attributes->merge(['class' => 'picker relative inline-block']) }}
>
    @if($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="fullValue" />
    @endif

    <div class="relative">
        <input
            type="text"
            class="input {{ $sizeClass }}{{ $invalid ? ' input-invalid' : '' }} w-full cursor-pointer"
            :value="displayValue"
            placeholder="{{ $placeholder }}"
            readonly
            @click="toggle()"
            {{ $disabled ? 'disabled' : '' }}
        />
        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-400">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" /></svg>
        </div>
    </div>

    <div x-show="open" x-cloak x-transition class="picker-panel absolute mt-1 left-0">
        <div class="picker-view">
            <div class="w-full">
                {{-- Date picker header --}}
                <div class="flex items-center justify-between mb-2">
                    <button type="button" class="picker-direction-button" @click="prevMonth()">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                    </button>
                    <span class="picker-header-label" x-text="monthName + ' ' + year"></span>
                    <button type="button" class="picker-direction-button" @click="nextMonth()">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/></svg>
                    </button>
                </div>

                {{-- Calendar --}}
                <table class="picker-table">
                    <thead><tr>
                        <template x-for="day in weekDays" :key="day">
                            <th class="week-day-cell"><span class="week-day-cell-content text-gray-500 dark:text-gray-400" x-text="day"></span></th>
                        </template>
                    </tr></thead>
                    <tbody>
                        <template x-for="(week, wi) in Array.from({length: 6}, (_, i) => calendarDays.slice(i*7, i*7+7))" :key="wi">
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

                {{-- Time picker --}}
                <div class="mt-3 pt-3 border-t border-gray-200 dark:border-gray-600">
                    <div class="time-input-wrapper justify-center gap-1">
                        {{-- Hours --}}
                        <div class="flex flex-col items-center">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1" @click="incrementHour()">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>
                            </button>
                            <span class="time-input-field text-lg font-medium" x-text="padTime(hours)"></span>
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1" @click="decrementHour()">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                            </button>
                        </div>
                        <span class="time-input-separator text-lg font-medium">:</span>
                        {{-- Minutes --}}
                        <div class="flex flex-col items-center">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1" @click="incrementMinute()">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>
                            </button>
                            <span class="time-input-field text-lg font-medium" x-text="padTime(minutes)"></span>
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1" @click="decrementMinute()">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                            </button>
                        </div>
                        <span class="time-input-separator text-lg font-medium">:</span>
                        {{-- Seconds --}}
                        <div class="flex flex-col items-center">
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1" @click="incrementSecond()">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M14.707 12.707a1 1 0 01-1.414 0L10 9.414l-3.293 3.293a1 1 0 01-1.414-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 010 1.414z" clip-rule="evenodd"/></svg>
                            </button>
                            <span class="time-input-field text-lg font-medium" x-text="padTime(seconds)"></span>
                            <button type="button" class="text-gray-400 hover:text-gray-600 p-1" @click="decrementSecond()">
                                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                            </button>
                        </div>
                        {{-- AM/PM --}}
                        <template x-if="use12Hours">
                            <button type="button" class="ml-2 px-2 py-1 text-sm font-medium rounded bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600" @click="toggleAmPm()" x-text="ampm"></button>
                        </template>
                    </div>
                </div>

                {{-- Footer --}}
                @if($clearable)
                <div class="flex items-center justify-between mt-3 pt-3 border-t border-gray-200 dark:border-gray-600">
                    <button type="button" class="text-sm text-gray-500 hover:text-gray-700 dark:hover:text-gray-300" @click="clear()">Clear</button>
                    <button type="button" class="text-sm text-primary font-medium" @click="open = false">OK</button>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
