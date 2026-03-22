# Files Registry — Oryn UI

Danh sách tất cả file đã tạo trong dự án, mục đích, và trạng thái.

---

## Cách đọc

- **Status**: `✅` hoàn thành | `🔄` đang cập nhật | `📋` placeholder/template | `❌` đã xóa
- **Purpose**: Mục đích tạo file

---

## Project Root

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `README.md` | Giới thiệu package, hướng dẫn cài đặt, ví dụ sử dụng | ✅ | 2026-03-22 |
| `FEASIBILITY.md` | Đánh giá tính khả thi dự án | ✅ | 2026-03-22 |
| `CONVERSION-PLAN.md` | Kế hoạch chuyển đổi chi tiết 128 components | ✅ | 2026-03-22 |
| `DOCUMENTATION-PLAN.md` | Kế hoạch documentation site | ✅ | 2026-03-22 |

## .github/

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `.github/copilot-instructions.md` | Hướng dẫn chính cho Copilot: namespace, conventions, coding standards, AI logging rules | ✅ | 2026-03-22 |
| `.github/AGENTS.md` | Định nghĩa 4 agents: Component Converter, Doc Writer, CSS Migrator, Progress Tracker | ✅ | 2026-03-22 |
| `.github/CONTRIBUTING.md` | Hướng dẫn đóng góp cho developers | ✅ | 2026-03-22 |
| `.github/workflows/tests.yml` | CI/CD: test PHP 8.2-8.4, Laravel 11-12 | ✅ | 2026-03-22 |
| `.github/skills/blade-component/SKILL.md` | Skill guide: convert React → Blade + Alpine.js | ✅ | 2026-03-22 |
| `.github/skills/css-migration/SKILL.md` | Skill guide: migrate CSS files | ✅ | 2026-03-22 |
| `.github/prompts/convert-component.prompt.md` | Prompt template khi convert component | ✅ | 2026-03-22 |
| `.github/prompts/update-logs.prompt.md` | Prompt template cập nhật AI logs sau mỗi session | ✅ | 2026-03-22 |

## docs/ai/

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `docs/ai/README.md` | Giới thiệu hệ thống AI memory | ✅ | 2026-03-22 |
| `docs/ai/activity-log.md` | Log công việc đã hoàn thành theo ngày | 🔄 | 2026-03-22 |
| `docs/ai/error-log.md` | Log lỗi gặp phải và cách giải quyết | 📋 | 2026-03-22 |
| `docs/ai/decisions.md` | Log quyết định thiết kế và lý do | 🔄 | 2026-03-22 |
| `docs/ai/files-registry.md` | File này — danh sách tất cả files | 🔄 | 2026-03-22 |
| `docs/ai/session-notes.md` | Ghi chú phiên làm việc hiện tại | 🔄 | 2026-03-22 |

## docs/plan/

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `docs/plan/README.md` | Giới thiệu hệ thống planning | ✅ | 2026-03-22 |
| `docs/plan/phase-0-scaffolding.md` | Checklist: Package scaffolding, CSS migrate | ✅ | 2026-03-22 |
| `docs/plan/phase-1-core-ui.md` | Checklist: 23 Tier 1 pure HTML/CSS components | ✅ | 2026-03-22 |
| `docs/plan/phase-2-interactive.md` | Checklist: 25 Tier 2 Alpine.js components | 📋 | 2026-03-22 |
| `docs/plan/phase-3-complex.md` | Checklist: 10 Tier 3 Alpine.js plugin components | 📋 | 2026-03-22 |
| `docs/plan/phase-4-templates.md` | Checklist: 19 layout/template components | 📋 | 2026-03-22 |
| `docs/plan/phase-5-thirdparty.md` | Checklist: 6 third-party JS components | 📋 | 2026-03-22 |
| `docs/plan/phase-6-blocks.md` | Checklist: 46 page blocks | 📋 | 2026-03-22 |
| `docs/plan/documentation-site.md` | Checklist: Documentation site song song | 📋 | 2026-03-22 |

