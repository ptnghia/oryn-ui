@props([
    'events' => [],
    'initialView' => 'dayGridMonth',
    'editable' => false,
    'selectable' => false,
    'headerToolbar' => [],
    'eventColors' => [],
    'height' => 'auto',
])

@php
    $calendarId = 'oryn-calendar-' . uniqid();
    $eventsJson = json_encode($events, JSON_THROW_ON_ERROR);
    $toolbarJson = json_encode($headerToolbar, JSON_THROW_ON_ERROR);
    $colorsJson = json_encode($eventColors, JSON_THROW_ON_ERROR);
@endphp

<div
    {{ $attributes->merge(['class' => 'oryn-calendar-view calendar']) }}
    x-data="{
        calendar: null,
        eventColors: {{ $colorsJson }},
        init() {
            if (typeof FullCalendar === 'undefined') {
                console.warn('Oryn UI: FullCalendar is not loaded. Include the FullCalendar CDN or install via npm.');
                return;
            }

            this.calendar = new FullCalendar.Calendar(this.$refs.container, {
                initialView: '{{ $initialView }}',
                headerToolbar: {{ $toolbarJson }},
                events: {{ $eventsJson }},
                editable: {{ $editable ? 'true' : 'false' }},
                selectable: {{ $selectable ? 'true' : 'false' }},
                height: '{{ $height }}',
                plugins: this.getPlugins(),
                eventContent: (arg) => this.renderEvent(arg),
                eventClick: (info) => {
                    this.$dispatch('calendar-event-click', { event: info.event });
                },
                dateClick: (info) => {
                    this.$dispatch('calendar-date-click', { date: info.dateStr });
                },
                select: (info) => {
                    this.$dispatch('calendar-select', { start: info.startStr, end: info.endStr });
                },
                eventDrop: (info) => {
                    this.$dispatch('calendar-event-drop', { event: info.event });
                },
                eventResize: (info) => {
                    this.$dispatch('calendar-event-resize', { event: info.event });
                },
            });
            this.calendar.render();
        },
        getPlugins() {
            const plugins = [];
            if (typeof FullCalendar.DayGrid !== 'undefined') plugins.push(FullCalendar.DayGrid);
            if (typeof FullCalendar.TimeGrid !== 'undefined') plugins.push(FullCalendar.TimeGrid);
            if (typeof FullCalendar.Interaction !== 'undefined') plugins.push(FullCalendar.Interaction);
            return plugins;
        },
        renderEvent(arg) {
            const color = arg.event.extendedProps?.eventColor;
            const colorDef = color ? this.eventColors[color] : null;
            const el = document.createElement('div');
            el.className = 'custom-calendar-event flex items-center min-h-[28px] p-2 rounded-md w-full overflow-hidden text-ellipsis h-full';
            if (colorDef) {
                el.style.backgroundColor = colorDef.bg;
                el.style.color = colorDef.text;
            }
            const time = arg.timeText ? `<span>${arg.timeText}</span> ` : '';
            el.innerHTML = time + `<span class='font-bold ml-1 rtl:mr-1'>${arg.event.title}</span>`;
            return { domNodes: [el] };
        },
        destroy() {
            if (this.calendar) {
                this.calendar.destroy();
                this.calendar = null;
            }
        }
    }"
    id="{{ $calendarId }}"
>
    <div x-ref="container"></div>
</div>
