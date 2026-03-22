<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Dropdown">

<x-docs.page-header
    title="Dropdown"
    description="Contextual menus triggered by a button or element click. Built with Alpine.js."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/dropdown.blade.php"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview>
        <x-slot:rawCode>@verbatim<x-oryn-dropdown>
    <x-slot:trigger>
        <x-oryn-button>Options ▾</x-oryn-button>
    </x-slot:trigger>
    <x-oryn-dropdown-item>Edit</x-oryn-dropdown-item>
    <x-oryn-dropdown-item>Duplicate</x-oryn-dropdown-item>
    <x-oryn-dropdown-item variant="divider" />
    <x-oryn-dropdown-item class="text-error">Delete</x-oryn-dropdown-item>
</x-oryn-dropdown>@endverbatim</x-slot:rawCode>
        <x-oryn-dropdown>
            <x-slot:trigger>
                <x-oryn-button>Options ▾</x-oryn-button>
            </x-slot:trigger>
            <x-oryn-dropdown-item>Edit</x-oryn-dropdown-item>
            <x-oryn-dropdown-item>Duplicate</x-oryn-dropdown-item>
            <x-oryn-dropdown-item variant="divider" />
            <x-oryn-dropdown-item class="text-error">Delete</x-oryn-dropdown-item>
        </x-oryn-dropdown>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Placement</h2>
    <x-docs.code-preview title="placement prop">
        <x-slot:rawCode>@verbatim<x-oryn-dropdown placement="bottom-start">...</x-oryn-dropdown>
<x-oryn-dropdown placement="bottom-end">...</x-oryn-dropdown>
<x-oryn-dropdown placement="top-start">...</x-oryn-dropdown>@endverbatim</x-slot:rawCode>
        <div class="flex gap-3">
            @foreach(['bottom-start', 'bottom-end'] as $placement)
            <x-oryn-dropdown placement="{{ $placement }}">
                <x-slot:trigger>
                    <x-oryn-button variant="outline" size="sm">{{ $placement }}</x-oryn-button>
                </x-slot:trigger>
                <x-oryn-dropdown-item>Action 1</x-oryn-dropdown-item>
                <x-oryn-dropdown-item>Action 2</x-oryn-dropdown-item>
            </x-oryn-dropdown>
            @endforeach
        </div>
    </x-docs.code-preview>
</div>

<x-docs.props-table :props="[
    ['name' => 'placement', 'type' => 'string', 'default' => 'bottom-start', 'description' => 'Menu position. Options: bottom-start | bottom-end | top-start | top-end'],
    ['name' => 'closeOnSelect', 'type' => 'bool', 'default' => 'true', 'description' => 'Close dropdown when an item is selected'],
]" />

<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'dialog') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Dialog
    </a>
    <a href="{{ route('docs.component', 'menu') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Menu
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
