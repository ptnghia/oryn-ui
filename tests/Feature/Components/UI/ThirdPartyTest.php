<?php

// ============================================================
// Chart (ApexCharts)
// ============================================================

test('chart renders with default props', function () {
    $view = $this->blade('<x-oryn-chart />');
    $view->assertSee('oryn-chart', false);
});

test('chart renders with type', function () {
    $html = (string) $this->blade('<x-oryn-chart type="bar" />');
    expect($html)->toContain("chart.type = 'bar'");
});

test('chart renders with series data', function () {
    $view = $this->blade('<x-oryn-chart :series="[[\'name\' => \'Sales\', \'data\' => [10, 20, 30]]]" />');
    $view->assertSee('Sales', false);
});

test('chart renders with custom height', function () {
    $html = (string) $this->blade('<x-oryn-chart :height="400" />');
    expect($html)->toContain('chart.height = 400');
});

test('chart renders loading state', function () {
    $view = $this->blade('<x-oryn-chart :loading="true" />');
    $view->assertSee('x-show="!loading"', false);
});

test('chart has container ref', function () {
    $html = (string) $this->blade('<x-oryn-chart />');
    expect($html)->toContain('x-ref="container"');
});

test('chart renders ApexCharts warning check', function () {
    $html = (string) $this->blade('<x-oryn-chart />');
    expect($html)->toContain('ApexCharts');
});

test('chart forwards attributes', function () {
    $view = $this->blade('<x-oryn-chart class="my-chart" data-id="test" />');
    $view->assertSee('my-chart', false);
    $view->assertSee('data-id="test"', false);
});

// ============================================================
// RegionMap (Leaflet)
// ============================================================

test('region-map renders with CSS class', function () {
    $view = $this->blade('<x-oryn-region-map />');
    $view->assertSee('oryn-region-map', false);
});

test('region-map has container ref', function () {
    $html = (string) $this->blade('<x-oryn-region-map />');
    expect($html)->toContain('x-ref="container"');
});

test('region-map renders with custom height', function () {
    $view = $this->blade('<x-oryn-region-map :height="600" />');
    $view->assertSee('600px', false);
});

test('region-map renders data', function () {
    $mapData = [['name' => 'USA', 'value' => 100]];
    $view = $this->blade('<x-oryn-region-map :map-data="$mapData" />', ['mapData' => $mapData]);
    $view->assertSee('USA', false);
});

test('region-map has Leaflet warning check', function () {
    $html = (string) $this->blade('<x-oryn-region-map />');
    expect($html)->toContain('Leaflet');
});

// ============================================================
// RichTextEditor (TipTap)
// ============================================================

test('rich-text-editor renders', function () {
    $view = $this->blade('<x-oryn-rich-text-editor />');
    $view->assertSee('oryn-rich-text-editor', false);
});

test('rich-text-editor has toolbar', function () {
    $view = $this->blade('<x-oryn-rich-text-editor />');
    $view->assertSee('toolbar', false);
    $view->assertSee('Bold', false);
});

test('rich-text-editor has all toolbar buttons', function () {
    $html = (string) $this->blade('<x-oryn-rich-text-editor />');
    expect($html)->toContain('toggleBold');
    expect($html)->toContain('toggleItalic');
    expect($html)->toContain('toggleStrike');
    expect($html)->toContain('toggleCode');
    expect($html)->toContain('toggleBlockquote');
    expect($html)->toContain('toggleBulletList');
    expect($html)->toContain('toggleOrderedList');
    expect($html)->toContain('toggleCodeBlock');
    expect($html)->toContain('setHorizontalRule');
});

test('rich-text-editor has heading buttons', function () {
    $view = $this->blade('<x-oryn-rich-text-editor />');
    $view->assertSee('H1', false);
    $view->assertSee('H2', false);
    $view->assertSee('H3', false);
});

test('rich-text-editor has content area', function () {
    $html = (string) $this->blade('<x-oryn-rich-text-editor />');
    expect($html)->toContain('x-ref="content"');
});

test('rich-text-editor supports invalid state', function () {
    $html = (string) $this->blade('<x-oryn-rich-text-editor :invalid="true" />');
    expect($html)->toContain('bg-error-subtle');
});

