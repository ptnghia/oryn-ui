<x-layouts.docs :nav="$nav" :activePage="$activePage" title="Colors & Variables">
<x-docs.page-header title="Colors & CSS Variables" description="Full reference of all CSS custom properties defined by Oryn UI." tag="Theming"/>
<p class="text-gray-600 dark:text-gray-400 mb-8">
    These variables are defined in <code class="font-mono text-sm bg-gray-100 dark:bg-gray-800 px-1.5 py-0.5 rounded">resources/css/base/variables.css</code> and can be overridden in your own CSS.
</p>
<div class="mb-10">
    <h2 class="text-xl font-semibold mb-4">Brand Colors</h2>
    <x-docs.props-table :props="[
        ['name' => '--primary', 'type' => 'rgb', 'default' => '59 130 246', 'description' => 'Primary brand color (blue-500 by default)'],
        ['name' => '--primary-deep', 'type' => 'rgb', 'default' => '37 99 235', 'description' => 'Darker shade of primary'],
        ['name' => '--primary-mild', 'type' => 'rgb', 'default' => '147 197 253', 'description' => 'Lighter shade of primary'],
        ['name' => '--primary-subtle', 'type' => 'rgb', 'default' => '239 246 255', 'description' => 'Very light primary background'],
    ]" title="Primary" />
    <x-docs.props-table :props="[
        ['name' => '--success', 'type' => 'rgb', 'default' => '34 197 94', 'description' => 'Success color (green-500)'],
        ['name' => '--success-subtle', 'type' => 'rgb', 'default' => '240 253 244', 'description' => 'Light success background'],
        ['name' => '--error', 'type' => 'rgb', 'default' => '239 68 68', 'description' => 'Error/danger color (red-500)'],
        ['name' => '--error-subtle', 'type' => 'rgb', 'default' => '254 242 242', 'description' => 'Light error background'],
        ['name' => '--warning', 'type' => 'rgb', 'default' => '234 179 8', 'description' => 'Warning color (yellow-500)'],
        ['name' => '--warning-subtle', 'type' => 'rgb', 'default' => '254 252 232', 'description' => 'Light warning background'],
        ['name' => '--info', 'type' => 'rgb', 'default' => '6 182 212', 'description' => 'Info color (cyan-500)'],
        ['name' => '--info-subtle', 'type' => 'rgb', 'default' => '236 254 255', 'description' => 'Light info background'],
    ]" title="Status Colors" />
</div>
<div class="mt-12 flex justify-between pt-8 border-t border-gray-200 dark:border-gray-800">
    <a href="{{ route('docs.theming') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
        Theming Overview
    </a>
    <a href="{{ route('docs.theming.dark-mode') }}" class="flex items-center gap-2 text-primary hover:underline font-medium">
        Dark Mode
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </a>
</div>
</x-layouts.docs>
