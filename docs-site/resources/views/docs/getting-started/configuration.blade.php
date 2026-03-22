<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Configuration">

<x-docs.page-header
    title="Configuration"
    description="Customize Oryn UI behavior via the published config file."
    tag="Getting Started"
/>

<p class="text-gray-600 dark:text-gray-400 mb-8">
    After publishing the config, you'll find it at <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">config/oryn-ui.php</code>.
</p>

{{-- Config file --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">config/oryn-ui.php</h2>
    @php
    $phpConfigCode = <<<'PHP'
<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Default Theme
    |--------------------------------------------------------------------------
    | Options: 'default', 'green', 'purple', 'orange', 'dark'
    */
    'theme' => env('ORYN_THEME', 'default'),

    /*
    |--------------------------------------------------------------------------
    | Theme Mode
    |--------------------------------------------------------------------------
    | Options: 'light', 'dark', 'system'
    */
    'mode' => env('ORYN_MODE', 'light'),

    /*
    |--------------------------------------------------------------------------
    | Default Layout
    |--------------------------------------------------------------------------
    | Options: 'collapsibleSide', 'stackedSide', 'topBarClassic',
    |          'framelessSide', 'contentOverlay', 'blank'
    */
    'layout' => env('ORYN_LAYOUT', 'collapsibleSide'),

    /*
    |--------------------------------------------------------------------------
    | Vendor CDN
    |--------------------------------------------------------------------------
    | Load third-party libraries (Charts, DatePicker, etc.) from CDN
    */
    'vendors' => [
        'cdn' => env('ORYN_VENDORS_CDN', false),
    ],
];
PHP;
    @endphp
    <x-docs.code-preview title="config/oryn-ui.php" language="php" :code="$phpConfigCode">
        <div class="font-mono text-xs text-gray-300 bg-gray-900 rounded-lg p-4 overflow-x-auto">
<pre class="text-gray-300">
<span class="text-blue-400">return</span> [
    <span class="text-green-400">'theme'</span>  => <span class="text-yellow-300">env</span>(<span class="text-yellow-300">'ORYN_THEME'</span>, <span class="text-yellow-300">'default'</span>),
    <span class="text-green-400">'mode'</span>   => <span class="text-yellow-300">env</span>(<span class="text-yellow-300">'ORYN_MODE'</span>, <span class="text-yellow-300">'light'</span>),
    <span class="text-green-400">'layout'</span> => <span class="text-yellow-300">env</span>(<span class="text-yellow-300">'ORYN_LAYOUT'</span>, <span class="text-yellow-300">'collapsibleSide'</span>),
    <span class="text-green-400">'vendors'</span> => [
        <span class="text-green-400">'cdn'</span> => <span class="text-yellow-300">env</span>(<span class="text-yellow-300">'ORYN_VENDORS_CDN'</span>, <span class="text-blue-400">false</span>),
    ],
];</pre>
        </div>
    </x-docs.code-preview>
</div>

{{-- .env options --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Environment variables</h2>
    <x-docs.props-table :props="[
        ['name' => 'ORYN_THEME', 'type' => 'string', 'default' => 'default', 'description' => 'Active theme preset. Options: default, green, purple, orange, dark'],
        ['name' => 'ORYN_MODE', 'type' => 'string', 'default' => 'light', 'description' => 'Initial color mode. Options: light, dark, system'],
        ['name' => 'ORYN_LAYOUT', 'type' => 'string', 'default' => 'collapsibleSide', 'description' => 'Default layout for template components'],
        ['name' => 'ORYN_VENDORS_CDN', 'type' => 'bool', 'default' => 'false', 'description' => 'Load vendor libraries (ApexCharts, FullCalendar…) from CDN'],
    ]" title="Environment Variables" />
</div>

{{-- .env example --}}
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Example .env</h2>
    <x-docs.code-preview title=".env" language="bash" code="ORYN_THEME=purple&#10;ORYN_MODE=dark&#10;ORYN_LAYOUT=stackedSide&#10;ORYN_VENDORS_CDN=true">
        <div class="font-mono text-xs text-gray-300 bg-gray-900 rounded-lg p-4">
            <div><span class="text-green-400">ORYN_THEME</span>=<span class="text-yellow-300">purple</span></div>
            <div><span class="text-green-400">ORYN_MODE</span>=<span class="text-yellow-300">dark</span></div>
            <div><span class="text-green-400">ORYN_LAYOUT</span>=<span class="text-yellow-300">stackedSide</span></div>
            <div><span class="text-green-400">ORYN_VENDORS_CDN</span>=<span class="text-yellow-300">true</span></div>
        </div>
    </x-docs.code-preview>
</div>

{{-- Prev/Next --}}
<div class="mt-12 flex justify-between items-center pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.quick-start') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
        </svg>
        Quick Start
    </a>
    <a href="{{ route('docs.theming') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Theming
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
        </svg>
    </a>
</div>

</x-layouts.docs>
