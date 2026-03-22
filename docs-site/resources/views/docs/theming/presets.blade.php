<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Theme Presets">
<x-docs.page-header title="Theme Presets" description="5 built-in color presets. Switch via config or env variable." tag="Theming"/>
<div class="mb-8">
    <p class="text-gray-600 dark:text-gray-400 mb-6">Set the <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">ORYN_THEME</code> env variable to switch presets:</p>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach([
            ['Default (Blue)', 'default', '#3b82f6', '#dbeafe'],
            ['Green', 'green', '#22c55e', '#dcfce7'],
            ['Purple', 'purple', '#a855f7', '#f3e8ff'],
            ['Orange', 'orange', '#f97316', '#ffedd5'],
            ['Dark', 'dark', '#64748b', '#f1f5f9'],
        ] as [$name, $key, $primary, $subtle])
        <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-5">
            <div class="flex items-center gap-3 mb-4">
                <div class="w-8 h-8 rounded-full shadow-sm" style="background-color: {{ $primary }}"></div>
                <div>
                    <div class="font-semibold">{{ $name }}</div>
                    <code class="text-xs text-gray-400">ORYN_THEME={{ $key }}</code>
                </div>
            </div>
            <div class="flex gap-2">
                <div class="flex-1 h-8 rounded-md" style="background-color: {{ $primary }}"></div>
                <div class="flex-1 h-8 rounded-md border border-gray-200 dark:border-gray-700" style="background-color: {{ $subtle }}"></div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="mt-12 flex justify-between pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.theming.dark-mode') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Dark Mode
    </a>
    <a href="{{ route('docs.component', 'alert') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Alert Component
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>
</x-layouts.docs>
