# Activity Log — Oryn UI

Log các công việc đã hoàn thành, sắp xếp theo thời gian (mới nhất lên đầu).

---

## 2026-03-27

### Session 11: DataTable (Advanced) Component

**Tổng quan**: Implemented the DataTable component that was deferred from Phase 3. Composes Table + Pagination + Select + Checkbox + Sorter + Skeleton. 19 new tests (498 total, 865 assertions).

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|  
| 1 | DataTable PHP class | ✅ | `src/Components/UI/DataTable.php` — columns config, pagingData, pageSizes, selectable, loading, noData |
| 2 | DataTable Blade template | ✅ | Uses raw HTML table internally (avoids Blade compilation issues with nested component loops), Alpine.js for sorting/selection state |
| 3 | ServiceProvider registration | ✅ | `'data-table' => Components\UI\DataTable::class` |
| 4 | Tests | ✅ | 19 tests in `DataTableTest.php`: rendering, sorting, selection, pagination, no-data, loading, skeleton, column width, PHP class unit tests |
| 5 | Plan docs | ✅ | Updated phase-3-complex.md (DataTable no longer deferred) |

#### Bài học rút ra:
- **Blade compilation issue with nested component loops**: Using `<x-oryn-th>` inside `@foreach` with `@if` inside the tag attributes causes compilation errors. Solution: use raw HTML `<th>` for DataTable's internally-generated structure.
- **Select options rendered client-side**: Select component renders option labels via Alpine.js `getLabel()`, not in server HTML. Test assertions must check JSON-encoded data, not rendered text.

---

### Session 10: Phase 4+5 Gap Fix — Completing All Non-Doc Tasks

**Tổng quan**: Reviewed all plan files (Phase 0–6), found 6 implementation gaps across Phase 4 and Phase 5, implemented all of them, wrote 17 new tests. Suite: 479 tests, 829 assertions.

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | NotificationDropdown component | ✅ | New template component: PHP class + Blade + Alpine.js dropdown with notifications[], markAsRead, markAllAsRead, setNotifications (registered as `<x-oryn-notification-dropdown>`) |
| 2 | Chart CSS vars theme sync | ✅ | chart.blade.php init() resolves --primary/--success/--error/--warning/--info via getComputedStyle at runtime |
| 3 | Vendor destroy hooks | ✅ | Added destroy() to syntax-highlighter (resets copied) and gantt-chart (nullifies instance) — all 6 vendors now have cleanup |
| 4 | CDN config | ✅ | Added `vendors` section to oryn-ui.php with `cdn` toggle + versioned URLs for all 6 libraries |
| 5 | Active menu route matching | ✅ | Menu `routeMatching` prop + init() that scans DOM a[href] elements, longest-prefix match, auto-sets activeKey + expandedKey via data-event-key/data-collapse-key attributes |
| 6 | Layout hotswap | ✅ | ThemeConfigurator saves to localStorage + page reload (pragmatic Blade-only approach) |
| 7 | Tests | ✅ | 12 NotificationDropdown tests + 5 Menu routeMatching tests = 17 new tests |
| 8 | Plan checklists updated | ✅ | phase-4-templates.md + phase-5-thirdparty.md — all non-Doc items now marked [x] |

#### Bài học rút ra:
- **Template vs UI naming conflicts**: NotificationDropdown avoids conflict with UI Notification (toast). Different namespaces but same blade prefix requires unique component names.
- **Blade layout hotswap limitation**: True SPA-style layout switching without reload is not possible with server-rendered Blade. Page reload is the pragmatic solution; real hotswap requires Livewire/Turbo.
- **CSS vars in chart colors**: Use `getComputedStyle(document.documentElement).getPropertyValue('--primary')` to read runtime theme colors. Only replace defaults — preserve user customizations.

---

## 2026-03-26

### Session 9: Phase 6 — Pre-built Page Blocks

