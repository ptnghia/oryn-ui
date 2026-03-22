<p align="center">
  <img src="https://raw.githubusercontent.com/ptnghia/oryn-ui/main/docs/public/img/logo/logo.svg" alt="Oryn UI" width="200" />
</p>

<h1 align="center">Oryn UI</h1>

<p align="center">
  A comprehensive Laravel UI component package built with Tailwind CSS 4 & Alpine.js 3.<br/>
  128+ Blade components · 6 layout systems · 46 page blocks · 5 theme presets.
</p>

<p align="center">
  <a href="https://packagist.org/packages/oryn/ui"><img src="https://img.shields.io/packagist/v/oryn/ui.svg?style=flat-square" alt="Latest Version"></a>
  <a href="https://packagist.org/packages/oryn/ui"><img src="https://img.shields.io/packagist/dt/oryn/ui.svg?style=flat-square" alt="Total Downloads"></a>
  <a href="https://github.com/ptnghia/oryn-ui/actions"><img src="https://img.shields.io/github/actions/workflow/status/ptnghia/oryn-ui/tests.yml?branch=main&style=flat-square&label=tests" alt="Tests"></a>
  <a href="https://github.com/ptnghia/oryn-ui/blob/main/LICENSE"><img src="https://img.shields.io/github/license/ptnghia/oryn-ui?style=flat-square" alt="License"></a>
  <img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Laravel-11+-FF2D20?style=flat-square&logo=laravel&logoColor=white" alt="Laravel 11+">
  <img src="https://img.shields.io/badge/Tailwind_CSS-4.0-06B6D4?style=flat-square&logo=tailwindcss&logoColor=white" alt="Tailwind CSS 4">
  <img src="https://img.shields.io/badge/Alpine.js-3.x-77C1D2?style=flat-square&logo=alpine.js&logoColor=white" alt="Alpine.js">
</p>

---

## Overview

**Oryn UI** is a fully-featured Laravel UI component library — like Flowbite but far more comprehensive. It provides everything you need to build a production-ready admin panel or web application directly with Laravel Blade templating.

- **128+ Blade components** — from simple badges to complex data tables
- **6 admin layout systems** — collapsible sidebar, stacked sidebar, top navigation, and more
- **46 pre-built page blocks** — auth pages, dashboards, CRUD templates, app UIs
- **5 theme presets** — Default (Blue), Dark, Green, Purple, Orange
- **Full dark mode** — class-based `.dark` strategy
- **RTL support** — built-in `ltr:` / `rtl:` Tailwind variants
- **Alpine.js powered** — interactive components with zero jQuery dependency
- **Accessible** — ARIA attributes and keyboard navigation throughout

> **Roadmap**: Phase 1 = Laravel Blade (current) · Phase 2 = Livewire · Phase 3 = Vue.js + Inertia.js

---

## Requirements

| Dependency | Version |
|-----------|---------|
| PHP | >= 8.2 |
| Laravel | >= 11.0 |
| Tailwind CSS | >= 4.0 |
| Alpine.js | >= 3.14 |
| Node.js | >= 18 |

---

## Installation

### 1. Install via Composer

```bash
composer require oryn/ui
```

### 2. Publish assets & config

```bash
php artisan oryn-ui:install
```

This will:
- Publish `config/oryn-ui.php`
- Add CSS and JS imports to your `resources/css/app.css` and `resources/js/app.js`

### 3. Configure Vite

```js
// vite.config.js
import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
})
```

### 4. Set up Alpine.js

```js
// resources/js/app.js
import Alpine from 'alpinejs'
import OrynUI from '../../vendor/oryn/ui/resources/js/oryn-ui.js'

OrynUI(Alpine)

Alpine.start()
```

### 5. Add Tailwind CSS import

```css
/* resources/css/app.css */
@import "tailwindcss";
@import "../../vendor/oryn/ui/resources/css/oryn-ui.css";
```

### 6. Build assets

```bash
npm run build
```

---

## Quick Start

Add the layout to your Blade view:

