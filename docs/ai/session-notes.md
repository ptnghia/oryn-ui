# Session Notes — Oryn UI

Ghi chú phiên làm việc hiện tại. Đọc file này đầu mỗi session để nắm context.

---

## Phiên làm việc gần nhất: 2026-03-29

### Trạng thái hiện tại
- **Phase**: All Phase 0–6 implementation complete. Documentation site — Milestone 2 COMPLETE (all component docs).
- **Đã hoàn thành**: Phase 0–6 + DataTable + docs-site scaffolding + ALL 38 component doc pages
- **Test suite**: 498 tests, 865 assertions — all passing
- **Component count**: 94 class-based + 7 anonymous block paths (56 block files)
- **docs-site**: Laravel 13 app at `docs-site/`. All 38 component routes + 8 core pages = 200 OK.
- **Tiếp theo**: Milestone 3 (Layout docs, third-party component docs, page block docs, advanced guides)

### docs-site status
- **Build**: ✅ `npm run build` succeeds (174.58 kB CSS, 82.04 kB JS)
- **Routes**: ✅ All 38 component routes + 8 core pages return 200
- **Component pages**: 38/38 complete (10 pre-existing + 28 new)
  - Basic: alert, avatar, badge, button, card, close-button, icon, progress, skeleton, spinner, steps, table, tag, timeline (14)
  - Form: checkbox, form-item, input, radio, segment, select, switcher, textarea, upload (9)
  - Interactive: carousel, dialog, drawer, dropdown, menu, pagination, tabs, toast, tooltip (9)
  - Complex: auto-complete, data-table, date-picker, otp-input, slider, time-input (6)

### Key technical decisions for docs-site
1. **Tailwind CSS 4**: `@theme inline` block in `app.css` maps Oryn CSS vars to Tailwind color tokens
2. **Alpine.js**: aliased in `vite.config.js` to resolve from docs-site's `node_modules`
3. **Layout**: `components/layouts/docs.blade.php` (NOT `layouts/docs.blade.php`)
4. **Code examples**: Use `<x-slot:rawCode>@verbatim...@endverbatim</x-slot:rawCode>` for ANY code block containing `<x-oryn-*>` tags (even single-line) — Blade's component scanner will incorrectly compile them otherwise

### Key files for docs-site
- `docs-site/resources/views/components/docs/code-preview.blade.php` — handles both `code='...'` (plain text only) and `rawCode` slot (for component examples)
- `docs-site/resources/views/components/layouts/docs.blade.php` — docs layout
- `docs-site/resources/css/app.css` — Tailwind 4 with `@theme inline` mapping
- `docs-site/vite.config.js` — alpinejs alias
- `docs-site/app/Http/Controllers/DocsController.php` — nav structure + route handler

### Các file quan trọng cần đọc khi bắt đầu session mới
1. `docs/ai/activity-log.md` — Xem việc đã làm
2. `docs/plan/documentation-site.md` — Checklist cho documentation site
3. `.github/copilot-instructions.md` — Conventions & standards

---

<!-- Cập nhật file này cuối mỗi session -->
