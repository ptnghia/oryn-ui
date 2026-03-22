---
applyTo: "**"
---

# Oryn UI — Laravel Tailwind UI Package

## Project Overview

Oryn UI is a comprehensive Laravel UI component package built with **Tailwind CSS 4** and **Alpine.js 3**. It provides 128+ Blade components, 6 layout systems, 46 pre-built page blocks, and 5 theme presets — converted from the Ecme NextJS Tailwind Admin Template.

**Target**: Laravel 11+ with Blade templating (Phase 1), Livewire (Phase 2), Vue.js/Inertia (Phase 3).

## Tech Stack

- **PHP**: >= 8.2
- **Laravel**: >= 11.0
- **Tailwind CSS**: >= 4.0 (with CSS custom properties theming)
- **Alpine.js**: >= 3.14
- **Vite**: Asset bundling
- **Pest/PHPUnit**: Testing

## Package Namespace & Conventions

- **Composer Package**: `oryn/ui`
- **PHP Namespace**: `Oryn\UI`
- **Blade Prefix**: `oryn-` (e.g., `<x-oryn-alert>`, `<x-oryn-button>`)
- **CSS Prefix**: `.oryn-` (e.g., `.oryn-alert`, `.oryn-button`)
- **Alpine Plugin Prefix**: `orynPlugin` (e.g., `orynPluginSelect`)
- **Config File**: `config/oryn-ui.php`

## Architecture

### Directory Structure

```
oryn-ui/
├── config/oryn-ui.php              # Package configuration
├── resources/
│   ├── css/                         # Tailwind CSS (variables + component styles)
│   │   ├── oryn-ui.css             # Main entry point
│   │   ├── base/                    # Variables, typography, reset
│   │   ├── components/              # Per-component CSS (34 files)
│   │   ├── template/                # Layout-specific CSS
│   │   └── vendors/                 # Third-party CSS overrides
│   ├── js/                          # Alpine.js plugins & utilities
│   │   ├── oryn-ui.js              # Main JS entry
│   │   ├── plugins/                 # Alpine.js plugins for complex components
│   │   └── utils/                   # Helper utilities
│   └── views/
│       └── components/
│           ├── ui/                   # Core UI components (56 Blade files)
│           ├── shared/               # Business/utility components (19 Blade files)
│           ├── template/             # Layout & navigation components (19 Blade files)
│           └── blocks/               # Pre-built page blocks (46 Blade files)
├── src/
│   ├── OrynUIServiceProvider.php    # Service provider
│   ├── Commands/                     # Artisan commands
│   ├── Components/                   # PHP component classes
│   │   ├── UI/                      # Maps to views/components/ui/
│   │   ├── Shared/                  # Maps to views/components/shared/
│   │   └── Template/                # Maps to views/components/template/
│   └── Traits/                      # Shared component traits
├── tests/                           # Feature & unit tests
├── docs/
│   ├── ai/                          # AI memory & logs (DO NOT delete)
│   │   ├── activity-log.md          # Chronological work log
│   │   ├── error-log.md             # Error patterns & solutions
│   │   ├── decisions.md             # Architecture decisions
│   │   ├── files-registry.md        # All files with status
│   │   └── session-notes.md         # Current state & next steps
│   └── plan/                        # Detailed phase checklists
│       ├── phase-0-scaffolding.md
│       ├── phase-1-core-ui.md
│       ├── phase-2-interactive.md
│       ├── phase-3-complex.md
│       ├── phase-4-templates.md
│       ├── phase-5-thirdparty.md
│       ├── phase-6-blocks.md
│       └── documentation-site.md
└── stubs/                           # File generation stubs
```

### Component Tiers

Components are categorized by complexity level:

| Tier | Type | Count | Tech |
|------|------|-------|------|
| 1 | Pure HTML/CSS | 22 | Blade only |
| 2 | Interactive | 25 | Blade + Alpine.js |
| 3 | Complex plugins | 10 | Blade + Alpine.js plugins |
| 4 | Third-party | 6 | Blade + JS libraries |

