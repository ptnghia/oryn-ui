# Phase 0: Project Scaffolding

**Trạng thái**: ✅ Hoàn thành
**Ưu tiên**: 🔴 Cao nhất — phải hoàn thành trước khi bắt đầu bất kỳ phase nào khác

---

## 0.1 Package Structure

- [x] Tạo `composer.json` với metadata, autoload PSR-4, dependencies
- [x] Tạo `src/OrynUIServiceProvider.php` — register views, components, config, assets
- [x] Tạo `src/OrynUIFacade.php` — facade class
- [x] Tạo `config/oryn-ui.php` — default config (theme, layout, direction, control_size)
- [x] Tạo `package.json` — Node dependencies (tailwindcss, alpinejs, vite)
- [x] Tạo `vite.config.js` — Vite build pipeline
- [x] Tạo `tailwind.config.ts` — Tailwind config cho package

## 0.2 CSS Base Setup

- [x] Tạo `resources/css/oryn-ui.css` — main entry point
- [x] Tạo `resources/css/base/variables.css` — copy CSS variables từ Ecme `:root`
  - Source: `Ecme - NextJs Tailwind Admin Template/demo/src/assets/styles/tailwind/index.css`
- [x] Tạo `resources/css/base/typography.css` — copy typography rules
  - Source: same file, `@layer base` section
- [x] Tạo `resources/css/base/reset.css` — base reset rules (border-color, body styles)

## 0.3 CSS Components Migration

Migrate toàn bộ 34 component CSS files từ Ecme template:

- [x] `resources/css/components/alert.css` ← `demo/src/assets/styles/components/alert.css`
- [x] `resources/css/components/avatar.css` ← `demo/src/assets/styles/components/avatar.css`
- [x] `resources/css/components/badge.css` ← `demo/src/assets/styles/components/badge.css`
- [x] `resources/css/components/button.css` ← `demo/src/assets/styles/components/button.css`
- [x] `resources/css/components/card.css` ← `demo/src/assets/styles/components/card.css`
- [x] `resources/css/components/checkbox.css` ← `demo/src/assets/styles/components/checkbox.css`
- [x] `resources/css/components/close-button.css` ← `demo/src/assets/styles/components/close-button.css`
- [x] `resources/css/components/date-picker.css` ← `demo/src/assets/styles/components/date-picker.css`
- [x] `resources/css/components/dialog.css` ← `demo/src/assets/styles/components/dialog.css`
- [x] `resources/css/components/drawer.css` ← `demo/src/assets/styles/components/drawer.css`
- [x] `resources/css/components/dropdown.css` ← `demo/src/assets/styles/components/dropdown.css`
- [x] `resources/css/components/form.css` ← `demo/src/assets/styles/components/form.css`
- [x] `resources/css/components/input.css` ← `demo/src/assets/styles/components/input.css`
- [x] `resources/css/components/input-group.css` ← `demo/src/assets/styles/components/input-group.css`
- [x] `resources/css/components/menu.css` ← `demo/src/assets/styles/components/menu.css`
- [x] `resources/css/components/menu-item.css` ← `demo/src/assets/styles/components/menu-item.css`
- [x] `resources/css/components/notification.css` ← `demo/src/assets/styles/components/notification.css`
- [x] `resources/css/components/pagination.css` ← `demo/src/assets/styles/components/pagination.css`
- [x] `resources/css/components/progress.css` ← `demo/src/assets/styles/components/progress.css`
- [x] `resources/css/components/radio.css` ← `demo/src/assets/styles/components/radio.css`
- [x] `resources/css/components/scrollbar.css` ← `demo/src/assets/styles/components/scrollbar.css`
- [x] `resources/css/components/segment.css` ← `demo/src/assets/styles/components/segment.css`
- [x] `resources/css/components/select.css` ← `demo/src/assets/styles/components/select.css`
- [x] `resources/css/components/skeleton.css` ← `demo/src/assets/styles/components/skeleton.css`
- [x] `resources/css/components/slider.css` ← `demo/src/assets/styles/components/slider.css`
- [x] `resources/css/components/steps.css` ← `demo/src/assets/styles/components/steps.css`
- [x] `resources/css/components/switcher.css` ← `demo/src/assets/styles/components/switcher.css`
- [x] `resources/css/components/table.css` ← `demo/src/assets/styles/components/tables.css`
- [x] `resources/css/components/tabs.css` ← `demo/src/assets/styles/components/tabs.css`
- [x] `resources/css/components/tag.css` ← `demo/src/assets/styles/components/tag.css`
- [x] `resources/css/components/time-input.css` ← `demo/src/assets/styles/components/time-input.css`
- [x] `resources/css/components/timeline.css` ← `demo/src/assets/styles/components/timeline.css`
- [x] `resources/css/components/toast.css` ← `demo/src/assets/styles/components/toast.css`
- [x] `resources/css/components/tooltip.css` ← `demo/src/assets/styles/components/tooltip.css`
- [x] `resources/css/components/upload.css` ← `demo/src/assets/styles/components/upload.css`

