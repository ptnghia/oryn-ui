# Session Notes — Oryn UI

Ghi chú phiên làm việc hiện tại. Đọc file này đầu mỗi session để nắm context.

---

## Phiên làm việc gần nhất: 2026-03-30

### Trạng thái hiện tại
- **Phase**: All Phase 0–6 implementation complete. Documentation site — Milestone 3 COMPLETE.
- **Đã hoàn thành**: Phase 0–6 + docs-site Milestones 1–3 (all 38 component docs + 33 new pages)
- **Test suite**: 498 tests, 865 assertions — all passing
- **Component count**: 94 class-based + 7 anonymous block paths (56 block files)
- **docs-site**: Laravel 13 app at `docs-site/`. All 71 doc routes return 200 OK.
- **Tiếp theo**: Milestone 4 (Static site generation, deployment, SEO, GitHub Pages)

### docs-site status
- **Build**: ✅ `npm run build` succeeds
- **Routes**: ✅ All 71 routes return 200 (8 core + 38 components + 12 layouts + 6 third-party + 7 blocks + 8 guides = 79, minus 8 shared = 71 unique)
- **Pages created**: 71 total
  - Core: home, installation, quick-start, configuration, theming, changelog, search (8)
  - Component pages: 38 (14 basic + 9 form + 9 interactive + 6 complex)
  - Layout/Template pages: 12 (7 layouts + 5 template parts)
  - Third-Party pages: 6 (chart, rich-text-editor, calendar-view, gantt-chart, syntax-highlighter, region-map)
  - Block pages: 7 (auth, dashboard, crud, app, account, utility, help-center)
  - Guide pages: 8 (customizing-components, custom-themes, rtl-support, accessibility, livewire, vue-inertia, contributing, changelog)

### Key technical decisions for docs-site
1. **Tailwind CSS 4**: `@theme inline` block in `app.css` maps Oryn CSS vars to Tailwind color tokens
2. **Alpine.js**: aliased in `vite.config.js` to resolve from docs-site's `node_modules`
3. **Layout**: `components/layouts/docs.blade.php` (NOT `layouts/docs.blade.php`)
4. **Code examples**: Use `<x-slot:rawCode>@verbatim...@endverbatim</x-slot:rawCode>` for ANY code block containing `<x-oryn-*>` tags
5. **Escape Blade directives in text**: Use `@@props`, `@@verbatim`, etc. when showing directive names in documentation text
6. **No `<?php` in @verbatim**: PHP opening tags in @verbatim blocks open execution context — use alternative code examples
7. **Route naming**: Home route is `home` (NOT `docs.home`) — defined outside the docs prefix group
8. **Block/Guide routes**: `docs.block` and `docs.guide` with dynamic params, resolve to `docs.blocks.*` / `docs.guides.*` views

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
