# Design Decisions — Oryn UI

Log các quyết định thiết kế quan trọng, lý do chọn, và các phương án đã cân nhắc.

---

### [2026-03-22] Package naming: `oryn/ui` với prefix `oryn-`

**Decision**: Dùng prefix `oryn-` cho tất cả Blade components, CSS classes, Alpine plugins.
**Alternatives considered**:
- `ecme-` — gắn với tên template gốc, hạn chế branding
- `ui-` — quá chung chung, dễ conflict
- Không prefix — conflict với các package khác

**Reason**: `oryn-` ngắn gọn, duy nhất, không conflict, phù hợp cho branding dài hạn.

---

### [2026-03-22] Sử dụng Alpine.js thay vì vanilla JS

**Decision**: Alpine.js 3.x cho tất cả tương tác, không dùng vanilla JS thuần hay jQuery.
**Alternatives considered**:
- Vanilla JS — nhiều boilerplate, khó maintain
- jQuery — lỗi thời, nặng
- Stimulus.js — ít phổ biến trong Laravel ecosystem

**Reason**: Alpine.js là standard trong Laravel ecosystem (Livewire dùng mặc định), syntax gần HTML, nhẹ (~15KB), tương thích tốt với Blade components. Dễ transition sang Livewire ở Phase 2.

---

### [2026-03-22] Component tiers (4 levels)

**Decision**: Phân loại components thành 4 tiers dựa trên complexity.
- Tier 1: Pure HTML/CSS (Blade only)
- Tier 2: Blade + inline Alpine.js
- Tier 3: Blade + Alpine.js plugins
- Tier 4: Blade + third-party JS libraries

**Reason**: Cho phép phát triển tuần tự từ đơn giản → phức tạp. Tier 1-2 có thể ship nhanh, Tier 3-4 cần thời gian phát triển Alpine plugins.

---

### [2026-03-23] Tier 3: Inline Alpine.js x-data instead of separate plugin files

**Decision**: Tier 3 components use inline `x-data` objects directly in Blade templates, NOT separate JS plugin files in `resources/js/plugins/`.
**Alternatives considered**:
- Separate JS plugin files (`resources/js/plugins/select.js`, etc.) — as originally planned
- Web components — too complex for this project scope

**Reason**: Inline Alpine.js `x-data` in Blade templates is simpler, requires no build step, and keeps component logic co-located with the template. The original plan assumed plugins would be needed, but in practice all Tier 3 logic (calendar math, drag handling, keyboard nav, search/filter) fits comfortably in inline `x-data` objects. Users don't need to import/register anything — components work out of the box.

---

### [2026-03-23] DataTable deferred to Phase 5

**Decision**: The DataTable component (advanced table with pagination, search, page size selector) is deferred from Phase 3 to Phase 5.
**Alternatives considered**:
- Build it in Phase 3 — requires composing Table + Pagination + Select + Input
- Build it as a third-party integration with TanStack Table

**Reason**: DataTable is a composition of multiple components (Table, Pagination, Select, Input). It makes more sense to build it after all base components exist. It may also benefit from third-party integration (e.g., TanStack Table for advanced features like virtual scroll, column resizing).

---

### [2026-03-24] Alpine.js $store.layout for cross-component layout state

**Decision**: Use Alpine.js global store (`$store.layout`) for layout state management (sideNavCollapse, mobileNavOpen) instead of custom events or PHP session state.
**Alternatives considered**:
- Custom events via `$dispatch` — harder to read state from unrelated components
- PHP session/config — requires server round-trip, breaks SPA-like UX
- Livewire state — not available in Phase 1 (Blade-only)

**Reason**: Alpine `$store` provides reactive global state accessible from any component. SideNav reads `$store.layout.sideNavCollapse` while SideNavToggle writes to it — no coupling needed. State persists within the page lifecycle, and ThemeConfigurator extends this pattern with localStorage persistence for cross-page state.

---

### [2026-03-24] Named slot composition for layout components

**Decision**: Layout components (LayoutCollapsibleSide, etc.) use named Blade slots ($sideNav, $header, $headerStart/$headerMiddle/$headerEnd) for composition, not props or config arrays.
**Alternatives considered**:
- Config array props — inflexible, can't pass arbitrary HTML/components
- Blade @section/@yield — requires extending layouts, less composable
- Separate component files for each region — over-engineering

**Reason**: Named slots give maximum flexibility: developers can pass any content including other components into each region. This matches how the React source uses children/render props and is idiomatic Blade component design.

---

### [2026-03-24] Notification header widget deferred

**Decision**: The Notification header widget component is deferred from Phase 4.
**Alternatives considered**:
- Build a generic notification dropdown now

**Reason**: A proper notification component requires designing a notification data model (notification types, read/unread state, action URLs, timestamps, grouping). This is better addressed when building Block components (Phase 6) or during Livewire integration (Phase 2 future) where real-time notification support is available.

---

### [2026-03-22] CSS architecture: Copy CSS từ Ecme, dùng @layer components

**Decision**: Copy toàn bộ 34 component CSS files từ Ecme template, giữ nguyên Tailwind `@apply` directives.
**Alternatives considered**:
- Viết lại CSS từ đầu — tốn thời gian, mất visual fidelity
- Dùng Tailwind utility-only — khó maintain cho component library
- CSS-in-JS — không phù hợp với Blade/PHP

