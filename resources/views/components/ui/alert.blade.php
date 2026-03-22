@php
$config = $typeConfig();
$alertClass = collect([
    'alert rounded-xl',
    $config['bg'],
    $config['text'],
    !$title ? 'font-semibold' : '',
    $closable ? 'justify-between' : '',
    $closable && !$title ? 'items-center' : '',
])->filter()->implode(' ');
@endphp

<div
    {{ $attributes->merge(['class' => $alertClass]) }}
    @if ($closable)
        x-data="{ show: true }"
        x-show="show"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
    @endif
>
    <div class="flex gap-2 {{ !$title && $slot->isNotEmpty() ? 'items-center' : '' }} {{ $title && $slot->isNotEmpty() ? 'mt-0.5' : '' }}">
        @if ($showIcon)
            <x-oryn-status-icon :type="$type" :icon-color="$config['icon']" />
        @endif
        <div>
            @if ($title)
                <div class="font-semibold text-lg mb-1 {{ $config['text'] }}">
                    {{ $title }}
                </div>
            @endif
            {{ $slot }}
        </div>
    </div>
    @if ($closable)
        <div class="cursor-pointer" @click="show = false">
            <x-oryn-close-button :reset-default-class="true" class="text-lg outline-hidden" />
        </div>
    @endif
</div>
