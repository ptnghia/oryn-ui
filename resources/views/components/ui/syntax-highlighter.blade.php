@props([
    'language' => 'javascript',
    'code' => '',
    'showLineNumbers' => false,
    'showCopyButton' => true,
    'theme' => 'oneDark',
])

@php
    $highlighterId = 'oryn-syntax-' . uniqid();
@endphp

<div
    {{ $attributes->merge(['class' => 'oryn-syntax-highlighter relative group']) }}
    x-data="{
        copied: false,
        copyCode() {
            const code = this.$refs.code.textContent;
            navigator.clipboard.writeText(code).then(() => {
                this.copied = true;
                setTimeout(() => { this.copied = false; }, 2000);
            });
        },
        init() {
            if (typeof Prism !== 'undefined') {
                Prism.highlightElement(this.$refs.code);
            }
        },
        destroy() {
            this.copied = false;
        }
    }"
    id="{{ $highlighterId }}"
>
    {{-- Header --}}
    <div class="flex items-center justify-between px-4 py-2 bg-gray-800 dark:bg-gray-900 rounded-t-xl border border-b-0 border-gray-700 dark:border-gray-600">
        <span class="text-xs font-mono text-gray-400">{{ $language }}</span>
        @if($showCopyButton)
        <button
            type="button"
            @click="copyCode()"
            class="text-xs text-gray-400 hover:text-gray-200 transition-colors opacity-0 group-hover:opacity-100 focus:opacity-100"
            :title="copied ? 'Copied!' : 'Copy code'"
        >
            <template x-if="!copied">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path></svg>
            </template>
            <template x-if="copied">
                <svg class="w-4 h-4 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
            </template>
        </button>
        @endif
    </div>

    {{-- Code Block --}}
    <pre class="!m-0 !rounded-t-none rounded-b-xl border border-t-0 border-gray-700 dark:border-gray-600 overflow-x-auto {{ $showLineNumbers ? 'line-numbers' : '' }}"><code x-ref="code" class="language-{{ $language }}">{{ $code }}{{ $slot }}</code></pre>
</div>