**Reason**: CSS files của Ecme đã tách biệt tốt, dùng CSS variables, hoàn toàn framework-agnostic. Copy trực tiếp đảm bảo visual fidelity 100%.

---

### [2026-03-25] CDN-first vendor loading strategy for Tier 4 components

**Decision**: Tier 4 (third-party) components assume external libraries are loaded by the user via CDN or npm. No bundling inside the package. Runtime detection with console.warn if library not found.
**Alternatives considered**:
- Bundle libraries into package JS — bloats package size, version conflicts
- Require npm peer dependencies — complicates installation for CDN users
- Lazy-load from CDN automatically — security concerns, unpredictable network

**Reason**: Users have different preferences (CDN vs npm vs pnpm). Runtime detection with console.warn is non-intrusive and works universally. Pattern: `if (typeof Library === 'undefined') { console.warn('...'); return; }`.

---

### [2026-03-25] Avoid Component property name `$data` — naming conflict

**Decision**: Never name a Blade component public property `$data`. RegionMap renamed from `$data` to `$mapData`.
**Alternatives considered**:
- Keep `$data` and remove `@props` directive — still fails due to `Component::data()` method conflict in `extractPublicMethods()`
- Override `data()` method in component class — fragile, may break future Laravel updates

**Reason**: `Illuminate\View\Component::data()` is a public zero-argument method. Laravel's `extractPublicMethods()` wraps it as `InvokableComponentVariable`, which overwrites the `$data` property in the merged view data array. Renaming is the cleanest solution.

---

### [2026-03-26] Anonymous component paths with `::` separator for page blocks

**Decision**: Page blocks use `Blade::anonymousComponentPath($path, 'prefix')` which requires `::` separator in component tags, e.g., `<x-oryn-block-dashboard::ecommerce />`.
**Alternatives considered**:
- Class-based components for blocks — unnecessary overhead for layout-only components
- Single flat prefix — would create naming collisions between categories
- Hyphen separator (e.g., `<x-oryn-block-dashboard-ecommerce />`) — does NOT work with Laravel's anonymous component path resolution

**Reason**: Laravel's `anonymousComponentPath()` method registers a prefix and resolves components using `::` separator (standard Laravel package convention, same as `mail::message`). Using hyphen concatenation makes Laravel look for a single component named `oryn-block-dashboard-ecommerce` which doesn't exist. The `::` tells Laravel to look in the registered path for the component after the separator.

---

### [2026-03-26] Slot-based composition for page blocks (not hardcoded content)

**Decision**: Page blocks provide responsive grid layouts with named Blade slots where users inject their own content. Blocks do NOT hardcode specific Oryn UI components inside.
**Alternatives considered**:
- Full page templates with hardcoded components and sample data
- Partial templates that import specific components
- Config-driven page builders

**Reason**: Slot-based composition maximizes flexibility. Users fill slots with their own data, components, and business logic. This avoids coupling blocks to specific data models or backend systems, making blocks reusable across different projects.

---

### [2026-03-27] NotificationDropdown naming to avoid UI Notification conflict

**Decision**: Named the template notification widget `NotificationDropdown` (`<x-oryn-notification-dropdown>`) instead of `Notification`.
**Alternatives considered**:
- `Notification` — conflicts with `<x-oryn-notification>` (UI toast component)
- `HeaderNotification` — verbose, not consistent with dropdown pattern
**Reason**: Both UI and Template namespaces share the same `oryn-` blade prefix. Unique component names required.

---

### [2026-03-27] Layout hotswap via page reload (Blade-only)

**Decision**: ThemeConfigurator saves layout choice to localStorage then triggers `window.location.reload()`.
**Alternatives considered**:
- Livewire/Turbo for true SPA hotswap — requires Livewire dependency
- AJAX partial reload — too complex for pure Blade templating
- No hotswap — poor UX
**Reason**: Blade layouts are server-rendered. Page reload is the simplest, most reliable approach. True hotswap deferred to Livewire phase (Phase 2 target).

---

### [2026-03-27] Menu routeMatching via DOM scanning

**Decision**: Menu component's `routeMatching` prop triggers init() that scans all `a[href]` elements in the menu and matches against `window.location.pathname` using longest-prefix match.
**Alternatives considered**:
- Server-side route matching — requires Laravel route integration, breaks encapsulation
- Data attribute matching — still needs client-side logic
**Reason**: Client-side DOM scanning is universal (works with any URL structure), requires no server coupling, and uses standard `data-event-key` / `data-collapse-key` attributes already on menu items.

---

### [2026-03-22] Docs organization: docs/ai cho AI memory, docs/plan cho planning

**Decision**: Tách riêng AI memory/logging (docs/ai) và project planning (docs/plan) thành 2 thư mục trong docs/.
**Reason**: 
- AI memory cần format nhất quán để Copilot đọc/ghi hiệu quả
- Planning files cần check lists chi tiết, dễ theo dõi progress
- Tách riêng tránh nhầm lẫn giữa "việc đã làm" và "việc cần làm"

---

<!-- 
### [YYYY-MM-DD] Decision title

**Decision**: Mô tả quyết định
**Alternatives considered**:
- Option A — lý do không chọn
- Option B — lý do không chọn

**Reason**: Lý do chọn phương án này
-->
