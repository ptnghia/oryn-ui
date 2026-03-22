@props([
    'name' => null,
    'placeholder' => 'Select...',
    'size' => 'md',
    'multiple' => false,
    'searchable' => false,
    'clearable' => false,
    'disabled' => false,
    'loading' => false,
    'invalid' => false,
    'options' => [],
    'value' => null,
])

@php
    $sizeClass = $sizeClass();
    $optionsJson = json_encode($options);
    $initialValue = $value !== null ? json_encode($value) : ($multiple ? '[]' : 'null');
@endphp

<div
    x-data="{
        open: false,
        search: '',
        options: {{ $optionsJson }},
        selected: {{ $initialValue }},
        multiple: {{ $multiple ? 'true' : 'false' }},
        searchable: {{ $searchable ? 'true' : 'false' }},
        highlightIndex: -1,

        get filteredOptions() {
            if (!this.search) return this.options;
            const q = this.search.toLowerCase();
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
        isSelected(opt) {
            const v = this.getValue(opt);
            if (this.multiple) return Array.isArray(this.selected) && this.selected.includes(v);
            return this.selected === v;
        },
        selectOption(opt) {
            const v = this.getValue(opt);
            if (this.multiple) {
                if (!Array.isArray(this.selected)) this.selected = [];
                const idx = this.selected.indexOf(v);
                if (idx === -1) this.selected.push(v);
                else this.selected.splice(idx, 1);
                this.selected = [...this.selected];
            } else {
                this.selected = v;
                this.open = false;
            }
            this.search = '';
            this.highlightIndex = -1;
            this.$dispatch('change', { value: this.selected });
        },
        removeValue(v) {
            if (!this.multiple || !Array.isArray(this.selected)) return;
            this.selected = this.selected.filter(s => s !== v);
            this.$dispatch('change', { value: this.selected });
        },
        clear() {
            this.selected = this.multiple ? [] : null;
            this.search = '';
            this.$dispatch('change', { value: this.selected });
        },
        toggle() {
            if ({{ $disabled ? 'true' : 'false' }}) return;
            this.open = !this.open;
            if (this.open && this.searchable) this.$nextTick(() => this.$refs.searchInput?.focus());
        },
        closeDropdown() { this.open = false; this.search = ''; this.highlightIndex = -1; },
        onKeydown(e) {
            if (!this.open) { if (e.key === 'Enter' || e.key === ' ' || e.key === 'ArrowDown') { this.open = true; e.preventDefault(); } return; }
            const opts = this.filteredOptions;
            if (e.key === 'ArrowDown') { this.highlightIndex = Math.min(this.highlightIndex + 1, opts.length - 1); e.preventDefault(); }
            else if (e.key === 'ArrowUp') { this.highlightIndex = Math.max(this.highlightIndex - 1, 0); e.preventDefault(); }
            else if (e.key === 'Enter' && this.highlightIndex >= 0) { this.selectOption(opts[this.highlightIndex]); e.preventDefault(); }
            else if (e.key === 'Escape') { this.closeDropdown(); }
        },
        get displayText() {
            if (this.multiple && Array.isArray(this.selected) && this.selected.length > 0) return '';
            if (!this.multiple && this.selected !== null) {
                const opt = this.options.find(o => this.getValue(o) === this.selected);
                return opt ? this.getLabel(opt) : '';
            }
            return '';
        },
        get hasValue() {
            if (this.multiple) return Array.isArray(this.selected) && this.selected.length > 0;
            return this.selected !== null && this.selected !== '';
        },
        getLabelByValue(v) {
            const opt = this.options.find(o => this.getValue(o) === v);
            return opt ? this.getLabel(opt) : v;
        }
    }"
    @click.outside="closeDropdown()"
    @keydown="onKeydown($event)"
    {{ $attributes->merge(['class' => 'select relative ' . $sizeClass . ($invalid ? ' select-control-invalid' : '') . ($disabled ? ' opacity-50 cursor-not-allowed' : '')]) }}
>
    {{-- Hidden input for form submission --}}
    @if($name)
        @if($multiple)
            <template x-for="v in (Array.isArray(selected) ? selected : [])" :key="v">
                <input type="hidden" name="{{ $name }}[]" :value="v" />
            </template>
        @else
            <input type="hidden" name="{{ $name }}" x-bind:value="selected ?? ''" />
        @endif
    @endif

    {{-- Control --}}
    <div
        class="select-control"
        :class="open ? 'select-control-focused' : ''"
        @click="toggle()"
        role="combobox"
        aria-haspopup="listbox"
        :aria-expanded="open"
        tabindex="0"
    >
        <div class="select-value-container">
            {{-- Multi-value tags --}}
            @if($multiple)
            <template x-for="v in (Array.isArray(selected) ? selected : [])" :key="v">
                <span class="select-multi-value">
                    <span class="select-multi-value-label" x-text="getLabelByValue(v)"></span>
                    <span class="select-multi-value-remove" @click.stop="removeValue(v)">
                        <svg class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    </span>
                </span>
            </template>
            @endif

            {{-- Search input or placeholder --}}
            @if($searchable)
                <input
                    x-ref="searchInput"
                    type="text"
                    class="select-input-container"
                    x-model="search"
                    x-show="open || !hasValue"
                    :placeholder="hasValue ? '' : '{{ $placeholder }}'"
                    @click.stop="if (!open) toggle()"
                    autocomplete="off"
                />
            @endif

            {{-- Display value --}}
            <span
                class="select-single-value"
                x-show="!open || !searchable"
                x-text="displayText"
                x-cloak
            ></span>

            {{-- Placeholder --}}
            <span
                class="select-placeholder"
                x-show="!hasValue && !(searchable && open)"
                x-cloak
            >{{ $placeholder }}</span>
        </div>

        {{-- Indicators --}}
        <div class="select-indicators-container">
            @if($loading)
                <x-oryn-spinner :size="16" class="mr-1" />
            @endif

            @if($clearable)
                <span
                    class="select-clear-indicator"
                    x-show="hasValue"
                    x-cloak
                    @click.stop="clear()"
                >
                    <svg class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                </span>
            @endif

            <span class="select-dropdown-indicator" :class="open ? 'rotate-180' : ''">
                <svg class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
            </span>
        </div>
    </div>

    {{-- Dropdown menu --}}
    <div
        x-show="open"
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
                    'bg-primary-subtle text-primary': isSelected(opt),
                    'bg-gray-100 dark:bg-gray-600': highlightIndex === index && !isSelected(opt),
                }"
                @click.stop="selectOption(opt)"
                @mouseenter="highlightIndex = index"
                role="option"
                :aria-selected="isSelected(opt)"
            >
                <span x-text="getLabel(opt)"></span>
                <svg x-show="isSelected(opt)" class="h-4 w-4 text-primary ml-auto" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
            </div>
        </template>

        {{-- Empty state --}}
        <div x-show="filteredOptions.length === 0" class="px-4 py-3 text-sm text-gray-500 text-center">
            No options
        </div>
    </div>
</div>