## Package Source (chưa tạo)

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `composer.json` | Package metadata, PSR-4 autoload, dependencies | ✅ | 2026-03-22 |
| `.gitignore` | Git ignore rules | ✅ | 2026-03-22 |
| `package.json` | Node dependencies (Tailwind, Alpine, Vite) | ✅ | 2026-03-22 |
| `vite.config.js` | Vite build pipeline | ✅ | 2026-03-22 |
| `phpunit.xml` | PHPUnit/Pest configuration | ✅ | 2026-03-22 |
| `config/oryn-ui.php` | Package config: theme, layout, presets, constants | ✅ | 2026-03-22 |
| `src/OrynUIServiceProvider.php` | Register views, config, commands | ✅ | 2026-03-22 |
| `src/OrynUIFacade.php` | Facade class | ✅ | 2026-03-22 |
| `src/Commands/InstallCommand.php` | `artisan oryn-ui:install` | ✅ | 2026-03-22 |
| `src/Commands/PublishCommand.php` | `artisan oryn-ui:publish` | ✅ | 2026-03-22 |
| `src/Traits/HasVariant.php` | Variant prop handling trait | ✅ | 2026-03-22 |
| `src/Traits/HasSize.php` | Size prop handling trait | ✅ | 2026-03-22 |
| `resources/css/oryn-ui.css` | Main CSS entry point (imports all) | ✅ | 2026-03-22 |
| `resources/css/base/variables.css` | CSS custom properties (:root) | ✅ | 2026-03-22 |
| `resources/css/base/typography.css` | Typography rules (h1-h6) | ✅ | 2026-03-22 |
| `resources/css/base/reset.css` | Base reset (body, border-color) | ✅ | 2026-03-22 |
| `resources/css/components/*.css` | 35 component CSS files (migrated from Ecme) | ✅ | 2026-03-22 |
| `resources/css/template/*.css` | 4 template CSS files (migrated) | ✅ | 2026-03-22 |
| `resources/css/vendors/*.css` | 4 vendor CSS files (migrated) | ✅ | 2026-03-22 |
| `resources/css/others/animations.css` | Animation utilities (migrated) | ✅ | 2026-03-22 |
| `resources/js/oryn-ui.js` | Main Alpine.js plugin registry | ✅ | 2026-03-22 |
| `resources/js/utils/helpers.js` | Utility functions (uniqueId, debounce, etc.) | ✅ | 2026-03-22 |
| `resources/js/utils/theme-switcher.js` | Dark mode toggle, theme preset apply | ✅ | 2026-03-22 |
| `resources/js/utils/sidebar-toggle.js` | Sidebar collapse state management | ✅ | 2026-03-22 |
| `tests/TestCase.php` | Base test class (Orchestra Testbench) | ✅ | 2026-03-22 |
| `tests/Pest.php` | Pest configuration | ✅ | 2026-03-22 |
| `tests/Feature/ServiceProviderTest.php` | 3 tests: provider, config, views | ✅ | 2026-03-22 |
| `stubs/blade-component.stub` | Blade view template | ✅ | 2026-03-22 |
| `stubs/component-class.stub` | PHP class template | ✅ | 2026-03-22 |

## Phase 1 — UI Components (src/Components/UI/)

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/UI/Alert.php` | Alert component class | ✅ | 2026-03-22 |
| `src/Components/UI/Badge.php` | Badge component class | ✅ | 2026-03-22 |
| `src/Components/UI/Tag.php` | Tag component class | ✅ | 2026-03-22 |
| `src/Components/UI/StatusIcon.php` | Status icon component class | ✅ | 2026-03-22 |
| `src/Components/UI/Spinner.php` | Spinner component class | ✅ | 2026-03-22 |
| `src/Components/UI/Skeleton.php` | Skeleton component class | ✅ | 2026-03-22 |
| `src/Components/UI/CloseButton.php` | Close button component class | ✅ | 2026-03-22 |
| `src/Components/UI/Notification.php` | Notification component class | ✅ | 2026-03-22 |
| `src/Components/UI/Card.php` | Card component class | ✅ | 2026-03-22 |
| `src/Components/UI/Button.php` | Button component class | ✅ | 2026-03-22 |
| `src/Components/UI/Avatar.php` | Avatar component class | ✅ | 2026-03-22 |
| `src/Components/UI/AvatarGroup.php` | Avatar group component class | ✅ | 2026-03-22 |
| `src/Components/UI/Input.php` | Input component class | ✅ | 2026-03-22 |
| `src/Components/UI/InputGroup.php` | Input group component class | ✅ | 2026-03-22 |
| `src/Components/UI/InputAddon.php` | Input addon component class | ✅ | 2026-03-22 |
| `src/Components/UI/FormContainer.php` | Form container component class | ✅ | 2026-03-22 |
| `src/Components/UI/FormItem.php` | Form item component class | ✅ | 2026-03-22 |
| `src/Components/UI/Progress.php` | Progress (line+circle) component class | ✅ | 2026-03-22 |
| `src/Components/UI/Timeline.php` | Timeline component class | ✅ | 2026-03-22 |
| `src/Components/UI/TimelineItem.php` | Timeline item component class | ✅ | 2026-03-22 |
| `src/Components/UI/Steps.php` | Steps component class | ✅ | 2026-03-22 |
| `src/Components/UI/StepItem.php` | Step item component class | ✅ | 2026-03-22 |

## Phase 1 — Blade Views (resources/views/components/ui/)

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/ui/alert.blade.php` | Alert view | ✅ | 2026-03-22 |
| `resources/views/components/ui/badge.blade.php` | Badge view | ✅ | 2026-03-22 |
| `resources/views/components/ui/tag.blade.php` | Tag view | ✅ | 2026-03-22 |
| `resources/views/components/ui/status-icon.blade.php` | Status icon view | ✅ | 2026-03-22 |
| `resources/views/components/ui/spinner.blade.php` | Spinner view | ✅ | 2026-03-22 |
| `resources/views/components/ui/skeleton.blade.php` | Skeleton view | ✅ | 2026-03-22 |
| `resources/views/components/ui/close-button.blade.php` | Close button view | ✅ | 2026-03-22 |
| `resources/views/components/ui/notification.blade.php` | Notification view | ✅ | 2026-03-22 |
| `resources/views/components/ui/card.blade.php` | Card view | ✅ | 2026-03-22 |
| `resources/views/components/ui/button.blade.php` | Button view | ✅ | 2026-03-22 |
| `resources/views/components/ui/avatar.blade.php` | Avatar view | ✅ | 2026-03-22 |
| `resources/views/components/ui/avatar-group.blade.php` | Avatar group view | ✅ | 2026-03-22 |
| `resources/views/components/ui/input.blade.php` | Input view | ✅ | 2026-03-22 |
| `resources/views/components/ui/input-group.blade.php` | Input group view | ✅ | 2026-03-22 |
| `resources/views/components/ui/input-addon.blade.php` | Input addon view | ✅ | 2026-03-22 |
| `resources/views/components/ui/form-container.blade.php` | Form container view | ✅ | 2026-03-22 |
| `resources/views/components/ui/form-item.blade.php` | Form item view | ✅ | 2026-03-22 |
| `resources/views/components/ui/progress.blade.php` | Progress (line+circle) view | ✅ | 2026-03-22 |
| `resources/views/components/ui/timeline.blade.php` | Timeline view | ✅ | 2026-03-22 |
| `resources/views/components/ui/timeline-item.blade.php` | Timeline item view | ✅ | 2026-03-22 |
| `resources/views/components/ui/steps.blade.php` | Steps view | ✅ | 2026-03-22 |
| `resources/views/components/ui/step-item.blade.php` | Step item view | ✅ | 2026-03-22 |

