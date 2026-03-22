@props([
    'content' => '',
    'placeholder' => 'Write something...',
    'invalid' => false,
    'editable' => true,
])

@php
    $editorId = 'oryn-editor-' . uniqid();
@endphp

<div
    {{ $attributes->merge(['class' => 'oryn-rich-text-editor']) }}
    x-data="{
        editor: null,
        focused: false,
        init() {
            if (typeof tiptap === 'undefined' && typeof window.TiptapCore === 'undefined') {
                console.warn('Oryn UI: TipTap is not loaded. Include @tiptap/core and @tiptap/starter-kit.');
                return;
            }

            const StarterKit = window.TiptapStarterKit || (typeof tiptap !== 'undefined' ? tiptap.StarterKit : null);
            const Editor = window.TiptapEditor || (typeof tiptap !== 'undefined' ? tiptap.Editor : null);

            if (!Editor || !StarterKit) return;

            this.editor = new Editor({
                element: this.$refs.content,
                extensions: [
                    StarterKit.configure({
                        bulletList: { keepMarks: true },
                        orderedList: { keepMarks: true },
                    }),
                ],
                content: {{ json_encode($content) }},
                editable: {{ $editable ? 'true' : 'false' }},
                editorProps: {
                    attributes: {
                        class: 'm-2 focus:outline-none min-h-[120px] prose prose-sm max-w-full dark:prose-invert',
                    },
                },
                onFocus: () => { this.focused = true; },
                onBlur: () => { this.focused = false; },
                onUpdate: ({ editor }) => {
                    this.$dispatch('editor-update', {
                        html: editor.getHTML(),
                        text: editor.getText(),
                        json: editor.getJSON(),
                    });
                },
            });
        },
        exec(command, ...args) {
            if (!this.editor) return;
            this.editor.chain().focus()[command](...args).run();
        },
        isActive(name, attrs = {}) {
            return this.editor?.isActive(name, attrs) || false;
        },
        destroy() {
            if (this.editor) {
                this.editor.destroy();
                this.editor = null;
            }
        }
    }"
    id="{{ $editorId }}"
>
    {{-- Toolbar --}}
    <div
        class="flex flex-wrap gap-x-1 gap-y-2 px-2 pt-3 rounded-t-xl border border-b-0 border-gray-200 dark:border-gray-600 bg-gray-100 dark:bg-gray-700"
        :class="{
            'ring-1 ring-primary border-primary': focused && !{{ $invalid ? 'true' : 'false' }},
            'bg-error-subtle ring-1 ring-error border-error': focused && {{ $invalid ? 'true' : 'false' }},
            'bg-error-subtle': {{ $invalid ? 'true' : 'false' }} && !focused,
        }"
        role="toolbar"
        aria-label="Text formatting"
    >
        {{-- Bold --}}
        <button type="button" @click="exec('toggleBold')" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('bold') }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Bold">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M15.6 10.79c.97-.67 1.65-1.77 1.65-2.79 0-2.26-1.75-4-4-4H7v14h7.04c2.09 0 3.71-1.7 3.71-3.79 0-1.52-.86-2.82-2.15-3.42zM10 6.5h3c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5h-3v-3zm3.5 9H10v-3h3.5c.83 0 1.5.67 1.5 1.5s-.67 1.5-1.5 1.5z"/></svg>
        </button>

        {{-- Italic --}}
        <button type="button" @click="exec('toggleItalic')" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('italic') }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Italic">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M10 4v3h2.21l-3.42 8H6v3h8v-3h-2.21l3.42-8H18V4z"/></svg>
        </button>

        {{-- Strike --}}
        <button type="button" @click="exec('toggleStrike')" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('strike') }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Strikethrough">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M10 19h4v-3h-4v3zM5 4v3h5v3h4V7h5V4H5zM3 14h18v-2H3v2z"/></svg>
        </button>

        {{-- Code --}}
        <button type="button" @click="exec('toggleCode')" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('code') }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Inline Code">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M9.4 16.6L4.8 12l4.6-4.6L8 6l-6 6 6 6 1.4-1.4zm5.2 0l4.6-4.6-4.6-4.6L16 6l6 6-6 6-1.4-1.4z"/></svg>
        </button>

        <span class="w-px h-6 bg-gray-300 dark:bg-gray-500 self-center mx-1"></span>

        {{-- Blockquote --}}
        <button type="button" @click="exec('toggleBlockquote')" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('blockquote') }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Blockquote">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6 17h3l2-4V7H5v6h3zm8 0h3l2-4V7h-6v6h3z"/></svg>
        </button>

        {{-- Bullet List --}}
        <button type="button" @click="exec('toggleBulletList')" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('bulletList') }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Bullet List">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M4 10.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5 1.5-.67 1.5-1.5-.67-1.5-1.5-1.5zm0-6c-.83 0-1.5.67-1.5 1.5S3.17 7.5 4 7.5 5.5 6.83 5.5 6 4.83 4.5 4 4.5zm0 12c-.83 0-1.5.68-1.5 1.5s.68 1.5 1.5 1.5 1.5-.68 1.5-1.5-.67-1.5-1.5-1.5zM7 19h14v-2H7v2zm0-6h14v-2H7v2zm0-8v2h14V5H7z"/></svg>
        </button>

        {{-- Ordered List --}}
        <button type="button" @click="exec('toggleOrderedList')" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('orderedList') }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Ordered List">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M2 17h2v.5H3v1h1v.5H2v1h3v-4H2v1zm1-9h1V4H2v1h1v3zm-1 3h1.8L2 13.1v.9h3v-1H3.2L5 10.9V10H2v1zm5-6v2h14V5H7zm0 14h14v-2H7v2zm0-6h14v-2H7v2z"/></svg>
        </button>

        {{-- Code Block --}}
        <button type="button" @click="exec('toggleCodeBlock')" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('codeBlock') }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Code Block">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M20 3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm0 16H4V5h16v14zM6 17l5-5-5-5 1.4-1.4L13.8 12l-6.4 6.4L6 17z"/></svg>
        </button>

        {{-- Horizontal Rule --}}
        <button type="button" @click="exec('setHorizontalRule')" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300" title="Horizontal Rule">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M2 11h20v2H2z"/></svg>
        </button>

        {{-- Heading Dropdown --}}
        <span class="w-px h-6 bg-gray-300 dark:bg-gray-500 self-center mx-1"></span>
        <button type="button" @click="exec('toggleHeading', { level: 1 })" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('heading', { level: 1 }) }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 text-xs font-bold" title="Heading 1">H1</button>
        <button type="button" @click="exec('toggleHeading', { level: 2 })" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('heading', { level: 2 }) }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 text-xs font-bold" title="Heading 2">H2</button>
        <button type="button" @click="exec('toggleHeading', { level: 3 })" :class="{ 'bg-gray-200 dark:bg-gray-600': isActive('heading', { level: 3 }) }" class="p-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-300 text-xs font-bold" title="Heading 3">H3</button>

        {{-- Custom toolbar slot --}}
        {{ $toolbar ?? '' }}
    </div>

    {{-- Editor Content --}}
    <div
        x-ref="content"
        class="max-h-[600px] overflow-auto px-2 rounded-b-xl border border-t-0 border-gray-200 dark:border-gray-600 bg-white dark:bg-gray-800"
        :class="{
            'border-primary': focused && !{{ $invalid ? 'true' : 'false' }},
            'border-error': focused && {{ $invalid ? 'true' : 'false' }},
        }"
    ></div>
</div>