test('rich-text-editor supports custom toolbar slot', function () {
    $view = $this->blade('
        <x-oryn-rich-text-editor>
            <x-slot:toolbar><button>Custom</button></x-slot:toolbar>
        </x-oryn-rich-text-editor>
    ');
    $view->assertSee('Custom');
});

// ============================================================
// SyntaxHighlighter (Prism.js)
// ============================================================

test('syntax-highlighter renders', function () {
    $view = $this->blade('<x-oryn-syntax-highlighter code="console.log()" />');
    $view->assertSee('oryn-syntax-highlighter', false);
});

test('syntax-highlighter renders code', function () {
    $view = $this->blade('<x-oryn-syntax-highlighter code="const x = 1;" language="javascript" />');
    $view->assertSee('const x = 1;');
});

test('syntax-highlighter shows language label', function () {
    $view = $this->blade('<x-oryn-syntax-highlighter language="php" code="echo 1;" />');
    $view->assertSee('php');
});

test('syntax-highlighter has copy button', function () {
    $html = (string) $this->blade('<x-oryn-syntax-highlighter code="test" />');
    expect($html)->toContain('copyCode');
});

test('syntax-highlighter hides copy button when disabled', function () {
    $html = (string) $this->blade('<x-oryn-syntax-highlighter code="test" :showCopyButton="false" />');
    expect($html)->not->toContain('Copy code');
});

test('syntax-highlighter supports line numbers', function () {
    $view = $this->blade('<x-oryn-syntax-highlighter code="test" :showLineNumbers="true" />');
    $view->assertSee('line-numbers', false);
});

test('syntax-highlighter renders slot content', function () {
    $view = $this->blade('<x-oryn-syntax-highlighter language="html">Hello World</x-oryn-syntax-highlighter>');
    $view->assertSee('Hello World');
});

// ============================================================
// CalendarView (FullCalendar)
// ============================================================

test('calendar-view renders', function () {
    $view = $this->blade('<x-oryn-calendar-view />');
    $view->assertSee('oryn-calendar-view', false);
    $view->assertSee('calendar', false);
});

test('calendar-view has container ref', function () {
    $html = (string) $this->blade('<x-oryn-calendar-view />');
    expect($html)->toContain('x-ref="container"');
});

test('calendar-view renders with initial view', function () {
    $html = (string) $this->blade('<x-oryn-calendar-view initialView="timeGridWeek" />');
    expect($html)->toContain('timeGridWeek');
});

test('calendar-view renders events', function () {
    $view = $this->blade('<x-oryn-calendar-view :events="[[\'title\' => \'Meeting\', \'start\' => \'2026-03-20\']]" />');
    $view->assertSee('Meeting', false);
});

test('calendar-view has FullCalendar warning check', function () {
    $html = (string) $this->blade('<x-oryn-calendar-view />');
    expect($html)->toContain('FullCalendar');
});

test('calendar-view dispatches events', function () {
    $html = (string) $this->blade('<x-oryn-calendar-view />');
    expect($html)->toContain('calendar-event-click');
    expect($html)->toContain('calendar-date-click');
});

// ============================================================
// GanttChart (Frappe Gantt)
// ============================================================

test('gantt-chart renders', function () {
    $view = $this->blade('<x-oryn-gantt-chart />');
    $view->assertSee('oryn-gantt-chart', false);
});

test('gantt-chart has container ref', function () {
    $html = (string) $this->blade('<x-oryn-gantt-chart />');
    expect($html)->toContain('x-ref="container"');
});

test('gantt-chart renders with view mode', function () {
    $html = (string) $this->blade('<x-oryn-gantt-chart viewMode="Week" />');
    expect($html)->toContain("view_mode: 'Week'");
});

test('gantt-chart renders tasks', function () {
    $view = $this->blade('<x-oryn-gantt-chart :tasks="[[\'id\' => \'1\', \'name\' => \'Task 1\', \'start\' => \'2026-03-20\', \'end\' => \'2026-03-25\', \'progress\' => 50]]" />');
    $view->assertSee('Task 1', false);
});

test('gantt-chart dispatches events', function () {
    $html = (string) $this->blade('<x-oryn-gantt-chart />');
    expect($html)->toContain('gantt-task-click');
    expect($html)->toContain('gantt-date-change');
    expect($html)->toContain('gantt-progress-change');
});

test('gantt-chart has Frappe Gantt warning check', function () {
    $html = (string) $this->blade('<x-oryn-gantt-chart />');
    expect($html)->toContain('Frappe Gantt');
});
