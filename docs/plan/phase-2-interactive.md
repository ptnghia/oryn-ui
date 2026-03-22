# Phase 2: Interactive Components (Tier 2 — Blade + Alpine.js)

**Trạng thái**: ✅ Hoàn thành
**Phụ thuộc**: Phase 0, Phase 1 (một số components dùng lại)
**Ưu tiên**: 🟡 Cao

Mỗi component cần: **Blade view + PHP class + CSS + Alpine.js logic + Test + Doc page**

---

## Sprint 2.1 — Form Controls

### Checkbox
- [x] Blade: `resources/views/components/ui/checkbox.blade.php`
- [x] PHP: `src/Components/UI/Checkbox.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-model` binding, checked state
- [x] Props: name, value, label, disabled, color, defaultChecked

### CheckboxGroup
- [x] Blade: `resources/views/components/ui/checkbox-group.blade.php`
- [x] PHP: `src/Components/UI/CheckboxGroup.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-model` array, group value tracking
- [x] Props: name, value (array), vertical, color, options

### Radio
- [x] Blade: `resources/views/components/ui/radio.blade.php`
- [x] PHP: `src/Components/UI/Radio.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-model` binding
- [x] Props: name, value, label, disabled, color, defaultChecked

### RadioGroup
- [x] Blade: `resources/views/components/ui/radio-group.blade.php`
- [x] PHP: `src/Components/UI/RadioGroup.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-model` single value
- [x] Props: name, value, vertical, color, options

### Switcher
- [x] Blade: `resources/views/components/ui/switcher.blade.php`
- [x] PHP: `src/Components/UI/Switcher.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-model` boolean toggle
- [x] Props: name, checked, disabled, color, label, labelOn, labelOff

### Segment
- [x] Blade: `resources/views/components/ui/segment.blade.php`
- [x] PHP: `src/Components/UI/Segment.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-data` active tab tracking
- [x] Props: value, size, selectionType (single/multiple)

### SegmentItem
- [x] Blade: `resources/views/components/ui/segment-item.blade.php`
- [x] PHP: `src/Components/UI/SegmentItem.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `@click` select, `$dispatch` to parent
- [x] Props: value, disabled

---

## Sprint 2.2 — Overlays & Popups

### Tooltip
- [x] Blade: `resources/views/components/ui/tooltip.blade.php`
- [x] PHP: `src/Components/UI/Tooltip.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-show` on hover, `x-transition`
- [x] Props: title, placement (top/bottom/left/right)

### Dialog / Modal
- [x] Blade: `resources/views/components/ui/dialog.blade.php`
- [x] PHP: `src/Components/UI/Dialog.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-show`, `x-transition`, `@keydown.escape`, body scroll lock, focus trap
- [x] Props: closable, width, height, placement
- [x] Slots: default, header, footer, trigger
- [x] Accessibility: focus trap, escape close, aria-modal

### Drawer
- [x] Blade: `resources/views/components/ui/drawer.blade.php`
- [x] PHP: `src/Components/UI/Drawer.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-show`, `x-transition`, overlay, body scroll lock
- [x] Props: placement (left/right/top/bottom), width, height, closable, showBackdrop, lockScroll
- [x] Slots: default, header, footer, trigger

### Dropdown
- [x] Blade: `resources/views/components/ui/dropdown.blade.php`
- [x] PHP: `src/Components/UI/Dropdown.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-show`, `@click.outside`, `x-transition`, positioning
- [x] Props: placement, trigger (click/hover/context), toggleClose
- [x] Slots: default, trigger

### DropdownItem
- [x] Blade: `resources/views/components/ui/dropdown-item.blade.php`
- [x] PHP: `src/Components/UI/DropdownItem.php`
- [x] Test
- [x] Doc page
- [x] Props: active, disabled, href, eventKey, variant

### DropdownSub
- [x] Blade: `resources/views/components/ui/dropdown-sub.blade.php`
- [x] PHP: `src/Components/UI/DropdownSub.php`
- [x] Test
- [x] Doc page
- [x] Alpine: nested `x-show` on hover
- [x] Props: title, placement

### Toast
- [x] Blade: `resources/views/components/ui/toast.blade.php`
- [x] JS: `resources/js/plugins/toast.js`
- [x] Test
- [x] Doc page
- [x] Alpine: global event listener `$dispatch('oryn:toast')`, auto-dismiss `setTimeout`, stack management
- [x] Props: type (success/warning/error/info), message, title, duration, placement, closable

---

## Sprint 2.3 — Navigation & Tabs

### Tabs
- [x] Blade: `resources/views/components/ui/tabs.blade.php`
- [x] PHP: `src/Components/UI/Tabs.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-data` with active tab, `$dispatch` from tab-nav
- [x] Props: defaultValue, variant (underline/pill)

### TabList
- [x] Blade: `resources/views/components/ui/tab-list.blade.php`
- [x] Test
- [x] Doc page

### TabNav
- [x] Blade: `resources/views/components/ui/tab-nav.blade.php`
- [x] PHP: `src/Components/UI/TabNav.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `@click` switch active tab
- [x] Props: value, disabled, icon

