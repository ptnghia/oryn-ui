<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Spinner">

<x-docs.page-header
    title="Spinner"
    description="Loading indicators for async operations."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/spinner.blade.php"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview>
        <x-slot:rawCode>@verbatim<x-oryn-spinner />@endverbatim</x-slot:rawCode>
        <x-oryn-spinner />
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Sizes</h2>
    <x-docs.code-preview title="size prop">
        <x-slot:rawCode>@verbatim<x-oryn-spinner size="sm" />
<x-oryn-spinner size="md" />
<x-oryn-spinner size="lg" />
<x-oryn-spinner size="xl" />@endverbatim</x-slot:rawCode>
        <div class="flex items-center gap-6">
            <x-oryn-spinner size="sm" />
            <x-oryn-spinner size="md" />
            <x-oryn-spinner size="lg" />
            <x-oryn-spinner size="xl" />
        </div>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Colors</h2>
    <x-docs.code-preview title="color via Tailwind class">
        <x-slot:rawCode>@verbatim<x-oryn-spinner class="text-primary" />
<x-oryn-spinner class="text-success" />
<x-oryn-spinner class="text-error" />
<x-oryn-spinner class="text-warning" />@endverbatim</x-slot:rawCode>
        <div class="flex items-center gap-4">
            <x-oryn-spinner class="text-primary" />
            <x-oryn-spinner class="text-success" />
            <x-oryn-spinner class="text-error" />
            <x-oryn-spinner class="text-warning" />
        </div>
    </x-docs.code-preview>
</div>

<x-docs.props-table :props="[
    ['name' => 'size', 'type' => 'string', 'default' => 'md', 'description' => 'Spinner size. Options: sm | md | lg | xl'],
]" />

<div class="mt-12 flex justify-end pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'tabs') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Tabs
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