**Tổng quan**: Built all 56 Phase 6 page block templates across 7 sprints, registered anonymous component paths in ServiceProvider, 73 new tests (462 total, 800 assertions).

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Sprint 6.1 — Auth Blocks | ✅ | 20 files: auth-layout (3 modes: simple/side/split), 5 form components (sign-in/up, forgot/reset password, OTP), 15 layout variants (3 per form) |
| 2 | Sprint 6.2 — Dashboard Blocks | ✅ | 4 files: ecommerce, project, analytic, marketing — slot-based grid layouts |
| 3 | Sprint 6.3 — CRUD Blocks | ✅ | 14 files: 3 generic (crud-list/form/detail) + 11 entity-specific (customer 4, product 3, order 4) |
| 4 | Sprint 6.4 — App Blocks | ✅ | 10 files: project-list/detail, scrum-board, chat, ai-chat, ai-image, calendar, file-manager, tasks |
| 5 | Sprint 6.5 — Account Blocks | ✅ | 4 files: settings, activity-log, pricing, roles-permissions |
| 6 | Sprint 6.6 — Utility Pages | ✅ | 4 files: access-denied (403), not-found (404), internal-error (500), maintenance |
| 7 | Sprint 6.7 — Help Center Blocks | ✅ | 4 files: support-hub, article, edit-article, manage-articles |
| 8 | ServiceProvider Registration | ✅ | `$blockCategories` array with `Blade::anonymousComponentPath()` for 7 category prefixes |
| 9 | Test Suite | ✅ | 73 Phase 6 tests (142 assertions) — 462 total tests (800 assertions) all pass |
| 10 | Phase 6 Docs | ✅ | Updated phase-6-blocks.md, activity-log, session-notes, files-registry, decisions, error-log |

#### Bài học rút ra:
- **Block naming uses `::` separator**: `Blade::anonymousComponentPath($path, 'prefix')` requires `<x-prefix::component>` syntax, NOT `<x-prefix-component>`. This is standard Laravel anonymous component path convention.
- **Auth form testing needs ViewErrorBag**: Blocks using `$errors->has()` need `$this->app['view']->share('errors', new ViewErrorBag())` in test `beforeEach`.
- **Slot-based composition pattern**: Blocks provide layout grids with named slots — users inject their own content components. This is more flexible than hardcoding specific Oryn UI components inside blocks.

---

## 2026-03-25

### Session 8: Phase 5 — Third-Party Integration Components (Tier 4)

**Tổng quan**: Built all 6 Phase 5 third-party integration components across 3 sprints, registered in ServiceProvider, 39 new tests (389 total).

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Sprint 5.1 — Charts & Visualization | ✅ | Chart (ApexCharts: line/area/bar/donut/radar, 10 default colors, loading state), RegionMap (Leaflet + GeoJSON, choropleth, tooltip) |
| 2 | Sprint 5.2 — Rich Content | ✅ | RichTextEditor (TipTap: 9 toolbar buttons + H1/H2/H3, custom toolbar slot, editor-update dispatch), SyntaxHighlighter (Prism.js: language label, copy button, line numbers) |
| 3 | Sprint 5.3 — Calendar & Gantt | ✅ | CalendarView (FullCalendar: dayGrid/timeGrid, 6 event colors, 5 dispatched events), GanttChart (Frappe Gantt: task bars, view modes, 4 dispatched events) |
| 4 | Component Registration | ✅ | All 6 components registered in ServiceProvider (92 total) |
| 5 | Test Suite | ✅ | 39 Phase 5 tests (55 assertions) — 389 total tests (658 assertions) all pass |
| 6 | Phase 5 Checklist | ✅ | Updated docs/plan/phase-5-thirdparty.md |
| 7 | Bug Fix — $data naming conflict | ✅ | RegionMap $data property conflicts with Component::data() method. Renamed to $mapData. |

#### Bài học rút ra:
- **NEVER name a component property `$data`** — conflicts with `Illuminate\View\Component::data()` public method. The `extractPublicMethods()` overwrites the property in the merged view data.
- **JSON in x-data attributes**: Use `{{ json_encode() }}` (Blade auto-escaping) instead of `{!! json_encode() !!}`. Browser decodes `&quot;` before Alpine evaluates.
- **CDN-first vendor strategy**: Tier 4 components assume libraries loaded externally (CDN or npm). Console.warn if library not found at runtime.

---

## 2026-03-24

### Session 7: Phase 4 — Layout & Template Components

