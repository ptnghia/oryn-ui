<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Tabs">

<x-docs.page-header
    title="Tabs"
    description="Organize content into tabbed panels. Supports multiple visual styles."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/tabs.blade.php"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview>
        <x-slot:rawCode>@verbatim<x-oryn-tabs>
    <x-slot:list>
        <x-oryn-tab-nav value="overview">Overview</x-oryn-tab-nav>
        <x-oryn-tab-nav value="details">Details</x-oryn-tab-nav>
        <x-oryn-tab-nav value="settings">Settings</x-oryn-tab-nav>
    </x-slot:list>
    <x-oryn-tab-content value="overview">Overview content here.</x-oryn-tab-content>
    <x-oryn-tab-content value="details">Details content here.</x-oryn-tab-content>
    <x-oryn-tab-content value="settings">Settings content here.</x-oryn-tab-content>
</x-oryn-tabs>@endverbatim</x-slot:rawCode>
        <x-oryn-tabs defaultValue="overview">
            <x-slot:list>
                <x-oryn-tab-nav value="overview">Overview</x-oryn-tab-nav>
                <x-oryn-tab-nav value="details">Details</x-oryn-tab-nav>
                <x-oryn-tab-nav value="settings">Settings</x-oryn-tab-nav>
            </x-slot:list>
            <x-oryn-tab-content value="overview">
                <p class="text-gray-600 dark:text-gray-400 p-4">Overview content goes here.</p>
            </x-oryn-tab-content>
            <x-oryn-tab-content value="details">
                <p class="text-gray-600 dark:text-gray-400 p-4">Detailed information here.</p>
            </x-oryn-tab-content>
            <x-oryn-tab-content value="settings">
                <p class="text-gray-600 dark:text-gray-400 p-4">Settings panel here.</p>
            </x-oryn-tab-content>
        </x-oryn-tabs>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Variants</h2>
    <x-docs.code-preview title="variant prop">
        <x-slot:rawCode>@verbatim<x-oryn-tabs variant="underline">...</x-oryn-tabs>
<x-oryn-tabs variant="pill">...</x-oryn-tabs>
<x-oryn-tabs variant="segment">...</x-oryn-tabs>@endverbatim</x-slot:rawCode>
        <div class="space-y-6">
            @foreach(['underline', 'pill'] as $v)
            <x-oryn-tabs variant="{{ $v }}" defaultValue="tab1-{{ $v }}">
                <x-slot:list>
                    <x-oryn-tab-nav value="tab1-{{ $v }}">Tab 1</x-oryn-tab-nav>
                    <x-oryn-tab-nav value="tab2-{{ $v }}">Tab 2</x-oryn-tab-nav>
                </x-slot:list>
                <x-oryn-tab-content value="tab1-{{ $v }}">
                    <p class="text-sm text-gray-600 dark:text-gray-400 p-3">Variant: {{ $v }}</p>
                </x-oryn-tab-content>
                <x-oryn-tab-content value="tab2-{{ $v }}">
                    <p class="text-sm text-gray-600 dark:text-gray-400 p-3">Tab 2 content ({{ $v }})</p>
                </x-oryn-tab-content>
            </x-oryn-tabs>
            @endforeach
        </div>
    </x-docs.code-preview>
</div>

<x-docs.props-table :props="[
    ['name' => 'defaultValue', 'type' => 'string', 'default' => 'null', 'description' => 'The value of the initially active tab'],
    ['name' => 'variant', 'type' => 'string', 'default' => 'underline', 'description' => 'Tab style. Options: underline | pill | segment'],
]" />

<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'pagination') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Pagination
    </a>
    <a href="{{ route('docs.component', 'toast') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Toast
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