### TabContent
- [x] Blade: `resources/views/components/ui/tab-content.blade.php`
- [x] PHP: `src/Components/UI/TabContent.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-show` when active
- [x] Props: value

### Menu
- [x] Blade: `resources/views/components/ui/menu.blade.php`
- [x] PHP: `src/Components/UI/Menu.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-data` active tracking, collapsible groups
- [x] Props: variant (light/dark/themed/transparent), sideCollapsed, defaultExpand, defaultActive

### MenuItem
- [x] Blade: `resources/views/components/ui/menu-item.blade.php`
- [x] PHP: `src/Components/UI/MenuItem.php`
- [x] Test
- [x] Doc page
- [x] Props: eventKey, href, active, disabled, icon

### MenuCollapse
- [x] Blade: `resources/views/components/ui/menu-collapse.blade.php`
- [x] PHP: `src/Components/UI/MenuCollapse.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-show` with `x-collapse` transition
- [x] Props: eventKey, label, icon, defaultExpanded

### MenuGroup
- [x] Blade: `resources/views/components/ui/menu-group.blade.php`
- [x] PHP: `src/Components/UI/MenuGroup.php`
- [x] Test
- [x] Doc page
- [x] Props: label

### Pagination
- [x] Blade: `resources/views/components/ui/pagination.blade.php`
- [x] PHP: `src/Components/UI/Pagination.php`
- [x] Test
- [x] Doc page
- [x] Alpine: `x-data` page state, prev/next/page click
- [x] Props: total, pageSize, currentPage, displayTotal
- [x] Support: Laravel Paginator integration

---

## Sprint 2.4 — Media & Upload

### Upload
- [x] Blade: `resources/views/components/ui/upload.blade.php`
- [x] PHP: `src/Components/UI/Upload.php`
- [x] JS: `resources/js/plugins/upload.js`
- [x] Test
- [x] Doc page
- [x] Alpine: File API, drag & drop, file list management
- [x] Props: accept, multiple, draggable, disabled, showList, tip, uploadLimit, fileList
- [x] Events: change, beforeUpload, remove

### Carousel
- [x] Blade: `resources/views/components/ui/carousel.blade.php`
- [x] PHP: `src/Components/UI/Carousel.php`
- [x] JS: `resources/js/plugins/carousel.js`
- [x] Test
- [x] Doc page
- [x] Alpine: auto-play, swipe, next/prev, indicators
- [x] Props: autoPlay, autoPlayInterval, showArrow, showIndicators, loop

---

## Phase 2 Verification

- [x] Tất cả 25 interactive components hoạt động
- [x] Alpine.js state management đúng
- [x] Keyboard navigation hoạt động (Tab, Escape, Arrow keys)
- [x] Dark mode cho mọi component
- [x] RTL layout đúng
- [x] Transitions mượt mà
- [x] x-cloak không bị flash of content
- [x] Tests pass
- [x] Doc pages hoàn chỉnh
