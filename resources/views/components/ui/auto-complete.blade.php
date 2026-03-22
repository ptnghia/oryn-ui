@props([
    'name' => null,
    'placeholder' => 'Type to search...',
    'size' => 'md',
    'disabled' => false,
    'invalid' => false,
    'clearable' => false,
    'options' => [],
    'value' => null,
])

@php
    $sizeClass = $sizeClass();
    $optionsJson = json_encode($options);
    $initialValue = $value !== null ? json_encode($value) : 'null';
@endphp

<div
    x-data="{
        open: false,
        query: {{ $initialValue !== 'null' ? "'" . e($value) . "'" : "''" }},
        options: {{ $optionsJson }},
        selected: {{ $initialValue }},
        highlightIndex: -1,

        get filteredOptions() {
            if (!this.query) return this.options;
            const q = this.query.toLowerCase();
            return this.options.filter(o => {
                const label = (typeof o === 'object' ? (o.label || o.value) : o).toString().toLowerCase();
                return label.includes(q);
            });
        },
        getLabel(opt) {
            return typeof opt === 'object' ? (opt.label || opt.value) : opt;
        },
        getValue(opt) {
            return typeof opt === 'object' ? opt.value : opt;
        },
        selectOption(opt) {
            this.selected = this.getValue(opt);
            this.query = this.getLabel(opt);
            this.open = false;
            this.highlightIndex = -1;
            this.$dispatch('change', { value: this.selected });
        },
        clear() {
            this.selected = null;
            this.query = '';
            this.$dispatch('change', { value: null });
        },
        onInput() {
            this.open = true;
            this.selected = null;
            this.highlightIndex = -1;
        },
        onFocus() {
            this.open = true;
        },
        closeDropdown() {
            this.open = false;
            this.highlightIndex = -1;
        },
        onKeydown(e) {
            if (!this.open) { if (e.key === 'ArrowDown') { this.open = true; e.preventDefault(); } return; }
            const opts = this.filteredOptions;
            if (e.key === 'ArrowDown') { this.highlightIndex = Math.min(this.highlightIndex + 1, opts.length - 1); e.preventDefault(); }
            else if (e.key === 'ArrowUp') { this.highlightIndex = Math.max(this.highlightIndex - 1, 0); e.preventDefault(); }
            else if (e.key === 'Enter' && this.highlightIndex >= 0) { this.selectOption(opts[this.highlightIndex]); e.preventDefault(); }
            else if (e.key === 'Escape') { this.closeDropdown(); }
        }
    }"
    @click.outside="closeDropdown()"
    {{ $attributes->merge(['class' => 'autocomplete relative']) }}
>
    @if($name)
        <input type="hidden" name="{{ $name }}" x-bind:value="selected ?? ''" />
    @endif

    <div class="relative">
        <input
            type="text"
            class="input {{ $sizeClass }}{{ $invalid ? ' input-invalid' : '' }} w-full"
            x-model="query"
            @input="onInput()"
            @focus="onFocus()"
            @keydown="onKeydown($event)"
            placeholder="{{ $placeholder }}"
            {{ $disabled ? 'disabled' : '' }}
            autocomplete="off"
            role="combobox"
            aria-haspopup="listbox"
            :aria-expanded="open"
        />

        @if($clearable)
            <button
                type="button"
                class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-400 hover:text-gray-600"
                x-show="query.length > 0"
                x-cloak
                @click="clear()"
                tabindex="-1"
            >
                <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            </button>
        @endif
    </div>

    {{-- Dropdown --}}
    <div
        x-show="open && filteredOptions.length > 0"
        x-cloak
        x-transition:enter="transition ease-out duration-100"
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-95"
        class="select-menu"
        role="listbox"
    >
        <template x-for="(opt, index) in filteredOptions" :key="getValue(opt)">
            <div
                class="select-option"
                :class="{
                    'bg-primary-subtle text-primary': selected === getValue(opt),
                    'bg-gray-100 dark:bg-gray-600': highlightIndex === index && selected !== getValue(opt),
                }"
                @click.stop="selectOption(opt)"
                @mouseenter="highlightIndex = index"
                role="option"
                :aria-selected="selected === getValue(opt)"
            >
                <span x-text="getLabel(opt)"></span>
            </div>
        </template>
    </div>
</div>
