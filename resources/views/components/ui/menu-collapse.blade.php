@props([
    'eventKey' => null,
    'label' => null,
    'icon' => null,
    'defaultExpanded' => false,
])

<div x-data="{ expanded: {{ $defaultExpanded ? 'true' : ($eventKey ? "isExpanded('$eventKey')" : 'false') }} }" @if($eventKey) data-collapse-key="{{ $eventKey }}" @endif>
    <div
        class="menu-collapse-item"
        @click="expanded = !expanded; @if($eventKey) toggleExpand('{{ $eventKey }}') @endif"
        :class="{ 'menu-collapse-item-active': expanded }"
    >
        <span class="flex items-center gap-x-2">
            @if($icon) <span class="text-xl">{!! $icon !!}</span> @endif
            <span>{{ $label }}</span>
        </span>
        <svg
            class="w-4 h-4 transition-transform duration-200"
            :class="{ 'rotate-180': expanded }"
            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
        </svg>
    </div>

    <div
        x-show="expanded"
        x-cloak
        x-collapse
        {{ $attributes->merge(['class' => 'ltr:ml-8 rtl:mr-8']) }}
    >
        {{ $slot }}
    </div>
</div>