## Phase 1 — Tests

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `tests/Feature/Components/UI/AlertTest.php` | 8 alert tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/BadgeTest.php` | 6 badge tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/TagTest.php` | 4 tag tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/StatusIconTest.php` | 6 status icon tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/SpinnerTest.php` | 4 spinner tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/SkeletonTest.php` | 5 skeleton tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/CloseButtonTest.php` | 4 close button tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/NotificationTest.php` | 5 notification tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/CardTest.php` | 7 card tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/ButtonTest.php` | 9 button tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/AvatarTest.php` | 7 avatar tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/InputTest.php` | 7 input tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/FormTest.php` | 7 form tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/ProgressTest.php` | 6 progress tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/TimelineTest.php` | 5 timeline tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/StepsTest.php` | 9 steps tests | ✅ | 2026-03-22 |

## Phase 2 — UI Components (src/Components/UI/)

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/UI/Checkbox.php` | Checkbox component class | ✅ | 2026-03-22 |
| `src/Components/UI/CheckboxGroup.php` | Checkbox group component class | ✅ | 2026-03-22 |
| `src/Components/UI/Radio.php` | Radio component class | ✅ | 2026-03-22 |
| `src/Components/UI/RadioGroup.php` | Radio group component class | ✅ | 2026-03-22 |
| `src/Components/UI/Switcher.php` | Switcher/toggle component class | ✅ | 2026-03-22 |
| `src/Components/UI/Segment.php` | Segment component class | ✅ | 2026-03-22 |
| `src/Components/UI/SegmentItem.php` | Segment item component class | ✅ | 2026-03-22 |
| `src/Components/UI/Tooltip.php` | Tooltip component class | ✅ | 2026-03-22 |
| `src/Components/UI/Dialog.php` | Dialog/modal component class | ✅ | 2026-03-22 |
| `src/Components/UI/Drawer.php` | Drawer component class | ✅ | 2026-03-22 |
| `src/Components/UI/Dropdown.php` | Dropdown component class | ✅ | 2026-03-22 |
| `src/Components/UI/DropdownItem.php` | Dropdown item component class | ✅ | 2026-03-22 |
| `src/Components/UI/Toast.php` | Toast notification component class | ✅ | 2026-03-22 |
| `src/Components/UI/Tabs.php` | Tabs wrapper component class | ✅ | 2026-03-22 |
| `src/Components/UI/TabList.php` | Tab list component class | ✅ | 2026-03-22 |
| `src/Components/UI/TabNav.php` | Tab nav button component class | ✅ | 2026-03-22 |
| `src/Components/UI/TabContent.php` | Tab content panel component class | ✅ | 2026-03-22 |
| `src/Components/UI/Menu.php` | Menu component class | ✅ | 2026-03-22 |
| `src/Components/UI/MenuItem.php` | Menu item component class | ✅ | 2026-03-22 |
| `src/Components/UI/MenuCollapse.php` | Menu collapse component class | ✅ | 2026-03-22 |
| `src/Components/UI/MenuGroup.php` | Menu group component class | ✅ | 2026-03-22 |
| `src/Components/UI/Pagination.php` | Pagination component class | ✅ | 2026-03-22 |
| `src/Components/UI/Upload.php` | Upload component class | ✅ | 2026-03-22 |
| `src/Components/UI/Carousel.php` | Carousel component class | ✅ | 2026-03-22 |

