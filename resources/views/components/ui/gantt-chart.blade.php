@props([
    'tasks' => [],
    'viewMode' => 'Day',
    'readOnly' => false,
    'showArrow' => true,
    'colorsMap' => [],
    'rowHeight' => 50,
    'columnWidth' => 65,
])

@php
    $ganttId = 'oryn-gantt-' . uniqid();
    $tasksJson = json_encode($tasks, JSON_THROW_ON_ERROR);
    $colorsMapJson = json_encode($colorsMap, JSON_THROW_ON_ERROR);
@endphp

<div
    {{ $attributes->merge(['class' => 'oryn-gantt-chart']) }}
    x-data="{
        gantt: null,
        destroy() {
            this.gantt = null;
        },
        init() {
            if (typeof Gantt === 'undefined' && typeof FrappeGantt === 'undefined') {
                console.warn('Oryn UI: Frappe Gantt is not loaded. Include the Frappe Gantt CDN or install via npm.');
                return;
            }

            const GanttClass = typeof FrappeGantt !== 'undefined' ? FrappeGantt : Gantt;

            const tasks = {{ $tasksJson }}.map(task => ({
                ...task,
                start: task.start || new Date().toISOString().split('T')[0],
                end: task.end || new Date().toISOString().split('T')[0],
            }));

            if (tasks.length === 0) return;

            try {
                this.gantt = new GanttClass(this.$refs.container, tasks, {
                    view_mode: '{{ $viewMode }}',
                    readonly: {{ $readOnly ? 'true' : 'false' }},
                    bar_height: {{ $rowHeight }},
                    column_width: {{ $columnWidth }},
                    bar_corner_radius: 6,
                    arrow_curve: 5,
                    on_click: (task) => {
                        this.$dispatch('gantt-task-click', { task });
                    },
                    on_date_change: (task, start, end) => {
                        this.$dispatch('gantt-date-change', { task, start, end });
                    },
                    on_progress_change: (task, progress) => {
                        this.$dispatch('gantt-progress-change', { task, progress });
                    },
                    on_view_change: (mode) => {
                        this.$dispatch('gantt-view-change', { mode });
                    },
                });
            } catch (e) {
                console.error('Oryn UI: Error initializing Gantt chart:', e);
            }
        }
    }"
    id="{{ $ganttId }}"
>
    <div x-ref="container"></div>
</div>
