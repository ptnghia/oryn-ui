<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Theming Overview">

<x-docs.page-header
    title="Theming"
    description="Oryn UI uses CSS custom properties for a fully configurable theming system that works seamlessly with Tailwind CSS 4."
    tag="Theming"
/>

<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">How it works</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-4">
        All Oryn UI colors are defined as CSS custom properties in <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">:root</code>.
        Tailwind CSS 4's <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">@theme</code> maps these to utility classes automatically.
    </p>
    <x-oryn-alert variant="info" class="mb-6">
        Dark mode is applied by adding the <code class="font-mono text-xs bg-info-subtle px-1 py-0.5 rounded">.dark</code> class to the <code class="font-mono text-xs bg-info-subtle px-1 py-0.5 rounded">&lt;html&gt;</code> element.
    </x-oryn-alert>
</div>

{{-- Theme presets --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Theme Presets</h2>
    <p class="text-gray-600 dark:text-gray-400 mb-6">Oryn UI ships with 5 built-in theme presets. Set the active theme via the config or env variable.</p>
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        @foreach([
            ['Default', '#3b82f6', 'default'],
            ['Green', '#22c55e', 'green'],
            ['Purple', '#a855f7', 'purple'],
            ['Orange', '#f97316', 'orange'],
            ['Dark', '#64748b', 'dark'],
        ] as [$name, $color, $key])
        <div class="rounded-xl border border-gray-200 dark:border-gray-700 p-4 text-center">
            <div class="w-10 h-10 rounded-full mx-auto mb-3 shadow-sm" style="background-color: {{ $color }}"></div>
            <div class="text-sm font-medium">{{ $name }}</div>
            <div class="text-xs text-gray-400 mt-0.5"><code>{{ $key }}</code></div>
        </div>
        @endforeach
    </div>
</div>

{{-- Variable structure --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">CSS Variable Structure</h2>
    <x-docs.code-preview title="variables.css (excerpt)" language="css" code=":root {
    /* Brand colors */
    --primary: 59 130 246;          /* blue-500 */
    --primary-deep: 37 99 235;      /* blue-600 */
    --primary-mild: 147 197 253;    /* blue-300 */
    --primary-subtle: 239 246 255;  /* blue-50 */

    /* Status colors */
    --success: 34 197 94;
    --success-subtle: 240 253 244;
    --error: 239 68 68;
    --error-subtle: 254 242 242;
    --warning: 234 179 8;
    --warning-subtle: 254 252 232;
    --info: 6 182 212;
    --info-subtle: 236 254 255;
}">
        <div class="font-mono text-xs text-gray-300 bg-gray-900 rounded-lg p-4 overflow-x-auto">
<pre>:root {
    --primary: <span class="text-blue-400">59 130 246</span>;
    --primary-subtle: <span class="text-blue-300">239 246 255</span>;
    --success: <span class="text-green-400">34 197 94</span>;
    --error: <span class="text-red-400">239 68 68</span>;
    --warning: <span class="text-yellow-400">234 179 8</span>;
    --info: <span class="text-cyan-400">6 182 212</span>;
}</pre>
        </div>
    </x-docs.code-preview>
</div>

{{-- Color swatches --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Color Swatches (Current Theme)</h2>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
        @foreach([
            ['primary', 'bg-primary', '--primary'],
            ['primary-deep', 'bg-primary-deep', '--primary-deep'],
            ['primary-subtle', 'bg-primary-subtle', '--primary-subtle'],
            ['success', 'bg-success', '--success'],
            ['error', 'bg-error', '--error'],
            ['warning', 'bg-warning', '--warning'],
            ['info', 'bg-info', '--info'],
        ] as [$name, $class, $var])
        <div class="flex items-center gap-3 p-3 rounded-lg border border-gray-200 dark:border-gray-700">
            <div class="{{ $class }} w-8 h-8 rounded-md border border-black/10 shrink-0"></div>
            <div>
                <div class="text-sm font-medium">{{ $name }}</div>
                <div class="text-xs text-gray-400"><code>{{ $var }}</code></div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- Next --}}
<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.configuration') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Configuration
    </a>
    <a href="{{ route('docs.theming.colors') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Colors & Variables
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </a>
</div>

</x-layouts.docs>
