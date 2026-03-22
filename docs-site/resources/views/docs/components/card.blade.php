<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Card">

<x-docs.page-header
    title="Card"
    description="Flexible content containers with optional header, body, and footer sections."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/card.blade.php"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview>
        <x-slot:rawCode>@verbatim<x-oryn-card>
    A simple card with default body.
</x-oryn-card>@endverbatim</x-slot:rawCode>
        <x-oryn-card>A simple card with default body.</x-oryn-card>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">With Header & Footer</h2>
    <x-docs.code-preview title="Named slots">
        <x-slot:rawCode>@verbatim<x-oryn-card>
    <x-slot:header>Card Header</x-slot:header>
    Card content goes here.
    <x-slot:footer>
        <x-oryn-button size="sm" variant="solid">Save</x-oryn-button>
        <x-oryn-button size="sm" variant="plain">Cancel</x-oryn-button>
    </x-slot:footer>
</x-oryn-card>@endverbatim</x-slot:rawCode>
        <x-oryn-card>
            <x-slot:header>Card Header</x-slot:header>
            <p class="text-gray-600 dark:text-gray-400">Card content goes here. You can put any HTML inside.</p>
            <x-slot:footer>
                <x-oryn-button size="sm" variant="solid">Save</x-oryn-button>
                <x-oryn-button size="sm" variant="plain">Cancel</x-oryn-button>
            </x-slot:footer>
        </x-oryn-card>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Borderless</h2>
    <x-docs.code-preview title="bordered=false">
        <x-slot:rawCode>@verbatim<x-oryn-card :bordered="false" class="bg-gray-50 dark:bg-gray-900">
    No border, custom background.
</x-oryn-card>@endverbatim</x-slot:rawCode>
        <x-oryn-card :bordered="false" class="bg-gray-50 dark:bg-gray-900">
            No border, custom background.
        </x-oryn-card>
    </x-docs.code-preview>
</div>

<x-docs.props-table :props="[
    ['name' => 'bordered', 'type' => 'bool', 'default' => 'true', 'description' => 'Show/hide outer border'],
    ['name' => 'shadow', 'type' => 'bool', 'default' => 'false', 'description' => 'Apply drop shadow'],
    ['name' => 'clickable', 'type' => 'bool', 'default' => 'false', 'description' => 'Add hover/cursor effects for clickable cards'],
]" />

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Slots</h2>
    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
        <table class="w-full oryn-docs-table">
            <thead class="bg-gray-50 dark:bg-gray-900/50"><tr><th>Slot</th><th>Description</th></tr></thead>
            <tbody>
                <tr><td><code>default</code></td><td class="text-gray-600 dark:text-gray-400">Card main content (body)</td></tr>
                <tr><td><code>header</code></td><td class="text-gray-600 dark:text-gray-400">Card header — displayed above the body with a border-bottom</td></tr>
                <tr><td><code>footer</code></td><td class="text-gray-600 dark:text-gray-400">Card footer — displayed below the body with a border-top</td></tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'button') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Button
    </a>
    <a href="{{ route('docs.component', 'close-button') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Close Button
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