## Phase 2 — Blade Views (resources/views/components/ui/)

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/ui/checkbox.blade.php` | Checkbox view | ✅ | 2026-03-22 |
| `resources/views/components/ui/checkbox-group.blade.php` | Checkbox group view | ✅ | 2026-03-22 |
| `resources/views/components/ui/radio.blade.php` | Radio view | ✅ | 2026-03-22 |
| `resources/views/components/ui/radio-group.blade.php` | Radio group view | ✅ | 2026-03-22 |
| `resources/views/components/ui/switcher.blade.php` | Switcher view | ✅ | 2026-03-22 |
| `resources/views/components/ui/segment.blade.php` | Segment view | ✅ | 2026-03-22 |
| `resources/views/components/ui/segment-item.blade.php` | Segment item view | ✅ | 2026-03-22 |
| `resources/views/components/ui/tooltip.blade.php` | Tooltip view | ✅ | 2026-03-22 |
| `resources/views/components/ui/dialog.blade.php` | Dialog view | ✅ | 2026-03-22 |
| `resources/views/components/ui/drawer.blade.php` | Drawer view | ✅ | 2026-03-22 |
| `resources/views/components/ui/dropdown.blade.php` | Dropdown view | ✅ | 2026-03-22 |
| `resources/views/components/ui/dropdown-item.blade.php` | Dropdown item view | ✅ | 2026-03-22 |
| `resources/views/components/ui/toast.blade.php` | Toast view | ✅ | 2026-03-22 |
| `resources/views/components/ui/tabs.blade.php` | Tabs view | ✅ | 2026-03-22 |
| `resources/views/components/ui/tab-list.blade.php` | Tab list view | ✅ | 2026-03-22 |
| `resources/views/components/ui/tab-nav.blade.php` | Tab nav view | ✅ | 2026-03-22 |
| `resources/views/components/ui/tab-content.blade.php` | Tab content view | ✅ | 2026-03-22 |
| `resources/views/components/ui/menu.blade.php` | Menu view | ✅ | 2026-03-22 |
| `resources/views/components/ui/menu-item.blade.php` | Menu item view | ✅ | 2026-03-22 |
| `resources/views/components/ui/menu-collapse.blade.php` | Menu collapse view | ✅ | 2026-03-22 |
| `resources/views/components/ui/menu-group.blade.php` | Menu group view | ✅ | 2026-03-22 |
| `resources/views/components/ui/pagination.blade.php` | Pagination view | ✅ | 2026-03-22 |
| `resources/views/components/ui/upload.blade.php` | Upload view | ✅ | 2026-03-22 |
| `resources/views/components/ui/carousel.blade.php` | Carousel view | ✅ | 2026-03-22 |

## Phase 2 — Tests

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `tests/Feature/Components/UI/CheckboxTest.php` | Checkbox & group tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/RadioTest.php` | Radio & group tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/SwitcherTest.php` | Switcher tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/SegmentTest.php` | Segment & item tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/TooltipTest.php` | Tooltip tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/DialogTest.php` | Dialog tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/DrawerTest.php` | Drawer tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/DropdownTest.php` | Dropdown & item tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/ToastTest.php` | Toast tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/TabsTest.php` | Tabs, TabList, TabNav, TabContent tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/MenuTest.php` | Menu, MenuItem, MenuCollapse, MenuGroup tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/PaginationTest.php` | Pagination tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/UploadTest.php` | Upload tests | ✅ | 2026-03-22 |
| `tests/Feature/Components/UI/CarouselTest.php` | Carousel tests | ✅ | 2026-03-22 |

## Phase 3 — UI Components (src/Components/UI/)

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/UI/Select.php` | Select dropdown component class | ✅ | 2026-03-23 |
| `src/Components/UI/AutoComplete.php` | AutoComplete component class | ✅ | 2026-03-23 |
| `src/Components/UI/OtpInput.php` | OTP input component class | ✅ | 2026-03-23 |
| `src/Components/UI/DatePicker.php` | Date picker component class | ✅ | 2026-03-23 |
| `src/Components/UI/DatePickerRange.php` | Date picker range component class | ✅ | 2026-03-23 |
| `src/Components/UI/DateTimePicker.php` | Date time picker component class | ✅ | 2026-03-23 |
| `src/Components/UI/TimeInput.php` | Time input component class | ✅ | 2026-03-23 |
| `src/Components/UI/Slider.php` | Slider component class | ✅ | 2026-03-23 |
| `src/Components/UI/Table.php` | Table component class | ✅ | 2026-03-23 |
| `src/Components/UI/THead.php` | Table head component class | ✅ | 2026-03-23 |
| `src/Components/UI/TBody.php` | Table body component class | ✅ | 2026-03-23 |
| `src/Components/UI/TFoot.php` | Table foot component class | ✅ | 2026-03-23 |
| `src/Components/UI/Tr.php` | Table row component class | ✅ | 2026-03-23 |
| `src/Components/UI/Th.php` | Table header cell component class | ✅ | 2026-03-23 |
| `src/Components/UI/Td.php` | Table data cell component class | ✅ | 2026-03-23 |
| `src/Components/UI/Sorter.php` | Table sorter component class | ✅ | 2026-03-23 |

