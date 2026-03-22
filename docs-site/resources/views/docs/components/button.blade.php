<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Button">

<x-docs.page-header
    title="Button"
    description="Trigger actions or navigation with style. Supports multiple variants, sizes, colors, states, and rendering as any HTML element."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/button.blade.php"
/>

{{-- Basic usage --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview code='<x-oryn-button>Click me</x-oryn-button>'>
        <x-oryn-button>Click me</x-oryn-button>
    </x-docs.code-preview>
</div>

{{-- Variants --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Variants</h2>
    <x-docs.code-preview title="variant prop" code='<x-oryn-button variant="solid">Solid</x-oryn-button>
<x-oryn-button variant="twoTone">Two Tone</x-oryn-button>
<x-oryn-button variant="outline">Outline</x-oryn-button>
<x-oryn-button variant="plain">Plain</x-oryn-button>'>
        <div class="flex flex-wrap gap-3">
            <x-oryn-button variant="solid">Solid</x-oryn-button>
            <x-oryn-button variant="twoTone">Two Tone</x-oryn-button>
            <x-oryn-button variant="outline">Outline</x-oryn-button>
            <x-oryn-button variant="plain">Plain</x-oryn-button>
        </div>
    </x-docs.code-preview>
</div>

{{-- Colors --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Colors</h2>
    <x-docs.code-preview title="color prop" code='<x-oryn-button color="primary">Primary</x-oryn-button>
<x-oryn-button color="success">Success</x-oryn-button>
<x-oryn-button color="warning">Warning</x-oryn-button>
<x-oryn-button color="error">Error</x-oryn-button>
<x-oryn-button color="info">Info</x-oryn-button>'>
        <div class="flex flex-wrap gap-3">
            <x-oryn-button color="primary">Primary</x-oryn-button>
            <x-oryn-button color="success">Success</x-oryn-button>
            <x-oryn-button color="warning">Warning</x-oryn-button>
            <x-oryn-button color="error">Error</x-oryn-button>
            <x-oryn-button color="info">Info</x-oryn-button>
        </div>
    </x-docs.code-preview>
</div>

{{-- Sizes --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Sizes</h2>
    <x-docs.code-preview title="size prop" code='<x-oryn-button size="xs">Extra Small</x-oryn-button>
<x-oryn-button size="sm">Small</x-oryn-button>
<x-oryn-button size="md">Medium</x-oryn-button>
<x-oryn-button size="lg">Large</x-oryn-button>'>
        <div class="flex flex-wrap items-center gap-3">
            <x-oryn-button size="xs">Extra Small</x-oryn-button>
            <x-oryn-button size="sm">Small</x-oryn-button>
            <x-oryn-button size="md">Medium</x-oryn-button>
            <x-oryn-button size="lg">Large</x-oryn-button>
        </div>
    </x-docs.code-preview>
</div>

{{-- Loading & Disabled --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">States</h2>
    <x-docs.code-preview title="loading & disabled" code='<x-oryn-button :loading="true">Loading...</x-oryn-button>
<x-oryn-button :disabled="true">Disabled</x-oryn-button>'>
        <div class="flex flex-wrap gap-3">
            <x-oryn-button :loading="true">Loading...</x-oryn-button>
            <x-oryn-button :disabled="true">Disabled</x-oryn-button>
        </div>
    </x-docs.code-preview>
</div>

{{-- As link --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">As link</h2>
    <x-docs.code-preview title="tag=a" code='<x-oryn-button tag="a" href="https://github.com/ptnghia/oryn-ui" target="_blank">
    View on GitHub
</x-oryn-button>'>
        <x-oryn-button tag="a" href="https://github.com/ptnghia/oryn-ui" target="_blank">
            View on GitHub
        </x-oryn-button>
    </x-docs.code-preview>
</div>

{{-- Icon buttons --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Icon Button</h2>
    <x-docs.code-preview title="icon prop" code='<x-oryn-button icon>
    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
    </svg>
</x-oryn-button>'>
        <div class="flex gap-3">
            <x-oryn-button :icon="true" variant="solid">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
            </x-oryn-button>
            <x-oryn-button :icon="true" variant="outline">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
            </x-oryn-button>
            <x-oryn-button :icon="true" variant="plain" color="error">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                </svg>
            </x-oryn-button>
        </div>
    </x-docs.code-preview>
</div>

{{-- Props --}}
<x-docs.props-table :props="[
    ['name' => 'variant', 'type' => 'string', 'default' => 'solid', 'description' => 'Button style. Options: solid | twoTone | outline | plain'],
    ['name' => 'color', 'type' => 'string', 'default' => 'primary', 'description' => 'Color scheme. Options: primary | success | warning | error | info'],
    ['name' => 'size', 'type' => 'string', 'default' => 'md', 'description' => 'Button size. Options: xs | sm | md | lg'],
    ['name' => 'tag', 'type' => 'string', 'default' => 'button', 'description' => 'HTML element to render as (e.g. a, button)'],
    ['name' => 'disabled', 'type' => 'bool', 'default' => 'false', 'description' => 'Disable the button'],
    ['name' => 'loading', 'type' => 'bool', 'default' => 'false', 'description' => 'Show loading spinner and disable interaction'],
    ['name' => 'icon', 'type' => 'bool', 'default' => 'false', 'description' => 'Icon-only button (square aspect ratio)'],
    ['name' => 'block', 'type' => 'bool', 'default' => 'false', 'description' => 'Full-width block button'],
]" />

{{-- Prev/Next --}}
<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'badge') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Badge
    </a>
    <a href="{{ route('docs.component', 'card') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Card
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
