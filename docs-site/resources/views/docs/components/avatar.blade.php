<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Avatar">

<x-docs.page-header
    title="Avatar"
    description="User profile images with fallback initials and group stacking support."
    tag="Component"
    source="https://github.com/ptnghia/oryn-ui/blob/main/resources/views/components/ui/avatar.blade.php"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Usage</h2>
    <x-docs.code-preview>
        <x-slot:rawCode>@verbatim<x-oryn-avatar src="/img/avatars/user.jpg" alt="John Doe" />
<x-oryn-avatar initials="JD" />@endverbatim</x-slot:rawCode>
        <div class="flex items-center gap-3">
            <x-oryn-avatar initials="JD" />
            <x-oryn-avatar initials="AB" class="bg-success text-white" />
            <x-oryn-avatar initials="CD" class="bg-warning text-white" />
        </div>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Sizes</h2>
    <x-docs.code-preview title="size prop">
        <x-slot:rawCode>@verbatim<x-oryn-avatar size="xs" initials="A" />
<x-oryn-avatar size="sm" initials="B" />
<x-oryn-avatar size="md" initials="C" />
<x-oryn-avatar size="lg" initials="D" />
<x-oryn-avatar size="xl" initials="E" />@endverbatim</x-slot:rawCode>
        <div class="flex items-end gap-3">
            <x-oryn-avatar size="xs" initials="XS" />
            <x-oryn-avatar size="sm" initials="SM" />
            <x-oryn-avatar size="md" initials="MD" />
            <x-oryn-avatar size="lg" initials="LG" />
            <x-oryn-avatar size="xl" initials="XL" />
        </div>
    </x-docs.code-preview>
</div>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-3">Avatar Group</h2>
    <x-docs.code-preview>
        <x-slot:rawCode>@verbatim<x-oryn-avatar-group :max="3">
    <x-oryn-avatar initials="A" />
    <x-oryn-avatar initials="B" />
    <x-oryn-avatar initials="C" />
    <x-oryn-avatar initials="D" />
    <x-oryn-avatar initials="E" />
</x-oryn-avatar-group>@endverbatim</x-slot:rawCode>
        <x-oryn-avatar-group :max="3">
            <x-oryn-avatar initials="AA" class="bg-primary text-white" />
            <x-oryn-avatar initials="BB" class="bg-success text-white" />
            <x-oryn-avatar initials="CC" class="bg-warning text-white" />
            <x-oryn-avatar initials="DD" class="bg-error text-white" />
            <x-oryn-avatar initials="EE" class="bg-info text-white" />
        </x-oryn-avatar-group>
    </x-docs.code-preview>
</div>

<x-docs.props-table :props="[
    ['name' => 'src', 'type' => 'string', 'default' => 'null', 'description' => 'Image URL for the avatar'],
    ['name' => 'alt', 'type' => 'string', 'default' => 'null', 'description' => 'Alt text for the avatar image'],
    ['name' => 'initials', 'type' => 'string', 'default' => 'null', 'description' => 'Fallback initials when no image (up to 2 chars)'],
    ['name' => 'size', 'type' => 'string', 'default' => 'md', 'description' => 'Avatar size. Options: xs | sm | md | lg | xl'],
    ['name' => 'shape', 'type' => 'string', 'default' => 'circle', 'description' => 'Shape. Options: circle | square | rounded'],
]" />

<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.component', 'alert') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Alert
    </a>
    <a href="{{ route('docs.component', 'badge') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Badge
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>

</x-layouts.docs>