## Phase 3 — Blade Views (resources/views/components/ui/)

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/ui/select.blade.php` | Select view | ✅ | 2026-03-23 |
| `resources/views/components/ui/auto-complete.blade.php` | AutoComplete view | ✅ | 2026-03-23 |
| `resources/views/components/ui/otp-input.blade.php` | OTP input view | ✅ | 2026-03-23 |
| `resources/views/components/ui/date-picker.blade.php` | Date picker view | ✅ | 2026-03-23 |
| `resources/views/components/ui/date-picker-range.blade.php` | Date picker range view | ✅ | 2026-03-23 |
| `resources/views/components/ui/date-time-picker.blade.php` | Date time picker view | ✅ | 2026-03-23 |
| `resources/views/components/ui/time-input.blade.php` | Time input view | ✅ | 2026-03-23 |
| `resources/views/components/ui/slider.blade.php` | Slider view | ✅ | 2026-03-23 |
| `resources/views/components/ui/table.blade.php` | Table view | ✅ | 2026-03-23 |
| `resources/views/components/ui/thead.blade.php` | Table head view | ✅ | 2026-03-23 |
| `resources/views/components/ui/tbody.blade.php` | Table body view | ✅ | 2026-03-23 |
| `resources/views/components/ui/tfoot.blade.php` | Table foot view | ✅ | 2026-03-23 |
| `resources/views/components/ui/tr.blade.php` | Table row view | ✅ | 2026-03-23 |
| `resources/views/components/ui/th.blade.php` | Table header cell view | ✅ | 2026-03-23 |
| `resources/views/components/ui/td.blade.php` | Table data cell view | ✅ | 2026-03-23 |
| `resources/views/components/ui/sorter.blade.php` | Sorter view | ✅ | 2026-03-23 |
| `src/Components/UI/DataTable.php` | DataTable component class (composition) | ✅ | 2026-03-27 |
| `resources/views/components/ui/data-table.blade.php` | DataTable Blade template | ✅ | 2026-03-27 |

## Phase 3 — Tests

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `tests/Feature/Components/UI/SelectTest.php` | 13 select tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/AutoCompleteTest.php` | 9 autocomplete tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/OtpInputTest.php` | 8 OTP input tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/DatePickerTest.php` | 12 date picker tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/DatePickerRangeTest.php` | 8 date picker range tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/DateTimePickerTest.php` | 8 date time picker tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/TimeInputTest.php` | 10 time input tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/SliderTest.php` | 10 slider tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/TableTest.php` | 8 table tests | ✅ | 2026-03-23 |
| `tests/Feature/Components/UI/DataTableTest.php` | 19 DataTable tests | ✅ | 2026-03-27 |

### Phase 4: Template & Layout Components

#### Sprint 4.1 — Layout Framework

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/Template/LayoutBase.php` | Layout base with Alpine $store.layout | ✅ | 2026-03-24 |
| `resources/views/components/template/layout-base.blade.php` | Layout base Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/LayoutCollapsibleSide.php` | Collapsible sidebar layout | ✅ | 2026-03-24 |
| `resources/views/components/template/layout-collapsible-side.blade.php` | Collapsible sidebar Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/LayoutStackedSide.php` | Stacked sidebar layout | ✅ | 2026-03-24 |
| `resources/views/components/template/layout-stacked-side.blade.php` | Stacked sidebar Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/LayoutTopBarClassic.php` | Top bar classic layout | ✅ | 2026-03-24 |
| `resources/views/components/template/layout-top-bar-classic.blade.php` | Top bar classic Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/LayoutFramelessSide.php` | Frameless sidebar layout | ✅ | 2026-03-24 |
| `resources/views/components/template/layout-frameless-side.blade.php` | Frameless sidebar Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/LayoutContentOverlay.php` | Content overlay layout | ✅ | 2026-03-24 |
| `resources/views/components/template/layout-content-overlay.blade.php` | Content overlay Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/LayoutBlank.php` | Blank layout (no chrome) | ✅ | 2026-03-24 |
| `resources/views/components/template/layout-blank.blade.php` | Blank layout Blade view | ✅ | 2026-03-24 |