```blade
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My App</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<x-oryn-layout-collapsible-side>
    <x-slot:sidebar>
        <x-oryn-side-nav :items="$navItems" />
    </x-slot:sidebar>

    <x-oryn-page-container>
        <h1 class="text-2xl font-bold mb-6">Dashboard</h1>

        <x-oryn-card>
            <x-slot:header>Welcome</x-slot:header>
            Your content goes here.
        </x-oryn-card>
    </x-oryn-page-container>
</x-oryn-layout-collapsible-side>
</body>
</html>
```

---

## Components

### Basic Components

```blade
{{-- Alert --}}
<x-oryn-alert variant="success">Your changes have been saved.</x-oryn-alert>
<x-oryn-alert variant="error" :closable="true">Something went wrong.</x-oryn-alert>

{{-- Badge --}}
<x-oryn-badge variant="solid">New</x-oryn-badge>
<x-oryn-badge class="bg-success-subtle text-success">Active</x-oryn-badge>

{{-- Button --}}
<x-oryn-button variant="solid">Save</x-oryn-button>
<x-oryn-button variant="twoTone" color="error">Delete</x-oryn-button>
<x-oryn-button :loading="true">Saving...</x-oryn-button>

{{-- Card --}}
<x-oryn-card>
    <x-slot:header>Card Title</x-slot:header>
    Card body content.
    <x-slot:footer>Footer actions</x-slot:footer>
</x-oryn-card>

{{-- Avatar --}}
<x-oryn-avatar src="/img/avatar.jpg" size="lg" />
<x-oryn-avatar-group :avatars="$users" :max="4" />

{{-- Tag --}}
<x-oryn-tag closable>Laravel</x-oryn-tag>
<x-oryn-tag prefix>⭐ Featured</x-oryn-tag>
```

### Form Components

```blade
{{-- Input --}}
<x-oryn-input name="email" type="email" placeholder="you@example.com" />
<x-oryn-input name="search" size="sm" :invalid="$errors->has('search')" />

{{-- Input Group --}}
<x-oryn-input-group>
    <x-slot:prefix>https://</x-slot:prefix>
    <x-oryn-input name="url" placeholder="example.com" />
</x-oryn-input-group>

{{-- Select --}}
<x-oryn-select name="status" :options="[
    ['value' => 'active', 'label' => 'Active'],
    ['value' => 'inactive', 'label' => 'Inactive'],
]" placeholder="Select status" />

{{-- Checkbox & Radio --}}
<x-oryn-checkbox name="agree" label="I agree to the terms" />
<x-oryn-radio name="plan" value="pro" label="Pro Plan" />

{{-- Switcher --}}
<x-oryn-switcher name="notifications" label="Email notifications" />

{{-- Date Picker --}}
<x-oryn-date-picker name="created_at" placeholder="Select date" />
<x-oryn-date-picker-range name="date_range" />
```

### Interactive Components

```blade
{{-- Dropdown --}}
<x-oryn-dropdown>
    <x-slot:trigger>
        <x-oryn-button>Options</x-oryn-button>
    </x-slot:trigger>
    <x-oryn-dropdown-item href="#">Edit</x-oryn-dropdown-item>
    <x-oryn-dropdown-item href="#">Duplicate</x-oryn-dropdown-item>
    <x-oryn-dropdown-item class="text-error" href="#">Delete</x-oryn-dropdown-item>
</x-oryn-dropdown>

{{-- Dialog / Modal --}}
<x-oryn-dialog>
    <x-slot:trigger>
        <x-oryn-button>Open Modal</x-oryn-button>
    </x-slot:trigger>
    <x-slot:header>Confirm Action</x-slot:header>
    Are you sure you want to continue?
    <x-slot:footer>
        <x-oryn-button variant="plain" @click="close()">Cancel</x-oryn-button>
        <x-oryn-button variant="solid">Confirm</x-oryn-button>
    </x-slot:footer>
</x-oryn-dialog>

{{-- Tabs --}}
<x-oryn-tabs default-value="profile">
    <x-oryn-tab-list>
        <x-oryn-tab-nav value="profile">Profile</x-oryn-tab-nav>
        <x-oryn-tab-nav value="settings">Settings</x-oryn-tab-nav>
    </x-oryn-tab-list>
    <x-oryn-tab-content value="profile">Profile content here</x-oryn-tab-content>
    <x-oryn-tab-content value="settings">Settings content here</x-oryn-tab-content>
</x-oryn-tabs>

{{-- Toast (trigger via Alpine) --}}
<x-oryn-button @click="$dispatch('oryn:toast', { message: 'Saved!', type: 'success' })">
    Save
</x-oryn-button>
```