**Tổng quan**: Built all 22 Phase 4 layout/template/shared components across 3 sprints, registered in ServiceProvider, 64 new tests (350 total).

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Sprint 4.1 — Layout Framework | ✅ | LayoutBase (Alpine $store.layout), CollapsibleSide, StackedSide, TopBarClassic, FramelessSide, ContentOverlay, Blank |
| 2 | Sprint 4.2 — Header & Navigation | ✅ | Header (3-slot), SideNav (collapsible, 290→80px), MobileNav (drawer+hamburger), Footer, PageContainer (gutters), SideNavToggle, Logo (light/dark) |
| 3 | Sprint 4.3 — Shared/Utility | ✅ | Search (Cmd+K dialog), UserDropdown (avatar+menu), LanguageSelector, ThemeConfigurator (drawer+localStorage), HorizontalNav, Breadcrumb, PageHeader, Container |
| 4 | Component Registration | ✅ | All 22 components registered in ServiceProvider (86 total) |
| 5 | Test Suite | ✅ | 64 Phase 4 tests (98 assertions) — 350 total tests (603 assertions) all pass |
| 6 | Phase 4 Checklist | ✅ | Updated docs/plan/phase-4-templates.md |
| 7 | Notification deferred | ⏳ | Notification header widget deferred (requires notification system design) |

---

## 2026-03-23

### Session 6: Phase 3 — Complex Alpine.js Plugin Components (Tier 3)

**Tổng quan**: Built all 16 Phase 3 Tier 3 components with complex Alpine.js inline logic, registered in ServiceProvider, 85 new tests (286 total).

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Sprint 3.1 — Advanced Inputs | ✅ | Select (search, multi, keyboard nav), AutoComplete (type-ahead), OtpInput (paste, auto-focus) |
| 2 | Sprint 3.2 — Date & Time | ✅ | DatePicker (calendar grid, 3 view modes), DatePickerRange (hover preview), DateTimePicker (calendar+time), TimeInput (field focus, 12/24h) |
| 3 | Sprint 3.3 — Data & Range | ✅ | Slider (single/range, touch drag, marks), Table + 6 sub-components (THead, TBody, TFoot, Tr, Th, Td), Sorter |
| 4 | Component Registration | ✅ | All 16 components registered in ServiceProvider (64 total) |
| 5 | Test Suite | ✅ | 85 Phase 3 tests (154 assertions) — 286 total tests (505 assertions) all pass |
| 6 | Bug Fixes | ✅ | Fixed Blade `{{ }}` ternary escaping in date pickers (use `@php` + `{!! !!}`), fixed `toHtml()` → `(string) $view` in tests, fixed `assertSee` double-escaping `&amp;` |
| 7 | Phase 3 Checklist | ✅ | Updated docs/plan/phase-3-complex.md |

---

## 2026-03-22

### Session 1: Khởi tạo dự án & Lập kế hoạch

**Tổng quan**: Phân tích Ecme NextJS template, đánh giá tính khả thi, lập kế hoạch chuyển đổi toàn bộ.

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Phân tích cấu trúc Ecme template | ✅ | 41 UI, 25 Shared, 20 Template components, 100+ pages |
| 2 | Đánh giá tính khả thi | ✅ | Khả thi 85-90%, tạo FEASIBILITY.md |
| 3 | Lập kế hoạch chuyển đổi chi tiết | ✅ | 128 components, 10 phases, tạo CONVERSION-PLAN.md |
| 4 | Tạo .github/copilot-instructions.md | ✅ | Coding standards, conventions, conversion workflow |
| 5 | Tạo .github/AGENTS.md | ✅ | 3 agents: Converter, Doc Writer, CSS Migrator |
| 6 | Tạo .github/skills/ | ✅ | Blade conversion skill, CSS migration skill |
| 7 | Tạo .github/prompts/ | ✅ | convert-component.prompt.md |
| 8 | Tạo .github/workflows/tests.yml | ✅ | CI cho PHP 8.2-8.4, Laravel 11-12 |
| 9 | Tạo .github/CONTRIBUTING.md | ✅ | Hướng dẫn đóng góp |
| 10 | Lập kế hoạch Documentation site | ✅ | DOCUMENTATION-PLAN.md |
| 11 | Tạo README.md | ✅ | Overview, install, examples, full component list |