#### Sprint 4.2 — Header & Navigation

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/Template/Header.php` | Header with 3-slot layout | ✅ | 2026-03-24 |
| `resources/views/components/template/header.blade.php` | Header Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/SideNav.php` | Collapsible side nav (290→80px) | ✅ | 2026-03-24 |
| `resources/views/components/template/side-nav.blade.php` | SideNav Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/MobileNav.php` | Mobile nav drawer + hamburger | ✅ | 2026-03-24 |
| `resources/views/components/template/mobile-nav.blade.php` | MobileNav Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/Footer.php` | Footer with copyright + end slot | ✅ | 2026-03-24 |
| `resources/views/components/template/footer.blade.php` | Footer Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/PageContainer.php` | Page container with gutters | ✅ | 2026-03-24 |
| `resources/views/components/template/page-container.blade.php` | PageContainer Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/SideNavToggle.php` | Sidebar collapse toggle button | ✅ | 2026-03-24 |
| `resources/views/components/template/side-nav-toggle.blade.php` | SideNavToggle Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/Logo.php` | Logo with light/dark variants | ✅ | 2026-03-24 |
| `resources/views/components/template/logo.blade.php` | Logo Blade view | ✅ | 2026-03-24 |

#### Sprint 4.3 — Shared / Utility Components

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/Template/Search.php` | Search dialog with Cmd+K | ✅ | 2026-03-24 |
| `resources/views/components/template/search.blade.php` | Search Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/UserDropdown.php` | User profile dropdown | ✅ | 2026-03-24 |
| `resources/views/components/template/user-dropdown.blade.php` | UserDropdown Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/LanguageSelector.php` | Language picker dropdown | ✅ | 2026-03-24 |
| `resources/views/components/template/language-selector.blade.php` | LanguageSelector Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/NotificationDropdown.php` | Notification header widget dropdown | ✅ | 2026-03-27 |
| `resources/views/components/template/notification-dropdown.blade.php` | NotificationDropdown Blade view (Alpine.js) | ✅ | 2026-03-27 |
| `src/Components/Template/ThemeConfigurator.php` | Theme settings drawer | ✅ | 2026-03-24 |
| `resources/views/components/template/theme-configurator.blade.php` | ThemeConfigurator Blade view | ✅ | 2026-03-24 |
| `src/Components/Template/HorizontalNav.php` | Horizontal nav wrapper | ✅ | 2026-03-24 |
| `resources/views/components/template/horizontal-nav.blade.php` | HorizontalNav Blade view | ✅ | 2026-03-24 |
| `src/Components/Shared/Breadcrumb.php` | Breadcrumb navigation | ✅ | 2026-03-24 |
| `resources/views/components/shared/breadcrumb.blade.php` | Breadcrumb Blade view | ✅ | 2026-03-24 |
| `src/Components/Shared/PageHeader.php` | Page header with title/actions | ✅ | 2026-03-24 |
| `resources/views/components/shared/page-header.blade.php` | PageHeader Blade view | ✅ | 2026-03-24 |
| `src/Components/Shared/Container.php` | Container wrapper | ✅ | 2026-03-24 |
| `resources/views/components/shared/container.blade.php` | Container Blade view | ✅ | 2026-03-24 |

#### Phase 4 Tests

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `tests/Feature/Components/Template/LayoutTest.php` | 10 layout component tests | ✅ | 2026-03-24 |
| `tests/Feature/Components/Template/HeaderNavTest.php` | 28 header/nav tests | ✅ | 2026-03-24 |
| `tests/Feature/Components/Template/UtilityTest.php` | 38 utility/shared tests (26 original + 12 NotificationDropdown) | ✅ | 2026-03-24 |

### Phase 5: Third-Party Integration Components

#### Sprint 5.1 — Charts & Visualization

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/UI/Chart.php` | Chart component class (ApexCharts wrapper) | ✅ | 2026-03-25 |
| `resources/views/components/ui/chart.blade.php` | Chart blade template (Alpine + ApexCharts) | ✅ | 2026-03-25 |
| `src/Components/UI/RegionMap.php` | RegionMap component class (Leaflet wrapper) | ✅ | 2026-03-25 |
| `resources/views/components/ui/region-map.blade.php` | RegionMap blade template (Alpine + Leaflet) | ✅ | 2026-03-25 |

#### Sprint 5.2 — Rich Content

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/UI/RichTextEditor.php` | RichTextEditor component class (TipTap wrapper) | ✅ | 2026-03-25 |
| `resources/views/components/ui/rich-text-editor.blade.php` | RichTextEditor blade template (Alpine + TipTap) | ✅ | 2026-03-25 |
| `src/Components/UI/SyntaxHighlighter.php` | SyntaxHighlighter component class (Prism.js wrapper) | ✅ | 2026-03-25 |
| `resources/views/components/ui/syntax-highlighter.blade.php` | SyntaxHighlighter blade template (Alpine + Prism.js) | ✅ | 2026-03-25 |

#### Sprint 5.3 — Calendar & Gantt

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `src/Components/UI/CalendarView.php` | CalendarView component class (FullCalendar wrapper) | ✅ | 2026-03-25 |
| `resources/views/components/ui/calendar-view.blade.php` | CalendarView blade template (Alpine + FullCalendar) | ✅ | 2026-03-25 |
| `src/Components/UI/GanttChart.php` | GanttChart component class (Frappe Gantt wrapper) | ✅ | 2026-03-25 |
| `resources/views/components/ui/gantt-chart.blade.php` | GanttChart blade template (Alpine + Frappe Gantt) | ✅ | 2026-03-25 |

#### Phase 5 Tests

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `tests/Feature/Components/UI/ThirdPartyTest.php` | 39 third-party component tests | ✅ | 2026-03-25 |

### Phase 6: Pre-built Page Blocks (Anonymous Blade components)

#### Sprint 6.1 — Auth Blocks

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/blocks/auth/auth-layout.blade.php` | 3-mode auth layout (simple/side/split) | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/sign-in-form.blade.php` | Reusable sign-in form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/sign-up-form.blade.php` | Reusable sign-up form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/forgot-password-form.blade.php` | Reusable forgot password form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/reset-password-form.blade.php` | Reusable reset password form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/otp-verification-form.blade.php` | Reusable OTP form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/sign-in-simple.blade.php` | Sign in — centered card layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/sign-in-side.blade.php` | Sign in — side layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/sign-in-split.blade.php` | Sign in — split layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/sign-up-simple.blade.php` | Sign up — centered card | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/sign-up-side.blade.php` | Sign up — side layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/sign-up-split.blade.php` | Sign up — split layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/forgot-password-simple.blade.php` | Forgot password — centered card | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/forgot-password-side.blade.php` | Forgot password — side layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/forgot-password-split.blade.php` | Forgot password — split layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/reset-password-simple.blade.php` | Reset password — centered card | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/reset-password-side.blade.php` | Reset password — side layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/reset-password-split.blade.php` | Reset password — split layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/otp-verification-simple.blade.php` | OTP verification — centered card | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/otp-verification-side.blade.php` | OTP verification — side layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/auth/otp-verification-split.blade.php` | OTP verification — split layout | ✅ | 2026-03-26 |