### Data Display

```blade
{{-- Table --}}
<x-oryn-table>
    <x-slot:head>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Status</th>
        </tr>
    </x-slot:head>
    @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td><x-oryn-badge>Active</x-oryn-badge></td>
        </tr>
    @endforeach
</x-oryn-table>

{{-- DataTable (with server-side pagination) --}}
<x-oryn-data-table
    :columns="$columns"
    :data-url="route('api.users')"
    :searchable="true"
    :selectable="true"
/>

{{-- Pagination --}}
<x-oryn-pagination :paginator="$users" />

{{-- Progress --}}
<x-oryn-progress :percent="75" />
<x-oryn-progress-circle :percent="60" />
```

---

## Theming

Oryn UI uses CSS custom properties for all colors. Override them in your CSS to create a custom theme:

```css
/* resources/css/app.css */
:root {
    --primary: #6366f1;       /* Indigo */
    --primary-deep: #4f46e5;
    --primary-mild: #818cf8;
    --primary-subtle: #6366f11a;
}
```

### Built-in Theme Presets

```php
// config/oryn-ui.php
return [
    'theme' => 'default', // default | green | purple | orange | dark
];
```

| Preset | Primary Color |
|--------|--------------|
| `default` | Blue `#2a85ff` |
| `green` | Green `#0CAF60` |
| `purple` | Purple `#8C62FF` |
| `orange` | Orange `#fb732c` |
| `dark` | Slate `#18181b` |

### Dark Mode

Dark mode is controlled by the `.dark` class on the `<html>` element:

```blade
<html class="{{ $isDark ? 'dark' : 'light' }}">
```

Or toggle dynamically with Alpine.js:

```html
<button @click="
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
">
    Toggle Dark Mode
</button>
```

---

## Layouts

Six admin layout systems are available out of the box:

| Layout | Tag | Description |
|--------|-----|-------------|
| Collapsible Side | `<x-oryn-layout-collapsible-side>` | Sidebar that collapses to icon-only mode |
| Stacked Side | `<x-oryn-layout-stacked-side>` | Two-level stacked sidebar |
| Top Bar Classic | `<x-oryn-layout-top-bar>` | Horizontal menu navigation |
| Frameless Side | `<x-oryn-layout-frameless-side>` | Sidebar without border frame |
| Content Overlay | `<x-oryn-layout-content-overlay>` | Sidebar overlays content |
| Blank | `<x-oryn-layout-blank>` | Minimal layout for auth pages |

---

## Page Blocks

Pre-built full-page templates ready to copy and customize:

### Authentication Pages (15 variants)

```blade
{{-- Sign in with side panel --}}
@include('oryn-ui::blocks.auth.sign-in-side')

{{-- Sign up with split layout --}}
@include('oryn-ui::blocks.auth.sign-up-split')
```

### Dashboards (4 types)

```blade
@include('oryn-ui::blocks.dashboards.ecommerce')
@include('oryn-ui::blocks.dashboards.analytic')
@include('oryn-ui::blocks.dashboards.marketing')
@include('oryn-ui::blocks.dashboards.project')
```

### CRUD Templates

```blade
{{-- Customer list with DataTable --}}
@include('oryn-ui::blocks.crud.customer-list')

{{-- Customer create form --}}
@include('oryn-ui::blocks.crud.customer-create')
```

---

## Configuration