## 0.4 CSS Template Migration

- [x] `resources/css/template/header.css` ← `demo/src/assets/styles/template/header.css`
- [x] `resources/css/template/side-nav.css` ← `demo/src/assets/styles/template/side-nav.css`
- [x] `resources/css/template/stacked-side-nav.css` ← `demo/src/assets/styles/template/stacked-side-nav.css`
- [x] `resources/css/template/secondary-header.css` ← `demo/src/assets/styles/template/secondary-header.css`

## 0.5 CSS Vendors

- [x] `resources/css/vendors/apexcharts.css` ← `demo/src/assets/styles/vendors/apexcharts.css`
- [x] `resources/css/vendors/fullcalendar.css` ← `demo/src/assets/styles/vendors/fullcalendar.css`
- [x] `resources/css/vendors/simplebar.css` ← `demo/src/assets/styles/vendors/simplebar.css`

## 0.6 JS Base Setup

- [x] Tạo `resources/js/oryn-ui.js` — main Alpine.js plugin entry
- [x] Tạo `resources/js/utils/helpers.js` — utility functions
- [x] Tạo `resources/js/utils/theme-switcher.js` — dark mode toggle
- [x] Tạo `resources/js/utils/sidebar-toggle.js` — sidebar collapse

## 0.7 Testing Infrastructure

- [x] Tạo `phpunit.xml` hoặc `pest.php` config
- [x] Tạo `tests/TestCase.php` — base test class với Orchestra Testbench
- [x] Cài đặt dependencies: `orchestra/testbench`, `pestphp/pest`
- [x] Viết 1 test đơn giản để verify setup hoạt động

## 0.8 Artisan Commands

- [x] Tạo `src/Commands/InstallCommand.php` — `php artisan oryn-ui:install`
- [x] Tạo `src/Commands/PublishCommand.php` — publish assets/config

## 0.9 Shared Traits

- [x] Tạo `src/Traits/HasVariant.php` — variant prop handling
- [x] Tạo `src/Traits/HasSize.php` — size prop handling (sm/md/lg)

## 0.10 Stubs

- [x] Tạo `stubs/blade-component.stub` — template cho Blade view mới
- [x] Tạo `stubs/component-class.stub` — template cho PHP class mới

---

## Verification Checklist

Khi Phase 0 hoàn thành, verify:

- [x] `composer install` chạy thành công
- [x] `npm install && npm run build` chạy thành công
- [x] CSS variables load đúng (kiểm tra qua browser)
- [x] Dark mode toggle hoạt động
- [x] Alpine.js khởi tạo đúng
- [x] `php artisan oryn-ui:install` chạy trong Laravel project mới
- [x] Tests pass (`vendor/bin/pest`)
