# Blade Component Conversion Skill

## Purpose
Convert React components from the Ecme NextJS Tailwind Admin Template into Laravel Blade + Alpine.js components for the Oryn UI package.

## Step-by-Step Process

### 1. Analyze the React Source

Read the React component file carefully:

```
Ecme - NextJs Tailwind Admin Template/demo/src/components/ui/{ComponentName}/
├── {ComponentName}.tsx    ← Main component logic
├── index.tsx              ← Exports
└── (sub-components)       ← Related components
```

Extract:
- **Props interface** → Will become `@props` or PHP constructor parameters
- **State (useState)** → Will become Alpine.js `x-data` properties
- **Effects (useEffect)** → Will become `x-init` or `x-effect`
- **Event handlers** → Will become Alpine.js directives
- **Conditional rendering** → Will become `@if/@else` Blade directives
- **List rendering** → Will become `@foreach` Blade directive
- **Children** → Will become `{{ $slot }}`
- **Named slots** → Will become `<x-slot:name>`

### 2. Analyze the CSS Source

Read the corresponding CSS:

```
Ecme - NextJs Tailwind Admin Template/demo/src/assets/styles/components/{component-name}.css
```

- Copy CSS as-is (Tailwind utility classes work identically)
- Ensure `@layer components` wrapping
- Verify CSS variable usage (`var(--primary)`, etc.)
- Check dark mode selectors (`.dark .component`)

### 3. Determine Component Tier

| Tier | Criteria | Tech |
|------|----------|------|
| 1 | No useState, no events, display-only | Blade only |
| 2 | Simple state (open/close, toggle) | Blade + inline Alpine.js |
| 3 | Complex state (multi-step, computed) | Blade + Alpine.js plugin |
| 4 | External library needed | Blade + JS library |

### 4. Create the Blade Component

#### For Tier 1 (Pure Display):

```php
{{-- resources/views/components/ui/badge.blade.php --}}
@props([
    'variant' => 'default',
    'innerClass' => '',
])

@php
$variantClasses = match($variant) {
    'solid' => 'oryn-badge-solid',
    'default' => 'oryn-badge-default',
};
@endphp

<span {{ $attributes->merge(['class' => "oryn-badge {$variantClasses} {$innerClass}"]) }}>
    {{ $slot }}
</span>
```

#### For Tier 2 (Alpine.js Inline):

```php
{{-- resources/views/components/ui/dropdown.blade.php --}}
@props([
    'placement' => 'bottom-start',
])

<div
    x-data="{ open: false }"
    {{ $attributes->merge(['class' => 'oryn-dropdown relative inline-block']) }}
>
    <div @click="open = !open" x-ref="trigger">
        {{ $trigger }}
    </div>
    <div
        x-show="open"
        x-transition
        @click.outside="open = false"
        @keydown.escape.window="open = false"
        class="oryn-dropdown-menu"
        x-cloak
    >
        {{ $slot }}
    </div>
</div>
```

#### For Tier 3 (Alpine.js Plugin):

```php
{{-- resources/views/components/ui/select.blade.php --}}
@props([
    'options' => [],
    'placeholder' => 'Select...',
    'searchable' => false,
    'multiple' => false,
    'name' => '',
    'value' => null,
])

<div
    x-data="orynSelect({
        options: @js($options),
        searchable: @js($searchable),
        multiple: @js($multiple),
        value: @js($value),
    })"
    {{ $attributes->merge(['class' => 'oryn-select relative']) }}
>
    {{-- Component HTML --}}
    <input type="hidden" name="{{ $name }}" :value="JSON.stringify(selected)">
</div>
```

### 5. Create PHP Component Class (When Needed)

Only create a PHP class when the component needs:
- Complex prop computation
- Database queries or service injection
- PHP-side validation
- Conditional view rendering

```php
<?php

namespace Oryn\UI\Components\UI;

use Illuminate\View\Component;

class Alert extends Component
{
    public function __construct(
        public string $variant = 'default',
        public string $size = 'md',
        public bool $closable = false,
        public bool $showIcon = false,
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

### 6. Create Alpine.js Plugin (Tier 3)

```js
// resources/js/plugins/select.js
export function orynPluginSelect(config = {}) {
    return {
        open: false,
        search: '',
        selected: config.value || (config.multiple ? [] : null),
        options: config.options || [],
        searchable: config.searchable || false,
        multiple: config.multiple || false,

        get filteredOptions() {
            if (!this.search) return this.options;
            return this.options.filter(opt =>
                opt.label.toLowerCase().includes(this.search.toLowerCase())
            );
        },

        toggle() { this.open = !this.open; },
        close() { this.open = false; this.search = ''; },

        select(option) {
            if (this.multiple) {
                const idx = this.selected.findIndex(s => s.value === option.value);
                if (idx >= 0) this.selected.splice(idx, 1);
                else this.selected.push(option);
            } else {
                this.selected = option;
                this.close();
            }
            this.$dispatch('change', { value: this.selected });
        },

        isSelected(option) {
            if (this.multiple) {
                return this.selected.some(s => s.value === option.value);
            }
            return this.selected?.value === option.value;
        },
    };
}
```

### 7. Write Tests

```php
<?php
// tests/Feature/Components/UI/AlertTest.php

use function Pest\Laravel\blade;

test('alert renders with default variant', function () {
    $view = $this->blade('<x-oryn-alert>Test message</x-oryn-alert>');
    $view->assertSee('Test message');
    $view->assertSee('oryn-alert');
});

test('alert renders with success variant', function () {
    $view = $this->blade('<x-oryn-alert variant="success">Success!</x-oryn-alert>');
    $view->assertSee('oryn-alert-success');
});

test('alert forwards custom attributes', function () {
    $view = $this->blade('<x-oryn-alert id="my-alert" data-custom="value">Test</x-oryn-alert>');
    $view->assertSee('id="my-alert"');
    $view->assertSee('data-custom="value"');
});

test('alert renders closable button when closable', function () {
    $view = $this->blade('<x-oryn-alert :closable="true">Closable</x-oryn-alert>');
    $view->assertSee('oryn-close-button');
});
```

### 8. Common React → Blade Patterns

| React | Blade |
|-------|-------|
| `{children}` | `{{ $slot }}` |
| `<Component title="...">` | `<x-oryn-component title="...">` |
| `{items.map(i => <Item key={i.id} />)}` | `@foreach($items as $item) <x-item :item="$item"/> @endforeach` |
| `className={cn('base', variant && 'active')}` | `class="base {{ $variant ? 'active' : '' }}"` |
| `style={{ color: 'red' }}` | `style="color: red"` |
| `ref={divRef}` | `x-ref="div"` |
| `onClick={() => setOpen(!open)}` | `@click="open = !open"` |
| `onChange={(e) => setValue(e.target.value)}` | `x-model="value"` |
| `{isOpen && <Dropdown/>}` | `<div x-show="open" x-cloak>` |
| `<Transition>` | `x-transition` |
| `useEffect(() => {...}, [dep])` | `x-effect="..."` or `x-init="$watch('dep', () => ...)"` |

### 9. Checklist Before Marking Complete

- [ ] Blade view file created
- [ ] PHP component class created (if needed)
- [ ] CSS file migrated
- [ ] Alpine.js plugin created (if needed)
- [ ] All props/variants implemented
- [ ] Dark mode works
- [ ] RTL support maintained
- [ ] Accessibility attributes preserved (aria-*, role, tabindex)
- [ ] Keyboard navigation works (if interactive)
- [ ] Tests written and passing
- [ ] Visual fidelity matches React render