```php
// config/oryn-ui.php
return [
    /*
    |--------------------------------------------------------------------------
    | Default Theme Preset
    |--------------------------------------------------------------------------
    | Options: default | green | purple | orange | dark
    */
    'theme' => env('ORYN_UI_THEME', 'default'),

    /*
    |--------------------------------------------------------------------------
    | Default Layout
    |--------------------------------------------------------------------------
    | Options: collapsible-side | stacked-side | top-bar | frameless-side
    |          content-overlay | blank
    */
    'layout' => env('ORYN_UI_LAYOUT', 'collapsible-side'),

    /*
    |--------------------------------------------------------------------------
    | Sidebar Collapsed by Default
    |--------------------------------------------------------------------------
    */
    'sidebar_collapsed' => env('ORYN_UI_SIDEBAR_COLLAPSED', false),

    /*
    |--------------------------------------------------------------------------
    | Default Control Size
    |--------------------------------------------------------------------------
    | Options: sm | md | lg
    */
    'control_size' => 'md',

    /*
    |--------------------------------------------------------------------------
    | RTL Mode
    |--------------------------------------------------------------------------
    */
    'direction' => env('ORYN_UI_DIRECTION', 'ltr'),
];
```

---

## Component Reference

### Complete Component List

<details>
<summary><strong>Tier 1 — Pure HTML/CSS (22 components)</strong></summary>

| Component | Tag |
|-----------|-----|
| Alert | `<x-oryn-alert>` |
| Avatar | `<x-oryn-avatar>` |
| Avatar Group | `<x-oryn-avatar-group>` |
| Badge | `<x-oryn-badge>` |
| Button | `<x-oryn-button>` |
| Card | `<x-oryn-card>` |
| Close Button | `<x-oryn-close-button>` |
| Input | `<x-oryn-input>` |
| Input Group | `<x-oryn-input-group>` |
| Tag | `<x-oryn-tag>` |
| Status Icon | `<x-oryn-status-icon>` |
| Notification | `<x-oryn-notification>` |
| Skeleton | `<x-oryn-skeleton>` |
| Spinner | `<x-oryn-spinner>` |
| Progress | `<x-oryn-progress>` |
| Progress Circle | `<x-oryn-progress-circle>` |
| Timeline | `<x-oryn-timeline>` |
| Timeline Item | `<x-oryn-timeline-item>` |
| Steps | `<x-oryn-steps>` |
| Step Item | `<x-oryn-step-item>` |
| Form Group | `<x-oryn-form-group>` |
| Form Item | `<x-oryn-form-item>` |

</details>

<details>
<summary><strong>Tier 2 — Blade + Alpine.js (25 components)</strong></summary>

| Component | Tag |
|-----------|-----|
| Checkbox | `<x-oryn-checkbox>` |
| Checkbox Group | `<x-oryn-checkbox-group>` |
| Radio | `<x-oryn-radio>` |
| Radio Group | `<x-oryn-radio-group>` |
| Switcher | `<x-oryn-switcher>` |
| Segment | `<x-oryn-segment>` |
| Segment Item | `<x-oryn-segment-item>` |
| Tooltip | `<x-oryn-tooltip>` |
| Dialog | `<x-oryn-dialog>` |
| Drawer | `<x-oryn-drawer>` |
| Dropdown | `<x-oryn-dropdown>` |
| Dropdown Item | `<x-oryn-dropdown-item>` |
| Dropdown Sub | `<x-oryn-dropdown-sub>` |
| Toast | `<x-oryn-toast>` |
| Tabs | `<x-oryn-tabs>` |
| Tab List | `<x-oryn-tab-list>` |
| Tab Nav | `<x-oryn-tab-nav>` |
| Tab Content | `<x-oryn-tab-content>` |
| Menu | `<x-oryn-menu>` |
| Menu Item | `<x-oryn-menu-item>` |
| Menu Collapse | `<x-oryn-menu-collapse>` |
| Menu Group | `<x-oryn-menu-group>` |
| Pagination | `<x-oryn-pagination>` |
| Upload | `<x-oryn-upload>` |
| Carousel | `<x-oryn-carousel>` |

</details>

<details>
<summary><strong>Tier 3 — Alpine.js Plugins (10 components)</strong></summary>

