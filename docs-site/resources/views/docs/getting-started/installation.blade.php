<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Installation">

<x-docs.page-header
    title="Installation"
    description="Get Oryn UI installed in your Laravel project in a few simple steps."
    tag="Getting Started"
/>

{{-- Step 1 --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
        <span class="flex items-center justify-center w-7 h-7 rounded-full bg-primary text-white text-sm font-bold shrink-0">1</span>
        Install via Composer
    </h2>
    <p class="text-gray-600 dark:text-gray-400 mb-4">Require the package using Composer:</p>
    <x-docs.code-preview title="Terminal" language="bash" code="composer require oryn/ui">
        <div class="font-mono text-sm text-green-400 bg-gray-900 rounded-lg p-4">
            <span class="text-gray-500">$</span> composer require oryn/ui
        </div>
    </x-docs.code-preview>
</div>

{{-- Step 2 --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
        <span class="flex items-center justify-center w-7 h-7 rounded-full bg-primary text-white text-sm font-bold shrink-0">2</span>
        Publish assets
    </h2>
    <p class="text-gray-600 dark:text-gray-400 mb-4">Publish the config file and CSS/JS assets:</p>
    <x-docs.code-preview title="Terminal" language="bash" code="php artisan vendor:publish --tag=oryn-ui-config
php artisan vendor:publish --tag=oryn-ui-assets">
        <div class="font-mono text-sm text-green-400 bg-gray-900 rounded-lg p-4 space-y-1">
            <div><span class="text-gray-500">$</span> php artisan vendor:publish --tag=oryn-ui-config</div>
            <div><span class="text-gray-500">$</span> php artisan vendor:publish --tag=oryn-ui-assets</div>
        </div>
    </x-docs.code-preview>
</div>

{{-- Step 3 --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
        <span class="flex items-center justify-center w-7 h-7 rounded-full bg-primary text-white text-sm font-bold shrink-0">3</span>
        Add CSS & JS to your layout
    </h2>
    <p class="text-gray-600 dark:text-gray-400 mb-4">
        Import Oryn UI styles in your <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">app.css</code>:
    </p>
    <x-docs.code-preview title="resources/css/app.css" language="css" code="@import '../../vendor/oryn/ui/resources/css/oryn-ui.css';

@source '../../vendor/oryn/ui/resources/views/**/*.blade.php';">
        <div class="font-mono text-xs text-gray-300 bg-gray-900 rounded-lg p-4">
            <div><span class="text-blue-400">@import</span> <span class="text-yellow-300">'../../vendor/oryn/ui/resources/css/oryn-ui.css'</span>;</div>
            <div class="mt-2"><span class="text-blue-400">@source</span> <span class="text-yellow-300">'../../vendor/oryn/ui/resources/views/**/*.blade.php'</span>;</div>
        </div>
    </x-docs.code-preview>

    <p class="text-gray-600 dark:text-gray-400 mb-4 mt-6">
        Initialize Alpine.js with Oryn plugins in your <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">app.js</code>:
    </p>
    <x-docs.code-preview title="resources/js/app.js" language="js" code="import Alpine from 'alpinejs';
import { registerOrynPlugins } from '../../vendor/oryn/ui/resources/js/oryn-ui.js';

registerOrynPlugins(Alpine);
Alpine.start();">
        <div class="font-mono text-xs text-gray-300 bg-gray-900 rounded-lg p-4">
            <div><span class="text-blue-400">import</span> Alpine <span class="text-blue-400">from</span> <span class="text-yellow-300">'alpinejs'</span>;</div>
            <div><span class="text-blue-400">import</span> { registerOrynPlugins } <span class="text-blue-400">from</span> <span class="text-yellow-300">'../../vendor/oryn/ui/resources/js/oryn-ui.js'</span>;</div>
            <div class="mt-2">registerOrynPlugins(Alpine);</div>
            <div>Alpine.start();</div>
        </div>
    </x-docs.code-preview>
</div>

{{-- Step 4 --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4 flex items-center gap-2">
        <span class="flex items-center justify-center w-7 h-7 rounded-full bg-primary text-white text-sm font-bold shrink-0">4</span>
        Add npm dependency
    </h2>
    <x-docs.code-preview title="Terminal" language="bash" code="npm install alpinejs
npm run build">
        <div class="font-mono text-sm text-green-400 bg-gray-900 rounded-lg p-4 space-y-1">
            <div><span class="text-gray-500">$</span> npm install alpinejs</div>
            <div><span class="text-gray-500">$</span> npm run build</div>
        </div>
    </x-docs.code-preview>
</div>

{{-- Requirements --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Requirements</h2>
    <x-oryn-table>
        <x-slot:head>
            <x-oryn-th>Dependency</x-oryn-th>
            <x-oryn-th>Version</x-oryn-th>
        </x-slot:head>
        <x-oryn-tr>
            <x-oryn-td>PHP</x-oryn-td>
            <x-oryn-td><code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">&gt;= 8.2</code></x-oryn-td>
        </x-oryn-tr>
        <x-oryn-tr>
            <x-oryn-td>Laravel</x-oryn-td>
            <x-oryn-td><code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">&gt;= 11.0</code></x-oryn-td>
        </x-oryn-tr>
        <x-oryn-tr>
            <x-oryn-td>Tailwind CSS</x-oryn-td>
            <x-oryn-td><code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">&gt;= 4.0</code></x-oryn-td>
        </x-oryn-tr>
        <x-oryn-tr>
            <x-oryn-td>Alpine.js</x-oryn-td>
            <x-oryn-td><code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">&gt;= 3.14</code></x-oryn-td>
        </x-oryn-tr>
    </x-oryn-table>
</div>

{{-- Next --}}
<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <div></div>
    <a href="{{ route('docs.quick-start') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Quick Start
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </a>
</div>

</x-layouts.docs>
