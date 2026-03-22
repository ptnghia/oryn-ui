# Phase 3: Complex Plugin Components (Tier 3 — Alpine.js Plugins)

**Trạng thái**: ✅ Hoàn thành
**Phụ thuộc**: Phase 0, Phase 1, Phase 2 (Dropdown, Dialog patterns)
**Ưu tiên**: 🟡 Cao

Mỗi component cần: **Blade view + PHP class + Alpine.js inline logic + CSS + Test**

Tier 3 components sử dụng Alpine.js inline `x-data` với logic phức tạp (search, filter, calendar, keyboard nav). Alpine.js plugins riêng không cần thiết — logic được đặt trực tiếp trong Blade templates.

---

## Sprint 3.1 — Advanced Inputs

### Select
- [x] Blade: `resources/views/components/ui/select.blade.php`
- [x] PHP: `src/Components/UI/Select.php`
- [x] CSS: `resources/css/components/select.css` (migrated Phase 0)
- [x] Test: `tests/Feature/Components/UI/SelectTest.php` (13 tests)
- [ ] Doc page
- [x] Features:
  - Single & multiple selection
  - Search/filter options
  - Keyboard navigation (arrow keys, enter, escape)
  - Clear button
  - Loading indicator
  - ARIA roles (combobox, listbox, option)
- [x] Props: options, value, placeholder, size, disabled, multiple, searchable, clearable, loading, name, invalid

### AutoComplete
- [x] Blade: `resources/views/components/ui/auto-complete.blade.php`
- [x] PHP: `src/Components/UI/AutoComplete.php`
- [x] CSS: (shared with select.css)
- [x] Test: `tests/Feature/Components/UI/AutoCompleteTest.php` (9 tests)
- [ ] Doc page
- [x] Features:
  - Type-ahead filtering
  - Keyboard navigation
  - Clear button
  - ARIA roles
- [x] Props: options, value, placeholder, size, disabled, clearable, name, invalid

### OtpInput
- [x] Blade: `resources/views/components/ui/otp-input.blade.php`
- [x] PHP: `src/Components/UI/OtpInput.php`
- [x] Test: `tests/Feature/Components/UI/OtpInputTest.php` (8 tests)
- [ ] Doc page
- [x] Features:
  - Auto focus next input
  - Paste support (split string to boxes)
  - Backspace navigation
  - ArrowLeft/Right navigation
  - autocomplete="one-time-code"
- [x] Props: length (default 6), disabled, invalid, placeholder, name, value

---

## Sprint 3.2 — Date & Time

### DatePicker
- [x] Blade: `resources/views/components/ui/date-picker.blade.php`
- [x] PHP: `src/Components/UI/DatePicker.php`
- [x] CSS: `resources/css/components/date-picker.css` (migrated Phase 0)
- [x] Test: `tests/Feature/Components/UI/DatePickerTest.php` (12 tests)
- [ ] Doc page
- [x] Features:
  - Calendar grid rendering (pure JS, no dependency)
  - Month/year navigation
  - Today highlight
  - Min/max date constraints
  - 3 view modes (days/months/years)
  - Clearable with Today shortcut
  - Inline mode
  - Keyboard navigation
- [x] Props: value, placeholder, format, minDate, maxDate, disabled, clearable, size, invalid, name, firstDayOfWeek, closeOnSelect, inline

### DatePickerRange
- [x] Blade: `resources/views/components/ui/date-picker-range.blade.php`
- [x] PHP: `src/Components/UI/DatePickerRange.php`
- [x] CSS: (shared with date-picker.css)
- [x] Test: `tests/Feature/Components/UI/DatePickerRangeTest.php` (8 tests)
- [ ] Doc page
- [x] Features:
  - Range selection (start + end)
  - Hover preview
  - Auto-swap if end < start
  - Separator display
- [x] Props: startDate, endDate, nameStart, nameEnd, separator, placeholder, size, disabled, invalid, clearable, minDate, maxDate, firstDayOfWeek

### DateTimePicker
- [x] Blade: `resources/views/components/ui/date-time-picker.blade.php`
- [x] PHP: `src/Components/UI/DateTimePicker.php`
- [x] Test: `tests/Feature/Components/UI/DateTimePickerTest.php` (8 tests)
- [ ] Doc page
- [x] Features:
  - Calendar + time input combined
  - Hour/minute/second increment/decrement
  - 12/24h mode with AM/PM toggle
  - OK button to confirm
