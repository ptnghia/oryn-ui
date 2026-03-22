<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Badge">

<x-docs.page-header
    title="Badge"
    description="Small status indicators and labels for categorization or count display."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/badge.blade.php"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview code='<x-oryn-badge>Default</x-oryn-badge>'>
        <x-oryn-badge>Default</x-oryn-badge>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Variants</h2>
    <x-docs.code-preview title="All variants" code='<x-oryn-badge variant="primary">Primary</x-oryn-badge>
<x-oryn-badge variant="success">Success</x-oryn-badge>
<x-oryn-badge variant="warning">Warning</x-oryn-badge>
<x-oryn-badge variant="error">Error</x-oryn-badge>
<x-oryn-badge variant="info">Info</x-oryn-badge>'>
        <div class="flex flex-wrap gap-2">
            <x-oryn-badge variant="primary">Primary</x-oryn-badge>
            <x-oryn-badge variant="success">Success</x-oryn-badge>
            <x-oryn-badge variant="warning">Warning</x-oryn-badge>
            <x-oryn-badge variant="error">Error</x-oryn-badge>
            <x-oryn-badge variant="info">Info</x-oryn-badge>
        </div>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Sizes</h2>
    <x-docs.code-preview title="size prop" code='<x-oryn-badge size="sm">Small</x-oryn-badge>
<x-oryn-badge size="md">Medium</x-oryn-badge>
<x-oryn-badge size="lg">Large</x-oryn-badge>'>
        <div class="flex flex-wrap items-center gap-2">
            <x-oryn-badge size="sm">Small</x-oryn-badge>
            <x-oryn-badge size="md">Medium</x-oryn-badge>
            <x-oryn-badge size="lg">Large</x-oryn-badge>
        </div>
    </x-docs.code-preview>
</div>

<x-docs.props-table :props="[
    ['name' => 'variant', 'type' => 'string', 'default' => 'default', 'description' => 'Color variant. Options: default | primary | success | warning | error | info'],
    ['name' => 'size', 'type' => 'string', 'default' => 'md', 'description' => 'Badge size. Options: sm | md | lg'],
    ['name' => 'dot', 'type' => 'bool', 'default' => 'false', 'description' => 'Show as circular dot without text'],
]" />

<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'avatar') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Avatar
    </a>
    <a href="{{ route('docs.component', 'button') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Button
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
