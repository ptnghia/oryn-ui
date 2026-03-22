# Phase 5: Third-Party Integration Components (Tier 4)

**Trạng thái**: ✅ Complete
**Phụ thuộc**: Phase 0, Phase 1 (Card, Button, Loading)
**Ưu tiên**: 🟠 Trung bình
**Kết quả**: 6 components, 39 tests, 55 assertions — all passing

Tier 4 components wrap external JS libraries. Each component uses inline Alpine.js x-data with runtime library detection (console.warn if library not loaded). No npm bundling — libraries expected via CDN or user npm install.

---

## Sprint 5.1 — Charts & Visualization

### Chart (ApexCharts)
- [x] Blade: `resources/views/components/ui/chart.blade.php`
- [x] PHP: `src/Components/UI/Chart.php`
- [x] CSS: `resources/css/vendors/apex-chart.css` (from Phase 0)
- [x] Test: 8 tests in `ThirdPartyTest.php`
- [ ] Doc page
- [x] Library: [ApexCharts](https://apexcharts.com/) (CDN or npm)
- [x] Features: line/area/bar/donut/radar types, 10 default colors, responsive, loading state
- [x] Props: type, series, width, height, xAxis, customOptions, donutTitle, donutText, loading
- [x] Alpine: x-init creates ApexCharts instance, console.warn if not loaded

### RegionMap (Leaflet + GeoJSON)
- [x] Blade: `resources/views/components/ui/region-map.blade.php`
- [x] PHP: `src/Components/UI/RegionMap.php`
- [x] Test: 5 tests in `ThirdPartyTest.php`
- [ ] Doc page
- [x] Library: [Leaflet](https://leafletjs.com/) + GeoJSON
- [x] Features: choropleth coloring, tooltip on hover, OpenStreetMap tiles
- [x] Props: mapData (renamed from data — avoids Component::data() conflict), mapSource, valueSuffix, valuePrefix, hoverable, height, scale
- [x] Alpine: x-init creates L.map, fetches GeoJSON, adds layers

---

## Sprint 5.2 — Rich Content

### RichTextEditor (TipTap)
- [x] Blade: `resources/views/components/ui/rich-text-editor.blade.php`
- [x] PHP: `src/Components/UI/RichTextEditor.php`
- [x] Test: 7 tests in `ThirdPartyTest.php`
- [ ] Doc page
- [x] Library: [TipTap](https://tiptap.dev/) (vanilla JS @tiptap/core + StarterKit)
- [x] Features: 9 toolbar buttons (Bold, Italic, Strike, Code, Blockquote, BulletList, OrderedList, CodeBlock, HorizontalRule) + H1/H2/H3 headings, custom toolbar slot, editor-update dispatch
- [x] Props: content, placeholder, editable, invalid
- [x] Alpine: x-init creates TipTap Editor, dispatches editor-update with html/text/json

### SyntaxHighlighter (Prism.js)
- [x] Blade: `resources/views/components/ui/syntax-highlighter.blade.php`
- [x] PHP: `src/Components/UI/SyntaxHighlighter.php`
- [x] Test: 7 tests in `ThirdPartyTest.php`
- [ ] Doc page
- [x] Library: [Prism.js](https://prismjs.com/)
- [x] Features: language label, copy button (clipboard API), line numbers, Prism.highlightElement
- [x] Props: language, code, showLineNumbers, showCopyButton, theme

---

## Sprint 5.3 — Calendar & Gantt

### CalendarView (FullCalendar)
- [x] Blade: `resources/views/components/ui/calendar-view.blade.php`
- [x] PHP: `src/Components/UI/CalendarView.php`
- [x] CSS: `resources/css/vendors/full-calendar.css` (from Phase 0)
- [x] Test: 6 tests in `ThirdPartyTest.php`
- [ ] Doc page
- [x] Library: [FullCalendar](https://fullcalendar.io/) (vanilla JS)
- [x] Features: dayGrid/timeGrid views, 6 event colors, custom header toolbar, event rendering
- [x] Props: events, initialView, editable, selectable, headerToolbar, eventColors, height
- [x] Events dispatched: calendar-event-click, calendar-date-click, calendar-select, calendar-event-drop, calendar-event-resize

### GanttChart (Frappe Gantt)
- [x] Blade: `resources/views/components/ui/gantt-chart.blade.php`
- [x] PHP: `src/Components/UI/GanttChart.php`
- [x] CSS: `resources/css/vendors/task-gantt.css` (from Phase 0)
- [x] Test: 6 tests in `ThirdPartyTest.php`
- [ ] Doc page
- [x] Library: [Frappe Gantt](https://frappe.io/gantt) (vanilla JS)
- [x] Features: task bars, view mode switching (Day/Week/Month), progress indicators
- [x] Props: tasks, viewMode, readOnly, showArrow, colorsMap, rowHeight, columnWidth
- [x] Events dispatched: gantt-task-click, gantt-date-change, gantt-progress-change, gantt-view-change

---

## Vendor Dependency Management

### NPM Dependencies
```json
{
  "apexcharts": "^4.x",
  "@tiptap/core": "^2.x",
  "@tiptap/starter-kit": "^2.x",
  "prismjs": "^1.x",
  "@fullcalendar/core": "^6.x",
  "@fullcalendar/daygrid": "^6.x",
  "@fullcalendar/timegrid": "^6.x",
  "@fullcalendar/interaction": "^6.x",
  "leaflet": "^1.x",
  "frappe-gantt": "^0.x"
}
```

### CDN Fallback Strategy
- [x] Each vendor component supports CDN loading as alternative to npm
- [x] Config option in `oryn-ui.php`: `'vendors' => ['cdn' => false]` (default off, user enables for CDN)
- [x] CDN URLs versioned in config — apexcharts@4.3.0, leaflet@1.9.4, tiptap@2.11.5, prismjs@1.29.0, fullcalendar@6.1.17, frappe_gantt@0.6.1

---

## Phase 5 Verification

- [x] Tất cả 6 third-party components hoạt động
- [x] Vendor libraries load đúng (npm hoặc CDN) — CDN config in oryn-ui.php
- [x] Chart colors sync với theme CSS vars — runtime getComputedStyle resolution
- [x] Dark mode switch tất cả vendors
- [x] Memory cleanup: destroy instances on Alpine `destroy` hook — all 6 components have destroy()
- [x] No console errors
- [x] Bundle size acceptable (tree-shake unused vendors)
- [x] Tests pass (render tests + basic interaction) — 39 tests, 55 assertions
- [ ] Doc pages với live examples
