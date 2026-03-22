<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Dialog">

<x-docs.page-header
    title="Dialog"
    description="Modal dialogs for confirmations, forms, and focused content. Alpine.js powered."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/dialog.blade.php"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview>
        <x-slot:rawCode>@verbatim<x-oryn-dialog>
    <x-slot:trigger>
        <x-oryn-button>Open Dialog</x-oryn-button>
    </x-slot:trigger>
    <x-slot:title>Dialog Title</x-slot:title>
    Dialog content here.
    <x-slot:footer>
        <x-oryn-button size="sm" variant="solid">Confirm</x-oryn-button>
    </x-slot:footer>
</x-oryn-dialog>@endverbatim</x-slot:rawCode>
        <x-oryn-dialog>
            <x-slot:trigger>
                <x-oryn-button>Open Dialog</x-oryn-button>
            </x-slot:trigger>
            <x-slot:title>Dialog Title</x-slot:title>
            <p class="text-gray-600 dark:text-gray-400">Dialog content goes here. This is a basic example.</p>
            <x-slot:footer>
                <x-oryn-button size="sm" variant="solid">Confirm</x-oryn-button>
                <x-oryn-button size="sm" variant="plain" @click="$dispatch('dialog-close')">Cancel</x-oryn-button>
            </x-slot:footer>
        </x-oryn-dialog>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Sizes</h2>
    <x-docs.code-preview title="size prop">
        <x-slot:rawCode>@verbatim<x-oryn-dialog size="sm">...</x-oryn-dialog>
<x-oryn-dialog size="md">...</x-oryn-dialog>   <!-- default -->
<x-oryn-dialog size="lg">...</x-oryn-dialog>
<x-oryn-dialog size="xl">...</x-oryn-dialog>@endverbatim</x-slot:rawCode>
        <div class="flex flex-wrap gap-3">
            @foreach(['sm' => 'Small', 'md' => 'Medium', 'lg' => 'Large'] as $s => $label)
            <x-oryn-dialog size="{{ $s }}">
                <x-slot:trigger>
                    <x-oryn-button variant="outline" size="sm">{{ $label }}</x-oryn-button>
                </x-slot:trigger>
                <x-slot:title>{{ $label }} Dialog</x-slot:title>
                This dialog is size="{{ $s }}".
                <x-slot:footer>
                    <x-oryn-button size="sm" variant="plain" @click="$dispatch('dialog-close')">Close</x-oryn-button>
                </x-slot:footer>
            </x-oryn-dialog>
            @endforeach
        </div>
    </x-docs.code-preview>
</div>

<x-docs.props-table :props="[
    ['name' => 'size', 'type' => 'string', 'default' => 'md', 'description' => 'Dialog width. Options: sm | md | lg | xl | full'],
    ['name' => 'closable', 'type' => 'bool', 'default' => 'true', 'description' => 'Show close × button in corner'],
    ['name' => 'closeOnBackdrop', 'type' => 'bool', 'default' => 'true', 'description' => 'Close when backdrop is clicked'],
]" />

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Slots</h2>
    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
        <table class="w-full oryn-docs-table">
            <thead class="bg-gray-50 dark:bg-gray-900/50"><tr><th>Slot</th><th>Description</th></tr></thead>
            <tbody>
                <tr><td><code>trigger</code></td><td class="text-gray-600 dark:text-gray-400">Element that opens the dialog on click</td></tr>
                <tr><td><code>title</code></td><td class="text-gray-600 dark:text-gray-400">Dialog header title text</td></tr>
                <tr><td><code>default</code></td><td class="text-gray-600 dark:text-gray-400">Dialog body content</td></tr>
                <tr><td><code>footer</code></td><td class="text-gray-600 dark:text-gray-400">Dialog footer — typically action buttons</td></tr>
            </tbody>
        </table>
    </div>
</div>

<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'close-button') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Close Button
    </a>
    <a href="{{ route('docs.component', 'drawer') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Drawer
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
