# Session Notes — Oryn UI

Ghi chú phiên làm việc hiện tại. Đọc file này đầu mỗi session để nắm context.

---

## Phiên làm việc gần nhất: 2026-03-28

### Trạng thái hiện tại
- **Phase**: All Phase 0–6 implementation complete. Documentation site (`docs-site/`) WORKING.
- **Đã hoàn thành**: Phase 0–6 + DataTable + docs-site scaffolding + all 18 routes returning 200 OK.
- **Test suite**: 498 tests, 865 assertions — all passing
- **Component count**: 94 class-based + 7 anonymous block paths (56 block files)
- **docs-site**: Laravel 13 app at `docs-site/`. All routes 200 OK. Build passes.
- **Tiếp theo**: Start php artisan serve in docs-site/ and open browser to verify visually.

### docs-site status
- **Build**: ✅ `npm run build` succeeds (174.58 kB CSS, 82.04 kB JS)
- **Routes**: ✅ All 18 routes return 200 (verified via /tmp/test-docs.php)
- **Committed**: ✅ commit `0f9c3dc` on `main`

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
