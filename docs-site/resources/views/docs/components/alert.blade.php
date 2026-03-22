<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Alert">

<x-docs.page-header
    title="Alert"
    description="Display contextual feedback messages for user actions or system states."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/alert.blade.php"
/>

{{-- Import --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview code='<x-oryn-alert>Default alert message</x-oryn-alert>'>
        <x-oryn-alert>Default alert message</x-oryn-alert>
    </x-docs.code-preview>
</div>

{{-- Variants --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Variants</h2>
    <x-docs.code-preview title="All variants">
        <x-slot:rawCode>@verbatim<x-oryn-alert variant="default">Default alert</x-oryn-alert>
<x-oryn-alert variant="success">Operation successful!</x-oryn-alert>
<x-oryn-alert variant="warning">Warning: Please review.</x-oryn-alert>
<x-oryn-alert variant="error">Something went wrong.</x-oryn-alert>
<x-oryn-alert variant="info">Here is some information.</x-oryn-alert>@endverbatim</x-slot:rawCode>
        <div class="space-y-3">
            <x-oryn-alert variant="default">Default alert</x-oryn-alert>
            <x-oryn-alert variant="success">Operation successful!</x-oryn-alert>
            <x-oryn-alert variant="warning">Warning: Please review before continuing.</x-oryn-alert>
            <x-oryn-alert variant="error">Something went wrong. Please try again.</x-oryn-alert>
            <x-oryn-alert variant="info">Here is some useful information for you.</x-oryn-alert>
        </div>
    </x-docs.code-preview>
</div>

{{-- With title --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">With title</h2>
    <x-docs.code-preview title="Alert with title">
        <x-slot:rawCode>@verbatim<x-oryn-alert variant="success" title="Payment successful">
    Your transaction has been processed and a receipt sent to your email.
</x-oryn-alert>@endverbatim</x-slot:rawCode>
        <x-oryn-alert variant="success" title="Payment successful">
            Your transaction has been processed and a receipt sent to your email.
        </x-oryn-alert>
    </x-docs.code-preview>
</div>

{{-- Closable --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Closable</h2>
    <x-docs.code-preview title="Closable alert">
        <x-slot:rawCode>@verbatim<x-oryn-alert variant="info" closable>
    Click the × button to dismiss this alert.
</x-oryn-alert>@endverbatim</x-slot:rawCode>
        <x-oryn-alert variant="info" :closable="true">
            Click the × button to dismiss this alert.
        </x-oryn-alert>
    </x-docs.code-preview>
</div>

{{-- With icon slot --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Custom icon</h2>
    <x-docs.code-preview title="Alert with custom icon slot">
        <x-slot:rawCode>@verbatim<x-oryn-alert variant="warning">
    <x-slot:icon>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
        </svg>
    </x-slot:icon>
    Custom icon alert!
</x-oryn-alert>@endverbatim</x-slot:rawCode>
        <x-oryn-alert variant="warning">
            <x-slot:icon>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
                </svg>
            </x-slot:icon>
            Custom icon alert with your own SVG!
        </x-oryn-alert>
    </x-docs.code-preview>
</div>

{{-- Props --}}
<x-docs.props-table :props="[
    ['name' => 'variant', 'type' => 'string', 'default' => 'default', 'description' => 'Color variant. Options: default | success | warning | error | info'],
    ['name' => 'title', 'type' => 'string', 'default' => 'null', 'description' => 'Optional bold title shown above the content'],
    ['name' => 'closable', 'type' => 'bool', 'default' => 'false', 'description' => 'Show a close (×) button to dismiss the alert'],
    ['name' => 'showIcon', 'type' => 'bool', 'default' => 'true', 'description' => 'Show/hide the leading icon'],
]" />

{{-- Slots --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Slots</h2>
    <div class="overflow-x-auto rounded-xl border border-gray-200 dark:border-gray-700">
        <table class="w-full oryn-docs-table">
            <thead class="bg-gray-50 dark:bg-gray-900/50"><tr><th>Slot</th><th>Description</th></tr></thead>
            <tbody>
                <tr><td><code>default</code></td><td class="text-gray-600 dark:text-gray-400">Alert body content</td></tr>
                <tr><td><code>icon</code></td><td class="text-gray-600 dark:text-gray-400">Override the default icon with a custom SVG</td></tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Prev/Next --}}
<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.theming.presets') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Theme Presets
    </a>
    <a href="{{ route('docs.component', 'avatar') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Avatar
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