#### Sprint 6.2 — Dashboard Blocks

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/blocks/dashboards/ecommerce.blade.php` | Ecommerce dashboard grid layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/dashboards/project.blade.php` | Project dashboard grid layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/dashboards/analytic.blade.php` | Analytic dashboard grid layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/dashboards/marketing.blade.php` | Marketing dashboard grid layout | ✅ | 2026-03-26 |

#### Sprint 6.3 — CRUD Blocks

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/blocks/crud/crud-list.blade.php` | Generic list layout (title + table) | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/crud-form.blade.php` | Generic form layout (main + sidebar) | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/crud-detail.blade.php` | Generic detail layout (main + sidebar) | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/customer-list.blade.php` | Customer list page | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/customer-create.blade.php` | Customer create form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/customer-edit.blade.php` | Customer edit form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/customer-detail.blade.php` | Customer detail view | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/product-list.blade.php` | Product list page | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/product-create.blade.php` | Product create form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/product-edit.blade.php` | Product edit form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/order-list.blade.php` | Order list page | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/order-create.blade.php` | Order create form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/order-edit.blade.php` | Order edit form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/crud/order-detail.blade.php` | Order detail view | ✅ | 2026-03-26 |

#### Sprint 6.4 — App Blocks

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/blocks/apps/project-list.blade.php` | Project list with favorites | ✅ | 2026-03-26 |
| `resources/views/components/blocks/apps/project-detail.blade.php` | Project detail with tabs | ✅ | 2026-03-26 |
| `resources/views/components/blocks/apps/scrum-board.blade.php` | Scrum board columns | ✅ | 2026-03-26 |
| `resources/views/components/blocks/apps/chat.blade.php` | Chat with sidebar + messages | ✅ | 2026-03-26 |
| `resources/views/components/blocks/apps/ai-chat.blade.php` | AI chat with side nav | ✅ | 2026-03-26 |
| `resources/views/components/blocks/apps/ai-image.blade.php` | AI image generator + gallery | ✅ | 2026-03-26 |
| `resources/views/components/blocks/apps/calendar.blade.php` | Calendar + event dialog | ✅ | 2026-03-26 |
| `resources/views/components/blocks/apps/file-manager.blade.php` | File manager layout | ✅ | 2026-03-26 |
| `resources/views/components/blocks/apps/tasks.blade.php` | Task list layout | ✅ | 2026-03-26 |

#### Sprint 6.5 — Account Blocks

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/blocks/account/settings.blade.php` | Settings with sidebar menu | ✅ | 2026-03-26 |
| `resources/views/components/blocks/account/activity-log.blade.php` | Activity log timeline | ✅ | 2026-03-26 |
| `resources/views/components/blocks/account/pricing.blade.php` | Pricing plans grid | ✅ | 2026-03-26 |
| `resources/views/components/blocks/account/roles-permissions.blade.php` | Roles & permissions management | ✅ | 2026-03-26 |

