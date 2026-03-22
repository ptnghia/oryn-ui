# Documentation Site Plan

**Trạng thái**: ⏳ Not started
**Phụ thuộc**: Phase 0 (package scaffolding), runs parallel with Phase 1+
**Ưu tiên**: 🟢 Song song

Documentation site là một Laravel app sử dụng chính Oryn UI (dog-fooding).

---

## Milestone 1 — MVP (alongside Phase 1)

### Site Scaffolding
- [ ] Laravel app trong `docs/` directory
- [ ] Install Oryn UI package (path repository)
- [ ] Tailwind CSS 4 setup
- [ ] Alpine.js setup
- [ ] Basic layout: sidebar + content area

### Core Pages
- [ ] Homepage / landing
- [ ] Getting Started: Installation
- [ ] Getting Started: Quick Start
- [ ] Getting Started: Configuration
- [ ] Theming: Overview
- [ ] Theming: Colors & CSS Variables
- [ ] Theming: Dark Mode
- [ ] Theming: Presets

### Code Preview Component
- [ ] `CodePreview` Blade component
- [ ] Live rendered output above
- [ ] Syntax-highlighted source code below (Prism.js)
- [ ] Copy button
- [ ] Tab variants (Blade / HTML output)
- [ ] Responsive preview toggle (desktop/tablet/mobile)

### Navigation
- [ ] Sidebar navigation with collapsible groups
- [ ] Mobile hamburger menu
- [ ] Breadcrumb
- [ ] Previous/Next page links
- [ ] Search (Cmd+K)

---

## Milestone 2 — Core Components (alongside Phase 2-3)

### Component Documentation Pages
Structure per component page:
- [ ] Title + description
- [ ] Import / usage snippet
- [ ] Basic example (CodePreview)
- [ ] Variant examples
- [ ] Size examples
- [ ] Props/API reference table
- [ ] Slots reference table
- [ ] Events reference table
- [ ] Accessibility notes

### Phase 1 Component Docs (22 pages)
- [ ] Alert
- [ ] Avatar / AvatarGroup
- [ ] Badge
- [ ] Button
- [ ] Card / CardHeader / CardBody / CardFooter
- [ ] CloseButton
- [ ] Collapse / CollapseGroup (Accordion)
- [ ] FormItem / FormLabel
- [ ] Icon
- [ ] Input / InputGroup / InputAddon
- [ ] Progress
- [ ] Skeleton
- [ ] Spinner
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
- [ ] Dialog
- [ ] Drawer
- [ ] Dropdown / DropdownItem / DropdownSub
- [ ] Toast
- [ ] Tabs / TabList / TabNav / TabContent
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