### Session 2: Tạo docs/ai & docs/plan

**Tổng quan**: Tổ chức thư mục docs với AI memory system và planning files.

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Tạo docs/ai/ memory system | ✅ | Activity log, error log, decisions, files registry |
| 2 | Tạo docs/plan/ checklists | ✅ | Phase plans với checklist chi tiết |
| 3 | Cập nhật .github/ cho docs | ✅ | Instructions, agents, prompts |

### Session 3: Phase 0 — Project Scaffolding

**Tổng quan**: Hoàn thành toàn bộ Phase 0 scaffolding cho package.

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | 0.1 Package Structure | ✅ | composer.json, ServiceProvider, Facade, config, package.json, vite.config.js |
| 2 | 0.2 CSS Base Setup | ✅ | oryn-ui.css, variables.css, typography.css, reset.css |
| 3 | 0.3 CSS Components Migration | ✅ | 35 component CSS files copy từ Ecme (bỏ `_` prefix) |
| 4 | 0.4 CSS Template Migration | ✅ | 4 template CSS files |
| 5 | 0.5 CSS Vendors | ✅ | 4 vendor CSS files + 1 animations |
| 6 | 0.6 JS Base Setup | ✅ | oryn-ui.js, helpers.js, theme-switcher.js, sidebar-toggle.js |
| 7 | 0.7 Testing Infrastructure | ✅ | phpunit.xml, TestCase.php, Pest.php, ServiceProviderTest — 3 tests pass |
| 8 | 0.8 Artisan Commands | ✅ | InstallCommand, PublishCommand |
| 9 | 0.9 Shared Traits | ✅ | HasVariant, HasSize |
| 10 | 0.10 Stubs | ✅ | blade-component.stub, component-class.stub |
| 11 | .gitignore | ✅ | vendor, node_modules, dist, cache |

### Session 4: Phase 1 — Core UI Components (Tier 1)

**Tổng quan**: Built all 23 Tier 1 Blade components with PHP classes and 102 tests.

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Sprint 1.1 — Display components | ✅ | Alert, Badge, Tag, StatusIcon, Spinner, Skeleton, CloseButton, Notification |
| 2 | Sprint 1.2 — Containers & Forms | ✅ | Card, Button, Avatar, AvatarGroup, Input, InputGroup, InputAddon, FormContainer, FormItem |
| 3 | Sprint 1.3 — Data Display | ✅ | Progress (line+circle), Timeline, TimelineItem, Steps, StepItem |
| 4 | Component Registration | ✅ | All 23 components registered in ServiceProvider via Blade::component() |
| 5 | Test Suite | ✅ | 102 tests, 187 assertions — all passing |
| 6 | Phase 1 Checklist | ✅ | Updated docs/plan/phase-1-core-ui.md |

### Session 5: Phase 2 — Interactive Alpine.js Components (Tier 2)

**Tổng quan**: Built all 25 Tier 2 interactive components with Alpine.js, registered in ServiceProvider, 99 new tests (201 total).

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Sprint 2.1 — Form Controls | ✅ | Checkbox, CheckboxGroup, Radio, RadioGroup, Switcher, Segment, SegmentItem (14 files) |
| 2 | Sprint 2.2 — Overlays & Popups | ✅ | Tooltip, Dialog, Drawer, Dropdown, DropdownItem, Toast (12 files) |
| 3 | Sprint 2.3 — Navigation & Tabs | ✅ | Tabs, TabList, TabNav, TabContent, Menu, MenuItem, MenuCollapse, MenuGroup, Pagination (18 files) |
| 4 | Sprint 2.4 — Media & Upload | ✅ | Upload, Carousel (4 files) |
| 5 | Component Registration | ✅ | All 25 components registered in ServiceProvider |
| 6 | Test Suite | ✅ | 201 tests, 351 assertions — all passing |
| 7 | IDE Error Fixes | ✅ | Fixed .github/prompts frontmatter, TestCase @mixin docblock |

---

<!-- 
## YYYY-MM-DD

### Session N: Tên phiên

**Tổng quan**: Mô tả ngắn.

#### Tasks hoàn thành:

| # | Task | Status | Ghi chú |
|---|------|--------|---------|
| 1 | Task name | ✅/❌ | Notes |
-->