| Component | Tag |
|-----------|-----|
| Select | `<x-oryn-select>` |
| AutoComplete | `<x-oryn-auto-complete>` |
| Date Picker | `<x-oryn-date-picker>` |
| Date Picker Range | `<x-oryn-date-picker-range>` |
| Date Time Picker | `<x-oryn-date-time-picker>` |
| Time Input | `<x-oryn-time-input>` |
| Slider | `<x-oryn-slider>` |
| Range Slider | `<x-oryn-range-slider>` |
| OTP Input | `<x-oryn-otp-input>` |
| Data Table | `<x-oryn-data-table>` |

</details>

<details>
<summary><strong>Tier 4 — Third-party Integrations (6 components)</strong></summary>

| Component | Tag | Library |
|-----------|-----|---------|
| Chart | `<x-oryn-chart>` | ApexCharts |
| Calendar View | `<x-oryn-calendar-view>` | FullCalendar |
| Rich Text Editor | `<x-oryn-rich-text-editor>` | TipTap |
| Gantt Chart | `<x-oryn-gantt-chart>` | gantt-task |
| Syntax Highlighter | `<x-oryn-syntax-highlighter>` | Prism.js |
| Region Map | `<x-oryn-region-map>` | Leaflet.js |

</details>

---

## Artisan Commands

```bash
# Install Oryn UI (publish config, CSS, JS)
php artisan oryn-ui:install

# Publish only config
php artisan vendor:publish --tag=oryn-ui-config

# Publish Blade views (for customization)
php artisan vendor:publish --tag=oryn-ui-views

# Publish CSS/JS assets
php artisan vendor:publish --tag=oryn-ui-assets
```

---

## Comparison with Flowbite Laravel

| Feature | Flowbite | **Oryn UI** |
|---------|---------|-------------|
| Base Components | ~50 | **128+** |
| Admin Dashboards | 1-2 | **4** (Ecommerce, Analytics, Marketing, Project) |
| Auth Page Variants | 2-3 | **15** (5 flows × 3 layouts) |
| CRUD Templates | Basic | **Full** (Customer, Product, Order) |
| App Pages | ❌ | **✅** (Chat, Mail, Calendar, File Manager, Kanban) |
| Layout Systems | 1-2 | **6** |
| Theme Presets | 1 | **5** |
| RTL Support | ❌ | **✅** |
| Dark Mode | ✅ | **✅** |
| Alpine.js | ✅ | **✅** |
| Livewire Support | ✅ | Roadmap Phase 2 |
| Chart Integration | Basic | **ApexCharts** |
| Calendar | ❌ | **✅ FullCalendar** |
| Rich Text Editor | ❌ | **✅ TipTap** |
| Gantt Chart | ❌ | **✅** |

---

## Development

### Local Setup

```bash
git clone https://github.com/ptnghia/oryn-ui.git
cd oryn-ui
composer install
npm install
npm run dev
```

### Running Tests

```bash
composer test

# With coverage report
composer test -- --coverage
```

### Source Reference

All components are converted from the **Ecme NextJS Tailwind Admin Template** (`Ecme - NextJs Tailwind Admin Template/demo/`). Do NOT modify files in this directory — it is the visual and structural reference only.

---

## Roadmap

- **v1.0** — All 128 Blade components + 46 page blocks
- **v1.5** — Documentation site with interactive playground
- **v2.0** — Livewire component support
- **v3.0** — Vue.js + Inertia.js components

See [CONVERSION-PLAN.md](./CONVERSION-PLAN.md) for the detailed component implementation plan.

---

## Contributing

Please read [CONTRIBUTING.md](./.github/CONTRIBUTING.md) before submitting pull requests.

1. Fork the repository
2. Create your feature branch: `git checkout -b feature/component-name`
3. Follow the conversion guide in [.github/skills/blade-component/SKILL.md](.github/skills/blade-component/SKILL.md)
4. Write tests and ensure they pass
5. Submit a pull request

---

## License

Oryn UI is open-sourced software licensed under the [MIT license](./LICENSE).

---

<p align="center">
  Built with ❤️ for the Laravel community
</p>