#### Sprint 6.6 — Utility Pages

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/blocks/pages/access-denied.blade.php` | 403 access denied page | ✅ | 2026-03-26 |
| `resources/views/components/blocks/pages/not-found.blade.php` | 404 not found page | ✅ | 2026-03-26 |
| `resources/views/components/blocks/pages/internal-error.blade.php` | 500 internal error page | ✅ | 2026-03-26 |
| `resources/views/components/blocks/pages/maintenance.blade.php` | Maintenance page | ✅ | 2026-03-26 |

#### Sprint 6.7 — Help Center Blocks

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `resources/views/components/blocks/help-center/support-hub.blade.php` | Help center landing with hero + search | ✅ | 2026-03-26 |
| `resources/views/components/blocks/help-center/article.blade.php` | Article with TOC sidebar | ✅ | 2026-03-26 |
| `resources/views/components/blocks/help-center/edit-article.blade.php` | Article editor form | ✅ | 2026-03-26 |
| `resources/views/components/blocks/help-center/manage-articles.blade.php` | Article management list | ✅ | 2026-03-26 |

#### Phase 6 Tests

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `tests/Feature/Components/Blocks/AuthBlocksTest.php` | 16 auth block tests | ✅ | 2026-03-26 |
| `tests/Feature/Components/Blocks/DashboardBlocksTest.php` | 5 dashboard block tests | ✅ | 2026-03-26 |
| `tests/Feature/Components/Blocks/CrudBlocksTest.php` | 17 CRUD block tests | ✅ | 2026-03-26 |
| `tests/Feature/Components/Blocks/AppBlocksTest.php` | 14 app block tests | ✅ | 2026-03-26 |
| `tests/Feature/Components/Blocks/AccountBlocksTest.php` | 7 account block tests | ✅ | 2026-03-26 |
| `tests/Feature/Components/Blocks/UtilityBlocksTest.php` | 8 utility page tests | ✅ | 2026-03-26 |
| `tests/Feature/Components/Blocks/HelpCenterBlocksTest.php` | 8 help center block tests | ✅ | 2026-03-26 |

---

## Documentation Site (docs-site/)

> Repo riêng: `https://github.com/ptnghia/OrynUI-docs-site`

### Component Doc Pages

All files at `docs-site/resources/views/docs/components/`

#### Basic Components

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `alert.blade.php` | Alert component docs | ✅ | 2026-03-27 |
| `avatar.blade.php` | Avatar component docs | ✅ | 2026-03-27 |
| `badge.blade.php` | Badge component docs | ✅ | 2026-03-27 |
| `button.blade.php` | Button component docs | ✅ | 2026-03-27 |
| `card.blade.php` | Card component docs | ✅ | 2026-03-27 |
| `close-button.blade.php` | CloseButton component docs | ✅ | 2026-03-29 |
| `icon.blade.php` | Icon component docs | ✅ | 2026-03-29 |
| `progress.blade.php` | Progress component docs | ✅ | 2026-03-29 |
| `skeleton.blade.php` | Skeleton component docs | ✅ | 2026-03-29 |
| `spinner.blade.php` | Spinner component docs | ✅ | 2026-03-27 |
| `steps.blade.php` | Steps component docs | ✅ | 2026-03-29 |
| `table.blade.php` | Table component docs | ✅ | 2026-03-29 |
| `tag.blade.php` | Tag component docs | ✅ | 2026-03-29 |
| `timeline.blade.php` | Timeline component docs | ✅ | 2026-03-29 |

#### Form Components

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `checkbox.blade.php` | Checkbox component docs | ✅ | 2026-03-29 |
| `form-item.blade.php` | FormItem component docs | ✅ | 2026-03-29 |
| `input.blade.php` | Input component docs | ✅ | 2026-03-27 |
| `radio.blade.php` | Radio component docs | ✅ | 2026-03-29 |
| `segment.blade.php` | Segment component docs | ✅ | 2026-03-29 |
| `select.blade.php` | Select component docs | ✅ | 2026-03-29 |
| `switcher.blade.php` | Switcher component docs | ✅ | 2026-03-29 |
| `textarea.blade.php` | Textarea component docs | ✅ | 2026-03-29 |
| `upload.blade.php` | Upload component docs | ✅ | 2026-03-29 |

#### Interactive Components

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `carousel.blade.php` | Carousel component docs | ✅ | 2026-03-29 |
| `dialog.blade.php` | Dialog component docs | ✅ | 2026-03-27 |
| `drawer.blade.php` | Drawer component docs | ✅ | 2026-03-29 |
| `dropdown.blade.php` | Dropdown component docs | ✅ | 2026-03-27 |
| `menu.blade.php` | Menu component docs | ✅ | 2026-03-29 |
| `pagination.blade.php` | Pagination component docs | ✅ | 2026-03-29 |
| `tabs.blade.php` | Tabs component docs | ✅ | 2026-03-27 |
| `toast.blade.php` | Toast component docs | ✅ | 2026-03-29 |
| `tooltip.blade.php` | Tooltip component docs | ✅ | 2026-03-29 |

#### Complex Components

| File | Purpose | Status | Created |
|------|---------|--------|---------|
| `auto-complete.blade.php` | AutoComplete component docs | ✅ | 2026-03-29 |
| `data-table.blade.php` | DataTable component docs | ✅ | 2026-03-29 |
| `date-picker.blade.php` | DatePicker component docs | ✅ | 2026-03-29 |
| `otp-input.blade.php` | OtpInput component docs | ✅ | 2026-03-29 |
| `slider.blade.php` | Slider component docs | ✅ | 2026-03-29 |
| `time-input.blade.php` | TimeInput component docs | ✅ | 2026-03-29 |

---

<!-- Cập nhật file này mỗi khi tạo file mới -->