- [x] Props: value, placeholder, name, size, disabled, invalid, clearable, minDate, maxDate, firstDayOfWeek, use12Hours

### TimeInput
- [x] Blade: `resources/views/components/ui/time-input.blade.php`
- [x] PHP: `src/Components/UI/TimeInput.php`
- [x] CSS: `resources/css/components/time-input.css` (migrated Phase 0)
- [x] Test: `tests/Feature/Components/UI/TimeInputTest.php` (10 tests)
- [ ] Doc page
- [x] Features:
  - Hour/minute/second field inputs
  - 12h/24h format with AM/PM toggle
  - ArrowUp/Down increment
  - Auto-focus shift between fields
- [x] Props: value, name, size, disabled, invalid, showSeconds, use12Hours

---

## Sprint 3.3 — Data & Range

### Slider / RangeSlider
- [x] Blade: `resources/views/components/ui/slider.blade.php`
- [x] PHP: `src/Components/UI/Slider.php`
- [x] CSS: `resources/css/components/slider.css` (migrated Phase 0)
- [x] Test: `tests/Feature/Components/UI/SliderTest.php` (10 tests)
- [ ] Doc page
- [x] Features:
  - Single thumb & dual thumb (range)
  - Step support
  - Marks/ticks with filled state
  - Tooltip on drag
  - Mouse + touch drag support
  - Snap-to-step
  - ARIA slider role
- [x] Props: value, min, max, step, range, marks, disabled, tooltip, name

### Table (with sub-components)
- [x] Blade: `resources/views/components/ui/table.blade.php`
- [x] PHP: `src/Components/UI/Table.php`
- [x] CSS: `resources/css/components/tables.css` (migrated Phase 0)
- [x] Test: `tests/Feature/Components/UI/TableTest.php` (8 tests)
- [ ] Doc page
- [x] Sub-components:
  - `THead.php` + `thead.blade.php`
  - `TBody.php` + `tbody.blade.php`
  - `TFoot.php` + `tfoot.blade.php`
  - `Tr.php` + `tr.blade.php`
  - `Th.php` + `th.blade.php`
  - `Td.php` + `td.blade.php`
  - `Sorter.php` + `sorter.blade.php`
- [x] Features:
  - Hoverable, compact, cellBorder, borderless options
  - Overflow-x-auto wrapper
  - Sort indicator with event dispatching
- [x] Props (Table): hoverable, compact, cellBorder, borderless
- [x] Props (Sorter): column

### DataTable (Advanced)
- [x] PHP: `src/Components/UI/DataTable.php`
- [x] Blade: `resources/views/components/ui/data-table.blade.php`
- [x] Composes: Table + Pagination + Select (page size) + Checkbox (row selection) + Sorter + Skeleton
- [x] Test: `tests/Feature/Components/UI/DataTableTest.php` (19 tests, 36 assertions)
- [ ] Doc page
- [x] Features:
  - Column definitions (header, accessorKey, sortable, width)
  - Server-side sorting (sort-change event with key + order)
  - Server-side pagination (page-change + page-size-change events)
  - Row selection with select-all/indeterminate checkbox
  - Loading overlay with spinner
  - Skeleton rows loading state
  - No data state with custom icon slot
  - Page size selector (10/25/50/100)
  - Attribute forwarding

---

## Phase 3 Verification

- [x] All complex components implemented (Select, AutoComplete, OtpInput, DatePicker, DatePickerRange, DateTimePicker, TimeInput, Slider, Table family)
- [x] Alpine.js logic inline in Blade templates (no separate plugin files needed)
- [x] Calendar logic works (month navigation, day grid, today highlight)
- [x] Keyboard navigation for Select, AutoComplete, OtpInput, TimeInput
- [x] Dark mode CSS classes supported via existing CSS variables
- [x] Tests pass: 85 Phase 3 tests (154 assertions) + 19 DataTable tests = 104 total
- [x] Full suite: 498 tests (865 assertions) — all passing
- [ ] Doc pages (deferred to documentation phase)
