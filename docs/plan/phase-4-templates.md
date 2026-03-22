# Phase 4: Template & Layout Components

**Trạng thái**: ✅ Hoàn thành
**Phụ thuộc**: Phase 0, Phase 1, Phase 2 (Menu, Dropdown, Dialog)
**Ưu tiên**: 🟡 Cao

Mỗi layout component cần: **Blade view + PHP class + CSS + Alpine.js (layout state) + Test + Doc page**

---

## Sprint 4.1 — Core Layout Framework

### LayoutBase (Abstract)
- [x] PHP: `src/Components/Template/LayoutBase.php` (abstract class)
- [x] Blade partial: `resources/views/components/template/layout-base.blade.php`
- [x] CSS: uses existing `resources/css/template/` files
- [x] Test
- [x] Shared logic: dark mode toggle, mobile detect, sidebar width CSS vars
- [x] Alpine global store: `$store.layout` (sideNavCollapsed, mobileNavOpen, currentLayout)

### CollapsibleSide Layout
- [x] Blade: `resources/views/components/template/layout-collapsible-side.blade.php`
- [x] PHP: `src/Components/Template/LayoutCollapsibleSide.php`
- [x] Test
- [ ] Doc page
- [x] Features:
  - Collapsible sidebar (290px → 80px)
  - Smooth transition animation
  - Hamburger toggle button
  - Auto-collapse on mobile
  - Persistent state (localStorage)
- [x] Constants: SIDE_NAV_WIDTH=290, SIDE_NAV_COLLAPSED_WIDTH=80, HEADER_HEIGHT=64

### StackedSide Layout
- [x] Blade: `resources/views/components/template/layout-stacked-side.blade.php`
- [x] PHP: `src/Components/Template/LayoutStackedSide.php`
- [x] Test
- [ ] Doc page
- [x] Features:
  - Two-level sidebar: icon rail + expanded panel
  - Primary nav (icon only) → secondary nav (full width)
  - Click icon to switch section
  - Collapsed state shows icon rail only

### TopBarClassic Layout
- [x] Blade: `resources/views/components/template/layout-top-bar-classic.blade.php`
- [x] PHP: `src/Components/Template/LayoutTopBarClassic.php`
- [x] Test
- [ ] Doc page
- [x] Features:
  - Horizontal top navigation
  - Mega menu dropdowns
  - No sidebar
  - Mobile: hamburger → slide-down menu

### FramelessSide Layout
- [x] Blade: `resources/views/components/template/layout-frameless-side.blade.php`
- [x] PHP: `src/Components/Template/LayoutFramelessSide.php`
- [x] Test
- [ ] Doc page
- [x] Features:
  - Floating sidebar with rounded corners
  - Margin/padding gap from edges
  - Content area also floating

### ContentOverlay Layout
- [x] Blade: `resources/views/components/template/layout-content-overlay.blade.php`
- [x] PHP: `src/Components/Template/LayoutContentOverlay.php`
- [x] Test
- [ ] Doc page
- [x] Features:
  - Full-bleed sidebar
  - Content panel overlaid with shadow
  - Rounded content container

### Blank Layout
- [x] Blade: `resources/views/components/template/layout-blank.blade.php`
- [x] PHP: `src/Components/Template/LayoutBlank.php`
- [x] Test
- [ ] Doc page
- [x] Features:
  - No header, no sidebar
  - Full-page content (auth pages, landing)
  - Optional centered container

---

## Sprint 4.2 — Header & Navigation

### Header
- [x] Blade: `resources/views/components/template/header.blade.php`
- [x] PHP: `src/Components/Template/Header.php`
- [x] CSS: `resources/css/template/header.css`
- [x] Test
- [ ] Doc page
- [x] Features:
  - Logo + breadcrumb area
  - Right side: search, notifications, user menu
  - Sticky on scroll
  - Adapts to layout type
- [x] Slots: start, middle, end

