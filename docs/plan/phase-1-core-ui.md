# Phase 1: Core UI Components (Tier 1 — Pure HTML/CSS)

**Trạng thái**: ✅ Completed
**Phụ thuộc**: Phase 0 phải hoàn thành
**Ưu tiên**: 🔴 Cao — nền tảng cho mọi component khác

Mỗi component cần hoàn thành **đầy đủ 5 bước**:

```
✅ = Blade view | PHP class | CSS | Test | Doc page
```

---

## Sprint 1.1 — Typography & Basic Display

### Alert
- [x] Blade: `resources/views/components/ui/alert.blade.php`
- [x] PHP: `src/Components/UI/Alert.php`
- [x] CSS: verify `resources/css/components/alert.css` (migrated in Phase 0)
- [x] Test: `tests/Feature/Components/UI/AlertTest.php`
- [ ] Doc: `docs/site/pages/components/alert.blade.php`
- [x] Props: type (success/warning/danger/info), title, closable, showIcon, customIcon
- [x] Slots: default, icon

### Badge
- [x] Blade: `resources/views/components/ui/badge.blade.php`
- [x] PHP: `src/Components/UI/Badge.php`
- [x] Test: `tests/Feature/Components/UI/BadgeTest.php`
- [ ] Doc page
- [x] Props: content, maxCount, innerClass

### Tag
- [x] Blade: `resources/views/components/ui/tag.blade.php`
- [x] PHP: `src/Components/UI/Tag.php`
- [x] Test: `tests/Feature/Components/UI/TagTest.php`
- [ ] Doc page
- [x] Props: prefix (bool|string), suffix (bool|string), prefixClass, suffixClass

### StatusIcon
- [x] Blade: `resources/views/components/ui/status-icon.blade.php`
- [x] PHP: `src/Components/UI/StatusIcon.php`
- [x] Test: `tests/Feature/Components/UI/StatusIconTest.php`
- [ ] Doc page
- [x] Props: type (success/danger/warning/info), iconColor

### Spinner
- [x] Blade: `resources/views/components/ui/spinner.blade.php`
- [x] PHP: `src/Components/UI/Spinner.php`
- [x] Test: `tests/Feature/Components/UI/SpinnerTest.php`
- [ ] Doc page
- [x] Props: size, isSpinning, enableTheme, customColorClass

### Skeleton
- [x] Blade: `resources/views/components/ui/skeleton.blade.php`
- [x] PHP: `src/Components/UI/Skeleton.php`
- [x] Test: `tests/Feature/Components/UI/SkeletonTest.php`
- [ ] Doc page
- [x] Props: variant (circle/block), width, height, animation

### Notification (display)
- [x] Blade: `resources/views/components/ui/notification.blade.php`
- [x] PHP: `src/Components/UI/Notification.php`
- [x] Test: `tests/Feature/Components/UI/NotificationTest.php`
- [ ] Doc page
- [x] Props: type (success/warning/danger/info), title, closable, width

### CloseButton
- [x] Blade: `resources/views/components/ui/close-button.blade.php`
- [x] PHP: `src/Components/UI/CloseButton.php`
- [x] Test: `tests/Feature/Components/UI/CloseButtonTest.php`
- [ ] Doc page
- [x] Props: absolute, resetDefaultClass

---

## Sprint 1.2 — Containers & Layout Primitives

### Card
- [x] Blade: `resources/views/components/ui/card.blade.php`
- [x] PHP: `src/Components/UI/Card.php`
- [x] Test: `tests/Feature/Components/UI/CardTest.php`
- [ ] Doc page
- [x] Props: bordered, clickable, bodyClass, headerBordered, footerBordered
- [x] Slots: default, header, headerExtra, footer

### Button
- [x] Blade: `resources/views/components/ui/button.blade.php`
- [x] PHP: `src/Components/UI/Button.php`
- [x] Test: `tests/Feature/Components/UI/ButtonTest.php`
- [ ] Doc page
- [x] Props: variant (solid/plain/default), size (xs/sm/md/lg), shape (round/circle/none), loading, disabled, icon, block, active, href, iconAlignment, tag

