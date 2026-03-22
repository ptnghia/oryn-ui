<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Dark Mode">
<x-docs.page-header title="Dark Mode" description="Oryn UI supports dark mode via the .dark class strategy." tag="Theming"/>
<div class="mb-8">
    <x-docs.code-preview title="Enable dark mode" code='<html class="dark">
    <!-- All Oryn components now render in dark mode -->
</html>'>
        <div class="flex gap-3">
            <x-oryn-button variant="outline" @click="document.documentElement.classList.add('dark')">Enable Dark</x-oryn-button>
            <x-oryn-button variant="outline" @click="document.documentElement.classList.remove('dark')">Disable Dark</x-oryn-button>
        </div>
    </x-docs.code-preview>
</div>
<div class="mt-12 flex justify-between pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.theming.colors') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Colors & Variables
    </a>
    <a href="{{ route('docs.theming.presets') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Theme Presets
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>
</x-layouts.docs>
