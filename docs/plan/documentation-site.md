# Documentation Site Plan

**Trạng thái**: 🔄 In Progress — Milestone 1 ✅ / Milestone 2 🔄 (10/57 component pages)
**Phụ thuộc**: Phase 0 (package scaffolding), runs parallel with Phase 1+
**Ưu tiên**: 🟢 Song song
**Repo**: https://github.com/ptnghia/OrynUI-docs-site (separate repo)

Documentation site là một Laravel app sử dụng chính Oryn UI (dog-fooding).

---

## Milestone 1 — MVP (alongside Phase 1)

### Site Scaffolding
- [x] Laravel app trong `docs-site/` directory (separate repo: OrynUI-docs-site)
- [x] Install Oryn UI package (path repository)
- [x] Tailwind CSS 4 setup (`@theme inline` mapping Oryn CSS vars to Tailwind tokens)
- [x] Alpine.js setup (aliased in vite.config.js)
- [x] Basic layout: sidebar + content area

### Core Pages
- [x] Homepage / landing
- [x] Getting Started: Installation
- [x] Getting Started: Quick Start
- [x] Getting Started: Configuration
- [x] Theming: Overview
- [x] Theming: Colors & CSS Variables
- [x] Theming: Dark Mode
- [x] Theming: Presets

### Code Preview Component
- [x] `CodePreview` Blade component
- [x] Live rendered output above
- [ ] Syntax-highlighted source code below (Prism.js) — using plain pre/code styling
- [x] Copy button (clipboard API)
- [ ] Tab variants (Blade / HTML output)
- [ ] Responsive preview toggle (desktop/tablet/mobile)

### Navigation
- [x] Sidebar navigation with collapsible groups
- [x] Mobile hamburger menu (Alpine `sidebarOpen` toggle)
- [ ] Breadcrumb
- [x] Previous/Next page links
- [ ] Search (Cmd+K) — UI placeholder exists, not functional yet

---

## Milestone 2 — Core Components (alongside Phase 2-3)

### Component Documentation Pages
Structure per component page:
- [x] Title + description
- [x] Import / usage snippet
- [x] Basic example (CodePreview)
- [x] Variant examples
- [x] Size examples
- [x] Props/API reference table
- [x] Slots reference table
- [ ] Events reference table
- [ ] Accessibility notes

### Phase 1 Component Docs (22 pages)
- [x] Alert
- [x] Avatar / AvatarGroup
- [x] Badge
- [x] Button
- [x] Card / CardHeader / CardBody / CardFooter
- [ ] CloseButton
- [ ] Collapse / CollapseGroup (Accordion)
- [ ] FormItem / FormLabel
- [ ] Icon
- [x] Input / InputGroup / InputAddon
- [ ] Progress
- [ ] Skeleton
- [x] Spinner
- [ ] StatusIcon
- [ ] Steps
- [ ] Table (basic)
- [ ] Tag
- [ ] Textarea
- [ ] Timeline
- [ ] Notification (static)

### Phase 2 Component Docs (25 pages)
- [ ] Checkbox / CheckboxGroup
- [ ] Radio / RadioGroup
- [ ] Switcher
- [ ] Segment / SegmentItem
- [ ] Tooltip
- [x] Dialog
- [ ] Drawer
- [x] Dropdown / DropdownItem / DropdownSub
- [ ] Toast
- [x] Tabs / TabList / TabNav / TabContent
- [ ] Menu / MenuItem / MenuCollapse / MenuGroup
- [ ] Pagination
- [ ] Upload
- [ ] Carousel

### Phase 3 Component Docs (10 pages)
- [ ] Select
- [ ] AutoComplete
- [ ] OtpInput
- [ ] DatePicker
- [ ] DatePickerRange
- [ ] DateTimePicker
- [ ] TimeInput
- [ ] Slider
- [ ] Table (sortable)
- [ ] DataTable

---

## Milestone 3 — Complete (alongside Phase 4-6)

### Template & Layout Docs
- [ ] Layouts Overview
- [ ] CollapsibleSide Layout
- [ ] StackedSide Layout
- [ ] TopBarClassic Layout
- [ ] FramelessSide Layout
- [ ] ContentOverlay Layout
- [ ] Blank Layout
- [ ] Header
- [ ] SideNav
- [ ] MobileNav
- [ ] Footer
- [ ] ThemeConfigurator

### Third-Party Component Docs
- [ ] Chart (ApexCharts)
- [ ] RichTextEditor (TipTap)
- [ ] CalendarView (FullCalendar)
- [ ] GanttChart
- [ ] SyntaxHighlighter (Prism.js)
- [ ] RegionMap (Leaflet)

### Page Block Docs
- [ ] Auth Blocks (sign-in, sign-up, forgot-password, reset-password, otp)
- [ ] Dashboard Blocks (ecommerce, project, analytic, marketing)
- [ ] CRUD Blocks (product, customer, order, generic)
- [ ] App Blocks (chat, file-manager, calendar, kanban, scrumboard)
- [ ] Account Blocks (settings, activity-log, kyc, pricing)
- [ ] Utility Blocks (403, 404, 500, maintenance)
- [ ] Help Center Blocks

### Advanced Guides
- [ ] Customizing Components
- [ ] Creating Custom Themes
- [ ] RTL Support
- [ ] Accessibility Guide
- [ ] Livewire Integration (Phase 2 preview)
- [ ] Vue.js / Inertia Integration (Phase 3 preview)
- [ ] Contributing Guide
- [ ] Changelog

---

## Static Site Generation & Deployment

### Build Pipeline
- [ ] `spatie/laravel-export` hoặc thay thế
- [ ] Generate static HTML từ doc routes
- [ ] Deploy to GitHub Pages
- [ ] Custom domain setup (nếu có)

### GitHub Actions
- [ ] Workflow: build docs on push to `main`
- [ ] Deploy to `gh-pages` branch
- [ ] Versioned docs (v1, v2, etc.)

### SEO
- [ ] Meta tags cho mỗi page
- [ ] Open Graph images
- [ ] Sitemap.xml
- [ ] robots.txt

---

## Documentation Site Verification

- [ ] Mọi component có doc page
- [ ] CodePreview hoạt động chính xác
- [ ] Search tìm được components
- [ ] Mobile responsive
- [ ] Dark mode toggle
- [ ] Copy code button hoạt động
- [ ] Navigation breadcrumb đúng
- [ ] Sidebar active state đúng
- [ ] Static build thành công
- [ ] Deploy pipeline hoạt động