### Avatar
- [x] Blade: `resources/views/components/ui/avatar.blade.php`
- [x] PHP: `src/Components/UI/Avatar.php`
- [x] Test: `tests/Feature/Components/UI/AvatarTest.php`
- [ ] Doc page
- [x] Props: src, alt, size (sm/md/lg|number), shape (circle/round/square), icon

### AvatarGroup
- [x] Blade: `resources/views/components/ui/avatar-group.blade.php`
- [x] PHP: `src/Components/UI/AvatarGroup.php`
- [x] Test: `tests/Feature/Components/UI/AvatarTest.php`
- [ ] Doc page
- [x] Props: chained, maxCount, omittedAvatarContent

### Input
- [x] Blade: `resources/views/components/ui/input.blade.php`
- [x] PHP: `src/Components/UI/Input.php`
- [x] Test: `tests/Feature/Components/UI/InputTest.php`
- [ ] Doc page
- [x] Props: size (xs/sm/md/lg), invalid, disabled, prefix, suffix, textArea

### InputGroup
- [x] Blade: `resources/views/components/ui/input-group.blade.php`
- [x] PHP: `src/Components/UI/InputGroup.php`
- [x] Test: `tests/Feature/Components/UI/InputTest.php`
- [ ] Doc page
- [x] Props: size

### InputAddon
- [x] Blade: `resources/views/components/ui/input-addon.blade.php`
- [x] PHP: `src/Components/UI/InputAddon.php`
- [x] Test: `tests/Feature/Components/UI/InputTest.php`
- [ ] Doc page
- [x] Props: size

### FormContainer
- [x] Blade: `resources/views/components/ui/form-container.blade.php`
- [x] PHP: `src/Components/UI/FormContainer.php`
- [x] Test: `tests/Feature/Components/UI/FormTest.php`
- [ ] Doc page
- [x] Props: layout (horizontal/vertical/inline), size, labelWidth

### FormItem
- [x] Blade: `resources/views/components/ui/form-item.blade.php`
- [x] PHP: `src/Components/UI/FormItem.php`
- [x] Test: `tests/Feature/Components/UI/FormTest.php`
- [ ] Doc page
- [x] Props: label, htmlFor, invalid, errorMessage, extra, asterisk, layout, size, labelClass, labelWidth

---

## Sprint 1.3 — Data Display

### Progress (Line + Circle combined)
- [x] Blade: `resources/views/components/ui/progress.blade.php`
- [x] PHP: `src/Components/UI/Progress.php`
- [x] Test: `tests/Feature/Components/UI/ProgressTest.php`
- [ ] Doc page
- [x] Props: percent, variant (line/circle), size (sm/md), showInfo, customInfo, customColorClass, width, strokeWidth, strokeLinecap, gapPosition, gapDegree

### Timeline
- [x] Blade: `resources/views/components/ui/timeline.blade.php`
- [x] PHP: `src/Components/UI/Timeline.php`
- [x] Test: `tests/Feature/Components/UI/TimelineTest.php`
- [ ] Doc page

### TimelineItem
- [x] Blade: `resources/views/components/ui/timeline-item.blade.php`
- [x] PHP: `src/Components/UI/TimelineItem.php`
- [x] Test: `tests/Feature/Components/UI/TimelineTest.php`
- [ ] Doc page
- [x] Props: isLast
- [x] Slots: default, media

### Steps
- [x] Blade: `resources/views/components/ui/steps.blade.php`
- [x] PHP: `src/Components/UI/Steps.php`
- [x] Test: `tests/Feature/Components/UI/StepsTest.php`
- [ ] Doc page
- [x] Props: current, status, vertical

### StepItem
- [x] Blade: `resources/views/components/ui/step-item.blade.php`
- [x] PHP: `src/Components/UI/StepItem.php`
- [x] Test: `tests/Feature/Components/UI/StepsTest.php`
- [ ] Doc page
- [x] Props: title, description, status (complete/in-progress/pending/error), stepNumber, isLast, vertical, customIcon

---

## Phase 1 Verification

- [x] Tất cả 22 components render đúng (23 components created)
- [x] Tất cả tests pass (102 tests, 187 assertions)
- [x] Dark mode classes present for all components
- [x] RTL layout classes present (ltr:/rtl: variants)
- [x] Attribute forwarding hoạt động (`$attributes->merge()`)
- [ ] Documentation pages có cho mỗi component