### Theming System

All colors use CSS custom properties defined in `:root`:
```css
--primary, --primary-deep, --primary-mild, --primary-subtle
--error, --error-subtle, --success, --success-subtle
--info, --info-subtle, --warning, --warning-subtle
--gray-50 through --gray-950
--neutral
```

5 theme presets: Default (blue), Dark, Green, Purple, Orange.
Light/Dark mode via `.dark` CSS class on `<html>`.

## Coding Standards

### Blade Components

1. **Always use `$attributes->merge()`** for class and attribute forwarding:
   ```php
   <div {{ $attributes->merge(['class' => 'oryn-alert oryn-alert-' . $variant]) }}>
       {{ $slot }}
   </div>
   ```

2. **Use `@props` for typed component properties**:
   ```php
   @props([
       'variant' => 'default',  // default|success|warning|error|info
       'size' => 'md',          // sm|md|lg
       'closable' => false,
   ])
   ```

3. **Named slots for complex layouts**:
   ```php
   <x-oryn-card>
       <x-slot:header>Card Title</x-slot:header>
       Card content here
       <x-slot:footer>Footer actions</x-slot:footer>
   </x-oryn-card>
   ```

4. **Component class for complex logic** (in `src/Components/`):
   ```php
   namespace Oryn\UI\Components\UI;

   use Illuminate\View\Component;

   class Alert extends Component
   {
       public function __construct(
           public string $variant = 'default',
           public string $size = 'md',
           public bool $closable = false,
       ) {}

       public function variantClasses(): string
       {
           return match($this->variant) {
               'success' => 'oryn-alert-success',
               'warning' => 'oryn-alert-warning',
               'error' => 'oryn-alert-error',
               'info' => 'oryn-alert-info',
               default => 'oryn-alert-default',
           };
       }

       public function render()
       {
           return view('oryn-ui::components.ui.alert');
       }
   }
   ```

### Alpine.js Integration

1. **Use `x-data` for component state**:
   ```html
   <div x-data="orynDropdown()" {{ $attributes }}>
       <button @click="toggle()" x-ref="trigger">{{ $trigger }}</button>
       <div x-show="open" x-transition @click.outside="close()" x-ref="panel">
           {{ $slot }}
       </div>
   </div>
   ```

2. **Register Alpine plugins in `oryn-ui.js`**:
   ```js
   import Alpine from 'alpinejs'
   import { orynPluginDropdown } from './plugins/dropdown'
   import { orynPluginDialog } from './plugins/dialog'

   Alpine.data('orynDropdown', orynPluginDropdown)
   Alpine.data('orynDialog', orynPluginDialog)
   ```

3. **Alpine.js data functions should be pure and testable**:
   ```js
   export function orynPluginDropdown() {
       return {
           open: false,
           toggle() { this.open = !this.open },
           close() { this.open = false },
           open() { this.open = true },
       }
   }
   ```

4. **Prefer `x-transition` over custom JS animations**

5. **Use `$dispatch` for component communication**:
   ```html
   <button @click="$dispatch('tab-change', { id: 'tab1' })">Tab 1</button>
   ```

### CSS Conventions

1. **Component CSS uses `@layer components`**:
   ```css
   @layer components {
       .oryn-alert {
           @apply relative flex items-center rounded-lg p-4;
       }
       .oryn-alert-success {
           @apply bg-success-subtle text-success;
       }
   }
   ```

2. **Never use `!important`** — use proper specificity

3. **All component colors must use CSS variables** for theme compatibility

4. **Responsive classes follow Tailwind breakpoints**: `xs:`, `sm:`, `md:`, `lg:`, `xl:`, `2xl:`

5. **Dark mode uses class strategy**: `.dark .oryn-component`

### PHP Standards

1. **Follow PSR-12** coding style
2. **Use PHP 8.2+ features**: constructor promotion, enums, named arguments, readonly
3. **Type everything**: parameters, return types, properties
4. **Use Laravel conventions**: service providers, facades, config publishing

### Testing

