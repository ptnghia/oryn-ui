# Oryn UI — Project Plans

Thư mục này chứa các kế hoạch thực hiện chi tiết với checklist, chia theo phase/mức ưu tiên.

## Tổng Quan Phases

| Phase | File | Mô tả | Trạng thái |
|-------|------|--------|-----------|
| 0 | `phase-0-scaffolding.md` | Package scaffolding, CSS/JS setup | ✅ Done |
| 1 | `phase-1-core-ui.md` | 22 Tier 1 pure HTML/CSS components | ⏳ Not started |
| 2 | `phase-2-interactive.md` | 25 Tier 2 Alpine.js interactive components | ⏳ Not started |
| 3 | `phase-3-complex.md` | 10 Tier 3 Alpine.js plugin components | ⏳ Not started |
| 4 | `phase-4-templates.md` | 19 layout & template components | ⏳ Not started |
| 5 | `phase-5-thirdparty.md` | 6 third-party JS integrations | ⏳ Not started |
| 6 | `phase-6-blocks.md` | 46 pre-built page blocks | ⏳ Not started |
| — | `documentation-site.md` | Documentation site (song song) | ⏳ Not started |

## Quy tắc

- **Mỗi task có checkbox** `[ ]` / `[x]` để track progress
- **Phát triển song song**: Documentation site được làm song song với UI components
- **Thứ tự ưu tiên**: Phase 0 → Phase 1 + Docs → Phase 2 + Docs → ...
- **Mỗi component hoàn thành** = Blade view + PHP class (nếu cần) + CSS + JS (nếu cần) + Test + Doc page