### SideNav
- [x] Blade: `resources/views/components/template/side-nav.blade.php`
- [x] PHP: `src/Components/Template/SideNav.php`
- [x] CSS: `resources/css/template/side-nav.css`
- [x] Test
- [ ] Doc page
- [x] Features:
  - Uses Menu component internally
  - Collapsible menu groups
  - Active item highlight (matches current route)
  - Scroll overflow with custom scrollbar
  - Logo at top
- [x] Props: collapsed, variant, items (nav config array)

### MobileNav
- [x] Blade: `resources/views/components/template/mobile-nav.blade.php`
- [x] PHP: `src/Components/Template/MobileNav.php`
- [x] Test
- [ ] Doc page
- [x] Features:
  - Uses Drawer internally (left side)
  - Full navigation menu
  - Triggered by hamburger in Header
  - Overlay backdrop

### Footer
- [x] Blade: `resources/views/components/template/footer.blade.php`
- [x] PHP: `src/Components/Template/Footer.php`
- [x] Test
- [ ] Doc page
- [x] Slots: start, end

---

## Sprint 4.3 — Shared / Utility Components

### Search
- [x] Blade: `resources/views/components/template/search.blade.php`
- [x] PHP: `src/Components/Template/Search.php`
- [x] Test
- [ ] Doc page
- [x] Alpine: Dialog-based search overlay, keyboard shortcut (Cmd+K / Ctrl+K)

### Notification (Header Widget)
- [x] Blade: `resources/views/components/template/notification-dropdown.blade.php` — Implemented as NotificationDropdown to avoid naming conflict with UI Notification (toast)
- [x] PHP: `src/Components/Template/NotificationDropdown.php`
- [x] Test: 12 tests in `UtilityTest.php`
- [ ] Doc page
- [x] Alpine: Dropdown with notification list, badge count, markAsRead, markAllAsRead, setNotifications

### UserDropdown
- [x] Blade: `resources/views/components/template/user-dropdown.blade.php`
- [x] PHP: `src/Components/Template/UserDropdown.php`
- [x] Test
- [ ] Doc page
- [x] Slots: avatar, menu items

### LanguageSelector
- [x] Blade: `resources/views/components/template/language-selector.blade.php`
- [x] PHP: `src/Components/Template/LanguageSelector.php`
- [x] Test
- [ ] Doc page

### ThemeConfigurator
- [x] Blade: `resources/views/components/template/theme-configurator.blade.php`
- [x] PHP: `src/Components/Template/ThemeConfigurator.php`
- [x] Test
- [ ] Doc page
- [x] Alpine: Drawer panel to switch theme preset, layout, dark mode, direction (LTR/RTL)
- [x] Saves to localStorage + optional config publish

### Breadcrumb
- [x] Blade: `resources/views/components/shared/breadcrumb.blade.php`
- [x] PHP: `src/Components/Shared/Breadcrumb.php`
- [x] Test
- [ ] Doc page
- [x] Props: items (array of {label, href}), separator

### PageHeader
- [x] Blade: `resources/views/components/shared/page-header.blade.php`
- [x] PHP: `src/Components/Shared/PageHeader.php`
- [x] Test
- [ ] Doc page
- [x] Slots: title, subtitle, extra (right-side actions)
- [x] Includes Breadcrumb internally

---

## Phase 4 Verification

- [x] 6 layout types render đúng
- [x] Layout switching hotswap — saves to localStorage + page reload (Blade-only; true SPA hotswap deferred to Livewire phase)
- [x] Mobile responsive: sidebar → drawer
- [x] Sidebar collapse/expand transition mượt
- [x] Header sticky hoạt động
- [x] Active menu item matches current URL/route — via `routeMatching` prop on Menu component (DOM-scanning init with longest-prefix match)
- [x] Keyboard shortcut Cmd+K opens search
- [x] Dark mode switch toàn bộ layout
- [x] RTL layout mirrors correctly
- [x] Theme configurator saves & applies presets
- [x] Tests pass — 64 tests (98 assertions)
- [ ] Doc pages hoàn chỉnh
