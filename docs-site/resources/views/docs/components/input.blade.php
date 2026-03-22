<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Input">

<x-docs.page-header
    title="Input"
    description="Text input fields for collecting user data. Includes prefix/suffix addons and input groups."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/input.blade.php"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview>
        <x-slot:rawCode>@verbatim<x-oryn-input placeholder="Enter your name" />@endverbatim</x-slot:rawCode>
        <x-oryn-input placeholder="Enter your name" class="max-w-xs" />
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Sizes</h2>
    <x-docs.code-preview title="size prop">
        <x-slot:rawCode>@verbatim<x-oryn-input size="sm" placeholder="Small" />
<x-oryn-input size="md" placeholder="Medium (default)" />
<x-oryn-input size="lg" placeholder="Large" />@endverbatim</x-slot:rawCode>
        <div class="space-y-3 max-w-xs">
            <x-oryn-input size="sm" placeholder="Small" />
            <x-oryn-input size="md" placeholder="Medium (default)" />
            <x-oryn-input size="lg" placeholder="Large" />
        </div>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">With Prefix / Suffix</h2>
    <x-docs.code-preview title="prefix and suffix slots">
        <x-slot:rawCode>@verbatim<x-oryn-input placeholder="Search...">
    <x-slot:prefix>
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
        </svg>
    </x-slot:prefix>
</x-oryn-input>@endverbatim</x-slot:rawCode>
        <div class="max-w-xs space-y-3">
            <x-oryn-input placeholder="Search...">
                <x-slot:prefix>
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M11 19a8 8 0 100-16 8 8 0 000 16z"/>
                    </svg>
                </x-slot:prefix>
            </x-oryn-input>
            <x-oryn-input type="text" placeholder="amount" value="100">
                <x-slot:prefix>$</x-slot:prefix>
                <x-slot:suffix>.00</x-slot:suffix>
            </x-oryn-input>
        </div>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">States</h2>
    <x-docs.code-preview title="invalid and disabled">
        <x-slot:rawCode>@verbatim<x-oryn-input :invalid="true" placeholder="Invalid input" />
<x-oryn-input disabled placeholder="Disabled input" />@endverbatim</x-slot:rawCode>
        <div class="max-w-xs space-y-3">
            <x-oryn-input :invalid="true" placeholder="Invalid input" />
            <x-oryn-input disabled placeholder="Disabled input" />
        </div>
    </x-docs.code-preview>
</div>

<x-docs.props-table :props="[
    ['name' => 'type', 'type' => 'string', 'default' => 'text', 'description' => 'HTML input type (text, email, password, number, etc.)'],
    ['name' => 'size', 'type' => 'string', 'default' => 'md', 'description' => 'Input size. Options: sm | md | lg'],
    ['name' => 'invalid', 'type' => 'bool', 'default' => 'false', 'description' => 'Show error/invalid styling'],
    ['name' => 'disabled', 'type' => 'bool', 'default' => 'false', 'description' => 'Disable the input'],
    ['name' => 'placeholder', 'type' => 'string', 'default' => 'null', 'description' => 'Placeholder text'],
]" />

<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'form-item') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Form Item
    </a>
    <a href="{{ route('docs.component', 'radio') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Radio
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
