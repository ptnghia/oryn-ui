# Session Notes — Oryn UI

Ghi chú phiên làm việc hiện tại. Đọc file này đầu mỗi session để nắm context.

---

## Phiên làm việc gần nhất: 2026-03-27

### Trạng thái hiện tại
- **Phase**: All Phase 0–6 implementation complete. Phase 7 (Documentation site) sẵn sàng bắt đầu.
- **Đã hoàn thành**: Phase 0 scaffolding + Phase 1 (23 components) + Phase 2 (25 components) + Phase 3 (16 components) + Phase 4 (23 components — includes NotificationDropdown) + Phase 5 (6 components) + Phase 6 (56 block templates) + Phase 4/5 gap fixes
- **Test suite**: 498 tests, 865 assertions — all passing
- **Component count**: 94 class-based + 7 anonymous block paths (56 block files)
- **Tiếp theo**: Documentation site (see `docs/plan/documentation-site.md`)

### Các file quan trọng cần đọc khi bắt đầu session mới
1. `docs/ai/activity-log.md` — Xem việc đã làm
2. `docs/plan/documentation-site.md` — Checklist cho documentation site
3. `.github/copilot-instructions.md` — Conventions & standards
4. `src/OrynUIServiceProvider.php` — Component registration (94 class-based + 7 anonymous block paths)

### Gap fixes completed (Session 10)
- **NotificationDropdown**: New template component (`<x-oryn-notification-dropdown>`) — Alpine dropdown with notifications[], markAsRead/markAllAsRead, badge count, empty state, named slots
- **Chart CSS vars**: Runtime resolution of --primary/--success/--error/--warning/--info via getComputedStyle
- **Destroy hooks**: All 6 vendor components now have destroy() methods
- **CDN config**: `config('oryn-ui.vendors.cdn')` toggle + versioned URLs for all 6 libraries
- **Active menu route matching**: `routeMatching` boolean prop on Menu — scans DOM for a[href], longest-prefix match, auto-activates via data-event-key/data-collapse-key
- **Layout hotswap**: ThemeConfigurator saves to localStorage + page reload (Blade-only)

### Quyết định còn pending
- CSS class prefix: chưa rename `.button` → `.oryn-button` (giữ nguyên tên gốc trước)
- Chưa quyết định domain cho documentation site
- DataTable: still deferred, needs Table + Pagination + Select + Input composition
- True layout hotswap deferred to Livewire phase

---

<!-- Cập nhật file này cuối mỗi session -->
