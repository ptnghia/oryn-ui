@props([
    'title' => null,
    'code' => '',
    'language' => 'blade',
    'collapse' => false,
])
{{--
    CodePreview — shows a live rendered component above + syntax-highlighted code below.
    Usage (simple single-line):
        <x-docs.code-preview code='<x-oryn-alert>Hello</x-oryn-alert>'>
            <x-oryn-alert>Hello</x-oryn-alert>
        </x-docs.code-preview>

    Usage (multi-line with @verbatim to prevent Blade parsing):
        <x-docs.code-preview title="...">
            <x-slot:rawCode>@verbatim
                <x-oryn-alert variant="success">...</x-oryn-alert>
            @endverbatim</x-slot:rawCode>
            <x-oryn-alert variant="success">...</x-oryn-alert>
        </x-docs.code-preview>
--}}
@php
    // Prefer the rawCode slot (for multi-line examples using @verbatim) over the code attribute.
    $displayCode = (isset($rawCode) && $rawCode->isNotEmpty())
        ? trim($rawCode->toHtml())
        : $code;
@endphp
<div x-data="{ showCode: {{ $collapse ? 'false' : 'true' }}, copied: false }" class="mb-8 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden">

    {{-- Title bar --}}
    @if($title)
    <div class="px-4 py-2.5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900/50 flex items-center justify-between">
        <span class="text-sm font-medium text-gray-700 dark:text-gray-300">{{ $title }}</span>
        <div class="flex items-center gap-2">
            <button @click="showCode = !showCode"
                    class="text-xs text-gray-500 hover:text-gray-700 dark:hover:text-gray-300 flex items-center gap-1 transition-colors">
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"/>
                </svg>
                <span x-text="showCode ? 'Hide code' : 'Show code'">Show code</span>
            </button>
        </div>
    </div>
    @endif

    {{-- Live Preview --}}
    <div class="oryn-docs-preview {{ $title ? 'rounded-none' : 'rounded-t-xl' }}">
        {{ $slot }}
    </div>

    {{-- Code block --}}
    <div x-show="showCode" x-transition:enter="transition ease-out duration-150"
         x-transition:enter-start="opacity-0 -translate-y-1" x-transition:enter-end="opacity-100 translate-y-0"
         class="relative">
        {{-- Copy button --}}
        <button @click="navigator.clipboard.writeText($el.closest('[x-data]').querySelector('code').textContent.trim()); copied = true; setTimeout(() => copied = false, 2000)"
                class="absolute top-3 right-3 z-10 flex items-center gap-1.5 text-xs px-2.5 py-1 rounded-md
                       bg-gray-700 hover:bg-gray-600 text-gray-200 transition-colors">
            <svg x-show="!copied" class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
            </svg>
            <svg x-show="copied" class="w-3.5 h-3.5 text-success" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
            </svg>
            <span x-text="copied ? 'Copied!' : 'Copy'">Copy</span>
        </button>
        <pre class="overflow-x-auto bg-gray-900 dark:bg-gray-950 border-t border-gray-700 p-4 pt-5 text-sm"><code class="oryn-docs-code text-gray-100 language-{{ $language }}">{{ $displayCode }}</code></pre>
    </div>
</div>