1. **Every component must have a render test**:
   ```php
   test('alert renders with default variant', function () {
       $view = $this->blade('<x-oryn-alert>Test</x-oryn-alert>');
       $view->assertSee('Test');
       $view->assertSee('oryn-alert');
   });
   ```

2. **Test all variants and sizes**
3. **Test slot rendering** (default + named slots)
4. **Test attribute forwarding**

## Source Reference

The original Ecme NextJS template is in `Ecme - NextJs Tailwind Admin Template/demo/`. Use it as the visual and structural reference:

- **React components**: `src/components/ui/` → convert to `resources/views/components/ui/`
- **CSS files**: `src/assets/styles/components/` → copy to `resources/css/components/`
- **Theme config**: `src/configs/theme.config.ts` and `src/configs/preset-theme-schema.config.ts`
- **Layout constants**: `src/constants/theme.constant.ts`
- **Page templates**: `src/app/(protected-pages)/` → convert to `resources/views/components/blocks/`

## Conversion Workflow

When converting a React component to Blade:

1. **Read the React source** in `Ecme - NextJs Tailwind Admin Template/demo/src/components/`
2. **Read the corresponding CSS** in `Ecme - NextJs Tailwind Admin Template/demo/src/assets/styles/components/`
3. **Identify props** → convert to `@props` or PHP constructor parameters
4. **Identify state** → convert to Alpine.js `x-data`
5. **Identify event handlers** → convert to Alpine.js directives (`@click`, `@input`, etc.)
6. **Identify children/slots** → convert to `{{ $slot }}` and named `<x-slot:name>`
7. **Preserve all Tailwind classes** (they work identically)
8. **Preserve CSS file** (copy with `.oryn-` prefix adjustments)
9. **Write tests** for the new Blade component
10. **Write documentation** with usage examples

## File Naming

| Type | Convention | Example |
|------|-----------|---------|
| Blade view | `kebab-case.blade.php` | `date-picker.blade.php` |
| PHP component class | `PascalCase.php` | `DatePicker.php` |
| CSS file | `kebab-case.css` | `date-picker.css` |
| JS plugin | `kebab-case.js` | `date-picker.js` |
| Test file | `PascalCaseTest.php` | `DatePickerTest.php` |

## Important Notes

- **Do NOT modify** files in `Ecme - NextJs Tailwind Admin Template/` — it's the reference source
- **All new code** goes in the package root (`oryn-ui/` structure)
- **Preserve visual fidelity** — the Blade output must match the React render
- **RTL support** must be maintained (use `ltr:` and `rtl:` Tailwind variants)
- **Dark mode** must work via `.dark` class on `<html>` element
- **Accessibility**: maintain `aria-*` attributes, keyboard navigation, focus states

## AI Development Workflow

### Logging Rules

After completing any significant work session:

1. **Update `docs/ai/activity-log.md`** — append a dated entry with tasks completed
2. **Update `docs/ai/session-notes.md`** — overwrite current state, what was done, next steps
3. **Update `docs/ai/files-registry.md`** — add any new files created with status
4. **Update `docs/ai/error-log.md`** — log any errors encountered and solutions found
5. **Update `docs/ai/decisions.md`** — log new architecture or technical decisions

### Planning Checklists

Before starting work on a phase, read the corresponding file in `docs/plan/`:
- `docs/plan/phase-0-scaffolding.md` — Package structure, CSS, JS setup
- `docs/plan/phase-1-core-ui.md` — 22 Tier 1 pure Blade components
- `docs/plan/phase-2-interactive.md` — 25 Tier 2 Alpine.js components
- `docs/plan/phase-3-complex.md` — 10 Tier 3 complex plugin components
- `docs/plan/phase-4-templates.md` — 19 layout & template components
- `docs/plan/phase-5-thirdparty.md` — 6 third-party integration components
- `docs/plan/phase-6-blocks.md` — 46 pre-built page blocks
- `docs/plan/documentation-site.md` — Documentation site build

Mark checklist items as done (`[x]`) when completed. This ensures continuity across sessions.
